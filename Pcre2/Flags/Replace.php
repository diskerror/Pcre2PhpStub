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
	//	Options available to replace method.
	const GLOBAL          = 0x00000100;  //	Replace all occurrences in the subject
	const EXTENDED        = 0x00000200;  //	Do extended replacement processing
	const UNSET_EMPTY     = 0x00000400;  //	Simple unset insert = empty string
	const UNKNOWN_UNSET   = 0x00000800;  //	Treat unknown group as unset
//	const OVERFLOW_LENGTH = 0x00001000;  //	If overflow, compute needed length   ???

}
