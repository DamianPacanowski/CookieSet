<?php	
	// you can change \include_once('config.php');/
	// to \include_once('cookie.set.php');/
	// or \spl_autoload_register(function($_set){include_once($_set.".set.php");});/
	include_once('config.php'); // class file
	$cookie_set = new cookie; // class call
	if(($cookie_set->CookieSet())==true) // class function execution true
	{
		echo'<pre>';
			print_r($_COOKIE); // print cookie 
		echo'</pre>';
	}
	else  // false
	{
		echo'cookie not set';
	}
?>
