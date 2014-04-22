<?php namespace Elearning\Validators;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserValidator
 *
 * @author permana
 */
class UserValidator extends Validator {
    
    protected static $LoginRules =
            [
                'username' => 'required|exists:users',
                'password' => 'required|min:4'
            ];
    
    protected static $Rules =
            [
                'username' => 'required',
                'password' => 'required',
                'fullname' => 'required',
                'email' => 'required'
            ];
    
}
