
# What is PHPlay?

This project is for designing all kinds of APIs made in PHP!

# What is the purpose of designing this project?

The purpose of designing this project is to easily manage the functions in the project

# To use PHPlay

The .htaccess file is created with the following contents

```bash
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.+)$ index.php/$1 [L]
```
## Description of project structure for managing functions

- Our defining functions are defined as key values 

- Our function must have a key (because we don't want it to be the same as the function stem in the requests sent by different platforms)

- In the code below, we consider a default function for the API, which means if we call the site as an empty parameter, for example
www.example.com/
The function that is called is:
`get_about()` is defined in the `XFunctionManagement `class

```bash
if(!isset($_SERVER['PATH_INFO']))
		$m_function->setToken('a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d');
	else
		$m_function->setToken(ltrim($_SERVER['PATH_INFO'], '/'));
```

- We must send the name of the function that we have in `XFunctionManagement` class as value

```bash
$m_function->_functions['FUNCTION_TOKEN'] = 'FUNCTION_NAME';

// ### example
$m_function->_functions['a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d'] = 'get_about';
```

- We define the specifications of the functions in this function below, or if we need to define information for the system in advance, it is better to define it in this function.

```bash
$m_function->__initialization(
		function() use( $m_function, $m_platform, $m_runtime )
		{
			$m_function->_functions['FUNCTION_TOKEN'] = 'FUNCTION_NAME';
		}
	);
```

- To debug our code, we can use the options that we considered for debugging, which we need to enable debugging mode and use it, if the tests are done, it is better to disable it.

```bash
// TODO: debuging options
	$m_function->runningDebuger(true);
	$m_function->__debugging(
		function () use ( $m_function, $m_platform, $m_runtime ) {

			XLog::log(
				array(
					'm_debugging' => true,
					'm_message' => 'Hello World!',
					'm_api' => 'powered by phplay.',
					'm_version' => $m_platform->get_version(),
					'm_runtime' => $m_runtime->get()
				)
			);

			die();
		}
	);
```

- result debugging mode:
```bash
{
    "m_debugging": true,
    "m_message": "Hello World!",
    "m_api": "powered by phplay.",
    "m_version": "0.1",
    "m_runtime": "0.000"
}
```
## Default code

The code that is active by default is implemented in this way! ( `index.php` )

```bash
  <?php
	include_once 'HeaderManagement.php';

	if(!isset($_SERVER['PATH_INFO']))
		$m_function->setToken('a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d');
	else
		$m_function->setToken(ltrim($_SERVER['PATH_INFO'], '/'));

	$m_function->__initialization(
		function() use( $m_function, $m_platform, $m_runtime )
		{
			$m_function->_functions['a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d'] = 'get_about';
			$m_function->_functions['04089a41989c1b760dffaed2674eb4205997057bc387c1e38977e00a532c2243'] = 'my_example_function';
		}
	);

	// TODO: debuging options
	$m_function->runningDebuger(true);
	$m_function->__debugging(
		function () use ( $m_function, $m_platform, $m_runtime ) {

			XLog::log(
				array(
					'm_debugging' => true,
					'm_message' => 'Hello World!',
					'm_api' => 'powered by phplay.',
					'm_version' => $m_platform->get_version(),
					'm_runtime' => $m_runtime->get()
				)
			);

			die();
		}
	);

	$m_function->runToken();
?>
```

## Last Update Log

```bash
{
    "m_status": true,
    "m_functionName": "get_about",
    "m_token": "a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d",
    "m_version_log": {
        "0.4": [
            {
                "m_function": "XErrorManagement",
                "m_text": "XErrorManagement this functions ( __construct & POST & GET ) updated.( update log item. )"
            },
            {
                "m_function": "XFunctionManagement",
                "m_text": "XFunctionManagement this functions ( __construct & runToken & get_about & my_example_function & my_example_function_post ) updated.( update log item. )"
            },
            {
                "m_function": "XLog",
                "m_text": "XLog this functions ( __construct & p & dump & log ) updated.( added preValue into json output. )"
            },
            {
                "m_function": "XLog",
                "m_text": "XLog this functions ( __invoke ) complated.( new function added. )"
            },
            {
                "m_function": "XVersionManagement",
                "m_text": "XVersionManagement this functions ( add_multiple_log ) updated.( fixed json array model. )"
            },
            {
                "m_function": "HeaderManagement",
                "m_text": "HeaderManagement this functions ( XErrorManagement & XLog & XFunctionManagement ) updated.( added field XLog to constructors. )"
            },
            {
                "m_function": "index",
                "m_text": "index this functions ( main ) updated.( update log item. )"
            }
        ],
        "0.3": [
            {
                "m_function": "XDatabaseManagement",
                "m_text": "XDatabaseManagement this functions ( __construct & fixSingleInput & fixArrayInput & pagination & db ) complated.( class builded. )"
            },
            {
                "m_function": "index",
                "m_text": "index this functions ( __initialization ) updated.( variable m_database added. )"
            },
            {
                "m_function": "HeaderManagement",
                "m_text": "HeaderManagement this functions ( XDatabaseManagement & XFunctionManagement ) updated.( new class defined & updated. )"
            },
            {
                "m_function": "XFunctionManagement",
                "m_text": "XFunctionManagement this functions ( __construct & my_example_function & my_example_function_post ) updated.( function 'fixArrayInput' added. )"
            }
        ],
        "0.2": [
            {
                "m_function": "XErrorManagement",
                "m_text": "XErrorManagement this functions ( POST & GET ) complated.( class builded. )"
            },
            {
                "m_function": "HeaderManagement",
                "m_text": "HeaderManagement this functions ( XErrorManagement & XFunctionManagement ) updated.( new class defined. )"
            },
            {
                "m_function": "index",
                "m_text": "index this functions ( my_example_function_post ) updated."
            },
            {
                "m_function": "XFunctionManagement",
                "m_text": "XFunctionManagement this functions ( className & __construct & my_example_function & my_example_function_post ) updated.( post & get validation & 'm_status' in functions added. )"
            },
            {
                "m_function": "XLog",
                "m_text": "XLog this functions ( log & p & dump ) updated.( This function is more personalized )"
            }
        ],
        "0.1": [
            {
                "m_function": "XPlatform",
                "m_text": "XPlatform this functions ( version_adder & add_single_log & add_multiple_log ) complated."
            },
            {
                "m_function": "XPlatform",
                "m_text": "XPlatform this functions ( get_version & get_version_log & logger ) complated."
            },
            {
                "m_function": "XAppRuntime",
                "m_text": "XAppRuntime this functions ( className ) complated.( class builded. )"
            },
            {
                "m_function": "XFunctionManagement",
                "m_text": "XFunctionManagement this functions ( XFunctionManagement ) complated.( debugger mode defined )"
            },
            {
                "m_function": "index",
                "m_text": "index this functions ( index & __initialization ) updated.( debugger options defined )"
            },
            {
                "m_function": "XFunctionManagement",
                "m_text": "XFunctionManagement this functions ( XFunctionManagement ) complated.( class builded. )"
            }
        ]
    },
    "m_platform": "PHPlay",
    "m_platform_uri": "PHPlay v0.4",
    "m_version": "0.4",
    "m_runtime": "0.032"
}
```

