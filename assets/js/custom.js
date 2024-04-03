function jsredirect(path,msg='Click Ok to proceed!')
{
    if(confirm(msg))
    {
        location.href=path;
    }
}
$(document).ready(function() {
   setTimeout(function(){
        $('#success').hide(300);
        $('#error').hide(300);
        $('#info').hide(300);
   },5000);
} );