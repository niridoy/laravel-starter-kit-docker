<?php

use Carbon\Carbon;

if (!function_exists('showDate')) {
    function showDate($value) {
        return $value ? Carbon::parse($value)->format('d-m-Y') : null;
    }
}

if (!function_exists('showDateTime')) {
    function showDateTime($value) {
        return $value ? Carbon::parse($value)->format('d-m-Y h:i A') : null;
    }
}

if (!function_exists('showAmount')) {
    function showAmount($value) {
        return number_format($value, 2);
    }
}

if (!function_exists('isRequestNotEmpty')) {
    function isRequestNotEmpty() {
        if(!empty(request()->all())) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('isDevMode')) {
    function isDevMode() {
        if(env('APP_ENV') != 'production') return true;
    }
}
