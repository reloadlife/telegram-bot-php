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
	 * Class Chat
	 * @package dGPSBot\tg
	 * @property integer id
	 * @property string type
	 * @property string title
	 * @property string username
	 * @property string first_name
	 * @property string last_name
	 * @property bool all_members_are_administrators [Only in GetChat]
	 * @property ChatPhoto photo [Only in GetChat]
	 * @property string description [Only in GetChat]
	 * @property string invite_link [Only in GetChat]
	 * @property Message pinned_message [Only in GetChat]
	 * @property string sticker_set_name [Only in GetChat]
	 * @property bool can_set_sticker_set [Only in GetChat]
	 */
	abstract class Chat {}