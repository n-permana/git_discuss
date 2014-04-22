<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message_attachment
 *
 * @author permana
 */
class messageAttachment extends \Eloquent {
    //put your code here
    protected $table = 'messageAttachments';
    protected $fillable = array('message_id','attachment_name','attachment_path');
    
    public function message()
    {
        return $this->belongsTo('Elearning\Models\message');
    }
}
