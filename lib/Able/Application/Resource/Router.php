<?php

/** @see Zend_Application_Resource_Router */
require_once 'Zend/Application/Resource/Router.php';

class Able_Application_Resource_Router
	extends Zend_Application_Resource_Router
{

    /** @var Zend_Controller_Router_Route_Hostname */
	protected $_hostnameRoute;

    public function init()
    {

    	$this->getBootstrap()->bootstrap('frontController');
    	$frontController = $this->getBootstrap()->getResource('frontController');

        $options = $this->getOptions();

		$config = new Zend_Config_Ini(
			$options['configPath'],
			APPLICATION_ENV
		);

		$this->_router = new Zend_Controller_Router_Rewrite();

        if (array_key_exists('baseHostname', $options)
        	&& $options['baseHostname']
        ) {

        	session_set_cookie_params(0, '/', '.' . $options['baseHostname']);

			$this->_hostnameRoute = new Zend_Controller_Router_Route_Hostname(
				':citySlug.' . $options['baseHostname']
			);

			$default = new Zend_Rest_Route($frontController);

            $this->_router->addRoute('default', $default);
            $this->_router->addConfig($config, 'routes');

            $routes = $this->_router->getRoutes();

			foreach ($routes as $key => $route) {

				$this->_router->addRoute(
					$key, $this->_hostnameRoute->chain($route)
				);

			}

        } else {

        	$this->_router->addConfig($config, 'routes');
        	//TODO: update default route
        	//$default = new Zend_Rest_Route($frontController);

        }

		$frontController->setRouter($this->_router);
		return $this;

    }

    /**
     *
     * @return Zend_Controller_Router_Route_Hostname
     */
    public function getHostnameRoute()
    {

    	return $this->_hostnameRoute;

    }

    /**
     * (non-PHPdoc)
     * @see Zend_Application_Resource_Router::getRouter()
     */
    public function getRouter()
    {

    	return $this->_router;

    }

}