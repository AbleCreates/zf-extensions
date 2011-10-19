<?php

class Idea_Validate_ConfirmPassword extends Zend_Validate_Abstract
{

	const PASSWORDS_DO_NOT_MATCH = 'PassDoNotMatch';

	protected $_messageTemplates = array(
		self::PASSWORDS_DO_NOT_MATCH => 'Passwords do not match'
	);

	public function isValid ($value, $context = null)
	{

		$this->_setValue($value);

		if ($value !== $context['password']) {
			$this->_error(self::PASSWORDS_DO_NOT_MATCH);
			return false;
		}

		return true;

	}

}
