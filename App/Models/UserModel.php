<?php

namespace App\Models;


use App\Models\Contracts\MysqlBaseModel;

class UserModel extends MysqlBaseModel
{
    protected $table = 'Users';

}