<?php namespace Elearning\Models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categori
 *
 * @author permana
 */
class categorie extends \Eloquent {
    protected $fillable = array('categorie_name');
    protected $hidden = array('created_at','updated_at');
    //put your code here
}
