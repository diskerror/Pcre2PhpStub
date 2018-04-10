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

	public $_flags;

	public $_hasChanged;

	public function __construct(int $flags = 0)
	{
		$this->_flags = $flags;
		$this->_hasChanged = true;
	}

	public function add(int $whichFlag) : self
	{
		$this->_setChanged($this->_flags | $whichFlag);
		return $this;
	}

	protected function _setChanged(int $flags)
	{
		if ($flags !== $this->_flags) {
			$this->_flags = $flags;
			$this->_hasChanged = true;
		}
	}

	public function remove(int $whichFlag)
	{
		$this->_setChanged($this->_flags & ~$whichFlag);
		return $this;
	}

	public function clear()
	{
		$this->_setChanged(0);
		return $this;
	}

	public function set(int $flags)
	{
		$this->_setChanged($flags);
		return $this;
	}

	public function hasFlag(int $whichFlag = 0xFFFFFFFF) : bool
	{
		return (bool)$this->get($whichFlag);
	}

	public function get(int $whichFlag = 0xFFFFFFFF) : int
	{
		return $this->_flags & $whichFlag;
	}

	public function clearChanged()
	{
		$this->_hasChanged = false;
		return $this;
	}
}
