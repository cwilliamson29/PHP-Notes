<?php

	session_start();

	use Core\Router;
	use Core\Session;

	$BASE_PATH = __DIR__ . '/../';

	require $BASE_PATH . "helpers/helpers.php";
	require base_path("helpers/nav.helpers.php");

	spl_autoload_register(function ($class) {
		$class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		require base_path("{$class}.php");
	});

	require base_path('bootstrap.php');

	$router = new Router();

	$routes = require base_path('routes.php');
	$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
	$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

	$router->route($uri, $method);

	Session::unflash();