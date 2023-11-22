<?php
	$router->get('/', 'controllers/index.php');
	$router->get('/about', 'controllers/about.php');
	$router->get('/contact', 'controllers/contact.php');

	// Notes routes
	$router->get('/notes', 'controllers/notes/index.php')->only('auth');
	$router->get('/note', 'controllers/notes/show.php')->only('auth');

	// Delete Single Note
	$router->delete('/note', 'controllers/notes/destroy.php')->only('auth');

	// Single Note create
	$router->get('/notes/create', 'controllers/notes/create.php')->only('auth');
	$router->post('/notes', 'controllers/notes/store.php')->only('auth');

	// Single Edit Note
	$router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
	$router->patch('/note', 'controllers/notes/update.php')->only('auth');

	// Register User
	$router->get('/register', 'controllers/registration/create.php')->only('guest');
	$router->post('/register', 'controllers/registration/store.php')->only('guest');

	// Login User
	$router->get('/login', 'controllers/sessions/create.php')->only('guest');
	$router->post('/sessions', 'controllers/sessions/store.php')->only('guest');

	// Log out user
	$router->delete('/sessions', 'controllers/sessions/destroy.php')->only('auth');
