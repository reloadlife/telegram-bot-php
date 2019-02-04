<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 */

	namespace TelegramBotPHP;

	use TelegramBotPHP\types\User;
	use TelegramBotPHP\types\Message;
	use TelegramBotPHP\types\Chat;
	use TelegramBotPHP\types\ChatMember;

	/**
	 * class Methods
	 * @method response|User getMe ( array $array = [] );
	 * @method response|Message getUpdates ( array $array );
	 * @method response setWebhook ( array $array  );
	 * @method response deleteWebhook ( array $array );
	 * @method response getWebhookInfo ( array $array );
	 * @method response sendMessage ( array $array );
	 * @method response forwardMessage ( array $array );
	 * @method response sendPhoto ( array $array, bool $upload = false );
	 * @method response sendAudio ( array $array, bool $upload = false );
	 * @method response sendDocument ( array $array, bool $upload = false );
	 * @method response sendVideo ( array $array, bool $upload = false );
	 * @method response sendVoice ( array $array, bool $upload = false );
	 * @method response sendVideoNote ( array $array, bool $upload = false  );
	 * @method response sendMediaGroup ( array $array, bool $upload = false  );
	 * @method response sendLocation ( array $array );
	 * @method response editMessageLiveLocation ( array $array );
	 * @method response stopMessageLiveLocation ( array $array );
	 * @method response sendVenue ( array $array );
	 * @method response sendContact ( array $array );
	 * @method response sendAnimation ( array $array, bool $upload = false  );
	 * @method response sendChatAction ( array $array );
	 * @method response getUserProfilePhotos ( array $array );
	 * @method response getFile ( array $array );
	 * @method response kickChatMember ( array $array );
	 * @method response unbanChatMember ( array $array );
	 * @method response restrictChatMember ( array $array );
	 * @method response promoteChatMember ( array $array );
	 * @method response exportChatInviteLink ( array $array );
	 * @method response setChatPhoto ( array $array, bool $upload = true );
	 * @method response deleteChatPhoto ( array $array );
	 * @method response setChatTitle ( array $array );
	 * @method response setChatDescription ( array $array );
	 * @method response pinChatMessage ( array $array );
	 * @method response unpinChatMessage ( array $array );
	 * @method response leaveChat ( array $array );
	 * @method response|Chat getChat ( array $array );
	 * @method response getChatAdministrators ( array $array );
	 * @method response getChatMembersCount ( array $array );
	 * @method response|ChatMember getChatMember ( array $array );
	 * @method response setChatStickerSet ( array $array );
	 * @method response deleteChatStickerSet ( array $array );
	 * @method response answerCallbackQuery ( array $array );
	 * @method response editMessageText ( array $array );
	 * @method response editMessageMedia ( array $array, bool $upload = false  );
	 * @method response editMessageCaption ( array $array );
	 * @method response editMessageReplyMarkup ( array $array );
	 * @method response deleteMessage ( array $array );
	 * @method response StickerSet ( array $array );
	 * @method response sendSticker ( array $array, bool $upload = false  );
	 * @method response getStickerSet ( array $array );
	 * @method response uploadStickerFile ( array $array );
	 * @method response createNewStickerSet ( array $array );
	 * @method response addStickerToSet ( array $array );
	 * @method response setStickerPositionInSet ( array $array );
	 * @method response deleteStickerFromSet ( array $array );
	 * @method response answerInlineQuery ( array $array );
	 * @method response sendGame ( array $array );
	 * @method response setGameScore ( array $array );
	 * @method response getGameHighScores ( array $array ) ;
	 *
	 * @link https://core.telegram.org/api/bots
	 */

	class Methods {
		protected $AccessToken;
		protected static $Token;
		protected $url = 'https://api.telegram.org/bot';
		protected $Method = 'getMe';
		protected $parameters = [];

		protected $methods = [
			'getMe',
			'getUpdates',
			'setWebhook',
			'deleteWebhook',
			'getWebhookInfo',
			'sendMessage',
			'forwardMessage',
			'sendPhoto',
			'sendAudio',
			'sendDocument',
			'sendVideo',
			'sendVoice',
			'sendVideoNote',
			'sendMediaGroup',
			'sendLocation',
			'editMessageLiveLocation',
			'stopMessageLiveLocation',
			'sendVenue',
			'sendContact',
			'sendAnimation',
			'sendChatAction',
			'getUserProfilePhotos',
			'getFile',
			'kickChatMember',
			'unbanChatMember',
			'restrictChatMember',
			'promoteChatMember',
			'exportChatInviteLink',
			'setChatPhoto',
			'deleteChatPhoto',
			'setChatTitle',
			'setChatDescription',
			'pinChatMessage',
			'unpinChatMessage',
			'leaveChat',
			'getChat',
			'getChatAdministrators',
			'getChatMembersCount',
			'getChatMember',
			'setChatStickerSet',
			'deleteChatStickerSet',
			'answerCallbackQuery',
			'editMessageText',
			'editMessageMedia',
			'editMessageCaption',
			'editMessageReplyMarkup',
			'deleteMessage',
			'StickerSet',
			'sendSticker',
			'getStickerSet',
			'uploadStickerFile',
			'createNewStickerSet',
			'addStickerToSet',
			'setStickerPositionInSet',
			'deleteStickerFromSet',
			'answerInlineQuery',
			'sendGame',
			'setGameScore',
			'getGameHighScores',
		];

		public function __construct ( $AccessToken ) {
			$this->AccessToken = $AccessToken;
			self::$Token = $AccessToken;
		}

		public function __set ( $name, $value ) {
			$this->parameters[$name] = $value;
		}

		public function __unset ( $name ) {
			unset($this->parameters[$name]);
		}

		public function setMethod ( string $Method ): void {
			$this -> Method = $Method;
		}

		public function parameters ( $parameters ) {
			$this->parameters = $parameters + $this->parameters;
		}

		public function setParameters ( $parameters ) {
			$this->parameters = $parameters;
		}

		public function empty () {
			$this->parameters = [] ;
		}

		public function parse_markdown ( $text ) {
			$text = str_replace('[', '\\[', $text);
			$text = str_replace('_', '\\_', $text);
			$text = str_replace('`', '\\`', $text);
			$text = str_replace('*', '\\*', $text);
			return $text;
		}

		/**
		 * @param $handle
		 * @return bool|mixed|string
		 * @throws \Exception
		 */
		private function exec_curl_request ( $handle ) {
			$response = curl_exec( $handle );
			if ( $response === false ) {
				curl_close( $handle );
				return false;
			}
			$http_code = intval( curl_getinfo( $handle, CURLINFO_HTTP_CODE ) );
			curl_close( $handle );
			if ( $http_code >= 500 ) {
				sleep( 5 );
				return false;
			} elseif ( $http_code != 200 ) {
				// $response = json_decode( $response );
				// $response -> isOK = FALSE;
				throw new \Exception( $response, $http_code );
			} else {
				$response = json_decode( $response );
				$response -> isOK = TRUE;
			}
			return $response;
		}

		/***
		 * @param bool $Upload
		 * @return bool|mixed|string
		 * @throws \Exception
		 */
		public function exec ( $Upload = false ) {
			$parameters = array_filter( $this -> parameters );
			$parameters[ "method" ] = $this -> Method;
			$handle = curl_init( $this->url.$this->AccessToken."/" );
			$default = [
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_CONNECTTIMEOUT => 5,
				CURLOPT_TIMEOUT => 60
			];
			if ( $Upload ) {
				foreach ($parameters as $key => &$val) {
					if (!($val instanceof \CURLFile) && !is_numeric($val) && !is_string($val)) {
						$val = json_encode($val);
					}
				}
				curl_setopt( $handle, CURLOPT_POSTFIELDS, $parameters );
				$default[ CURLOPT_POSTFIELDS ] = $parameters;
				$default[ CURLOPT_HTTPHEADER ] = [ "Content-Type: multipart/form-data" ];
			} else {
				$default[ CURLOPT_POSTFIELDS ] = json_encode( $parameters );
				$default[ CURLOPT_HTTPHEADER ] = [ "Content-Type: application/json" ];
			}
			curl_setopt_array($handle, $default);
			return $this -> exec_curl_request( $handle );
		}

		/***
		 * @param $name
		 * @param $params
		 * @param bool $upload
		 * @return bool|mixed|string
		 * @throws \Exception
		 */
		public function sendRequest ( $name, $params, $upload = false ) {
			//if (! in_array(strtolower($name), array_map(function ( $a ) {return strtolower($a);}, $this->methods))){
			//	throw new \Exception('method not found');
			//}
			$this->setMethod ( $name ) ;
			$this->parameters( $params );
			return $this->exec( $upload );
		}

		/***
		 * @param $name
		 * @param $params
		 * @param bool $upload
		 * @return bool|mixed|string
		 * @throws \Exception
		 */
		public static function sendRequestStatic ( $name, $params, $upload = false ) {
			$t = new self (self::$Token);
			return $t->sendRequest( $name, $params, $upload );
		}

		/**
		 * @param $name
		 * @param $arguments
		 * @return response
		 * @throws \Exception
		 */
		public function __call ( $name, $arguments ) {
			return new response( $this -> sendRequest( $name, ( isset( $arguments[0] ) ? $arguments[0] : [] ), ( isset( $arguments[1] ) ? $arguments[1] : false ) ) );
		}

		/***
		 * @param $name
		 * @param $arguments
		 * @return response
		 * @throws \Exception
		 */
		public static function __callStatic ( $name, $arguments ) {
			return new response( self ::sendRequestStatic( $name, ( isset( $arguments[0] ) ? $arguments[0] : [] ), ( isset( $arguments[1] ) ? $arguments[1] : false ) ) );
		}

	}