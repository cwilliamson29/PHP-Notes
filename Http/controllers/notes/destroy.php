<?php

	use Core\App;
	use Core\Database;

	$db = App::resolve(Database::class);

	$currentUser = 3;

	$note = $db->query('select * from notes where id = :id', [
		'id' => $_POST['id']
	])->findOrFail();

	authorize($note['user_id'] === $currentUser);

	$db->query('delete from notes where id = :id', [
		'id' => $_POST['id']
	]);

	header('location: /notes');

	exit();
