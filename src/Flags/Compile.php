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
	const ALLOW_EMPTY_CLASS   = 0x0000000000000001;    //	Allow empty classes
	const ALT_BSUX            = 0x0000000000000002;    //	Alternative handling of \u, \U, and \x
	const AUTO_CALLOUT        = 0x0000000000000004;    //	Compile automatic callouts
	const CASELESS            = 0x0000000000000008;    //	Do caseless matching
	const DOLLAR_ENDONLY      = 0x0000000000000010;    //	$ not to match newline at end
	const DOTALL              = 0x0000000000000020;    //	. matches anything including NL
	const DUPNAMES            = 0x0000000000000040;    //	Allow duplicate names for subpatterns
	const EXTENDED            = 0x0000000000000080;    //	Ignore white space and # comments
	const FIRSTLINE           = 0x0000000000000100;    //	Force matching to be before newline
	const MATCH_UNSET_BACKREF = 0x0000000000000200;    //	Match unset back references
	const MULTILINE           = 0x0000000000000400;    //	^ and $ match newlines within data
	const NEVER_UCP           = 0x0000000000000800;    //	Lock out PCRE2_UCP, e.g. via (*UCP)
	const NEVER_UTF           = 0x0000000000001000;    //	Lock out PCRE2_UTF, e.g. via (*UTF)
	const NO_AUTO_CAPTURE     = 0x0000000000002000;    //	Disable numbered capturing parentheses (named ones available)
	const NO_AUTO_POSSESS     = 0x0000000000004000;    //	Disable auto-possessification
	const NO_DOTSTAR_ANCHOR   = 0x0000000000008000;    //	Disable automatic anchoring for .*
	const NO_START_OPTIMIZE   = 0x0000000000010000;    //	Disable match-time start optimizations
	const UCP                 = 0x0000000000020000;    //	Use Unicode properties for \d, \w, etc.
	const UNGREEDY            = 0x0000000000040000;    //	Invert greediness of quantifiers
	const UTF                 = 0x0000000000080000;    //	Treat pattern and subjects as UTF strings
	const NEVER_BACKSLASH_C   = 0x0000000000100000;    //	Lock out the use of \C in patterns
	const ALT_CIRCUMFLEX      = 0x0000000000200000;    //	Alternative handling of ^ in multiline mode
	const ALT_VERBNAMES       = 0x0000000000400000;    //	Process backslashes in verb names
	const USE_OFFSET_LIMIT    = 0x0000000000800000;    //	Enable offset limit for unanchored matching
	const EXTENDED_MORE       = 0x0000000001000000;
	const LITERAL             = 0x0000000002000000;    //	Pattern characters are all literal
	const DO_JIT              = 0x0000000100000000;    //	Do more optimizing with JIT compiler.

}
