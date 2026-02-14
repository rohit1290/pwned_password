<?php
include_once "vendor/autoload.php";

return [
	'plugin' => [
		'name' => 'Pwned Password Check',
    'version' => '1.0',
		'dependencies' => [],
  ],
	'events' => [
		'action:validate' => [
			'login' => [
				'Pwned\Passwords\Checker' => [],
			],
			'user/changepassword' => [
				'Pwned\Passwords\Checker' => [],
			],
		],
	],
];