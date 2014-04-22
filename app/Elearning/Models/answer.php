<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of answer
 *
 * @author permana
 */
class answer extends \Eloquent {
    //put your code here
    protected $guarded = array('_token');
    public function user()
    {
        return $this->belongsTo('Elearning\Models\user');
    }
}
