<?php

/**
 * Class ClassTest
 */
class ClassTest extends PHPUnit\Framework\TestCase
{
	public function testHasMatch()
	{
		$m = new \Diskerror\Pcre2\Matcher('.{4}.*');

		$this->assertTrue($m->hasMatch('asdfs'));
		$this->assertFalse($m->hasMatch('asd'));
	}

	public function testMatch()
	{
		$m = new \Diskerror\Pcre2\Matcher('^.*$');
		$a = [];

		$this->assertEquals(1, $m->match('asdfs', $a));
		$this->assertEquals('asdfs', $a[0][0]);
	}

	public function testReplacer()
	{
		$r = new \Diskerror\Pcre2\Replacer('(.{4}.*)', '\\1');

		$this->assertEquals($r->replace('asdfs'), 'asdfs');

		$r = new \Diskerror\Pcre2\Replacer('(.{4}).*', '\\1', \Diskerror\Pcre2::UTF);

		$this->assertEquals($r->replace('asdfs'), 'asdf');
	}

}
