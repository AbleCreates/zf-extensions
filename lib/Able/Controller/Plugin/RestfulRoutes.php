<?php

class Able_Controller_Plugin_RestfulRoutes
    extends Zend_Controller_Plugin_Abstract
{

    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {

        if (!$request instanceof Zend_Controller_Request_Http) {
            return;
        }

        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();

        $currentRoute = $router->getCurrentRoute();

        if (!$currentRoute instanceof Able_Controller_Router_Route_Rest) {
            return;
        }

        $method = strtolower($request->getMethod());
        $id = $request->getParam('id');

        if (strcasecmp($request->getMethod(), Zend_Http_Client::GET)
            && !$id
        ) {
            $method = 'index';
        } elseif (strcasecmp($request->getMethod(), Zend_Http_Client::POST)
            && $id
        ) {
            $method = 'put';
        }

        $request->setActionName($method);

    }

}

