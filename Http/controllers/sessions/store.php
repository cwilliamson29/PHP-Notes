<?php

	use Core\App;
	use Core\Database;
	use Core\Validator;
	use Http\Forms\LoginForm;

	$db = App::resolve(Database::class);

	$email = $_POST['email'];
	$password = $_POST['password'];

	$form = new LoginForm();

	if (!$form->validate($email, $password)) {
		view('sessions/create.view.php', [
			'errors' => $form->errors()
		]);
		exit();
	}

//	$errors = [];
//
//	if (!Validator::email($email)) {
//		$errors['email'] = 'Please provide a valid email.';
//	}
//
//	if (!Validator::string($password, 7, 20)) {
//		$errors['password'] = 'Password must contain 7-20 characters';
//	}
//
//	if (!empty($errors)) {
//		/** @noinspection PhpVoidFunctionResultUsedInspection */
//
//		return view('sessions/create.view.php', [
//			'errors' => $errors
//		]);
//	}

	$user = $db->query('select * from users where email = :email', [
		'email' => $email
	])->find();

	if ($user) {
		if (password_verify($password, $user['password'])) {
			login([
				'email' => $email
			]);

			header('location: /');
			exit();
		}
	}


	/** @noinspection PhpVoidFunctionResultUsedInspection */

	return view('sessions/create.view.php', [
		'errors' => [
			'email' => 'Email or password is wrong.'
		]
	]);
