<?php

if (!function_exists('format_currency')) {
    function format_currency($amount, $currencySymbol = '$')
    {
        return $currencySymbol . number_format($amount, 0, '.', ',');
    }    
}
