<?php 

use Elearning\Repositories\DBCategoriesRepo; 
use Elearning\Repositories\DBQuestionsRepo; 

class HomeController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
       

        protected $categories;
        protected $questions;
        
        public function __construct(DBCategoriesRepo $repoCat, DBQuestionsRepo $repoQue) 
        {
            $this->categories = $repoCat;
            $this->questions = $repoQue;
        }
        
	public function Welcome()
	{
                $categories = $this->categories->getAll();
                $questions = $this->questions->getQuestion();
                //return $questions;
                return View::make('home.index',compact('categories','questions'));
	}
        
        public function index()
        {
            return View::make('hello');
        }
}