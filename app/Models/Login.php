<?php 
class Login extends MainModel{
    public $table='users';
    function validate(){
        $email=addslashes(trim(request()->post['email']))??'';
        if($email){

            $password=md5(request()->post['password']);
            if($loginfo=$this->fetchData('*',"email='$email'"))
            {
                $loginfo=$loginfo[0];
                if($loginfo['password']==$password)
                {
                    return $loginfo;
                }
                
            }
        }
         return false;
    }
}
?>