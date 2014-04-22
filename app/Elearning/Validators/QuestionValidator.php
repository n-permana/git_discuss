<?php namespace Elearning\Validators;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuestionValidator
 *
 * @author permana
 */
class QuestionValidator extends Validator {
    //put your code here
    protected static $Rules =
            [
                'title' => 'required',
                'content' => 'required'
            ];
}
