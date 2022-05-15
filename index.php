<?php	
	require_once('config.php'); 
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