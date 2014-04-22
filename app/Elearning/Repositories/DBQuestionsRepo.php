<?php namespace Elearning\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBQuestionsRepo
 *
 * @author permana
 */
use DB;
use Elearning\Models\question;
use Elearning\Models\questionAttachment;
use Elearning\Validators\QuestionValidator;

class DBQuestionsRepo {
    //put your code here
    protected $validator;
    
    public function __construct(QuestionValidator $validator)
    {
        $this->validator = $validator;
    }
    
    //Get all question along with its categorie and user 
    public function getQuestion()
    {
        return Question::with('categorie','user')->get();
    }
    
    public function getQuestionByCategoryID($categorie_id)
    {
        return Question::with('categorie','user')->where('categorie_id',$categorie_id)->get();
    }
    
    public function getQuestionByUserID($user_id)
    {
        return Question::with('categorie')->where('user_id',$user_id)->get();
    }
    
    public function getQuestionByID($question_id)
    {
        return Question::with('user','questionAttachment')->where('id',$question_id)->first();
    }
    
    //+1 postCount everytime the question get the answer 
    public function updatePostCount($question_id)
    {
        $question = Question::find($question_id);
        $question->post_count = $question->post_count + 1;
        $question->save();
    }
    
    //save the best answer for the question
    public function saveBestAnswer($answerID,$questionID)
    {
        $question = Question::find($questionID);
        $question->best_answer_id = $answerID;
        $question->save();
    }
    
     public function questionByUserID($userID)
    {
        $questions = Question::with('categorie')->where('user_id',$userID)->get();
        return $questions;
    }
    
    public function createQuestion($input,$user_id,$file)
    {
        if($this->validator->isValid($input))
        {
            DB::transaction(function()
            use ($input, $user_id, $file)
            {
                $question = new question();
                $question->title = $input['title'];
                $question->content = $input['content'];
                $question->categorie_id = $input['categorie_id'];
                $question->user_id = $user_id;
                $question->save();

                if (!file_exists(public_path().'/attachment/question/'.$question->id)) {
                    mkdir(public_path().'/attachment/question/'.$question->id, 0777, true);
                }
                if($file != null)
                {
                    if(is_array($file))
                    {
                        foreach($file as $part) {
                            $qAttachment = new questionAttachment();
                            $qAttachment->question_id = $question->id;
                            $qAttachment->attachment_name = $part->getClientOriginalName();
                            $qAttachment->attachment_path = public_path().'\attachment\question\\'.$question->id.'\\'.$part->getClientOriginalName();
                            $qAttachment->attachment_mime = $part->getMimeType();
                            $qAttachment->save();

                            $part->move(public_path().'/attachment/question/'.$question->id,$part->getClientOriginalName());
                        }
                    }
                }
            });
            return TRUE;
        }
        throw  new \Elearning\Validators\ValidationException('Create Question Failed',$this->validator->getErrors());
    }
}
