<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 * @link      https://reloadlife.me/TelegramLibraries
	 */

	namespace TelegramBotPHP;


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

		protected $method;
		protected $parameters;
		protected $Token;

		/**
		 * Request constructor.
		 * @param $token
		 */
		public function __construct ( $token ) {
			$this -> Token = $token;
		}

		/**
		 * @param $name
		 * @param $value
		 */
		public function __set($name, $value) {
			$this->parameters[$name] = $value;
		}

		/**
		 * @param $name
		 */
		public function method ( $name ) {
			$this->method = $name;
		}

		/**
		 * @param $arr
		 */
		public function setArrayParam ( $arr ) {
			$this->parameters = $arr + $this->parameters ;
		}

		/**
		 * @param $handle
		 * @return bool|mixed|string
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
				$response = json_decode( $response );
				$response -> isOK = FALSE;
			} else {
				$response = json_decode( $response );
				$response -> isOK = TRUE;
			}
			return $response;
		}

		/**
		 * @param bool $Upload
		 * @return response
		 */
		public function exec ( $Upload = false ) {
			$parameters = array_filter( $this -> parameters );
			$parameters[ "method" ] = $this -> method;
			$handle = curl_init( "https://api.telegram.org/bot$this->Token/" );
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
			// $this -> parameters = [];
			// uncomment this line to make parameters array empty after each __call
			return new response ($this -> exec_curl_request( $handle ));
		}

		/**
		 * @param $name
		 * @param $arguments
		 * @return response
		 */
		public function __call ($name, $arguments) {
			$this->method ( $name ) ;
			$this->setArrayParam( ( isset($arguments[0])?$arguments[0]:[] ) );
			return $this->exec(( isset($arguments[1])?$arguments[1]:false ));
		}

	}