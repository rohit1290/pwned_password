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
				'Pwned\Password\Checker' => [],
			],
			'user/changepassword' => [
				'Pwned\Password\Checker' => [],
			],
		],
	],
];