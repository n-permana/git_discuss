<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author permana
 */
class question extends \Eloquent {
    //put your code here
    protected $guarded = array('_token');
    public function user()
    {
        return $this->belongsTo('Elearning\Models\User');
    }
        
    public function answer()
    {
        return $this->hasMany('Elearning\Models\answer');
    }
    
    public function categorie()
    {
        return $this->belongsTo('Elearning\Models\categorie');
    }
    
    public function questionAttachment()
    {
        return $this->hasMany('Elearning\Models\questionAttachment');
    }
}
