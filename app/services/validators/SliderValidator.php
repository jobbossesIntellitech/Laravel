<?php 
namespace App\Services\Validators;
 
class SliderValidator extends Validator {
 
    public static $rules = array(
        'title' => 'required',
        'image'  => 'required',
    );
 
}