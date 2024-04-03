<?php
class LoginController extends MainController{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Login');
    }
    public function index(){
        $this->view->loadView('login.index');
    }
    public function checkLogin(){
        if($response=$this->login->validate()){
            
            Session::set('logindtl',$response);
            redirect('categories/index');

        }else{
            Session::set('error','Username Or Password Not Matched!');
            redirect('login/index');
        }
    }
    public function logout()
    {
        Session::destroy();
        redirect('login/index');

    }
}