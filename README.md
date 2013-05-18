README 

Модуль Elfinder. 

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