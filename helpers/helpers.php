<?php


function site_url($route)
{
    return rtrim($_ENV['HOST'], '/') . '/' . ltrim($route, '/');
}

function asset_url($asset)
{
    return rtrim($_ENV['HOST'], '/') . '/assets/' . ltrim($asset, '/');
}


