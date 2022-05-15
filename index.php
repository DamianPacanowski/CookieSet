<?php	
	if(((empty($_SERVER['REMOTE_ADDR']))||($_SERVER['REMOTE_ADDR']=='')||($_SERVER['REMOTE_ADDR']==null))
		||
	((empty($_SERVER['HTTP_USER_AGENT']))||($_SERVER['HTTP_USER_AGENT']=='')||($_SERVER['HTTP_USER_AGENT']==null))
		||
	((empty(gethostbyaddr($_SERVER['REMOTE_ADDR'])))||(gethostbyaddr($_SERVER['REMOTE_ADDR'])=='')||(gethostbyaddr($_SERVER['REMOTE_ADDR'])==null)))	
	{
		echo'SORRY, NETWORK FOR IPS, HOSTS, PROGRAMS, USERS READABLE';
	}
	ELSEif(((!empty($_SERVER['REMOTE_ADDR']))||($_SERVER['REMOTE_ADDR']!='')||($_SERVER['REMOTE_ADDR']!=null))
		||
	((!empty($_SERVER['HTTP_USER_AGENT']))||($_SERVER['HTTP_USER_AGENT']!='')||($_SERVER['HTTP_USER_AGENT']!=null))
		||
	((!empty(gethostbyaddr($_SERVER['REMOTE_ADDR'])))||(gethostbyaddr($_SERVER['REMOTE_ADDR'])!='')||(gethostbyaddr($_SERVER['REMOTE_ADDR'])!=null)))
	{
		if(is_numeric(str_replace('.','',$_SERVER['REMOTE_ADDR'])))
		{
			$host=str_replace('=','',base64_encode(gethostbyaddr($_SERVER['REMOTE_ADDR'])));
			$programs=str_replace('=','',base64_encode(str_replace(' ','',$_SERVER['HTTP_USER_AGENT'])));
			$ip=str_replace('=','',base64_encode($_SERVER['REMOTE_ADDR']));			
			setcookie(str_replace('=','',base64_encode('host')),$host,0,'/','databasecoins.net',1,1);
			setcookie(str_replace('=','',base64_encode('programs')),$programs,0,'/','databasecoins.net',1,1);
			setcookie(str_replace('=','',base64_encode('ip')),$ip,0,'/','databasecoins.net',1,1);
			
			fopen('../cookie/hosts/'.$host,'w');
			fopen('../cookie/programs/'.$programs,'w');
			fopen('../cookie/ips/'.$ip,'w');
			
			
			
			
			
		}
	}
?>