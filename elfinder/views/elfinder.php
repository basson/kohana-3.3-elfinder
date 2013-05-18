<!-- elFinder CSS (REQUIRED) -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Route::url('elfinder/media', array('file' => 'css/elfinder.min.css'));?>">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Route::url('elfinder/media', array('file' => 'css/elfinder.css'));?>">

<!-- elFinder JS (REQUIRED) -->
<script type="text/javascript" src="<?php echo Route::url('elfinder/media', array('file' => 'js/elfinder.min.js'));?>"></script>

<!-- elFinder translation (OPTIONAL) -->
<script type="text/javascript" src="<?php echo Route::url('elfinder/media', array('file' => 'js/i18n/elfinder.'.$lang.'.js'));?>"></script>

<!-- elFinder initialization (REQUIRED) -->
<script type="text/javascript" charset="utf-8">
	$().ready(function() {
		var elf = $('#<?php echo $selector; ?>').elfinder({
			url : '<?php echo $cmd_route ?>',  // connector URL (REQUIRED)
			lang: '<?php echo $lang;?>',       // language (OPTIONAL)
			height: 495,
			resizable: false,
		}).elfinder('instance');
	});
</script>
<div id="<?php echo $selector;?>"></div>