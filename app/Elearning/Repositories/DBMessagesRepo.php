<?php namespace Elearning\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBMessagesRepo
 *
 * @author permana
 */
use DB;
use Elearning\Models\message;
use Elearning\Models\messageDistribution;
use Elearning\Models\messageAttachment;
use Elearning\Models\user;
use Elearning\Validators\MessageValidator;

class DBMessagesRepo {
    //put your code here
    protected $validator;
    
    public function __construct(MessageValidator $validator)
    {
        $this->validator = $validator;
    }
    
    public function getInbox($user_id)
    {
        return messageDistribution::with('message.user')->whereRaw('message_to = '.$user_id.' and message_status = 1')->get();
    }
    
    public function getSent($user_id)
    {
        return message::with('Distribution.user')->whereRaw('message_status = 1 and message_from = '.$user_id)->get();
    }
    
    public function getDraft($user_id)
    {
        return message::with('Distribution.user')->whereRaw('message_status = 0 and message_from = '.$user_id)->get();
    }
    
    public function sendMessage($input, $user_id, $file)
    {
        if($this->validator->isValid($input))
        {
            DB::transaction(function()
            use ($input, $user_id, $file)
            {   
                $dest = explode(',',$input['message_to']);
                unset($dest[count($dest)-1]);
                $message = new message();
                $message->message_from = $user_id;
                $message->message_to = implode(',',$dest);
                $message->message_title = $input['message_title'];
                $message->message_body = $input['message_body'];
                $message->message_status = $input['message_status'];
                $message->save();
                
                  for($x = 0; $x <= count($dest)-1; $x ++ )
                    {
                        messageDistribution::create([
                            'message_id'    =>  $message->id,
                            'message_to'    =>  $dest[$x],
                            'message_placed'=>  1,
                            'message_status'=>  $input['message_status'],
                            'is_read'       =>  1
                        ]);
                    }  
                
                if($input['message_status'] == 1)
                {
                    if (!file_exists(public_path().'/attachment/message/'.$message->id)) {
                    mkdir(public_path().'/attachment/message/'.$message->id, 0777, true);
                    }
                    if($file != null)
                    {
                        if(is_array($file))
                        {
                            foreach($file as $part) {
                                $Attachment = new messageAttachment();
                                $Attachment->message_id = $message->id;
                                $Attachment->attachment_name = $part->getClientOriginalName();
                                $Attachment->attachment_path = public_path().'\attachment\message\\'.$message->id.'\\'.$part->getClientOriginalName();
                                $Attachment->attachment_mime = $part->getMimeType();
                                $Attachment->save();

                                $part->move(public_path().'/attachment/message/'.$message->id,$part->getClientOriginalName());
                            }
                        }
                    }
                }
            });
            return TRUE;
        }
        throw  new \Elearning\Validators\ValidationException('Send Message Failed',$this->validator->getErrors());
    }
    
    public function getInboxMessage($message_id)
    {
        return Message::with('distribution.user','attachment','user')->where('id',$message_id)->first();
    }
    
    public function getSentMessage($message_id)
    {
        return Message::with('attachment','distribution.user')->where('id',$message_id)->first();
    }
    
    public function unread($message_id,$user_id)
    {
        messageDistribution::whereRaw("message_id = $message_id and message_to = $user_id")->update(array('is_read' => 1));;   
    }
    
    public function mailList($key)
    {
        $user =  user::where('fullname','like','%'.$key.'%')->take(10)->get();
        $list = array();
        foreach($user as $u)
        {
            $list[] = $u->fullname .'|'. $u->id;
        }
        return $list;
    }
    
    public function deleteDraft($message_id)
    {
        messageDistribution::where('message_id',$message_id)->delete();
        message::find($message_id)->delete();
    }
    
}
