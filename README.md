# telegram-bot-php

* just require everyfile in it (require all files in '/src' also '/src/types')

OR

use 
```bash
composer install
```

OR

```bash
composer require reloadlife/php-telegram-bot
```

and then use
```php
require 'vendor/autoload.php'
```


# some examples

```php
<?php

namespace TEST;

require 'vendor/autoload.php'

use TelegramBotPHP;

$telegram = new methods ( 'TOKEN' );
$updates = new getUpdates ();

if ( $updates->text ) {
    $telegram->sendMessages([
        'chat_id' => $updates->from->id,
        'text' => $updates->text,
    ]);
}
// will returns what ever it receives as text message .
// :)

```


# ?

* if you have any question about it you can contact me right there [Telegram](tg://resolve?domain=reloadlife) [Email: me@reloadlife.me](mailto:me@reloadlife.me)
* if you liked it star project to support me and if you like me [Get me A cup of coffee](https://zarinp.al/reloadlife.me)
* enjoy 
* :)