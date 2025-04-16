<?php

namespace App\Models;


use App\Models\Contracts\MysqlBaseModel;

class ProductModel extends MysqlBaseModel
{
    protected $table = 'products';

}