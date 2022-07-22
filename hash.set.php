<?php
	class hash 
	{
		private$key;
		private$iv;
		private$string;
		private$action;
		private$output;	
		public function catch($string,$action,$key,$iv) 
		{
			$this->string=$string;
			$this->action=$action;
			$this->key=$key;
			$this->iv=$iv;
			if(self::crypt()) 
			{
				$output=self::crypt();
				$this->output=$output;
				return$this->output;
			} 
			else 
			{
				return false; 
			}
		}
		private function crypt() 
		{
			$encrypt_method='AES-256-CBC';
			$key=hash('SHA3-512',$this->key);
			$iv=substr(hash('SHA512',$this->iv),0,16);
			if($this->action==1) 
			{
				$output=base64_encode(openssl_encrypt($this->string,$encrypt_method,$key,OPENSSL_RAW_DATA,$iv));
			}
			elseif($this->action==0)
			{
				$output=openssl_decrypt(base64_decode($this->string),$encrypt_method,$key,OPENSSL_RAW_DATA,$iv);
			}
			return$output;
		}
	}
?>