<?php

	session_start();

	use Core\Router;
	use Core\Session;
	use Core\ValidationException;

	$BASE_PATH = __DIR__ . '/../';
	require $BASE_PATH . '/vendor/autoload.php';

	require $BASE_PATH . "helpers/helpers.php";
	require base_path("helpers/nav.helpers.php");
	require base_path('bootstrap.php');

	$router = new Router();

	$routes = require base_path('routes.php');
	$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
	$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

	try {
		$router->route($uri, $method);
	} catch (ValidationException $exception) {
		Session::flash('errors', $exception->errors);
		Session::flash('old', $exception->old);

		return redirect($router->previousUrl());
	}

	Session::unflash();