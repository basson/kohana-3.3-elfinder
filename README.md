README 
Модуль Elfinder. 
Подключить в bootstrap.php 
<?php
Kohana::modules(array(
	...
    'elfinder' => MODPATH.'elfinder',
));
?>

Используем так: 

<?php
	$elfinder = kelFinder::factory();
	$this->template->content = View::factory('/filemanager/page', array('elfinder'=>$elfinder));
?>

View: 

<?php
	echo $elfinder->render();
?>