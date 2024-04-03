<?php
class Autoload{
    public function __construct(){
        Session::init();
        // dd(request());
        if((Session::get('logindtl') ||  request()->method=='checkLogin')){
            if(ucfirst(request()->controller)=='LoginController' && request()->method=='index'){
                $controller='CategoriesController';
                $method='index';
            }else{

                $controller=request()->controller;
                $method=request()->method;
            }
        }else{
            $controller='LoginController';
            $method='index';
        }
        $path="app/Controllers/$controller.php";
        
        if(file_exists($path))
        {
           include_once $path;
            $cobj= new $controller();
            if(method_exists($cobj,$method))
            {
                    $cobj->$method(request()->args);
                   
            }else{
            redirect('404.php');
            }
      
        }else{
            redirect('404.php');

        }
    }
}
?>