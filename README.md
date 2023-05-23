
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
get_about() is defined in the XFunctionManagement class

```bash
if(!isset($_SERVER['PATH_INFO']))
		$m_function->setToken('a9a0849fbc3eb1f0ca2bde125debd4a7a58c80683d9023e621b7c18cb9c7084d');
	else
		$m_function->setToken(ltrim($_SERVER['PATH_INFO'], '/'));
```

- We must send the name of the function that we have in XFunctionManagement class as value

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

The code that is active by default is implemented in this way! ( index.php )

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


```bash

```