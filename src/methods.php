<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 */
	
	namespace TelegramBotPHP;
	
	use GuzzleHttp\Client;
	use TelegramBotPHP\types\User;
	use TelegramBotPHP\types\Chat;
	use TelegramBotPHP\types\Message;
	use TelegramBotPHP\types\ChatMember;
	use GuzzleHttp\Exception\GuzzleException;
	use GuzzleHttp\Exception\RequestException;
	
	/**
	 * class methods
	 * @method response|User getMe ( array $array = [] );
	 * @method response|Message getUpdates ( array $array );
	 * @method response setWebhook ( array $array, bool $upload = false );
	 * @method response deleteWebhook ( array $array );
	 * @method response getWebhookInfo ( array $array );
	 * @method response|Message sendMessage ( array $array );
	 * @method response|Message forwardMessage ( array $array );
	 * @method response|Message sendPhoto ( array $array, bool $upload = false );
	 * @method response|Message sendAudio ( array $array, bool $upload = false );
	 * @method response|Message sendDocument ( array $array, bool $upload = false );
	 * @method response|Message sendVideo ( array $array, bool $upload = false );
	 * @method response|Message sendVoice ( array $array, bool $upload = false );
	 * @method response|Message sendVideoNote ( array $array, bool $upload = false );
	 * @method response|Message sendMediaGroup ( array $array, bool $upload = false );
	 * @method response|Message sendLocation ( array $array );
	 * @method response|Message editMessageLiveLocation ( array $array );
	 * @method response stopMessageLiveLocation ( array $array );
	 * @method response|Message sendVenue ( array $array );
	 * @method response|Message sendContact ( array $array );
	 * @method response|Message sendAnimation ( array $array, bool $upload = false );
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
	 * @method response|Message editMessageText ( array $array );
	 * @method response|Message editMessageMedia ( array $array, bool $upload = false );
	 * @method response|Message editMessageCaption ( array $array );
	 * @method response|Message editMessageReplyMarkup ( array $array );
	 * @method response deleteMessage ( array $array );
	 * @method response StickerSet ( array $array );
	 * @method response|Message sendSticker ( array $array, bool $upload = false );
	 * @method response getStickerSet ( array $array );
	 * @method response uploadStickerFile ( array $array );
	 * @method response createNewStickerSet ( array $array );
	 * @method response addStickerToSet ( array $array );
	 * @method response setStickerPositionInSet ( array $array );
	 * @method response deleteStickerFromSet ( array $array );
	 * @method response answerInlineQuery ( array $array );
	 * @method response|Message sendGame ( array $array );
	 * @method response setGameScore ( array $array );
	 * @method response getGameHighScores ( array $array ) ;
	 *
	 * @link https://core.telegram.org/api/bots
	 */
	class methods {
		protected        $AccessToken;
		protected static $Token;
		protected        $url        = 'https://api.telegram.org/bot';
		protected        $Method     = 'getMe';
		protected        $parameters = [];
		protected        $hooked     = false;
		
		/**
		 * Methods constructor.
		 *
		 * @param $AccessToken
		 */
		public function __construct ( $AccessToken ) {
			$this -> AccessToken = self ::$Token = $AccessToken;
			if ( !isset( $GLOBALS['hooked'] ) )
				{
					$GLOBALS['hooked'] = false;
				}
			$this -> hooked = $GLOBALS['hooked'];
		}
		
		/**
		 * @param $name
		 * @param $value
		 */
		public function __set ( $name, $value ) {
			$this -> parameters[$name] = $value;
		}
		
		/**
		 * @param $name
		 */
		public function __unset ( $name ) {
			unset( $this -> parameters[$name] );
		}
		
		/**
		 * @param string $Method
		 *
		 * @return string
		 */
		public function setMethod ( string $Method ) {
			return $this -> Method = $Method;
		}
		
		/**
		 * @param $parameters
		 *
		 * @return array
		 */
		public function parameters ( $parameters ) {
			return $this -> parameters = $parameters + $this -> parameters;
		}
		
		/**
		 * @param $parameters
		 *
		 * @return mixed
		 */
		public function setParameters ( $parameters ) {
			return $this -> parameters = $parameters;
		}
		
		/**
		 * @return array
		 */
		public function empty () {
			return $this -> parameters = [];
		}
		
		public function hook ()
		: bool {
			$GLOBALS['hooked'] = true;
			$this -> hooked    = true;
			if ( function_exists ( 'fastcgi_finish_request' ) && is_callable ( 'fastcgi_finish_request' ) )
				{
					fastcgi_finish_request ();
				}
			set_time_limit ( -1 );
			return 'hooked';
		}
		
		/**
		 * @param array $params
		 *
		 * @return array
		 */
		public function parse ( $params = [] ) {
			$param   = array_filter ( $params );
			$options = [
				'multipart' => [
				
				],
			];
			if ( count ( $param ) > 0 )
				{
					foreach ( $param as $name => $value )
						{
							if ( !is_string ( $name ) )
								{
									continue;
								}
							if ( $value instanceof FileTelegram )
								{
									$options['multipart'][] = [
										'name' => $name,
										'contents' => $value -> getFile (),
										'filename' => $value -> getName (),
									];
								}
							else
								{
									if ( is_array ( $value ) )
										{
											$value = json_encode ( $value );
										}
									$options['multipart'][] = [
										'name' => $name,
										'contents' => $value,
									];
								}
						}
				}
			return $options;
		}
		
		/**
		 * @param bool $Upload
		 *
		 * @return bool|mixed
		 * @throws \Exception
		 */
		public function exec ( $Upload = false ) {
			$parameters           = array_filter ( $this -> parameters );
			$parameters["method"] = $this -> Method;
			if ( !$Upload && !$this -> hooked )
				{
					header ( 'content-type: application/json', true, 200 );
					echo json_encode ( array_filter ( $parameters ) );
					return $this -> hook ();
				}
			
			$Client = new Client(
				[
					'base_uri' => "{$this->url}{$this->AccessToken}/",
					'verify' => false,
					'allow_redirects' => true,
					'headers' => [
						'User-Agent' => "ReloadLife.ME TelegramClient/2.0 PHP " . phpversion () . " (https://reloadlife.me/TelegramBotPHP/client) ",
					],
				]
			);
			
			try
				{
					$response = $Client -> request ( "POST", "{$this -> Method}", $this -> parse ( $parameters ) );
					
					if ( $response -> getStatusCode () == 200 )
						{
							return json_decode ( $response -> getBody () ) -> result;
						}
					else
						{
							throw new \Exception( $response -> getBody (), $response -> Code () );
						}
				} catch ( RequestException $e )
				{
				//	error_log ( "{$e->getTraceAsString ()}" . "||" . $e -> getResponse () -> getBody () );
					return false;
				} catch ( GuzzleException $e )
				{
				//	error_log ( "$e" . "||" . $e -> getMessage () );
					return false;
				}
		}
		
		/***
		 * @param      $name
		 * @param      $params
		 * @param bool $upload
		 *
		 * @return bool|mixed|string
		 * @throws \Exception
		 */
		public function sendRequest ( $name, $params, $upload = false ) {
			$this -> setMethod ( $name );
			$this -> parameters ( $params );
			return $this -> exec ( $upload );
		}
		
		/**
		 * @param $name
		 * @param $arguments
		 *
		 * @return response|bool
		 * @throws \Exception
		 */
		public function __call ( $name, $arguments ) {
			$result = $this -> sendRequest ( $name, ( isset( $arguments[0] ) ? $arguments[0] : [] ), ( isset( $arguments[1] ) ? $arguments[1] : false ) );
			if ( $result != 'hooked' )
				{
					return new response( $result );
				}
			return true;
		}
	}
