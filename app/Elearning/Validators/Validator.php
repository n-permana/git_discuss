<?php namespace Elearning\Validators;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validator
 *
 * @author permana
 */
use Validator as V;

abstract class Validator {
    //put your code here
    protected $errors;
    
    public function isValidLogin(array $attributes)
    {
        $v = V::make($attributes,static::$LoginRules);
        if($v->fails())
        {
            $this->errors = $v->messages();
             return false;
        }
        return true;
    }
    
    public function isValid(array $attributes)
    {
        $v = V::make($attributes,static::$Rules);
        if($v->fails())
        {
            $this->errors = $v->messages();
             return false;
        }
        return true;
    }


    public function getErrors()
    {
        return $this->errors;
    }
}
