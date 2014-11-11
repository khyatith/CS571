<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Sessionstore
{
function store()
{
$protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
            === FALSE ? 'http' : 'https';
$host = $_SERVER['HTTP_HOST'];
$script = $_SERVER['SCRIPT_NAME'];
$params = $_SERVER['QUERY_STRING']; 
$currentUrl = $protocol . '://' . $host . $script . '?' . $params;

if ($currentUrl != "http://cs-server.usc.edu:5928/myhomework3/CustomerLogin.php?") {
    $expiryTime = time()+(60*5); // 5 mins
	
	
    setcookie('referer',$currentUrl,$expiryTime,'/');
	//$_SESSION('referer',$currentUrl,$expiryTime,'/');

}


}
}