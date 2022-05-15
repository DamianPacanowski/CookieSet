<?php
	class cookie
	{
		private $host;	
		private $ip;
		private $programs;
		private $this;
		public function CookieSet() 
		{
			if(((empty($_SERVER['REMOTE_ADDR']))||($_SERVER['REMOTE_ADDR']=='')||($_SERVER['REMOTE_ADDR']==null))
				||
			((empty($_SERVER['HTTP_USER_AGENT']))||($_SERVER['HTTP_USER_AGENT']=='')||($_SERVER['HTTP_USER_AGENT']==null))
				||
			((empty(gethostbyaddr($_SERVER['REMOTE_ADDR'])))||(gethostbyaddr($_SERVER['REMOTE_ADDR'])=='')||(gethostbyaddr($_SERVER['REMOTE_ADDR'])==null)))	
			{
				return false;
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
					$ip=str_replace('=','',base64_encode($_SERVER['REMOTE_ADDR']));
					$programs=str_replace('=','',base64_encode(str_replace(' ','',$_SERVER['HTTP_USER_AGENT'])));
					$this->host=$host;
					$this->ip=$ip;
					$this->programs=$programs;					
					if((self::SetCookie())&&(self::SaveCookie()))
					{
						return true;
					} 
					else 
					{
						return false; 
					}
				}
			}
		}
		private function SetCookie() 
		{
			setcookie(str_replace('=','',base64_encode('host')),$this->host,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
			setcookie(str_replace('=','',base64_encode('ip')),$this->ip,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
			setcookie(str_replace('=','',base64_encode('programs')),$this->programs,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
			return true;
		}
		private function SaveCookie() 
		{
			fopen('../cookie/hosts/'.$this->host,'w');
			fopen('../cookie/ips/'.$this->ip,'w');
			fopen('../cookie/programs/'.$this->programs,'w');
			return true;
		}
	}
?>
