<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 * @name        Matcher
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

/**
 * Class Matcher
 * @package Diskerror\Pcre2
 */
class Matcher extends Pcre2Abstract
{

	/**
	 * Execute and return boolean of REGEX acting on subject string.
	 *
	 * @param string  $subject
	 * @param integer $offset OPTIONAL
	 *
	 * @return boolean
	 * @throws Exception
	 */
	public function hasMatch(string $subject, int $offset = 0) : bool
	{
		$a = [];
		$hasMatch = preg_match($this->_regex_compiled, $subject, $a, null, $offset);

		if ($hasMatch === false) {
			throw new \Exception('preg_match returned "false" (an error occurred)');
		}
		//	Else $hasMatch is a 0 or 1.

		return (bool)$hasMatch;
	}

	/**
	 * Execute and return array of matches (0 or 1) of REGEX acting on subject string.
	 *
	 * @param string $subject
	 * @param int    $offset OPTIONAL 0
	 *
	 * @return array
	 * @throws Exception
	 */
	public function match(string $subject, int $offset = 0) : array
	{
		$matches = [];
		$matchCount = preg_match($this->_regex_compiled, $subject, $matches, null, $offset);

		if ($matchCount === false) {
			throw new \Exception('preg_match returned "false"');
		}
		//	Else $hasMatch is a 0 or 1.

		return $matches;
	}

	/**
	 * Execute and return array of matches of REGEX acting on subject string.
	 *
	 * @param string $subject
	 * @param int    $offset OPTIONAL 0
	 *
	 * @return array
	 * @throws Exception
	 */
	public function matchAll(string $subject, int $offset = 0) : array
	{
		$matches = [];
		$matchCount = preg_match_all($this->_regex_compiled, $subject, $matches, PREG_PATTERN_ORDER, $offset);

		if ($matchCount === false) {
			throw new \Exception('preg_match_all returned "false"');
		}

		return $matches;
	}

}
