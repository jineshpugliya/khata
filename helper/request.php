<?php
function request()
{
    $rq=(object)['controller'=>CONTROLLER."Controller",'method'=>METHOD,'args'=>''];
    
    if($_GET['url']??'')
    {
       
        $url=explode('/',rtrim($_GET['url'],'/'));
        $rq->controller=ucfirst(strtolower($url[0]))."Controller";
        $rq->method=$url[1]??METHOD;
        $rq->args=$url[2]??'';
        //unset($_GET['url']);
    }
    
    if($_GET)
    {
        $rq->get=$_GET;
    }
    if($_POST)
    {
        $rq->post=$_POST;
    }
    
    return $rq;
}
function dd($perm)
{
    echo "<pre>";
    print_r($perm);
    echo "</pre>";
    exit;
}
function redirect($url)
{
    
    $url=ROOT.$url;
$script=<<<URL
    <script>
        location.href='$url';
    </script>
URL;

echo $script;
}
?>