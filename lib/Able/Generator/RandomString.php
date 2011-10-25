<?php

class Able_Generator_RandomString implements Able_Generator
{

	/** @var int */
	protected $_length;

	/** @var string */
	protected $_validChars;

	/**
	 *
	 * initialize the random string generator
	 * @param array $options
	 */
	public function __construct($options)
	{

		$this->_length = 0;
		$this->_validChars = 'abcdefghijklmnopqrstuvwxyz1234567890';

		if (!is_array($options)) {

			$this->_length = $options;

		} else {

			if (array_key_exists('length', $options)) {
				$this->_length = $options['length'];
			}

		}

	}

	public function generate()
	{

		$string = '';

		for ($i = 0; $i < $this->_length; $i++) {
			$string .= substr(
				$this->_validChars,
				rand(0, strlen($this->_validChars) - 1),
				1
			);
		}

		return $string;

	}

}
