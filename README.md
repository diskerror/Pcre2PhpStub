Version 0.3 is a work in progress. Pcre2PhpEx is still at v0.2.

# PCRE2
These are fully function stub classes for PHP which mimic the behavior of the compiled PCRE2 extension. This project starts at version 0.3 which corresponds to version 0.3 of the project Pcre2PhpEx.

## Usage
In PHP, the PCRE functions (from PHPUnit object):
```
$subject = 'abacadabra';
$result = preg_replace('/a/u', ' ', $subject);
$this->assertEquals($result, ' b c d br ');

$result = (bool)preg_match('/a/u', $subject);
$this->assertTrue($result);

$matches = [];
$result = preg_match('/a/u', $subject, $matches);  //  1
$this->assertEquals($matches, ['a']);
```
are equivalent to this in this PCRE2 implimentation:
```
$subject = 'abacadabra';
$replacer = new \Diskerror\Pcre2\Replacer('a', ' ', \Diskerror\Pcre2::UTF);
$result = $replacer->replace($subject);
$this->assertEquals($result, ' b c d br ');

$matcher = new \Diskerror\Pcre2\Matcher('a', \Diskerror\Pcre2::UTF);
$result = $matcher->hasMatch($subject);
$this->assertTrue($result);

$matches = $matcher->match($subject);  //  "$matcher" from above
$this->assertEquals($matches, ['a']);
```
