<?php
namespace App\Services\Validators;
 
class UserValidator extends Validator {
 
    public static $rules = array(
        'email' => 'required|email',
        'first_name'  => 'required',
        'last_name'  => 'required',
        'password'  => 'required',
        
    );
 
}