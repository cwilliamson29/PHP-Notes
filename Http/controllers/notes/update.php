<?php

	use Core\App;
	use Core\Response;
	use Core\Validator;
	use Core\Database;

	$db = App::resolve(Database::class);

	$currentUser = 3;

	$note = $db->query('select * from notes where id = :id', [
		'id' => $_POST['id']
	])->findOrFail();

	authorize($note['user_id'] === $currentUser);

	$errors = [];

	if (!Validator::string($_POST['body'], Response::POST_MIN, Response::POST_MAX)) {
		$errors['body'] = 'A body is required, and with maximum characters of 100';
	}

	if (!empty($errors)) {
		return view("notes/create.view.php", [
			'heading' => 'Create Note',
			'errors' => $errors,
			'note' => $note
		]);
	}

	$db->query('update notes set body = :body where id = :id', [
		'id' => $_POST['id'],
		'body' => $_POST['body']
	]);

	header('location: /notes');

	die();