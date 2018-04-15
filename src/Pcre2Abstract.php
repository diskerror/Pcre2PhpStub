<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 *
 * Neither PHP-CPP nor Zephir can handle nested classes (a class with a property that is also a class)
 * so the compile and match flags are exposed as integers.
 *
 * @name           Pcre2Abstract
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

use Diskerror\Pcre2\Flags\Compile;
use Diskerror\Pcre2\Flags\Match;
use Exception;

/**
 * Class Pcre2Abstract
 * @package Diskerror\Pcre2
 */
abstract class Pcre2Abstract
{
	/**
	 * @var integer
	 */
	protected $compileFlags = 0;

	/**
	 * @var integer
	 */
	protected $matchFlags = 0;

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

		$this->compileFlags |=
			($compileFlags === null) ?
				Compile::UTF :
				$compileFlags;

		$this->matchFlags |=
			($matchFlags === null) ?
				Match::NOTEMPTY :
				$matchFlags;

		if ($regexIn !== '') {
			$this->compile($regexIn);
		}
	}

	/**
	 * @param $name
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function __get($name)
	{
		switch ($name) {
			case 'compileFlags':
			case 'matchFlags':
				return $$name;
			break;

			default:
				throw new \Exception('no such property name');
		}
	}

	/**
	 * @param $name
	 * @param $value
	 *
	 * @throws \Exception
	 */
	public function __set($name, $value)
	{
		switch ($name) {
			case 'compileFlags':
			case 'matchFlags':
				$this->$name = (int) $$name;
			break;

			default:
				throw new \Exception('no such property name');
		}
	}

	/**
	 * Convert a regular expression into machine code.
	 * Do not use delimimeters at start and end of string.
	 *
	 * Applying options here will cause any existing options to be cleared.
	 *
	 * @param null|string $regex
	 * @param int|null    $compileFlags
	 * @param int|null    $matchFlags
	 *
	 * @return \Diskerror\Pcre2\Pcre2Abstract
	 * @throws \Exception
	 */
	public function compile(string $regex = null, int $compileFlags = null, int $matchFlags = null) : self
	{
		if ($regex !== null) {
			$this->_regex_string = $regex;
		}

		if ($compileFlags !== null) {
			$this->compileFlags = $compileFlags;
		}

		if ($matchFlags !== null) {
			$this->matchFlags = $matchFlags;
		}

		if ($this->_regex_string === '') {
			throw new \Exception('regex string cannot be empty');
		}

		$this->_regex_compiled = '/' . strtr($this->_regex_string, ['/' => '\\/']) . '/';

		if ($this->compileFlags & Compile::CASELESS) {
			$this->_regex_compiled .= 'i';
		}

		if ($this->compileFlags & Compile::MULTILINE) {
			$this->_regex_compiled .= 'm';
		}

		if ($this->compileFlags & Compile::DOTALL) {
			$this->_regex_compiled .= 's';
		}

		if ($this->compileFlags & Compile::EXTENDED) {
			$this->_regex_compiled .= 'x';
		}

		if ($this->compileFlags & Compile::ANCHORED) {
			$this->_regex_compiled .= 'A';
		}

		if ($this->compileFlags & Compile::DOLLAR_ENDONLY) {
			$this->_regex_compiled .= 'D';
		}

		if ($this->compileFlags & Compile::UNGREEDY) {
			$this->_regex_compiled .= 'U';
		}

		if ($this->compileFlags & Compile::UTF) {
			$this->_regex_compiled .= 'u';
		}

		return $this;
	}

	/**
	 * Set a new regular expression.
	 *
	 * @param string $regex
	 * @param int    $compileFlags OPTIONAL
	 *
	 * @return \Diskerror\Pcre2\Pcre2Abstract
	 * @throws \Diskerror\Pcre2\Exception
	 */
	public function setRegex(string $regex, int $compileFlags = null, int $matchFlags = null) : self
	{
		if ($regex === '') {
			throw new \Exception('regex string cannot be empty');
		}

		$this->_regex_string = $regex;

		if ($compileFlags !== null) {
			$this->compileFlags = $compileFlags;
		}

		if ($matchFlags !== null) {
			$this->matchFlags = $matchFlags;
		}

		return $this;
	}

	/**
	 * @return string
	 */
	public function getRegex() : string
	{
		return $this->_regex_string;
	}
}
