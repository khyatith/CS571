<?php
if ( ! function_exists('redirect_back'))
{
    function redirect_back()
    {
	//print_r($_SERVER);
	//print_r($_SERVER['HTTP_REFERER']);
        if(isset($_SERVER['HTTP_REFERER']))
        {
             header('Location:http://cs-server.usc.edu:5928'.$_SERVER['HTTP_REFERER']);
			 
        }
        else
        {
            header('Location: http://cs-server.usc.edu:5928'.$_SERVER['SERVER_NAME']);
			
        }
        exit;
    }
}
?>