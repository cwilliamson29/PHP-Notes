<?php

	use Core\Validator;

	$email = $_POST['email'];
	$password = $_POST['password'];

	$errors = [];

	if (!Validator::email($email)) {
		$errors['email'] = 'Please provide a valid email.';
	}

	if (!Validator::string($password, 7, 20)) {
		$errors['password'] = 'Password must contain 7-20 characters';
	}