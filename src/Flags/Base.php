<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/22/18
 * Time: 4:53 PM
 */

namespace Diskerror\Pcre2\Flags;


abstract class Base extends \Diskerror\Flags
{
	//	Options available to all.
	const ENDANCHORED  = 0x20000000;    //	Pattern can match only at end of subject
	const NO_UTF_CHECK = 0x40000000;    //	Do not check the pattern for UTF validity (only relevant if PCRE2_UTF is set)
	const ANCHORED     = 0x80000000;    //	Force pattern anchoring

}
