<?php

use Elearning\Repositories\DBAnswersRepo;
use Elearning\Repositories\DBQuestionsRepo;

class AnswersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
         protected $answers;
         protected $questions;
         public function __construct(DBAnswersRepo $repoAns,DBQuestionsRepo $repoQue)
         {
             $this->answers = $repoAns;
             $this->questions = $repoQue;
         }
    
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $question_id = Input::get('question_id');
            $this->answers->saveAnswer(Input::all(),Auth::user()->id);
            $this->questions->updatePostCount($question_id);
            return Redirect::to('question/'.$question_id);
                
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
        
        public function best($answerID,$questionID)
        {
            $this->questions->saveBestAnswer($answerID, $questionID);
            return Redirect::to("question/$questionID");
        }
}