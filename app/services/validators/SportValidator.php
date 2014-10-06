<?php namespace App\Services\Validators;
 
class SportValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',
        'body'  => 'required',
    );
 
}