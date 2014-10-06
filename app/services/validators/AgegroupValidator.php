<?php namespace App\Services\Validators;
 
class AgegroupValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',
        'start_age'  => 'required|numeric',
        'end_age'  => 'required|numeric',
    );
 
}