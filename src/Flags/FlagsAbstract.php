<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/22/18
 * Time: 4:53 PM
 */

namespace Diskerror\Pcre2\Flags;

/**
 * This class was designed to help manage the getting and setting of
 * bit-wise flags.
 * @package Diskerror
 */
abstract class FlagsAbstract
{
	//	Options available to all.
	const ENDANCHORED  = 0x0000000020000000;    //	Pattern can match only at end of subject
	const NO_UTF_CHECK = 0x0000000040000000;    //	Do not check the pattern for UTF validity (only relevant if PCRE2_UTF is set)
	const ANCHORED     = 0x0000000080000000;    //	Force pattern anchoring


	/**
	 * The number of bits available is platform dependent
	 * but should be 63 bits for all instances of PHP 7.
	 * @var int
	 */
	protected $_flags;

	/**
	 * @var bool
	 */
	private $_hasChanged;

	/**
	 * Flags constructor.
	 *
	 * @param int $flags
	 */
	protected function __construct(int $flags = 0)
	{
		$this->_flags = $flags;
		$this->_hasChanged = true;
	}

	/**
	 * Adds a positive bit to the bit string.
	 *
	 * @param int $whichFlag
	 *
	 * @return Diskerror\Flags\FlagsAbstract
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
	 * This sets the bit that's set to 1 in the input parameter to zero in the stored value.
	 *
	 * @param int $whichFlag
	 *
	 * @return Diskerror\Flags\FlagsAbstract
	 */
	public function remove(int $whichFlag) : self
	{
		$this->_setChanged($this->_flags & ~$whichFlag);
		return $this;
	}

	/**
	 * Set all flags to zero or false;
	 *
	 * @return Diskerror\Flags\FlagsAbstract
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
	 * @return Diskerror\Flags\FlagsAbstract
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
	public function hasFlag(int $whichFlag = 0x7FFFFFFFFFFFFFFF) : bool
	{
		return (bool)($this->_flags & $whichFlag);
	}

	/**
	 * Returns an integer of all flags masked by the input parameter, optional.
	 *
	 * @param int $whichFlag
	 *
	 * @return int
	 */
	public function get(int $whichFlag = 0x7FFFFFFFFFFFFFFF) : int
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
	 * @return Diskerror\Flags\FlagsAbstract
	 */
	public function clearChanged() : self
	{
		$this->_hasChanged = false;
		return $this;
	}
}
