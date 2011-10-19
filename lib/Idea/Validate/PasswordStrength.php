<?php

class Idea_Validate_PasswordStrength extends Zend_Validate_Abstract
{

	const WEAK_PASSWORD = 'WeakPassword';

	protected $_messageTemplates = array(
		self::WEAK_PASSWORD =>
			'The supplied password should contain at least 10 characters with upper and lower case letters and at least one digit and one special symbol'
	);

	public function isValid ($value, $context = null)
	{

		$this->_setValue($value);

		$exp = '/^.*(?=.{10,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[!"#$%&\'()*+,-./:;<=>?@\[\\\]^_`{|}~]).*$/';

		if (!preg_match($exp, $value)) {

			$this->_error(self::WEAK_PASSWORD);
			return false;

		}

		return true;

	}

}
