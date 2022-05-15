<?php	
	// you can change " include_once('config.php'); "
	// to " include_once('cookie.set.php'); "
	// or " spl_autoload_register(function($_set){include_once($_set.".set.php");}); "
	include_once('config.php');
	$cookie_set = new cookie; // function call
	if(($cookie_set->CookieSet())==true) // function execution
	{
		echo'<pre>';
			print_r($_COOKIE); // print cookie
		echo'</pre>';
	}
	else
	{
		echo'cookie not set'; // print false
	}
?>
