<?php	
	//** you can change to include_once('cookie.set.php'); or spl_autoload_register(function($_set){include_once($_set.".set.php");});
	include_once('config.php');  
	$_cookie_set = new cookie;
	if(($_cookie_set->CookieSet())==true)
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
