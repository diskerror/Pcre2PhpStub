<?php

namespace Diskerror;


/**
 * Class Flags
 * @package Diskerror
 */
class Flags
{
	/**
	 * The number of bits available is platform dependent
	 * but should be 64 bits for all instances of PHP 7.
	 * @var int
	 */
	private $_flags;

	/**
	 * @var bool
	 */
	private $_hasChanged;

	/**
	 * Flags constructor.
	 *
	 * @param int $flags
	 */
	public function __construct(int $flags = 0)
	{
		$this->_flags = $flags;
		$this->_hasChanged = true;
	}

	/**
	 * Adds a positive bit to the bit string.
	 *
	 * @param int $whichFlag
	 *
	 * @return \Diskerror\Flags
	 */
	public function add(int $whichFlag) : self
	{
		$this->_setChanged($this->_flags | $whichFlag);
		return $this;
	}

	/**
	 * Saves the input if it's different from the current value and sets the changed flag.
	 *
	 * @param int $flags
	 */
	private function _setChanged(int $flags)
	{
		if ($flags !== $this->_flags) {
			$this->_flags = $flags;
			$this->_hasChanged = true;
		}
	}

	/**
	 * This set the bit that's set to 1 in the input parameter to zero in the stored value.
	 *
	 * @param int $whichFlag
	 *
	 * @return \Diskerror\Flags
	 */
	public function remove(int $whichFlag) : self
	{
		$this->_setChanged($this->_flags & ~$whichFlag);
		return $this;
	}

	/**
	 * Set all flags to zero or false;
	 *
	 * @return \Diskerror\Flags
	 */
	public function clear() : self
	{
		$this->_setChanged(0);
		return $this;
	}

	/**
	 * Replace all flags with the input parameter.
	 *
	 * @param int $flags
	 *
	 * @return \Diskerror\Flags
	 */
	public function set(int $flags) : self
	{
		$this->_setChanged($flags);
		return $this;
	}

	/**
	 * Returns true if any flags or a flag exposed by the mask it true.
	 *
	 * @param int $whichFlag
	 *
	 * @return bool
	 */
	public function hasFlag(int $whichFlag = 0xFFFFFFFF) : bool
	{
		return (bool)$this->get($whichFlag);
	}

	/**
	 * Returns an integer of all flags masked by the input parameter, optional.
	 *
	 * @param int $whichFlag
	 *
	 * @return int
	 */
	public function get(int $whichFlag = 0xFFFFFFFF) : int
	{
		return $this->_flags & $whichFlag;
	}

	/**
	 * Returns a boolean indicating whether our flags have changed
	 * since they were last cleared.
	 *
	 * @return bool
	 */
	public function getChanged() : bool
	{
		return $this->_hasChanged;
	}

	/**
	 * Marks flags as unchanged so that we can detect new changes.
	 *
	 * @return \Diskerror\Flags
	 */
	public function clearChanged() : self
	{
		$this->_hasChanged = false;
		return $this;
	}
}
