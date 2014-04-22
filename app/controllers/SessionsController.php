<?php 

use Elearning\Repositories\DBUsersRepo;

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
         protected $user;
         
         public function __construct(DBUsersRepo $repoUsr)
         {
             $this->user = $repoUsr;
         }
         
         
	public function index()
	{
		return View::make('session.create');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
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
                $this->user->login(Input::all());
                if(Auth::attempt(Input::only('username','password')))
                {
                    return Redirect::to('/');
                }
                else
                {
                    return Redirect::back()->with('IncorrectPassword',TRUE)->withInput();
                }
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
	public function destroy()
	{
		Auth::logout();
                return Redirect::to('/');
	}
        
        public function download($path)
        {
            return Response::download($path);
        }

}