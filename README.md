# PCRE2 stubs
These are fully function stub classes for PHP which mimic the behavior of the compiled [PCRE2 extension](https://github.com/diskerror/Pcre2PhpEx).

## Usage
In PHP, the PCRE functions (from PHPUnit test code):
```
$subject = 'abacadabra';
$result = preg_replace('/a/u', ' ', $subject);
$this->assertEquals(' b c d br ', $result);

$result = (bool)preg_match('/a/u', $subject);
$this->assertTrue($result);

$matches = [];
$result = preg_match('/a/u', $subject, $matches);  //  1
$this->assertEquals(['a'], $matches);
```
are equivalent to the following in the PCRE2 implimentation:
```
//  UTF is the default
$subject = 'abacadabra';
$replacer = new Diskerror\Pcre2\Replacer('a', ' ');
$result = $replacer->replace($subject);
$this->assertEquals(' b c d br ', $result);

$matcher = new Diskerror\Pcre2\Matcher('a');
$result = $matcher->hasMatch($subject);
$this->assertTrue($result);

$matches = $matcher->match($subject);  //  "$matcher" from above
$this->assertEquals(['a'], $matches);
```
