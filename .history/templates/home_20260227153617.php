<?php
//template : home.php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema MK3</title>
  </head>
  <body>
    <h1>Bienvenue du le site du cinéma MK3</h1>
    <br>
    <h2>Liste des films</h2>
    <ul>
    	<?php
    	foreach ($films as $film)
    	{
    		echo '<li><a href="index.php?action=film&id='.$film->id_film.'">'.$film->titre.'</a></li>';
    	}
    	?>
    </ul>
  </body>
</html>