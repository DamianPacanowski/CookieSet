<?php
	class Cookie
	{
		public function CookieSet() 
		{
			if(((empty($_SERVER['REMOTE_ADDR']))||($_SERVER['REMOTE_ADDR']=='')||($_SERVER['REMOTE_ADDR']==null))
			||
			((empty($_SERVER['HTTP_USER_AGENT']))||($_SERVER['HTTP_USER_AGENT']=='')||($_SERVER['HTTP_USER_AGENT']==null))
				||
			((empty(gethostbyaddr($_SERVER['REMOTE_ADDR'])))||(gethostbyaddr($_SERVER['REMOTE_ADDR'])=='')||(gethostbyaddr($_SERVER['REMOTE_ADDR'])==null)))	
			{
				$output=false;
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
					setcookie(str_replace('=','',base64_encode('host')),$host,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
					setcookie(str_replace('=','',base64_encode('programs')),$programs,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
					setcookie(str_replace('=','',base64_encode('ip')),$ip,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);			
					fopen('../'.str_replace('www.','',$_SERVER['SERVER_NAME']).'/cookie/hosts/'.$host,'w');
					fopen('../'.str_replace('www.','',$_SERVER['SERVER_NAME']).'/cookie/programs/'.$programs,'w');
					fopen('../'.str_replace('www.','',$_SERVER['SERVER_NAME']).'/cookie/ips/'.$ip,'w');
					$output=true;
				}
			}
		}
	}
?>