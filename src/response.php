<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 */

	namespace TelegramBotPHP;

	/**
	 * Class response
	 * @package TelegramBotPHP
	 */
	class response {
		protected $response;
		protected $raw;

		/**
		 * response constructor.
		 * @param $response
		 */
		public function __construct ( $response ) {
			if (!$response) {
				$this->response = new \stdClass();
			}
			$this->response = $this->raw = $response;
		}

		/**
		 * @return mixed
		 */
		public function getRawBody ( ) {
			return $this->raw;
		}

		/**
		 * @return bool
		 */
		public function isOk () {
			return isset($this->response->isOK)?$this->response->isOK:FALSE;
		}

		/**
		 * @param $name
		 * @return bool
		 */
		public function __get($name) {
			return isset($this->response->result->{$name})?$this->response->result->{$name}:FALSE;
		}
	}