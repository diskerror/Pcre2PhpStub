<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/23/18
 * Time: 3:43 PM
 */

namespace Diskerror\Pcre2\Flags;


class Replace extends Match
{
	//	Additional options available to replace method.
	const GLOBAL          = 0x0000000000000100;  //	Replace all occurrences in the subject
	const EXTENDED        = 0x0000000000000200;  //	Do extended replacement processing
	const UNSET_EMPTY     = 0x0000000000000400;  //	Simple unset insert = empty string
	const UNKNOWN_UNSET   = 0x0000000000000800;  //	Treat unknown group as unset
//	const OVERFLOW_LENGTH = 0x0000000000001000;  //	If overflow, compute needed length   ???

}
