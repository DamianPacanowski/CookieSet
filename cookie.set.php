<?php
	class cookie
	{
		private $host;	
		private $ip;
		private $programs;
		public function catch() 
		{
			if(((empty(getenv("REMOTE_ADDR")))||(getenv("REMOTE_ADDR")=='')||(getenv("REMOTE_ADDR")==null))
			||
			((empty(getenv("HTTP_USER_AGENT")))||(getenv("HTTP_USER_AGENT")=='')||(getenv("HTTP_USER_AGENT")==null))
				||
			((empty(gethostbyaddr(getenv("REMOTE_ADDR"))))||(gethostbyaddr(getenv("REMOTE_ADDR"))=='')||(gethostbyaddr(getenv("REMOTE_ADDR"))==null)))	
			{
				header('location:/');
			}
			ELSEif(((!empty(getenv("REMOTE_ADDR")))&&(getenv("REMOTE_ADDR")!='')&&(getenv("REMOTE_ADDR")!=null))
				&&
			((!empty(getenv("HTTP_USER_AGENT")))&&(getenv("HTTP_USER_AGENT")!='')&&(getenv("HTTP_USER_AGENT")!=null))
				&&
			((!empty(gethostbyaddr(getenv("REMOTE_ADDR"))))&&(gethostbyaddr(getenv("REMOTE_ADDR"))!='')&&(gethostbyaddr(getenv("REMOTE_ADDR"))!=null)))
			{
				if(is_numeric(str_replace('.','',getenv("REMOTE_ADDR"))))
				{
					$host=str_replace('=','',base64_encode(gethostbyaddr(getenv("REMOTE_ADDR"))));
					$ip=str_replace('=','',base64_encode(getenv("REMOTE_ADDR")));
					$programs=str_replace('=','',base64_encode(str_replace(' ','',getenv("HTTP_USER_AGENT"))));
					$this->host=$host;
					$this->ip=$ip;
					$this->programs=$programs;					
					if(self::SetCookie())
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
			include('../net.set.php');
			include('../positions.catch.php');
			include('../hash.set.php');
			$net_set = new net;
			$net_stamp=$net_set->NetSet();			
			$positions_set = new positions;
			$hash_set = new hash;			
			$dir_cookie='D:/www/'.str_replace('www.','',getenv("SERVER_NAME").'/cookie/');
			$coockie_math=null;
			if(!empty($_COOKIE))
			{
				foreach(scandir($dir_cookie) as $cookie_net_stamp)
				{
					$net_stamp_e=base64_decode($net_stamp);
					$net_stamp_e1=str_replace('+','/',$net_stamp_e);
					$cookie_net_stamp=base64_decode($net_stamp_e1);					
					$cookie_host_positions=$positions_set->catch($this->host,0,1,$cookie_net_stamp);
					$cookie_hash_host_positions=str_replace('=','',base64_encode($hash_set->catch($cookie_host_positions,1,$cookie_net_stamp,$cookie_net_stamp)));
					$hc=str_replace('=','',base64_encode($hash_set->catch('host',1,$cookie_net_stamp,$cookie_net_stamp)));					
					$cookie_ip_positions=$positions_set->catch($this->ip,0,1,$cookie_net_stamp);
					$cookie_hash_ip_positions=str_replace('=','',base64_encode($hash_set->catch($cookie_ip_positions,1,$cookie_net_stamp,$cookie_net_stamp)));
					$ic=str_replace('=','',base64_encode($hash_set->catch('ip',1,$cookie_net_stamp,$cookie_net_stamp)));					
					$cookie_programs_positions=$positions_set->catch($this->programs,0,1,$cookie_net_stamp);
					$cookie_hash_programs_positions=str_replace('=','',base64_encode($hash_set->catch($cookie_programs_positions,1,$cookie_net_stamp,$cookie_net_stamp)));
					$pc=str_replace('=','',base64_encode($hash_set->catch('programs',1,$cookie_net_stamp,$cookie_net_stamp)));					
					if((((!empty($_COOKIE[str_replace('09','',$hc)]))&&(isset($cookie_hash_host_positions)))&&
					((!empty($_COOKIE[str_replace('09','',$ic)]))&&(isset($cookie_hash_ip_positions)))&&
					((!empty($_COOKIE[str_replace('09','',$pc)]))&&(isset($cookie_hash_programs_positions))))
					&&
					(($_COOKIE[str_replace('09','',$hc)]==$cookie_hash_host_positions)&&
					($_COOKIE[str_replace('09','',$ic)]==$cookie_hash_ip_positions)&&
					($_COOKIE[str_replace('09','',$pc)]==$cookie_hash_programs_positions)))
					{
						$coockie_math=+1;
						return true;
					}
					else
					{
						$coockie_math=null;						
					}
				}
			}
			if($coockie_math==null)
			{
				$host_positions=$positions_set->catch($this->host,0,1,$net_stamp);
				$ip_positions=$positions_set->catch($this->ip,0,1,$net_stamp);
				$programs_positions=$positions_set->catch($this->programs,0,1,$net_stamp);				
				$hash_host_positions=str_replace('=','',base64_encode($hash_set->catch($host_positions,1,$net_stamp,$net_stamp)));
				$hash_ip_positions=str_replace('=','',base64_encode($hash_set->catch($ip_positions,1,$net_stamp,$net_stamp)));
				$hash_programs_positions=str_replace('=','',base64_encode($hash_set->catch($programs_positions,1,$net_stamp,$net_stamp)));				
				$h=str_replace('=','',base64_encode($hash_set->catch('host',1,$net_stamp,$net_stamp)));
				$i=str_replace('=','',base64_encode($hash_set->catch('ip',1,$net_stamp,$net_stamp)));
				$p=str_replace('=','',base64_encode($hash_set->catch('programs',1,$net_stamp,$net_stamp)));
				setcookie(str_replace('09','',$h),$hash_host_positions,0,'/',str_replace('www.','',getenv("SERVER_NAME")),1,1);
				setcookie(str_replace('09','',$i),$hash_ip_positions,0,'/',str_replace('www.','',getenv("SERVER_NAME")),1,1);
				setcookie(str_replace('09','',$p),$hash_programs_positions,0,'/',str_replace('www.','',getenv("SERVER_NAME")),1,1);
				$net_stamp_c1=str_replace('=','',base64_encode($net_stamp));
				$net_stamp_c2=str_replace('/','+',$net_stamp_c1);
				$net_stamp_c3=str_replace('=','',base64_encode($net_stamp_c2));
				if((fopen($dir_cookie.$net_stamp_c3,'w'))==true)
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
?>
