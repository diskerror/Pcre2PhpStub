# PCRE2 stubs
These are fully function stub classes for PHP which mimic the behavior of the compiled PCRE2 extension.

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
are equivalent to the following in the PCRE2 implimentation:
```
//  UTF is the default
$subject = 'abacadabra';
$replacer = new \Diskerror\Pcre2\Replacer('a', ' ');
$result = $replacer->replace($subject);
$this->assertEquals($result, ' b c d br ');

$matcher = new \Diskerror\Pcre2\Matcher('a');
$result = $matcher->hasMatch($subject);
$this->assertTrue($result);

$matches = $matcher->match($subject);  //  "$matcher" from above
$this->assertEquals($matches, ['a']);
```
