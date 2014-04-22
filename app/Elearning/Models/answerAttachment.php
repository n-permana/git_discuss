<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of answerAttachment
 *
 * @author permana
 */
class answerAttachment extends \Eloquent {
    //put your code here
    protected $table = 'answerAttachments';
    protected $fillable = array('answer_id','attachment_name','attachment_path');
    
    public function answer()
    {
        return $this->belongsTo('Elearning\Models\answer');
    }
}
