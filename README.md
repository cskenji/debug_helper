# CodeIgniter Debug helper v1.2.0
> An alternative for print_r, var_dump and die.

This is simple and easy debug helper for Codeigniter
You can use this alternative, instead for print_r or var_dump. 
And you can print more clear output also with Codeigniter benchmark support.
This helper automatically return null when you set "production" ENVIRONMENT in Codeigniter.
So you dont need to remove function from your code or if you forget it you dosent need worry about that.


##### Output example:
[![Output example](https://github.com/Stunt/debug_helper/raw/master/screenshot.png)](https://github.com/Stunt/debug_helper)


## Functions

* print_d()
* debug()
* dump()


* * *

You can also install it using Sparks [http://getsparks.org/packages/debug_helper/show](http://getsparks.org/packages/debug_helper/show).


## Examples:
```php
debug($var);
```

or

```php
print_d($var);
```

When input is array or object type this function use print_r 
automatically with html `<pre>` tag to get more clear result.
also if you have runing xdebug in your webserver function use var_dump
because xdebug can style var_dump output and you get colored and very clear high detail result.

```php
debug($my_array);

ourput:

	<pre>
	Array
	(
		[0] => 1
		[1] => 2
	)
	</pre>
````
but when your input is other type (string, integer, boolean ..)
function make output with var_dump to show you more information.

	debug($true_bool_var);

ourput:

	boolean true

	

## Using benchmark :

So you can analyse your functions..

	debug_profile();
	$res = your_function($some_input);
	debug($res);

ourput:

	Elapsed time (benchmark): 0.0001
	<pre>
	Array
	(
		[0] => 1
		[1] => 2
	)
	</pre>