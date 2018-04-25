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
		$r = new Diskerror\Pcre2\Replacer('(.{4}.*)', '$1');

		$this->assertEquals('asdfs', $r->replace('asdfs'));

		$r = new Diskerror\Pcre2\Replacer('(.{4}).*', '$1');

		$this->assertEquals('asdf', $r->replace('asdfs'));
	}

	public function testSample()
	{
		$subject = 'abacadabra';
		$result = preg_replace('/a/u', ' ', $subject);
		$this->assertEquals(' b c d br ', $result);

		$result = (bool)preg_match('/a/u', $subject);
		$this->assertTrue($result);

		$matches = [];
		$result = preg_match('/a/u', $subject, $matches);  //  1
		$this->assertEquals(['a'], $matches);


		$subject = 'abacadabra';
		$replacer = new Diskerror\Pcre2\Replacer('a', ' ');
		$result = $replacer->replace($subject);
		$this->assertEquals(' b c d br ', $result);

		$matcher = new Diskerror\Pcre2\Matcher('a');
		$result = $matcher->hasMatch($subject);
		$this->assertTrue($result);

		$matches = $matcher->match($subject);  //  "$matcher" from above
		$this->assertEquals(['a'], $matches);
	}

	public function testLong()
	{
		echo "\nRunning as ", Diskerror\Pcre2\Pcre2Abstract::whatAmI(), ".\n";

		ob_start();

		$start = microtime(true);

		$subject = 'abacadabra';

		$matcher = new Diskerror\Pcre2\Matcher('a');
		$res = $matcher->hasMatch($subject);
		var_dump($matcher->hasMatch($subject));  //  bool(true)

		$matches = $matcher->match($subject);
		print_r($matches);  //  Array([0] => a)

		$replacer = new Diskerror\Pcre2\Replacer('a', ' ');
		echo '"', $replacer->replace($subject), "\"\n";  //  - b c d br -

		$subject2 = 'abacadabra abacadabre abacadabro';
		$m2 = new Diskerror\Pcre2\Matcher('(a)(ba)(ca).*?(br.)');
		$matches = $m2->match($subject2);
		print_r($matches);    //	Array([0] => abacadabra, [1] => a, [2] => ba, [3] => ca, [4] => bra)

		$m2 = new Diskerror\Pcre2\Matcher('(a)(ba)(ca).*?(br.)');
		$matches = $m2->matchAll($subject2);
		print_r($matches);    //	output see below

		printf("microseconds: %.6f\n", (microtime(true) - $start) * 1000000);

		ob_end_flush();

		$this->assertTrue(true);
	}

}
