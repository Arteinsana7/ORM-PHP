<?php
//initialisation
session_start();
require_once('db_functions.php');

//routeur
if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = 'home';

// a reprendre 
//include('controllers/'.$action.'.controller.php');
include('controllers/home.controller.php');

//vue
include('templates/'.$action.'.php');



