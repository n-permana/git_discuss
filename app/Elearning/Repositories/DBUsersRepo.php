<?php namespace Elearning\Repositories;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBUsersRepo
 *
 * @author permana
 */
use Elearning\Models\User;
use Elearning\Validators\UserValidator;

class DBUsersRepo {
    //put your code here
    protected  $validator;
    public function __construct(UserValidator $validator)
    {
        $this->validator = $validator;
    }
    
    public function signup(array $input)
    {
        if($this->validator->isValid($input))
        {
            User::create($input);
            return true;
        };
        throw  new \Elearning\Validators\ValidationException('Create User Failed',$this->validator->getErrors());
    }
    
    public function getUserByID($user_id)
    {
        return User::find($user_id);
    }
    
    public function login(array $input)
    {
        if($this->validator->isValidLogin($input))
        {
            return true;
        };
        
        throw  new \Elearning\Validators\ValidationException('Login Failed',$this->validator->getErrors());
    }
}
