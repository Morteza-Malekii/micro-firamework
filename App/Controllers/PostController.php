<?php
namespace App\Controllers;

use App\Models\UserModel;

class PostController
{
    public function single()
    {
        $user = new UserModel(10);
        // $user->save($user->name , 'mahsa rouhi');
        // $user->name = 'joooonjonam';
        // $user->save();
        nice_dump($user);

    }
}