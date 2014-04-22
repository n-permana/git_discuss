<?php 

use Elearning\Repositories\DBUsersRepo;
use Elearning\Repositories\DBQuestionsRepo;

class UsersController extends \BaseController {

        protected $users;
        protected $questions;
        public function __construct(DBUsersRepo $repoUsr,DBQuestionsRepo $repoQue)
        {
            $this->users = $repoUsr;
            $this->questions = $repoQue;
        }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
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
                return View::make('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            try
            {
                $this->users->signup(Input::all());
                return Redirect::to('login');
            }
            catch(Elearning\Validators\ValidationException $e)
            {
                return Redirect::back()->withErrors($e->getErrors())->withInput();
            }
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($userID)
	{
		$questions = $this->questions->questionByUserID($userID);
                return View::make('user.index',compact('questions'));
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

}