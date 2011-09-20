<?php

require_once 'Zend/Application/Resource/ResourceAbstract.php';

class Idea_Application_Resource_Twitter
	extends Zend_Application_Resource_ResourceAbstract
{

	public function init()
	{

		$this->getBootstrap()->bootstrap('view');
		$view = $this->getBootstrap()->getResource('view');

		$options = $this->getOptions();

		if (!array_key_exists('api', $options)) {
			return;
		}

		$uri = $options['api']['url'];
		$version = $options['api']['version'];
		$apiKey = $options['api']['key'];

		$params = array(
			'v' => $version,
			'id' => $apiKey,
		);

		$view->headScript()->appendFile($uri . '?' . http_build_query($params, null, '&'));

	}


}
