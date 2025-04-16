<?php

use App\Core\Routing\Route;
use App\Middleware\BlockFirefox;
use App\Middleware\BlockIE;

Route::get('/null');

Route::add(['get' , 'post'], '/a' , function(){
    echo 'welcom ';
} );

Route::get('/b', function(){
    echo 'save ok';
} );

// Route::get('/post/11', 'PostController@single');
Route::get('/post/{slug}', 'PostController@single');
Route::get('/post/{slug}/comment/{cid}', 'PostController@single');

Route::get('/',['HomeController','index']);
Route::get('/archive', 'ArchiveController@index');
Route::get('/todo/list', 'TodoController@list', [BlockFirefox::class , BlockIE::class]);
Route::get('/todo/add', 'TodoController@add');
Route::get('/todo/remove', 'TodoController@remove');


