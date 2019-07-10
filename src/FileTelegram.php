<?php
	
	
	namespace TelegramBotPHP;
	
	
	class FileTelegram {
		protected $file, $name;
		
		public function __construct ( $file, $name ) {
			$this -> file = $file;
			$this -> name = $name;
		}
		
		public function getFile () {
			if ( @ is_file ( $this -> file ) )
				{
					return file_get_contents ( $this -> file );
				}
			return $this -> file;
		}
		
		public function getName () {
			return $this -> name;
		}
	}