<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 */

	namespace TelegramBotPHP;


	use TelegramBotPHP\types\Animation;
	use TelegramBotPHP\types\Audio;
	use TelegramBotPHP\types\Chat;
	use TelegramBotPHP\types\Contact;
	use TelegramBotPHP\types\Document;
	use TelegramBotPHP\types\Game;
	use TelegramBotPHP\types\Location;
	use TelegramBotPHP\types\Message;
	use TelegramBotPHP\types\MessageEntity;
	use TelegramBotPHP\types\PhotoSize;
	use TelegramBotPHP\types\Sticker;
	use TelegramBotPHP\types\User;
	use TelegramBotPHP\types\Venue;
	use TelegramBotPHP\types\Video;
	use TelegramBotPHP\types\VideoNote;
	use TelegramBotPHP\types\Voice;

	/**
	 * Class getUpdate
	 * @property integer message_id
	 * @property User from
	 * @property integer date
	 * @property Chat chat
	 * @property User forward_from
	 * @property Chat forward_from_chat
	 * @property integer forward_from_message_id
	 * @property string forward_signature
	 * @property integer forward_date
	 * @property Message reply_to_message
	 * @property integer edit_date
	 * @property string media_group_id
	 * @property string author_signature
	 * @property string text
	 * @property array|MessageEntity entities
	 * @property array|MessageEntity caption_entities
	 * @property Audio audio
	 * @property Document document
	 * @property Animation animation
	 * @property Game game
	 * @property array|PhotoSize photo
	 * @property Sticker sticker
	 * @property Video video
	 * @property Voice voice
	 * @property VideoNote video_note
	 * @property string caption
	 * @property Contact contact
	 * @property Location location
	 * @property Venue venue
	 * @property array new_chat_members
	 * @property User left_chat_member
	 * @property string new_chat_title
	 * @property array|PhotoSize new_chat_photo
	 * @property bool delete_chat_photo
	 * @property bool group_chat_created
	 * @property bool supergroup_chat_created
	 * @property bool channel_chat_created
	 * @property integer migrate_to_chat_id
	 * @property integer migrate_from_chat_id
	 * @property Message pinned_message
	 * @property string connected_website
	 * @property integer id
	 * @property Message message
	 * @property string|integer inline_message_id
	 * @property string data
	 * @property string chat_instance
	 * @property string game_short_name
	 * @property string result_id
	 * @property string query
	 * @property string offset
	 *
	 * @link https://core.telegram.org/bots/api#update
	 */
	class getUpdate {

		protected $update;
		protected $raw;

		/**
		 * @return \stdClass
		 */
		protected function update () {
			$update = $this->raw = json_decode( file_get_contents( 'php://input' ) );
			if (!$update ) {
				return new \stdClass();
			}
			$map = [
				'message',
				'callback_query',
				'edited_message',
				// 'inline_query',
				// 'chosen_inline_result',
			];
			foreach ( $map as $updateType ) {
				if (isset($update->{$updateType})) {
					return $update->{$updateType};
				}
			}
			return new \stdClass();
		}

		/**
		 * getUpdate constructor.
		 */
		public function __construct() {
			$this->update = $this->update();
		}

		/**
		 * @return mixed
		 */
		public function getRaw () {
			return $this -> raw;
		}

		/**
		 * @return \stdClass
		 */
		public function getUpdates() {
			return $this->update;
		}

		/**
		 * @param $name
		 * @return bool|\stdClass
		 */
		public function __get($name) {
			if ( $name == 'update' ) {
				return $this->update;
			}
			return (isset($this->update->{$name})?$this->update->{$name}:false);
		}

		/**
		 * @param $name
		 * @param $value
		 */
		public function __set ( $name, $value ) {
			$this->update->{$name} = $value;
		}

		/**
		 * @param $name
		 * @return bool
		 */
		public function __isset($name) {
			return (isset($this->update->{$name})?true:false);
		}

		/***
		 * @param $name
		 * @param $arguments
		 * @return bool
		 */
		public function __call($name, $arguments) {
			return false;
		}

		public function __destruct() {
			unset ($this->update);
		}

	}