<?php

# Front contoller

use App\Core\Request;
use App\Core\Routing\Route;
use App\Core\Routing\Router;
use App\Models\CommentModel;
use App\Models\Contracts\MysqlBaseModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Medoo\Medoo;

include 'bootstrap/init.php';

// $jsonModel_obj = new UserModel;
// for ($i=0; $i < 20; $i++) { 
//     # code...
//     $jsonModel_obj->create(["id"=>$i,"name"=>"mahsa.$i",'age'=>10+$i]);
// }
// var_dump($jsonModel_obj->find(15));
// $data = $jsonModel_obj->readJson();
// $condition = ['age'=>28];
// var_dump($jsonModel_obj->get($data,$condition));
// $data = ['name'=>'morteza','id'=>100,'city'=>'izmir'];
// $where = ['age'=>20];
// $jsonModel_obj->update($data , $where);
// echo $jsonModel_obj->delete($where);

// $comment_obj = new ProductModel;
// for ($i=0; $i < 20; $i++)
// {
//     $comment_obj->create([
//         'id'=>$i,
//         'name'=>'mobile',
//         'brand'=>'apple',
//         'ram'=>4+$i
//     ]);
// }

// $mysqlbasemodel = new UserModel;
// $result = $mysqlbasemodel->create([
//     'name'=>'morteza'.rand(100,500),
//     'email'=>'morteza167@gmail.com',
//     'password'=>'123456'
// ]);
// $result = $mysqlbasemodel->find(['id'=>10]);
// $result = $mysqlbasemodel->getAll();
// $result = $mysqlbasemodel->delete(['id'=>8]);
// nice_dump($result);



$router = new Router;
$router->run();
