<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/22/18
 * Time: 4:53 PM
 */

namespace Diskerror\Pcre2\Flags;


class FlagsBase
{
	//	Options available to all.
	const ENDANCHORED  = 0x20000000;    //	Pattern can match only at end of subject
	const NO_UTF_CHECK = 0x40000000;    //	Do not check the pattern for UTF validity (only relevant if PCRE2_UTF is set)
	const ANCHORED     = 0x80000000;    //	Force pattern anchoring

	protected $_flags;

	public function __construct(int $flags = 0)
	{
		$this->_flags = $flags;
	}

	public function get(int $whichFlag = 0xFFFFFFFF) : int
	{
		return $this->_flags & $whichFlag;
	}

	public function add(int $whichFlag)
	{
		$this->_flags |= $whichFlag;
	}

	public function remove(int $whichFlag)
	{
		$this->_flags &= ~$whichFlag;
	}

	public function clear()
	{
		$this->_flags = 0;
	}

	public function set(int $flags)
	{
		$this->_flags = $flags;
	}

	public function hasFlag(int $whichFlag = 0xFFFFFFFF) : bool
	{
		return (bool)$this->get($whichFlag);
	}
}
