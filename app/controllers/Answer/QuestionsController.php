<?php 

use Elearning\Repositories\DBCategoriesRepo; 
use Elearning\Repositories\DBQuestionsRepo; 
use Elearning\Repositories\DBUsersRepo;
use Elearning\Repositories\DBAnswersRepo;

class QuestionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
        protected $category;
        protected $question;
        protected $user;
        protected $answer;
        
        public function __construct(DBCategoriesRepo $repoCat,DBQuestionsRepo $repoQue,DBUsersRepo $repoUsr,DBAnswersRepo $repoAns)
        {
            $this->category = $repoCat;
            $this->question = $repoQue;
            $this->user = $repoUsr;
            $this->answer = $repoAns;
        }
        
	public function index()
	{
            
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            if(Auth::check())
            {
                $categories = $this->category->categorieList();
                return View::make('question.create',compact('categories'));  
                
            }
            return Redirect::to('login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            if(Input::hasFile('attachment'))
            {
                $file = Input::file('attachment');
            }
            else 
            {
                $file = null;
            }
            
            try
            {
                $this->question->createQuestion(Input::all(),Auth::user()->id,$file);
            }
            catch (Elearning\Validators\ValidationException $e)
            {
                return Redirect::back()->withErrors($e->getErrors())->withInput();
            }
            return Redirect::to('users/'.Auth::user()->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($question_id)
	{
		$question = $this->question->getQuestionByID($question_id);
                $answers = $this->answer->getAnswersByQuestionID($question_id);
                $question_id = $question_id;
                $question_owner = $question->user->id;
                //return $question;
                return View::make('question.show',compact('question','answers','question_id','question_owner'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        public function questionByCategorie($categorie_id)
        {
            $categories = $this->category->getAll();
            $current = $categorie_id;
            if($categorie_id != "all")
            {
                $questions = $this->question->getQuestionByCategoryID($categorie_id);
            }
            else
            {
                $questions = $this->question->getQuestion();
            }
            return View::make('question.questionCategorie',compact('categories','questions','current'));
        }
        
        public function questionByUser($user_id)
        {
            $questions = $this->question->getQuestionByUserID($user_id);
            $user = $this->user->getUserByID($user_id);
            return View::make('question.questionUser',compact('questions','user'));
        }
        
}