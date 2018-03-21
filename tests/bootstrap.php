<?php

/**
 * Write to CLI standard output.
 * Usage: cout('my output' . PHP_EOL);
 */
function cout($s)
{
	fwrite(STDOUT, $s);
}

/**
 * Write to CLI error output.
 * Usage: cerr('something weird happened' . PHP_EOL);
 */
function cerr($s)
{
	fwrite(STDERR, $s);
}

/**
 * Convert all errors into ErrorExceptions
 */
set_error_handler(
	function($severity, $errstr, $errfile, $errline) {
		throw new ErrorException($errstr, 1, $severity, $errfile, $errline);
	},
	E_USER_ERROR
);

/**
 * Set handler for uncaught exceptions.
 */
set_exception_handler(
	function(Exception $e) {
		cerr($e->getMessage() . PHP_EOL);
		cerr($e . PHP_EOL);
		exit($e->getCode());
	}
);

require_once __DIR__ . '/../vendor/autoload.php';
