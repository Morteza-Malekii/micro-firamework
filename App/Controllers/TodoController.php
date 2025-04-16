<?php

namespace App\Controllers;

class TodoController
{
    public function list()
    {
        $data = [
            'tasks'=>['daily task','sport task','work tasks'],
            'title'=>'tasks list'
        ];
        view('todo.list',$data);
    }
}