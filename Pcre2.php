<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * This extension precompiles the REGEX string.
 *
 * @name           Pcre2
 * @copyright      Copyright (c) 2018 Reid Woodbury Jr.
 * @license        http://www.apache.org/licenses/LICENSE-2.0.html	Apache License, Version 2.0
 */

namespace Diskerror;

/**
 * Class Pcre2
 * @package Diskerror\Pcre2
 */
class Pcre2
{
	//	Options available to all.
	const ENDANCHORED  = 0x20000000;	//	Pattern can match only at end of subject
	const NO_UTF_CHECK = 0x40000000;    //	Do not check the pattern for UTF validity (only relevant if PCRE2_UTF is set)
	const ANCHORED     = 0x80000000;    //	Force pattern anchoring

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

	//	Options available to match and replace methods.
//	const NOTBOL           = 0x00000001;	//	Subject string is not the beginning of a line
//	const NOTEOL           = 0x00000002;	//	Subject string is not the end of a line
//	const NOTEMPTY         = 0x00000004;	//	An empty string is not a valid match
//	const NOTEMPTY_ATSTART = 0x00000008;	//	An empty string at the start of the subject is not a valid match

	//	Options available to replace method.
//	const SUBSTITUTE_GLOBAL          = 0x00000100;  //	Replace all occurrences in the subject
//	const SUBSTITUTE_EXTENDED        = 0x00000200;  //	Do extended replacement processing
//	const SUBSTITUTE_UNSET_EMPTY     = 0x00000400;  //	Simple unset insert = empty string
//	const SUBSTITUTE_UNKNOWN_UNSET   = 0x00000800;  //	Treat unknown group as unset
//	const SUBSTITUTE_OVERFLOW_LENGTH = 0x00001000;  //	If overflow, compute needed length   ???

}
