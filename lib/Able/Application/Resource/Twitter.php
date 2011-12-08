<?php

class Able_Application_Resource_Twitter
	extends Zend_Application_Resource_ResourceAbstract
{

    protected $_bootstrapVersion = '1.4.0';

    protected $_bootstrapDomain = 'http://twitter.github.com';

    protected $_bootstrapPlugins = array(
        'modal',
    	'dropdown',
        'scrollspy',
        'buttons',
        'tabs',
        'twipsy',
        'popover',
        'alerts',
    );

    protected $_view;

	public function init()
	{

		$this->getBootstrap()->bootstrap('view');
		$this->_view = $this->getBootstrap()->getResource('view');

		$options = $this->getOptions();

		if (array_key_exists('api', $options)) {
			$this->_initApi($options['api']);
		}

		if (array_key_exists('twbootstrap', $options)) {
			$this->_initBootstrap($options['twbootstrap']);
		}

	}

	protected function _initApi($options)
	{

		$uri = $options['url'];
		$version = $options['version'];
		$apiKey = $options['key'];

		$params = array(
			'v' => $version,
			'id' => $apiKey,
		);

		$this->_view->headScript()->appendFile($uri . '?' . http_build_query($params, null, '&'));

	}

	protected function _initBootstrap($options)
	{

	    if (!array_key_exists('version', $options)
	        || !$options['version']
	    ) {

	        return;

	    }

	    $this->getBootstrap()->bootstrap('jquery');

		$this->_view->headLink()->appendStylesheet($this->_getCssFile());

		if (!array_key_exists('plugins', $options)
		    || !is_array($options['plugins'])
		) {

		    return;

		}

		foreach ($options['plugins'] as $plugin) {

		    if (!in_array($plugin, $this->_bootstrapPlugins)) {
		        continue;
		    }

		    $file = $this->_getJavascriptFile($plugin);
		    $this->_view->headScript()->appendFile($file);

		}

	}

	protected function _getCssFile()
	{

	    return $this->_getFile('bootstrap.min', 'css');

	}

	protected function _getJavascriptFile($plugin)
	{

	    return $this->_getFile('bootstrap-' . $plugin, 'js');

	}

	protected function _getFile($name, $ext)
	{

	    return $this->_bootstrapDomain
	        . '/bootstrap'
	        . '/' . $this->_bootstrapVersion
	        . '/' . $name
	        . '.' . $ext;

	}

}
