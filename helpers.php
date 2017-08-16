<?php

if (!function_exists("config")) {
    function config($name){
        $config = require "config.php";
        return $config[$name];
    }
}