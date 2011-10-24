<?php

class Able_Filter_Hash implements Zend_Filter_Interface
{

	const ALGORITHM_SHA256 = 'sha256';
	const ALGORITHM_MD5 = 'md5';

	/** @var string */
	protected $_algorithm;

	/**
	 *
	 * initialize the hash filter with a hashin algorithm
	 * @param string $algorithm
	 */
	public function __construct($algorithm = null)
	{

		if (!$algorithm) {
			$algorithm = self::ALGORITHM_SHA256;
		}

		$this->_algorithm = $algorithm;

	}

	/**
	 * (non-PHPdoc)
	 * @see Zend_Filter_Interface::filter()
	 */
	public function filter($value)
	{

		return hash($this->_algorithm, $value);

	}

}
