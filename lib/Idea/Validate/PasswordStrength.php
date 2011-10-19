<?php

class Idea_Validate_PasswordStrength extends Zend_Validate_Abstract
{

	const WEAK_PASSWORD = 'WeakPassword';

	protected $_messageTemplates = array(
		self::WEAK_PASSWORD =>
			'A weak password was supplied'
	);

	public function isValid ($value, $context = null)
	{

		$this->_setValue($value);

		$checkLowerCaseChars = '(?=.*[a-z])';
		$checkUpperCaseChars = '(?=.*[A-Z])';
		$checkDigits = '(?=.*[\d])';
		$checkSpecialChars = '(?=.*[!"#$%&\'()*+,-.\/:;<=>?@\[\\\]^_`{|}~])';
		$checkLength = '(?=.{10,})';

		$exp = '/^.*'
			. $checkLength
			. $checkLowerCaseChars
			. $checkUpperCaseChars
			. $checkDigits
			. '.*$/';

		if (!preg_match($exp, $value)) {

			$this->_error(self::WEAK_PASSWORD);
			return false;

		}

		return true;

	}

}
