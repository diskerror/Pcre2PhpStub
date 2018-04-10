<?php
/**
 * Created by PhpStorm.
 * User: reid
 * Date: 3/23/18
 * Time: 3:40 PM
 */

namespace Diskerror\Pcre2\Flags;


class Compile extends Base
{
	//	Options available to compile.
	const ALLOW_EMPTY_CLASS   = 0x00000001;    //	Allow empty classes
	const ALT_BSUX            = 0x00000002;    //	Alternative handling of \u, \U, and \x
	const AUTO_CALLOUT        = 0x00000004;    //	Compile automatic callouts
	const CASELESS            = 0x00000008;    //	Do caseless matching
	const DOLLAR_ENDONLY      = 0x00000010;    //	$ not to match newline at end
	const DOTALL              = 0x00000020;    //	. matches anything including NL
	const DUPNAMES            = 0x00000040;    //	Allow duplicate names for subpatterns
	const EXTENDED            = 0x00000080;    //	Ignore white space and # comments
	const FIRSTLINE           = 0x00000100;    //	Force matching to be before newline
	const MATCH_UNSET_BACKREF = 0x00000200;    //	Match unset back references
	const MULTILINE           = 0x00000400;    //	^ and $ match newlines within data
	const NEVER_UCP           = 0x00000800;    //	Lock out PCRE2_UCP, e.g. via (*UCP)
	const NEVER_UTF           = 0x00001000;    //	Lock out PCRE2_UTF, e.g. via (*UTF)
	const NO_AUTO_CAPTURE     = 0x00002000;    //	Disable numbered capturing parentheses (named ones available)
	const NO_AUTO_POSSESS     = 0x00004000;    //	Disable auto-possessification
	const NO_DOTSTAR_ANCHOR   = 0x00008000;    //	Disable automatic anchoring for .*
	const NO_START_OPTIMIZE   = 0x00010000;    //	Disable match-time start optimizations
	const UCP                 = 0x00020000;    //	Use Unicode properties for \d, \w, etc.
	const UNGREEDY            = 0x00040000;    //	Invert greediness of quantifiers
	const UTF                 = 0x00080000;    //	Treat pattern and subjects as UTF strings
	const NEVER_BACKSLASH_C   = 0x00100000;    //	Lock out the use of \C in patterns
	const ALT_CIRCUMFLEX      = 0x00200000;    //	Alternative handling of ^ in multiline mode
	const ALT_VERBNAMES       = 0x00400000;    //	Process backslashes in verb names
	const USE_OFFSET_LIMIT    = 0x00800000;    //	Enable offset limit for unanchored matching
	const EXTENDED_MORE       = 0x01000000;
	const LITERAL             = 0x02000000;    //	Pattern characters are all literal

}
