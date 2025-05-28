<?php

    function pr($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function prd($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }

    function prta($data = array())
    {
        echo "<pre>";
        print_r($data->toArray());
        echo "</pre>";
    }

    function prtad($data = array())
    {
        echo "<pre>";
        print_r($data->toArray());
        echo "</pre>";
        die;
    }

    if (!function_exists('format_currency')) {
        function format_currency($amount, $currencySymbol = '$')
        {
            return $currencySymbol . number_format($amount, 0, '.', ',');
        }    
    }
