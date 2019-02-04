<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 */

	namespace TelegramBotPHP;


	class response {
		protected $response;
		protected $raw;
		public function __construct ( $response ) {
			if (!$response) {
				$this->response = new \stdClass();
			}
			$this->raw = $response;
			$this->response = $response;
		}

		public function getRawBody ( ) {
			return $this->raw;
		}

		public function isOk () {
			return isset($this->response->isOK)?$this->response->isOK:FALSE;
		}

		public function __get($name) {
			return isset($this->response->result->{$name})?$this->response->result->{$name}:FALSE;
		}
	}