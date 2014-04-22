<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('message/mailList','MessagesController@mailList');
Route::get('message/draft/mailList','MessagesController@mailList');
Route::get('message/reply/mailList','MessagesController@mailList');
Route::get('message/replyAll/mailList','MessagesController@mailList');
Route::get('login','SessionsController@index');
Route::get('logout','SessionsController@destroy');
Route::resource('users','UsersController');
Route::resource('question','QuestionsController');
Route::resource('answer','AnswersController');
Route::resource('sessions','SessionsController');
Route::resource('message','MessagesController');
Route::get('question/categorie/{id}','QuestionsController@questionByCategorie');
Route::get('question/user/{id}','QuestionsController@questionByUser');
Route::get('answer/best/{id}/{question}','AnswersController@best');
Route::get('message/show/{id}','MessagesController@show');
Route::get('download/{path}','SessionsController@download');
Route::get('sent','MessagesController@sent');
Route::get('draft','MessagesController@draft');
Route::get('message/sent/{id}','MessagesController@showSent');
Route::get('message/draft/{id}','MessagesController@showDraft');
Route::post('message/send/draft', array('as' => 'message.sendDraft', 'uses' => 'MessagesController@sendDraft'));
Route::get('message/reply/{message_id}','MessagesController@reply');
Route::get('message/replyAll/{message_id}','MessagesController@replyAll');
Route::get('message/forward/{message_id}','MessagesController@forward');
