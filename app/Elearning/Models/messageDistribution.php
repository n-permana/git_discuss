<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message_distribution
 *
 * @author permana
 */
class messageDistribution extends \Eloquent {
    //put your code here
    protected $table = 'messageDistributions';
    protected $fillable = array('message_id','message_to','message_placed','message_status','is_read');
    
    public function message()
    {
        return $this->belongsTo('Elearning\Models\message');
    }
    
    public function user()
    {
        return $this->belongsTo('Elearning\Models\user','message_to');
    }
}
