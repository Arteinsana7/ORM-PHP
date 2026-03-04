<?php
// film.controller.php
// Controller for the film detail page.
// Retrieves a single film by id from the URL, hydrates it,
// and redirects to home if no id is provided.

require_once('film.class.php');

// isset() checks if ?id= exists in the URL
// (int) casts the value to integer — prevents SQL injection
// if no id provided, returns null
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($id) {
    // Create a Film object and populate it from the database
    $film = new Film($id);
    $film->hydrate();
} else {
    header('Location: index.php'); // redirect to home
    exit;                          // stop execution immediately
}
