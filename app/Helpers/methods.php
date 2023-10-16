<?php
if (!function_exists('getTuitionFeeType')) {
    function getTuitionFeeType($value)
    {
        $response = 'Yearly';
        if ($value == 2) {
            $response = 'per Semester';
        } elseif ($value == 3) {
            $response = 'per Month';
        }

        return $response;
    }
}
