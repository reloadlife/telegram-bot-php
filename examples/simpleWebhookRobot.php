<?php
	/**
	 * @author    MohammadMahdi Afshar <me@reloadlife.me>
	 * @copyright 2018-2019 ReloadLife <me@reloadlife.me>
	 * @license   https://opensource.org/licenses/AGPL-3.0 AGPLv3
	 *
	 */
	namespace SimpleWebhookRobot;

	use TelegramBotPHP\getUpdate;
	use TelegramBotPHP\methods;


	$AccessToken = '123456789:replace_this_with_real_token';

	$updates = new getUpdate();
	$telegram = new methods( $AccessToken );

	if ( $updates->text ) {
		if ( $updates->text == '/start' ) {
			return $telegram->sendMessage([
				'chat_id' => $updates->chat->id,
				'text' => "hey !\ni just echo what ever you send me ! :-)"
			]);
		}
		return $telegram->sendMessage([
			'chat_id' => $updates->chat->id,
			'text' => $updates->text
		]);
	}

	if ( $updates->photo ) {
		return $telegram->sendPhoto([
			'chat_id' => $updates->chat->id,
			'photo' => end($updates->photo)->file_id,
			'caption' => $updates->caption
		]);
	}

	return $telegram->sendMessage([
		'chat_id' => $updates->chat->id,
		'text' => 'ohh, i cant o it on this media :('
	]);