<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 * @name        Matcher
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

use Diskerror\Pcre2\Pcre2Abstract;
use Diskerror\Pcre2\Exception;

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
	 * @param integer $offset OPTIONAL 0
	 *
	 * @return boolean
	 * @throws Exception
	 */
	public function hasMatch($subject, $offset = 0)
	{
		$a = [];
		$hasMatch = preg_match($this->_regex, $subject, $a, $this->_opts, $offset);

		if ($hasMatch === false) {
			throw new Exception('preg_match returned "false" (an error occurred)');
		}
		//	Else $hasMatch is a 0 or 1.

		return (bool)$hasMatch;
	}

	/**
	 * Execute and return count of matches of REGEX acting on subject string.
	 *
	 * @param string $subject
	 * @param array  $matches
	 * @param int    $offset OPTIONAL 0
	 *
	 * @return int
	 * @throws Exception
	 */
	public function match($subject, &$matches, $offset = 0)
	{
		$matchCount = preg_match($this->_regex, $subject, $matches, $this->_opts, $offset);

		if ($matchCount === false) {
			throw new Exception('preg_match returned "false"');
		}

		return $matchCount;
	}

	/**
	 * Execute and return count of matches of REGEX acting on subject string.
	 *
	 * @param string $subject
	 * @param array  $matches
	 * @param int    $offset OPTIONAL 0
	 *
	 * @return int
	 * @throws Exception
	 */
	public function matchAll($subject, &$matches, $offset = 0)
	{
		$matchCount = preg_match_all($this->_regex, $subject, $matches, $this->_opts, $offset);

		if ($matchCount === false) {
			throw new Exception('preg_match_all returned "false"');
		}

		return $matchCount;
	}

}
