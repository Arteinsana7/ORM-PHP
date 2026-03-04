<?php
// genre.controller.php

require_once('genre.class.php');

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

if ($id) {
    $genre = new Genre($id);
    $genre->hydrate();
} else {
    header('Location: index.php');
    exit;
}
