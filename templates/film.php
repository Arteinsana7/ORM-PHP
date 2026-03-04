<?php
//template film.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cinéma MK3 - Film <?php echo $film->titre; ?></title>
</head>

<body>
  <h1>Cinéma MK3 - Film <?php echo $film->titre; ?></h1>
  <br>
  <h2>Détails du film</h2>
  <?php
  echo '<b>' . $film->titre . '</b><br><br>';

  echo 'Genre : ';
  if ($film->genre) {
    echo '<a href="index.php?action=genre&id=' . $film->id_genre . '">' . $film->genre->nom . '</a>';
  } else {
    echo 'inconnu';
  }

  echo '<br>';

  echo 'Distributeur : ';
  if ($film->distributeur) {
    echo '<a href="index.php?action=distributeur&id=' . $film->id_distributeur . '">' . $film->distributeur->nom . '</a>';
  } else {
    echo 'inconnu';
  }

  echo '<br>';
  echo 'Durée : ' . $film->duree_minutes . ' min';

  ?>
  </ul>
</body>

</html>