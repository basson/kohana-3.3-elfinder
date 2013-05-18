<?php defined('SYSPATH') or die('No direct script access.');

/**
* 
*/
class Core_elFinder
{
	private $_elfinder = NULL;

	public function __construct($config)
	{
		if (($path = Kohana::find_file('vendor', 'elFinder.init'))) 
		{
			ini_set('include_path', ini_get('include_path').PATH_SEPARATOR.dirname($path));
			require_once 'elFinder.init.php';
		}
		$el_config = array('roots'=>array($config));
		$el_config['roots'][0]['accessControl'] = array(new elFinderAccess,'access');
		$this->_elfinder = new elFinderConnector(new elFinder($el_config));
	}

	public function run()
	{
		return $this->_elfinder->run();
	}

	public static function access($attr, $path, $data, $volume) 
	{
		return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
	}
}
?>