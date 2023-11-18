<?php

	use Core\Response;

	function dd($value) {
		echo "<pre>";
		var_dump($value);
		echo "</pre>";

		die();
	}

	function urlIs($value) {
		return $_SERVER['REQUEST_URI'] === $value;
	}

	function abort($status = '404') {
		http_response_code($status);
		require base_path("views/{$status}.php");
		die();
	}

	function authorize($condition, $status = Response::FORBIDDEN) {
		if (!$condition) {
			abort($status);
		}
	}

	function base_path($path) {
		return __DIR__ . '/../' . $path;
	}

	function view($path, $attributes = []) {
		extract($attributes);
		require base_path('views/') . $path;
	}