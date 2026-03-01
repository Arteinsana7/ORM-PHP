<?php
//home.controller.php

require_once('film.class.php');


if($action == 'home')
{
	$films = Film::all();
}
elseif($action == 'film')
{
	$id = $_GET['id'];
	$film = new Film($id);
	$film->hydrate();
}
elseif($action == 'genre')
{
	$id = $_GET['id'];
	$genre = new Genre($id);
	$genre->hydrate();
}