<?php

# Front contoller

use App\Utility\Asset;

include 'bootstrap/init.php';

echo Asset::css('style.css').PHP_EOL;
echo Asset::js('script.js').PHP_EOL;
