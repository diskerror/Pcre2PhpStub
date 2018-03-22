Version 0.3 is a work in progress. Pcre2PhpEx is still at v0.2.

# PCRE2
These are fully function stub classes for PHP which mimic the behavior of the compiled PCRE2 extension. This project starts at version 0.3 which corresponds to version 0.3 of the project Pcre2PhpEx.

## Usage
In PHP, the PCRE functions:
```
$subject = 'abacadabra';
$result = pcre_replace('/a/u', ' ', $subject); //  ' b c d br '

$result = pcre_match('/a/u', $subject);  //  true

$matches = [];
$result = pcre_match('/a/u', $subject, $matches);  //  true
print_r($matches);  //  ['a', 'a']
```
are equivalent to this in this PCRE2 implimentation:
```
$subject = 'abacadabra';
$replacer = \Diskerror\Pcre2\Replacer('a', ' ', \Diskerror\Pcre2::UTF);
$result = $replacer->replace($subject);  //  ' b c d br '

$matcher = \Diskerror\Pcre2\Matcher('a', \Diskerror\Pcre2::UTF);
$result = $matcher->hasMatch($subject);  //  true

$matches = [];
$count = $matcher->match($subject, $matches);  //  "$matcher" from above
print_r($matches);  //  ['a', 'a']
```
