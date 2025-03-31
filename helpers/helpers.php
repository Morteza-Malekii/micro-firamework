<?php


function site_url($route)
{
    return rtrim($_ENV['HOST'], '/') . '/' . ltrim($route, '/');
}

function asset_url($asset)
{
    return rtrim($_ENV['HOST'], '/') . '/assets/' . ltrim($asset, '/');
}

function view($path)
{
    $view_full_path = str_replace('.','/',$path);
    include_once BASEPATH . "views/$view_full_path.php";
}

