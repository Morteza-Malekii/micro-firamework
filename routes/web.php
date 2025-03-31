<?php

use App\Core\Routing\Route;

Route::get('/null');


Route::add(['get' , 'post'], '/a' , function(){
    echo 'welcom ';
} );

Route::get('/b', function(){
    echo 'save ok';
} );

Route::get('/',['HomeController','index']);

Route::get('/archive', 'ArchiveController@index');

