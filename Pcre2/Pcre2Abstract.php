<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 * @name           Pcre2Abstract
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

use Diskerror\Pcre2;
use const PHP_EOL;

/**
 * Class Pcre2Abstract
 * @package Diskerror\Pcre2
 */
abstract class Pcre2Abstract
{
	/**
	 * @var integer
	 */
	protected $_opts;

	/**
	 * Regular expression string.
	 * @var string
	 */
	protected $_regex;

	/**
	 * Constructor.
	 *
	 * @param string  $expression
	 * @param integer $options OPTIONAL 0
	 */
	public function __construct($expression, $options = 0)
	{
		$this->compile($expression, $options);
	}

	/**
	 * Convert a regular expression into machine code.
	 * Do not use delimimeters at start and end of string.
	 *
	 * @param $expression
	 * @param $options
	 */
	public function compile($expression, $options)
	{
		$this->_opts = $options;

		//	Pcre2 will change the expression into machine code.
		$this->_regex = '/' . strtr($expression, ['/' => '\\/']) . '/';

		if ($this->_opts & Pcre2::CASELESS) {
			$this->_regex .= 'i';
		}

		if ($this->_opts & Pcre2::MULTILINE) {
			$this->_regex .= 'm';
		}

		if ($this->_opts & Pcre2::DOTALL) {
			$this->_regex .= 's';
		}

		if ($this->_opts & Pcre2::EXTENDED) {
			$this->_regex .= 'x';
		}

		if ($this->_opts & Pcre2::ANCHORED) {
			$this->_regex .= 'A';
		}

		if ($this->_opts & Pcre2::DOLLAR_ENDONLY) {
			$this->_regex .= 'D';
		}

		if ($this->_opts & Pcre2::UNGREEDY) {
			$this->_regex .= 'U';
		}

		if ($this->_opts & Pcre2::UTF) {
			$this->_regex .= 'u';
		}
	}

}
