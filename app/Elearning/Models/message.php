<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
 *
 * @author permana
 */
class message extends \Eloquent {
    //put your code here
     protected $fillable = array('message_from','message_to','message_title','message_body','message_status');
    public function distribution()
    {
        return $this->hasMany('Elearning\Models\messageDistribution');
    }
    
    public function attachment()
    {
        return $this->hasMany('Elearning\Models\messageAttachment');
    }
    
    public function user()
    {
        return $this->belongsTo('Elearning\Models\user','message_from');
    }
}
