<?php
class CategoriesController extends MainController{
    public function __construct()
    {
       parent::__construct(); 
       $this->loadModel('category','cat');
       
     //   echo "THis is cat constructor";
    }
    public function index(){
        $cond='';
        if($kw=request()->get['keyword']??'')
        {
            $cond=" (name like '%$kw%' or des like '%$kw%') ";
        }
        $this->view->loadView('categories/index',[
            'catdata'=>$this->cat->fetchData('*',$cond),
            'keyword'=>$kw
            ]);

    }
    public function create(){
        $this->view->loadView('categories/create');
    }
    public function store(){
        $info=[
            'name'=>request()->post['name'],
            'des'=>request()->post['des']
        ];
        if($this->cat->submitData($info)){
            Session::set('success',"Data submited successfully!");
            redirect('categories');
        }else{
            Session::set('error', "Somthing semmed wrong!");
   
        }

    }
    public function edit($id){
        $id= base64_decode(urldecode($id));
        $this->view->loadView('categories/edit',[
            'info'=>$this->cat->fetchInfo($id),
            'id'=>$id,
            ]);

    }
    public function update($id){
        $id= base64_decode(urldecode($id));
        if(request()->post!=$this->cat->fetchInfo($id,'name,des'))
       {
        $info=[
            'name'=>request()->post['name'],
            'des'=>request()->post['des']
        ];
        if($this->cat->submitData($info,$id)){
            Session::set('success',"Data submited successfully!");
           
        }else{
            Session::set('error', "Somthing semmed wrong!");
   
        }
    }else{
        Session::set('info', "Nothing to change !");
    }
    redirect('categories');
    }
    public function destroy($id)
    {
        $id= base64_decode(urldecode($id));
        $this->cat->deleteRecord($id);
        redirect('categories');
    }

}
?>