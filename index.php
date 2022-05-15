<?php	
	// you can change " include_once('config.php'); "
	// to " include_once('cookie.set.php'); "
	// or " spl_autoload_register(function($_set){include_once($_set.".set.php");}); "
	include_once('config.php');  
	$cookie_set = new cookie;
	if(($cookie_set->CookieSet())==true)
	{
		echo'<pre>';
			print_r($_COOKIE);
		echo'</pre>';
	}
	else
	{
		echo'cookie not set';
	}
?>
