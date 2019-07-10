# telegram-bot-php

* just require everyfile in it (require all files in '/src' also '/src/types')

use 
```bash
composer require reloadlife/php-telegram-bot
```
or in composer.json just:
```json
{
	"require"    : {
		"reloadlife/php-telegram-bot": "dev-master"
	}
}
```
then
```bash
composer install
```

and then use
```php
require 'vendor/autoload.php'
```


# some examples

```php
<?php

namespace TEST;

require 'vendor/autoload.php';

use TelegramBotPHP\getUpdate;
use TelegramBotPHP\methods;

$telegram = new methods ( 'TOKEN' );
	$updates  = new getUpdate ();
	
	if ( $updates -> text )
		{
			$telegram -> sendMessages (
				[
					'chat_id' => $updates -> from -> id,
					'text' => $updates -> text,
				]
			);
		}
// will returns what ever it receives as text message .
// :)

```


# ?

* if you have any question about it you can contact me right there [Telegram](tg://resolve?domain=reloadlife) [Email: me@reloadlife.me](mailto:me@reloadlife.me)
* if you liked it star project to support me and if you like me [Get me A cup of coffee](https://zarinp.al/reloadlife.me)
* enjoy 
* :)