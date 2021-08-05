<?php


namespace App\classes;
use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest
{
    /**
     * @param $column  // Database Column
     * @param $value   // Column Value
     * @param $policy  // Dynamic => Table name , string count etc..
     */

   public function unique($column,$value,$policy){
      if($value != null && !empty(trim($value))){
          return Capsule::table($policy)->where($column,$value)->exists();
      }
   }

    public function required($column,$value,$policy){
        return $value != null && !empty(trim($value));
    }

    public function minLength($column,$value,$policy){
        if($value != null  && !empty(trim($value))){
            return strlen(trim($value)) >= $policy;
        }
    }
    public function maxLength($column,$value,$policy){
        if($value != null && !empty(trim($value))){
            return strlen(trim($value)) <= $policy;
        }
    }

    public function email($column,$value,$policy){
        if($value != null && !empty(trim($value))){
            return filter_var($value,FILTER_VALIDATE_EMAIL);
        }
        return  false;
    }
    public function string($column,$value,$policy){
        if($value != null && !empty(trim($value))){
            return preg_match("/^[A-za-z]+$/",$value);
        }
        return  false;
    }
    public function number($column,$value,$policy){
        if($value != null && !empty(trim($value))){
            return preg_match("/^[0-9]+$/",$value);
        }
        return  false;
    }
    public function mixed($column,$value,$policy){
        if($value != null && !empty(trim($value))){
            return preg_match("/^[A-za-z0-9 \.$@]+$/",$value);
        }
        return  false;
    }
}