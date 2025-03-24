<?php
namespace App\Utility;

class Url
{
    public static function current_url() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            ? "https://" : "http://";
    
        $host = $_SERVER['HTTP_HOST'];      // دامنه مثل micro.test یا localhost
        $uri  = $_SERVER['REQUEST_URI'];    // مسیر مثل /about?page=2
    
        return $protocol . $host . $uri;
    }
    
   
    
}