<?php defined('SYSPATH') or die('No direct script access.');

/**
* 
*/
class Kohana_elFinder extends Core_elFinder
{
	private $config_name = 'elfinder';
	private $config_group_name = 'default';
	protected $config = array();
	protected $default_view = 'elfinder';

	public static function factory($config_group_name = NULL)
	{
		return new kelFinder($config_group_name);
	}


	public function __construct($config_group_name = NULL)
	{
		$this->config_group_name = !empty($config_group_name) ? $config_group_name : $this->config_group_name;
		$this->config = Kohana::$config->load($this->config_name)->get($this->config_group_name);
		$this->config['selector'] = $this->config_name.'_'.$this->config_group_name;
		$this->config['cmd_route'] = Route::url($this->config_name, array('config' => $this->config_group_name));
		if($this->config['lang'] == NULL)
		{
			$this->config['lang'] = explode('-', I18n::lang());
			$this->config['lang'] = $this->config['lang'][0];
		}
		parent::__construct($this->config);
	}

	public function render($view = NULL)
	{
		if ($view === NULL)
		{
			$view = $this->default_view;
		}

		$view = View::factory($view, $this->config);

		return $view->render();
	}
	
}

?>