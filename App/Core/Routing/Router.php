<?php
namespace App\Core\Routing;

use App\Core\Request;
use App\Core\Routing\Route;
use Exception;

class Router 
{
    private $request;
    private $routes;
    private $current_route;
    const BASE_CONTROLLER = "App\Controllers\\";

    public function __construct()
    {
        $this->request = new Request;
        $this->routes = Route::routes();
        $this->current_route = $this->findRoute($this->request) ?? null;
    }

    public function findRoute(Request $request)
    {
        foreach($this->routes as $route)
        {
            if (in_array($request->method(),$route['methods']) and $route['uri'] == $request->uri() )
            return $route;
        }
        return null;
    }

    public function run()
    {
        # 405 error method is not valid 
        if ($this->invalidRequest())
            $this->dispatch405();

        # error 404 uri not exist 
        if (is_null($this->current_route))
        {
            $this->dispatch404();
        }

        $this->dispatch();
    }

    public function dispatch404()
    {
        header("HTTP/1.0 404 Not Found");
        view('errors.404');
        die();
    }
    
    public function dispatch405()
    {
        header("HTTP/1.1 405 Method Not Allowed");
        view('errors.405');
        die();
    }

    private function dispatch()
    {
        # action : null
        $action = $this->current_route['action'];
        if (is_null($action) || empty($action))
            return;
        # action : clousere
        if (is_callable($action))
            call_user_func($action);
        # action : controller@method
        if (is_string($action))
        $action = explode('@',$action);

        # action : ['controller' , 'method']
        if (is_array($action)){
            $class_name = self::BASE_CONTROLLER . $action['0'];
            if (!class_exists($class_name))
                throw new Exception("class $class_name not exsists!");
            $method = $action['1'];
            $controller = new $class_name;
            if (!method_exists($controller,$method))
                throw new Exception("method $method not exsists in $class_name!");
            $controller->{$method}();
        }
    }

    public function invalidRequest()
    {
        foreach($this->routes as $route)
        {
            if (!in_array($this->request->method(),$route['methods']) and $route['uri'] == $this->request->uri() )
            return true;
        }
    } 
}