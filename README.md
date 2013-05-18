README 

Модуль Elfinder для Kohana 3.3.

Подключить в bootstrap.php 

```php
<?php
Kohana::modules(array(
	...
    'elfinder' => MODPATH.'elfinder',
));
?>
```

Используем так: 

```php
<?php
	$elfinder = kelFinder::factory();
	$this->template->content = View::factory('/filemanager/page', array('elfinder'=>$elfinder));
?>
```

View: 

```php
<?php
	echo $elfinder->render();
?>
```