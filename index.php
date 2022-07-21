<?php	
	include('cookie.set.php'); // class file
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
