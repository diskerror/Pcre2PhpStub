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
	 * @param string  $expression  OPTIONAL
	 * @param string  $replacement OPTIONAL
	 * @param integer $flags       OPTIONAL
	 */
	public function __construct(string $expression = '', string $replacement = '', int $flags = null)
	{
		parent::__construct($expression, $flags);
		$this->setReplacement($replacement);
	}

	/**
	 * @param string $replacement
	 */
	public function setReplacement(string $replacement) : void
	{
		$this->_replace = $replacement;
	}

	/**
	 * Execute and return new string.
	 *
	 * @param string $subject
	 * @param int    $offset OPTIONAL
	 *
	 * @return string
	 * @throws Exception
	 */
	public function replace(string $subject, int $offset = 0) : string
	{
		$newString = preg_replace($this->_regex, $this->_replace, $subject, $this->flags->get(), $offset);

		if ($newString === null) {
			throw new Exception('preg_replace returned "null"');
		}

		return $newString;
	}

}
