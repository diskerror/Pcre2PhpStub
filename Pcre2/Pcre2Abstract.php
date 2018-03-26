<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 * @name           Pcre2Abstract
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

use Diskerror\Pcre2\Flags\Compile;
use Diskerror\Pcre2\Flags\Match;

/**
 * Class Pcre2Abstract
 * @package Diskerror\Pcre2
 */
abstract class Pcre2Abstract
{
	/**
	 * @var Flags\Compile
	 */
	public $compileFlags;

	/**
	 * @var Flags\Match
	 */
	public $matchFlags;

	/**
	 * Regular expression string.
	 * @var string
	 */
	protected $_regex;

	/**
	 * Constructor.
	 *
	 * @param string  $expression   OPTIONAL
	 * @param integer $compileFlags OPTIONAL
	 * @param integer $matchFlags   OPTIONAL
	 */
	public function __construct(string $expression = '', int $compileFlags = null, int $matchFlags = null)
	{
		$this->compileFlags =
			($compileFlags === null) ?
				new Compile(Compile::UTF | Compile::DOTALL | Compile::MULTILINE) :
				new Compile($compileFlags);

		$this->matchFlags =
			($matchFlags === null) ?
				new Match(Match::NOTEMPTY) :
				new Match($matchFlags);

		$this->compile($expression);
	}

	/**
	 * Convert a regular expression into machine code.
	 * Do not use delimimeters at start and end of string.
	 *
	 * Applying options here will cause any existing options to be cleared.
	 *
	 * @param $expression
	 * @param $flags      OPTIONAL
	 * @return Pcre2Abstract
	 */
	public function compile(string $expression, int $flags = null) : Pcre2Abstract
	{
		if ($flags !== null) {
			$this->compileFlags->set($flags);
		}

		if ($expression === '') {
			throw new Exception('expression cannot be empty');
		}

		//	Pcre2 will change the expression into machine code.
		$this->_regex = '/' . strtr($expression, ['/' => '\\/']) . '/';

		if ($this->compileFlags->hasFlag(Compile::CASELESS)) {
			$this->_regex .= 'i';
		}

		if ($this->compileFlags->hasFlag(Compile::MULTILINE)) {
			$this->_regex .= 'm';
		}

		if ($this->compileFlags->hasFlag(Compile::DOTALL)) {
			$this->_regex .= 's';
		}

		if ($this->compileFlags->hasFlag(Compile::EXTENDED)) {
			$this->_regex .= 'x';
		}

		if ($this->compileFlags->hasFlag(Compile::ANCHORED)) {
			$this->_regex .= 'A';
		}

		if ($this->compileFlags->hasFlag(Compile::DOLLAR_ENDONLY)) {
			$this->_regex .= 'D';
		}

		if ($this->compileFlags->hasFlag(Compile::UNGREEDY)) {
			$this->_regex .= 'U';
		}

		if ($this->compileFlags->hasFlag(Compile::UTF)) {
			$this->_regex .= 'u';
		}

		return $this;
	}

}
