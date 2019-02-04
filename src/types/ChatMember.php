<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 * @link      https://reloadlife.me/TelegramLibraries
	 */

	namespace TelegramBotPHP\types;

	/**
	 * Class ChatMember
	 * @package dGPSBot\tg
	 * @property User user
	 * @property string status
	 * @property integer until_date
	 * @property boolean can_be_edited
	 * @property boolean can_change_info
	 * @property boolean can_post_messages
	 * @property boolean can_edit_messages
	 * @property boolean can_delete_messages
	 * @property boolean can_invite_users
	 * @property boolean can_restrict_members
	 * @property boolean can_pin_messages
	 * @property boolean can_promote_members
	 * @property boolean can_send_messages
	 * @property boolean can_send_media_messages
	 * @property boolean can_send_other_messages
	 * @property boolean can_add_web_page_previews
	 */
	abstract class ChatMember {}