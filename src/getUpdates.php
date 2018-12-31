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
	 * Class getUpdate
	 * @package TelegramBotPHP
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

		protected function update () {
			$update = json_decode( file_get_contents( 'php://input' ) );
			if (isset( $update -> message )) {
				$update = $update -> message;
			} elseif (isset( $update -> callback_query )) {
				$update = $update -> callback_query;
			} elseif (isset( $update -> edited_message )) {
				$update = $update -> edited_message;
			} elseif (isset( $update -> inline_query )) {
				$update = $update -> inline_query;
			} elseif (isset( $update -> chosen_inline_result )) {
				$update = $update -> chosen_inline_result;
			} elseif (isset( $update -> channel_post )) {
				$update = $update -> channel_post;
			} elseif (isset( $update -> edited_channel_post )) {
				$update = $update -> edited_channel_post;
			} elseif (isset( $update -> shipping_query )) {
				$update = $update -> shipping_query;
			} elseif (isset( $update -> pre_checkout_query )) {
				$update = $update -> pre_checkout_query;
			} else {
				$update = new \stdClass();
			}
			return $update;
		}

		public function __construct() {
			$this->update = $this->update();
		}

		public function __get($name) {
			return (isset($this->update->{$name})?$this->update->{$name}:false);
		}

		public function __call($name, $arguments) {
			return false;
		}

		public function __destruct() {
			unset ($this->update);
		}

	}