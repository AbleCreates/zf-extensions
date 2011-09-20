<?php

class Idea_Application_Resource_Propel
	extends Zend_Application_Resource_ResourceAbstract
{

	public function init()
	{

		$config = $this->getOptions();

		require_once 'propel/Propel.php';
		Propel::init($config['configPath']);

	}

}