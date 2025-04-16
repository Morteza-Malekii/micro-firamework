<?php

namespace App\Middleware;

use App\Middleware\contract\MiddlewareContract;
use hisorange\BrowserDetect\Parser as Browser;

class BlockFirefox implements MiddlewareContract
{
    public function handle()
    {
        global $request;
        if (Browser::isSafari())
        echo 'safari is blocked';
    }
}