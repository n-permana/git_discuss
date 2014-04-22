<?php namespace Elearning\Validators;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MessageValidator
 *
 * @author permana
 */
class MessageValidator extends Validator {
    //put your code here
    protected static $Rules =
            [
                'message_to' => 'required',
                'message_title' => 'required',
                'message_body' => 'required'
            ];
}
