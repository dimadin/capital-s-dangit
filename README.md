
# Capital S, Dangit!

[![Build Status](https://www.travis-ci.org/dimadin/capital-s-dangit.svg?branch=master)](https://www.travis-ci.org/dimadin/capital-s-dangit)

This plugin replaces “Javascript” with “JavaScript” in post content, post titles, and comment content.

It has no settings, just activate it and it works immediately.

## Using with other texts

You just need to pass your text to the function `capital_S_dangit()` and it will replace “Javascript” with “JavaScript” in that text.

For exampe:

```php
$my_text = capital_S_dangit( $my_text );
```

or

```php
add_filter( 'my_custom_filter', 'capital_S_dangit' );
```
