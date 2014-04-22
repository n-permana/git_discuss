<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of questionAttachment
 *
 * @author permana
 */
class questionAttachment extends \Eloquent {
    //put your code here
    protected $table = 'questionAttachments';
    protected $fillable = array('question_id','attachment_name','attachment_path');
    public function question()
    {
        return $this->belongsTo('Elearning\Models\question');
    }
}
