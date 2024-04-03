<?php
class MainView{
    function loadView($filename,$viewdata='',$hf=1)
    {
        $filename=str_replace('.','/',$filename);
        $filepath="app/views/$filename.php";
        if(file_exists($filepath))
        {
            if(is_array($viewdata) && $viewdata)
            {
                extract($viewdata);
            }
            if($hf){
                include_once "app/views/header.php";
            }
            include_once $filepath;
            
            if($hf){
                include_once "app/views/footer.php";
            }
        }
    }
}
?>