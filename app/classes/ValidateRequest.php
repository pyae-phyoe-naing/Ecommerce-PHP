<?php


namespace App\classes;

use App\Classes\Auth;
use Illuminate\Database\Capsule\Manager as Capsule;

class ValidateRequest
{
    /**
     * @param $column  // Database Column
     * @param $value   // Column Value
     * @param $policy  // Dynamic => Table name , string count etc..
     */
    private $errors = [];
    private $error_message = [
        'unique' => ':attribute field is already exist',
        'unique' => ':attribute field is already exist',
        'uniqId' => ':attribute field is already exist',
        'required' => ':attribute field is required',
        'minLength' => ':attribute field must be at least :policy characters',
        'maxLength' => ':attribute field must be most :policy characters',
        'email' => ':attribute field must be a valid email',
        'string' => ':attribute field must be string value',
        'number' => ':attribute field must be number value',
        'mixed' => ':attribute field allows [ A-Z , a-z , . , $ , @ ] characters',

    ];

    public function checkValidate($data, $policies)
    {
        foreach ($data as $column => $value) {
            if (in_array($column, array_keys($policies))) {
                $this->validate([
                    "column" => $column,
                    "value" => $value,
                    "policies" => $policies[$column]
                ]);
            }
        }
    }

    public function validate($data)
    {
        $column = $data['column'];
        $value = $data['value'];
        foreach ($data['policies'] as $rule => $policy) {
            // [self::class,$rule] => auto call in this class [$rule] method  // [$column,$value,$policy] => method's parameters
            $valid = call_user_func_array([self::class, $rule], [$column, $value, $policy]); // return from method condition
            if (!$valid) {  // false => validate error
                $this->setError(
                    str_replace(
                        [':attribute', ':policy'],
                        [$column, $policy],
                        $this->error_message[$rule]
                    ),
                    $column
                );
            }
        }
    }
    // true => success , false = validate error

    public function unique($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return Capsule::table($policy)->where($column, $value)->exists() ? false : true;
        }
    }
    public function uniqId($column, $value, $policy)
    {
        $id = Auth::user()->id;
        if ($value != null && !empty(trim($value))) {
            return Capsule::table($policy)->where($column, $value)->where('id','!=',$id)->first() ? false : true;
        }
    }
    public function required($column, $value, $policy)
    {
        if (!is_object($value))
            return $value != null && !empty(trim($value));
        else
            return $value != null && !empty(trim($value->name));  // check file required
    }

    public function minLength($column, $value, $policy)
    {
        if ($value != null  && !empty(trim($value))) {
            return strlen(trim($value)) >= $policy;
        }
    }

    public function maxLength($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return strlen(trim($value)) <= $policy;
        }
    }

    public function email($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }
        return  false;
    }

    public function string($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return preg_match("/^[A-za-z ]+$/", $value);
        }
        return  false;
    }

    public function number($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return preg_match("/^[0-9\.]+$/", $value);
        }
        return  false;
    }

    public function mixed($column, $value, $policy)
    {
        if ($value != null && !empty(trim($value))) {
            return preg_match("/^[A-za-z0-9 \.$@]+$/", $value);
        }
        return  false;
    }

    public  function setError($error, $key = null)
    {
        if ($key) {
            $this->errors[$key] = $error;
        } else {
            $this->errors[] = $error;
        }
    }

    public function hasError()
    {
        return count($this->errors) > 0 ? true : false;
    }

    public function getError()
    {
        return $this->errors;
    }
}
