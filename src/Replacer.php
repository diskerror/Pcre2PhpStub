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
	private $_replace;

	/**
	 * Constructor.
	 *
	 * @param string  $regexIn      OPTIONAL
	 * @param string  $replacement  OPTIONAL
	 * @param integer $compileFlags OPTIONAL
	 * @param integer $replaceFlags OPTIONAL
	 */
	public function __construct(string $regexIn = '', string $replacement = '', int $compileFlags = null, int $replaceFlags = null)
	{
		parent::__construct($regexIn, $compileFlags, $replaceFlags);

		if($replaceFlags === null){
			$this->matchFlags->add(Replace::GLOBAL);
		}

		$this->setReplacement($replacement);
	}

	/**
	 * @param string $replacement
	 * @param integer $replaceFlags OPTIONAL
	 * @return Replacer
	 */
	public function setReplacement(string $replacement, int $replaceFlags = null) : self
	{

		if($replaceFlags !== null){
			$this->matchFlags->set($replaceFlags);
		}

		$this->_replace = $replacement;

		return $this;
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
		$newString = preg_replace($this->_regex_compiled, $this->_replace, $subject, -1, $offset);

		if ($newString === null) {
			throw new Exception('preg_replace returned "null"');
		}

		return $newString;
	}

}
