<?php

	use Core\App;
	use Core\Container;
	use Core\Database;

	$container = new Container();

	$container->bind('Core\Database', function () {
		$config = require base_path('config.php');
		$pass = require base_path('dbPass.php');

		return new Database($config['database'], 'root', $pass['password']);
	});

	App::setContainer($container);