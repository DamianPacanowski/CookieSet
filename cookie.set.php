<?php
	class cookie // create a class
	{
		// set private variables $host, $ip, $programs, $this
		private $host;	
		private $ip;
		private $programs;
		private $this;
		public function CookieSet() // set public function
		{
			// check variables existing
			if(((empty($_SERVER['REMOTE_ADDR']))||($_SERVER['REMOTE_ADDR']=='')||($_SERVER['REMOTE_ADDR']==null))
				||
			((empty($_SERVER['HTTP_USER_AGENT']))||($_SERVER['HTTP_USER_AGENT']=='')||($_SERVER['HTTP_USER_AGENT']==null))
				||
			((empty(gethostbyaddr($_SERVER['REMOTE_ADDR'])))||(gethostbyaddr($_SERVER['REMOTE_ADDR'])=='')||(gethostbyaddr($_SERVER['REMOTE_ADDR'])==null)))	
			{
				return false; // variables not exsist
			}
			elseif(((!empty($_SERVER['REMOTE_ADDR']))||($_SERVER['REMOTE_ADDR']!='')||($_SERVER['REMOTE_ADDR']!=null))
				||
			((!empty($_SERVER['HTTP_USER_AGENT']))||($_SERVER['HTTP_USER_AGENT']!='')||($_SERVER['HTTP_USER_AGENT']!=null))
				||
			((!empty(gethostbyaddr($_SERVER['REMOTE_ADDR'])))||(gethostbyaddr($_SERVER['REMOTE_ADDR'])!='')||(gethostbyaddr($_SERVER['REMOTE_ADDR'])!=null)))
			{
				// variables exsist
				if(is_numeric(str_replace('.','',$_SERVER['REMOTE_ADDR']))) // verife ip variable
				{
					// set variables
					$host=str_replace('=','',base64_encode(gethostbyaddr($_SERVER['REMOTE_ADDR'])));
					$ip=str_replace('=','',base64_encode($_SERVER['REMOTE_ADDR']));
					$programs=str_replace('=','',base64_encode(str_replace(' ','',$_SERVER['HTTP_USER_AGENT'])));
					$this->host=$host;
					$this->ip=$ip;
					$this->programs=$programs;					
					if((self::SetCookie())&&(self::SaveCookie())) // execute private finctions
					{
						return true; // execute successfully
					} 
					else 
					{
						return false; // execute false 
					}
				}
			}
		}
		private function SetCookie() // create private funktion
		{
			setcookie(str_replace('=','',base64_encode('host')),$this->host,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
			setcookie(str_replace('=','',base64_encode('ip')),$this->ip,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
			setcookie(str_replace('=','',base64_encode('programs')),$this->programs,0,'/',str_replace('www.','',$_SERVER['SERVER_NAME']),1,1);
			return true;
		}
		private function SaveCookie() // create private funktion
		{
			fopen('../cookie/hosts/'.$this->host,'w');
			fopen('../cookie/ips/'.$this->ip,'w');
			fopen('../cookie/programs/'.$this->programs,'w');
			return true;
		}
	}
?>
