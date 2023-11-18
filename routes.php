<?php
	$router->get('/', 'controllers/index.php');
	$router->get('/about', 'controllers/about.php');
	$router->get('/contact', 'controllers/contact.php');

	// Notes routes
	$router->get('/notes', 'controllers/notes/index.php');
	$router->get('/note', 'controllers/notes/show.php');

	// Delete Single Note
	$router->delete('/note', 'controllers/notes/destroy.php');

	// Single Note create
	$router->get('/notes/create', 'controllers/notes/create.php');
	$router->post('/notes', 'controllers/notes/store.php');

	// Single Edit Note
	$router->get('/note/edit', 'controllers/notes/edit.php');
	$router->patch('/note', 'controllers/notes/update.php');