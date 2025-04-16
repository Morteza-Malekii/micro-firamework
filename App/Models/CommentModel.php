<?php

namespace App\Models;

use App\Models\Contracts\MysqlBaseModel;

class CommentModel extends MysqlBaseModel
{
    protected $table = 'comments';

}