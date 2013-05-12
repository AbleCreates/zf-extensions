<?php

class Able_Application extends Zend_Application
{

    protected $config;

    /**
     * initialize the application
     * @param string $environment
     * @param mixed $options
     */
    public function __construct($environment, $options = null)
    {

        // lazy load the options so environment variables can be defined first
        if (is_string($options)) {
            $this->config = $options;
            $options = null;
        }

        parent::__construct($environment, $options);

    }

    /**
     * load the configuration
     * @return Application
     */
    public function load()
    {

        if ($this->config) {
            $options = $this->_loadConfig($this->config);
            $this->setOptions($options);
        }

        return $this;

    }

    /**
     * intialize a set of environment variables
     * @param array|string $names
     * @param string $errorMessage
     */
    public function initializeEnvironment($names, $errorMessage)
    {

        $names = is_array($names) ? $names : array($names);

        foreach ($names as $name) {

            $this->assertEnvironmentVariableExists($name, $errorMessage);
            \define($name, getenv($name));

        }

        return $this;

    }

    protected function assertEnvironmentVariableExists($name, $errorMessage)
    {

        $value = getenv($name);

        if ($value === false) {
            throw new \RuntimeException($errorMessage);
        }

    }

}
