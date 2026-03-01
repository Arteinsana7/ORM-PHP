<?php
//template genre.php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinéma MK3 - Genre <?php echo $genre->nom; ?></title>
  </head>
  <body>
    <h1>Cinéma MK3 - Genre <?php echo $genre->nom; ?></h1>
    <br>
    <h2>Liste des films du genre <?php echo $genre->nom; ?></h2>
    	<?php
    	foreach ($genre->films as $film)
    	{
    		echo '<li><a href="index.php?action=film&id='.$film->id_film.'">'.$film->titre.'</a></li>';
    	}
    	?>
    </ul>
  </body>
</html>