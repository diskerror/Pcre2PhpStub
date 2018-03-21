<?php
/**
 * Functional stub for Pcre2PhpEx compiled extension.
 * The extension preprocesses the REGEX string.
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
	const ANCHORED            = 0x00000001;    //	Force pattern anchoring
	const ALLOW_EMPTY_CLASS   = 0x00000002;    //	Allow empty classes
	const ALT_BSUX            = 0x00000004;    //	Alternative handling of \u, \U, and \x
	const ALT_CIRCUMFLEX      = 0x00000008;    //	Alternative handling of ^ in multiline mode
	const ALT_VERBNAMES       = 0x00000010;    //	Process backslashes in verb names
	const AUTO_CALLOUT        = 0x00000020;    //	Compile automatic callouts
	const CASELESS            = 0x00000040;    //	Do caseless matching
	const DOLLAR_ENDONLY      = 0x00000080;    //	$ not to match newline at end
	const DOTALL              = 0x00000100;    //	. matches anything including NL
	const DUPNAMES            = 0x00000200;    //	Allow duplicate names for subpatterns
	const ENDANCHORED         = 0x00000400;    //	Pattern can match only at end of subject
	const EXTENDED            = 0x00000800;    //	Ignore white space and # comments
	const FIRSTLINE           = 0x00001000;    //	Force matching to be before newline
	const LITERAL             = 0x00002000;    //	Pattern characters are all literal
	const MATCH_UNSET_BACKREF = 0x00004000;    //	Match unset back references
	const MULTILINE           = 0x00008000;    //	^ and $ match newlines within data
	const NEVER_BACKSLASH_C   = 0x00010000;    //	Lock out the use of \C in patterns
	const NEVER_UCP           = 0x00020000;    //	Lock out PCRE2_UCP, e.g. via (*UCP)
	const NEVER_UTF           = 0x00040000;    //	Lock out PCRE2_UTF, e.g. via (*UTF)
	const NO_AUTO_CAPTURE     = 0x00080000;    //	Disable numbered capturing parentheses (named ones available)
	const NO_AUTO_POSSESS     = 0x00100000;    //	Disable auto-possessification
	const NO_DOTSTAR_ANCHOR   = 0x00200000;    //	Disable automatic anchoring for .*
	const NO_START_OPTIMIZE   = 0x00400000;    //	Disable match-time start optimizations
	const NO_UTF_CHECK        = 0x00800000;    //	Do not check the pattern for UTF validity (only relevant if PCRE2_UTF is set)
	const UCP                 = 0x01000000;    //	Use Unicode properties for \d, \w, etc.
	const UNGREEDY            = 0x02000000;    //	Invert greediness of quantifiers
	const USE_OFFSET_LIMIT    = 0x04000000;    //	Enable offset limit for unanchored matching
	const UTF                 = 0x08000000;    //	Treat pattern and subjects as UTF strings

	const SUBSTITUTE_EXTENDED = 0x10000000;    //	Do extended replacement processing
	const SUBSTITUTE_GLOBAL   = 0x20000000;    //	Replace all occurrences in the subject

}
