<?php

class Able_Validate_UniqueUsername extends Zend_Validate_Abstract
{

	const INVALID_USERNAME = 'InvalidUsername';

	protected $_messageTemplates = array(
		self::INVALID_USERNAME =>
			'The supplied username already exists'
	);

	protected $_repository;

	protected $_methodName;

	public function __construct(array $options = array())
	{

	    $className = array_key_exists('repository', $options)
	        ? $options['repository'] : null;

	    if (!$className) {
	        throw new InvalidArgumentException('No repository class supplied');
	    }

	    $this->_repository = new $className();

	    $this->_methodName = array_key_exists('method', $options)
	        ? $options['method'] : 'findForUsername';

	    if (!$this->_methodName) {
	        throw new InvalidArgumentException('No method name supplied');
	    } elseif (!method_exists($this->_repository, $this->_methodName)) {
	        throw new InvalidArgumentException('[' . $this->_method . '] does not exist');
	    }

	}

	/**
	 * (non-PHPdoc)
	 * @see Zend_Validate_Interface::isValid()
	 */
	public function isValid ($value, $context = null)
	{

	    $user = call_user_func(
	        array($this->getRepository(), $this->_methodName),
	        $value
	    );

        if ($user instanceof Idea_User) {
            $this->_error(self::INVALID_USERNAME);
            return false;
        }

	    return true;

	}

	/**
	 *
	 * @return Idea_User_Repository
	 */
	public function getRepository()
	{

	    return $this->_repository;

	}

}
