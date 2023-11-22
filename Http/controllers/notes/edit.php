<?php

	use Core\App;
	use Core\Database;

	$db = App::resolve(Database::class);

	$currentUser = 3;


	$note = $db->query('select * from notes where id = :id', [
		'id' => $_GET['id']
	])->findOrFail();

	authorize($note['user_id'] === $currentUser);

	view("notes/edit.view.php", [
		'heading' => 'Edit Note',
		'errors' => [],
		'note' => $note
	]);