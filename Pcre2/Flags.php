<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/22/18
 * Time: 4:53 PM
 */

namespace Diskerror\Pcre2;


class Flags
{
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
		return (bool)$this->_flags & $whichFlag;
	}
}
