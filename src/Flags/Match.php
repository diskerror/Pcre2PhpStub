<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/23/18
 * Time: 3:42 PM
 */

namespace Diskerror\Pcre2\Flags;


class Match extends Base
{
	//	Options available to match and replace methods.
	const NOTBOL           = 0x0000000000000001;    //	Subject string is not the beginning of a line
	const NOTEOL           = 0x0000000000000002;    //	Subject string is not the end of a line
	const NOTEMPTY         = 0x0000000000000004;    //	An empty string is not a valid match
	const NOTEMPTY_ATSTART = 0x0000000000000008;    //	An empty string at the start of the subject is not a valid match

}
