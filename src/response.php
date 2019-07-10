<?php
	
	namespace TelegramBotPHP;
	
	class response {
		protected $response;
		protected $raw;
		
		public function __construct ( $response ) {
			$this -> response = $response;
		}
		
		public function getRawBody () {
			return $this -> response;
		}
		
		public function __get ( $name ) {
			return isset( $this -> response ->{$name} ) ? $this -> response ->{$name} : false;
		}
		
		public function __isset ( $name ) {
			return isset( $this -> response ->{$name} );
		}
	}