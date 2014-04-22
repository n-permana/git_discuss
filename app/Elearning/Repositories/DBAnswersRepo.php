<?php namespace Elearning\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBAnswersRepo
 *
 * @author permana
 */
use Elearning\Models\answer;

class DBAnswersRepo {
    //put your code here
    public function saveAnswer($input,$user_id)
    {
        answer::create([
           'answer'         =>  $input['answer'],
           'question_id'    =>  $input['question_id'],
           'user_id'        =>  $user_id
        ]);
    }
    
    public function getAnswersByQuestionID($question_id)
    {
        return Answer::with('user')->where('question_id',$question_id)->get();
    }
    
}
