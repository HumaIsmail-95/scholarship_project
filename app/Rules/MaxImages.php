<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxImages implements Rule
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function passes($attribute, $value)
    {
        // dd(is_array($value) && count($value) <= $this->max, $value, $this->max);
        return is_array($value) && count($value) <= $this->max;
    }

    public function message()
    {
        return "The :attribute must have a maximum of {$this->max} images.";
    }
}
