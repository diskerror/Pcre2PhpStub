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

/**
 * Class Pcre2Abstract
 * @package Diskerror\Pcre2
 */
abstract class Pcre2Abstract
{
	/**
	 * @var Flags
	 */
	public $flags;

	/**
	 * Regular expression string.
	 * @var string
	 */
	protected $_regex;

	/**
	 * Constructor.
	 *
	 * @param string  $expression OPTIONAL
	 * @param integer $flags      OPTIONAL
	 */
	public function __construct(string $expression = '', int $flags = null)
	{
		$this->flags = ($flags === null || $flags === 0) ? new Flags() : new Flags($flags);

		$this->compile($expression);
	}

	/**
	 * Convert a regular expression into machine code.
	 * Do not use delimimeters at start and end of string.
	 *
	 * Applying options here will cause any existing options to be cleared, if set.
	 *
	 * @param $expression
	 * @param $flags
	 */
	public function compile(string $expression, int $flags = null) : void
	{
		if ($flags !== null) {
			$this->flags->set($flags);
		}

		if ($expression === ''){
			$this->_regex = '//';
			return;
		}

		//	Pcre2 will change the expression into machine code.
		$this->_regex = '/' . strtr($expression, ['/' => '\\/']) . '/';

		if ($this->flags->hasFlag(Pcre2::CASELESS)) {
			$this->_regex .= 'i';
		}

		if ($this->flags->hasFlag(Pcre2::MULTILINE)) {
			$this->_regex .= 'm';
		}

		if ($this->flags->hasFlag(Pcre2::DOTALL)) {
			$this->_regex .= 's';
		}

		if ($this->flags->hasFlag(Pcre2::EXTENDED)) {
			$this->_regex .= 'x';
		}

		if ($this->flags->hasFlag(Pcre2::ANCHORED)) {
			$this->_regex .= 'A';
		}

		if ($this->flags->hasFlag(Pcre2::DOLLAR_ENDONLY)) {
			$this->_regex .= 'D';
		}

		if ($this->flags->hasFlag(Pcre2::UNGREEDY)) {
			$this->_regex .= 'U';
		}

		if ($this->flags->hasFlag(Pcre2::UTF)) {
			$this->_regex .= 'u';
		}
	}

}
