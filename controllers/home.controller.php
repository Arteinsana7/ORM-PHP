<?php
// home.controller.php
// Controller from the homePage , get the films from the data base and pass it to template/home.php
require_once('film.class.php');
// Static method herité  from parent table: this fucntion return a collection of objects films hydrated
$films = Film::all(); 
// I had modify to not get the if each time for each film, or genre but ce
