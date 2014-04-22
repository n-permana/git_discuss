<?php namespace Elearning\Validators;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidationException
 *
 * @author permana
 */

use \Exception;
class ValidationException extends Exception {
    //put your code here
    protected $errors;
    
    public function __construct($message, $errors, $code = 0, Exception $previous = null) {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}
