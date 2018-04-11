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
	//	The flag variables are to be made public later.
	/**
	 * @var Flags\Compile
	 */
	public $compileFlags = null;

	/**
	 * @var Flags\Match
	 */
	public $matchFlags = null;

	/**
	 * Regular expression string.
	 * @var string
	 */
	protected $_regex_string;

	/**
	 * Regular expression compiled.
	 * @var string
	 */
	protected $_regex_compiled;

	/**
	 * Constructor.
	 *
	 * Passing "null" for the flags will set default values.
	 *
	 * @param string  $regexIn      OPTIONAL
	 * @param integer $compileFlags OPTIONAL
	 * @param integer $matchFlags   OPTIONAL
	 */
	public function __construct(string $regexIn = '', int $compileFlags = null, int $matchFlags = null)
	{
		$this->_regex_string = '';
		$this->_regex_compiled = '';

		if ($this->compileFlags === null) {
			$this->compileFlags =
				($compileFlags === null) ?
					new Compile(Compile::UTF) :
					new Compile($compileFlags);
		}

		if ($this->matchFlags === null) {
			$this->matchFlags =
				($matchFlags === null) ?
					new Match(Match::NOTEMPTY) :
					new Match($matchFlags);
		}

		if ($regexIn !== '') {
			$this->compile($regexIn);
		}
	}

	/**
	 * Convert a regular expression into machine code.
	 * Do not use delimimeters at start and end of string.
	 *
	 * Applying options here will cause any existing options to be cleared.
	 *
	 * @param $regex      OPTIONAL
	 * @param $flags      OPTIONAL
	 *
	 * @return self
	 */
	public function compile(string $regex = '', int $flags = null) : self
	{
		if ($regex !== '' && $regex !== $this->_regex_string) {
			$this->_regex_string = $regex;
		}

		if ($flags !== null) {
			$this->compileFlags->set($flags);
		}

		if ($this->_regex_string === '') {
			throw new Exception('regex string cannot be empty');
		}

		$this->_regex_compiled = '/' . strtr($this->_regex_string, ['/' => '\\/']) . '/';

		if ($this->compileFlags->hasFlag(Compile::CASELESS)) {
			$this->_regex_compiled .= 'i';
		}

		if ($this->compileFlags->hasFlag(Compile::MULTILINE)) {
			$this->_regex_compiled .= 'm';
		}

		if ($this->compileFlags->hasFlag(Compile::DOTALL)) {
			$this->_regex_compiled .= 's';
		}

		if ($this->compileFlags->hasFlag(Compile::EXTENDED)) {
			$this->_regex_compiled .= 'x';
		}

		if ($this->compileFlags->hasFlag(Compile::ANCHORED)) {
			$this->_regex_compiled .= 'A';
		}

		if ($this->compileFlags->hasFlag(Compile::DOLLAR_ENDONLY)) {
			$this->_regex_compiled .= 'D';
		}

		if ($this->compileFlags->hasFlag(Compile::UNGREEDY)) {
			$this->_regex_compiled .= 'U';
		}

		if ($this->compileFlags->hasFlag(Compile::UTF)) {
			$this->_regex_compiled .= 'u';
		}

		return $this;
	}

	/**
	 * Set a new regular expression to test with.
	 *
	 * @param string $regex
	 * @param int    $flags OPTIONAL
	 *
	 * @return \Diskerror\Pcre2\Pcre2Abstract
	 * @throws \Diskerror\Pcre2\Exception
	 */
	public function setExpression(string $regex, int $flags = null) : self
	{
		if ($regex === '') {
			throw new Exception('regex string cannot be empty');
		}

		if ($flags !== null) {
			$this->compileFlags->set($flags);
		}

		if ($regex !== $this->_regex_string) {
			$this->_regex_string = $regex;
		}
	}

	/**
	 * @return string
	 */
	public function getExpression() : string
	{
		return $this->_regex_string;
	}
}
