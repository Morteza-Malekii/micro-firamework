<?php
namespace App\Utility;

class Asset
{
    public static function css(string $route)  
    {
        return rtrim($_ENV['HOST'],'/') . '/assets/css/' . ltrim($route,'/');
        
    }
    public static function js(string $route)  
    {
        return rtrim($_ENV['HOST'],'/') . '/assets/js/' . ltrim($route,'/');
        
    }
    public static function img(string $route)  
    {
        return rtrim($_ENV['HOST'],'/') . '/assets/img/' . ltrim($route,'/');
        
    }
}