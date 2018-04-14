<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
 * @name        Replacer
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror\Pcre2;

use Diskerror\Pcre2\Flags\Replace;

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
	private $_replacement;

	/**
	 * Constructor.
	 *
	 * @param string  $regexIn      OPTIONAL
	 * @param string  $replacement  OPTIONAL
	 * @param integer $compileFlags OPTIONAL
	 * @param integer $matchFlags   OPTIONAL
	 */
	public function __construct(string $regexIn = '', string $replacement = '', int $compileFlags = null, int $matchFlags = null)
	{
		$this->setReplacement($replacement);

		if ($this->matchFlags === null) {
			$this->matchFlags =
				($matchFlags === null) ?
					new Replace() :
					new Replace($matchFlags);
		}

		parent::__construct($regexIn, $compileFlags);
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
		$newString = preg_replace($this->_regex_compiled, $this->_replacement, $subject, -1, $offset);

		if ($newString === null) {
			throw new Exception('preg_replace returned "null"');
		}

		return $newString;
	}

	/**
	 * @return string
	 */
	public function getReplacement() : string
	{
		return $this->_replacement;
	}

	/**
	 * @param string  $replacement
	 * @param integer $replaceFlags OPTIONAL
	 *
	 * @return Replacer
	 */
	public function setReplacement(string $replacement, int $replaceFlags = null) : self
	{
		if ($replaceFlags !== null) {
			$this->matchFlags->set($replaceFlags);
		}

		$this->_replacement = $replacement;

		return $this;
	}
}
