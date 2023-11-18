<?php

	use Core\Router;

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
	//require base_path("Core/Router.php");


	//	$config = require('config.php');
	//	$db = new Database($config['database']);
	//$posts = $db->query("select * from post")->fetchAll();

	//	foreach ($posts as $post) {
	//		echo "<li>" . $post['id'] . $post['title'] . "</li>";
	//	}
