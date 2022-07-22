# CookieSet is a class for setting cookies in the user's browser, together with saving on the server 
One of best data for this porpouse it is the data from the user himself, obtained after connecting to our server.

So I created a class and called it in any file, in this example it is index.php

if you have more relevant and useful variables to suggest, feel free to discuss.

    include('../cookie.set.php');
    $_cookie_set = new cookie;
    if(($_cookie_set->catch())==true)
    {
        echo'<pre>';
            print_r($_COOKIE); // print cookie 
        echo'</pre>';
    }
    else
    {
        echo'COOKIE SET ERROR';
    } 
