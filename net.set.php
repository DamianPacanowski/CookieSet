<?php
	class net
	{
		private $net_stamp;
		public function NetSet() 
		{
			if(self::SetNet())
			{
				$net_stamp = self::SetNet();
				$this->net_stamp = $net_stamp;
				return $net_stamp;
			} 
			else 
			{
				return false; 
			}
		}
		private function SetNet() 
		{
			$_1=1;$_2=2;$_3=3;$_4=4;$_5=5;$_6=6;$_7=7;$_8=8;$_9=9;$_0=0;
			$Nux=$_1.$_2.$_3.$_4.$_5.$_6.$_7.$_8.$_9.$_0;
			$_s_s_Nu=str_shuffle($Nux);
			
			$BL='ABCDEFGHIJKLMNOPRSTUWYVQZ';
			$_s_s_BL=str_shuffle($BL);
			
			$SL='abcdefghijklmnoprstuwyvqz';
			$_s_s_SL=str_shuffle($SL);
			
			$Sy=substr('!|_&?,."*%#@=+-',0,25);
			$_s_s_Sy=str_shuffle($Sy);
			
			$_GET_ALL=str_shuffle($_s_s_Nu.$_s_s_BL.$_s_s_SL.$_s_s_Sy);
			$_STRLEN=STRLEN($_GET_ALL);
			$_MIX_ALL=str_shuffle($_GET_ALL);
			FOR($N=1;$N>=$_STRLEN;$N++)
			{
				$_MIX_ALL = str_shuffle($_MIX_ALL);
			}
			$_SIEC = substr($_MIX_ALL,0,85);
			$net_stamp=$_SIEC;
			return $net_stamp;
		}		
	}
?>