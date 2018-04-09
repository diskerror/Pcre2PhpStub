<?php

/**
 * Class ClassTest
 */
class ClassTest extends PHPUnit\Framework\TestCase
{
	public function testHasMatch()
	{
		$m = new Diskerror\Pcre2\Matcher('.{4}.*');

		$this->assertTrue($m->hasMatch('asdfs'));
		$this->assertFalse($m->hasMatch('asd'));
	}

	public function testMatch()
	{
		$m = new Diskerror\Pcre2\Matcher('^.*$');

		$result = $m->match('asdfs');
		$this->assertEquals('asdfs', $result[0]);
	}

	public function testReplacer()
	{
		$r = new Diskerror\Pcre2\Replacer('(.{4}.*)', '\\1');

		$this->assertEquals($r->replace('asdfs'), 'asdfs');

		$r = new Diskerror\Pcre2\Replacer('(.{4}).*', '\\1');

		$this->assertEquals($r->replace('asdfs'), 'asdf');
	}

	public function testSample()
	{
		$subject = 'abacadabra';
		$result = preg_replace('/a/u', ' ', $subject);
		$this->assertEquals($result, ' b c d br ');

		$result = (bool)preg_match('/a/u', $subject);
		$this->assertTrue($result);

		$matches = [];
		$result = preg_match('/a/u', $subject, $matches);  //  1
		$this->assertEquals($matches, ['a']);


		$subject = 'abacadabra';
		$replacer = new Diskerror\Pcre2\Replacer('a', ' ');
		$result = $replacer->replace($subject);
		$this->assertEquals($result, ' b c d br ');

		$matcher = new Diskerror\Pcre2\Matcher('a');
		$result = $matcher->hasMatch($subject);
		$this->assertTrue($result);

		$matches = $matcher->match($subject);  //  "$matcher" from above
		$this->assertEquals($matches, ['a']);
	}

}
