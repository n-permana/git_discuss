<?php

use Elearning\Repositories\DBMessagesRepo;

class MessagesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
        protected $message;
        
        public function __construct(DBMessagesRepo $repoMsg)
        {
            $this->message = $repoMsg;
        }
        
	public function index()
	{
		$messages = $this->message->getInbox(Auth::user()->id);
                //return $messages;
                return View::make("message.inbox",compact('messages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("message.compose");
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
                $this->message->sendMessage(Input::all(),Auth::user()->id,$file);
            }
            catch (Elearning\Validators\ValidationException $e)
            {
                return Redirect::back()->withErrors($e->getErrors())->withInput();
            }
            
            return Redirect::route('message.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($message_id)
	{
                $this->message->unread($message_id,Auth::user()->id);
		$messages = $this->message->getInboxMessage($message_id);
                return View::make('message.show',compact('messages'));
	}
        
        public function showSent($message_id)
	{
                $messages = $this->message->getSentMessage($message_id);
                //return  $messages;
                return View::make('message.showSent',compact('messages'));
	}
        
        public function showDraft($message_id)
	{
                $messages = $this->message->getSentMessage($message_id);
                //return  $messages;
                return View::make('message.showDraft',compact('messages'));
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
        
        public function mailList()
        {
            $key = Request::query();
            $list = $this->message->mailList($key['key']);
            return $list;
        }
        
        public function sent()
	{
		$messages = $this->message->getSent(Auth::user()->id);
                //return $messages;
                return View::make("message.sent",compact('messages'));
	}
        
        public function draft()
	{
		$messages = $this->message->getDraft(Auth::user()->id);
                //return $messages;
                return View::make("message.sent",compact('messages'));
	}
        
        public function sendDraft()
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
                $this->message->deleteDraft(Input::get('id'));
                $this->message->sendMessage(Input::all(),Auth::user()->id,$file);
            }
            catch (Elearning\Validators\ValidationException $e)
            {
                return Redirect::back()->withErrors($e->getErrors())->withInput();
            }
            
            return Redirect::route('message.index');
        }

        public function reply($message_id)
        {
                $messages = $this->message->getInboxMessage($message_id);
                //return $messages;
                return View::make("message.reply",compact('messages'));
        }
        
        public function replyAll($message_id)
        {
                $messages = $this->message->getInboxMessage($message_id);
                //return $messages;
                $me = array_search(Auth::user()->id,explode(',',$messages->message_to));
                $message_to = explode(',',$messages->message_to);
                unset($message_to[$me]);
                $message_to = implode(',',$message_to);
                return View::make("message.replyAll",compact('messages','message_to'));
        }
        
        public function forward($message_id)
        {
                $messages = $this->message->getInboxMessage($message_id);
                //return $messages;
                return View::make("message.forward",compact('messages'));
        }
}