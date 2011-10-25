<?php

class Able_Generator_Password implements Able_Generator
{

	/** @var int */
	protected $_length;

	/** @var array */
	protected $_chars;

	/**
	 * initialize the password generator
	 * @param array $options
	 */
	public function __construct($options)
	{

		$this->_length = 0;
		$this->_chars = array();

		if (!is_array($options)) {

			$this->_length = $options;

		} else {

			if (array_key_exists('length', $options)) {
				$this->_length = $options['length'];
			}

			if (array_key_exists('includeLowerCaseChars', $options)
				&& $options['includeLowerCaseChars']
			) {

				$this->includeLowerCaseChars();

			}

			if (array_key_exists('includeUpperCaseChars', $options)
				&& $options['includeUpperCaseChars']
			) {

				$this->includeUpperCaseChars();

			}

			if (array_key_exists('includeDigits', $options)
				&& $options['includeDigits']
			) {

				$this->includeDigits();

			}

			if (array_key_exists('includeSpecialChars', $options)
				&& $options['includeSpecialChars']
			) {

				$this->includeSpecialChars();

			}

		}

	}

	public function generate()
	{

		// randomize the order of characters in the array
		shuffle($this->_chars);

		$password = '';

		for ($i = 0; $i < $this->_length; $i++) {
			$index = rand(0, (count($this->_chars) - 1));
			$password .= $this->_chars[$index];
		}

		return $password;

	}

	/**
	 * include all of the lower case characters
	 */
	public function includeLowerCaseChars()
	{

		$this->_merge(range('a', 'z'));

	}

	/**
	 * include all of the upper case characters
	 */
	public function includeUpperCaseChars()
	{

		$this->_merge(range('A', 'Z'));

	}

	/**
	 * include all special characters
	 */
	public function includeSpecialChars()
	{

		$chars = array('!', '@', '#', '$', '%', '^', '&', '*', '(', ')');
		$this->_merge($chars);

	}

	/**
	 * include all of the digits
	 */
	public function includeDigits()
	{

		$this->_merge(range(0, 9));

	}

	/**
	 * merge an array of characters with the current array
	 * @param array $chars
	 */
	protected function _merge(array $chars)
	{

		$diff = array_diff($chars, $this->_chars);

		if (count($diff) == count($chars)) {
			$this->_chars = array_merge($this->_chars, $chars);
		}

	}

}