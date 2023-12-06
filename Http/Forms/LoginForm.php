<?php

	namespace Http\Forms;

	use Core\Validator;

	class LoginForm
	{
		protected $errors = [];

		public function validate($email, $password) {

			if (!Validator::email($email)) {
				$this->errors['email'] = 'Please provide a valid email.';
			}

			if (!Validator::string($password, 7, 20)) {
				$this->errors['password'] = 'Password must contain 7-20 characters';
			}

			return empty($errors);
		}

		public function errors() {
			return $this->errors;
		}
	}