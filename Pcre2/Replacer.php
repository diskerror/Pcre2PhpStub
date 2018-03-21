<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 * @name        Replacer
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

use Diskerror\Pcre2\Pcre2Abstract;
use Diskerror\Pcre2\Exception;

/**
 * Class Replacer
 * @package Diskerror\Pcre2
 */
class Replacer extends Pcre2Abstract
{
	/**
	 * Replacement text for replace method.
	 * @var string
	 */
	private $_replace;

	/**
	 * Constructor.
	 *
	 * @param string  $expression
	 * @param string  $replacement OPTIONAL ''
	 * @param integer $options     OPTIONAL 0
	 */
	public function __construct($expression, $replacement = '', $options = PREG_PATTERN_ORDER)
	{
		parent::__construct($expression, $options = PREG_PATTERN_ORDER);
		$this->setReplacement($replacement);
	}

	/**
	 * @param $replacement
	 */
	public function setReplacement($replacement)
	{
		$this->_replace = $replacement;
	}

	/**
	 * Execute and return count of matches of REGEX acting on subject string.
	 *
	 * @param string $subject
	 * @param int    $offset OPTIONAL 0
	 *
	 * @return string
	 * @throws Exception
	 */
	public function replace($subject, $offset = 0)
	{
		$newString = preg_replace($this->_regex, $this->_replace, $subject, $this->_opts, $offset);

		if ($newString === null) {
			throw new Exception('preg_replace returned "null"');
		}

		return $newString;
	}

}
