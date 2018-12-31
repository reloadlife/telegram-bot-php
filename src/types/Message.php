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
	 * Class Message
	 * @package dGPSBot\tg
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
	 * @property array new_chat_photo
	 * @property bool delete_chat_photo
	 * @property bool group_chat_created
	 * @property bool supergroup_chat_created
	 * @property bool channel_chat_created
	 * @property integer migrate_to_chat_id
	 * @property integer migrate_from_chat_id
	 * @property Message pinned_message
	 * @property string connected_website
	 */
	abstract class Message {}
