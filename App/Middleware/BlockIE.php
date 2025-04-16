<?php

namespace App\Middleware;

use App\Middleware\contract\MiddlewareContract;
use hisorange\BrowserDetect\Parser as Browser;

class BlockIE implements MiddlewareContract
{
    public function handle()
    {
        global $request;
        if (Browser::isIE())
        echo 'safari is blocked';
    }
}