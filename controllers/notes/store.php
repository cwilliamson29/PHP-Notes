<?php

	use Core\App;
	use Core\Response;
	use Core\Validator;
	use Core\Database;

	$db = App::resolve(Database::class);


	$messageBody = $_POST['body'];
	$errors = [];

	if (!Validator::string($_POST['body'], Response::POST_MIN, Response::POST_MAX)) {
		$errors['body'] = 'A body is required, and with maximum characters of 100';
	}

	if (!empty($errors)) {
		return view("notes/create.view.php", [
			'heading' => 'Create Note',
			'errors' => $errors,
			'messageBody' => $messageBody
		]);
	}
	$db->query('INSERT INTO notes (body, user_id) VALUES (:body, :user_id)', [
		'body' => $_POST['body'],
		'user_id' => 1
	]);

	header('location: /notes');
	die();
