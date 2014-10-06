<?php namespace App\Services\Validators;
 
class SkillsValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',
        'level'  => 'required',
    );
 
}