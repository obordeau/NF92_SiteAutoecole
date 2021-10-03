<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Ajouter une séance</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        $DateSeance = $_POST['DateSeance'];
        //echo "<br> date : $DateSeance";
        $EffMax = $_POST['EffMax'];
        //echo "<br> effmax : $EffMax";
        $idtheme = $_POST['menuChoixTheme'];
        //echo "<br> idtheme : $idtheme";
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d");
        //echo "<br> Date du jour : "."'$date'"." <br>";

        if ($date>$DateSeance) {
          echo "Erreur : La séance est dans le passé<br/>";
          echo '<br/>Cliquez <a href="ajout_seance.php" target=contenu>ici</a> pour ajouter une nouvelle séance';
          exit;
        }

        $query1 = "SELECT * FROM seances WHERE DateSeance='$DateSeance' AND Idtheme='$idtheme'";
        //echo "<br>$query1<br>";
        $result1 = mysqli_query($connect, $query1);
        if (!$result1) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        if (mysqli_num_rows($result1) != 0)
        {
          echo "Erreur : Il existe deja une séance sur ce thème ce jour.<br/>";
          echo '<br/>Cliquez <a href="ajout_seance.php" target=contenu>ici</a> pour ajouter une nouvelle séance';
          exit;
        }

        $query2 = "INSERT INTO seances VALUES (NULL, '$DateSeance', '$EffMax', '$idtheme')";
        //echo "<br>$query2<br>"; //important
        $result2 = mysqli_query($connect, $query2);
        if (!$result2) {
          echo "Erreur".mysqli_error($connect);
          exit;
        } else {
          echo "La séance a bien été ajoutée.";
          echo "<table><tr><td class='titre'>Date de la séance</td><td>$DateSeance</td></tr>";
          echo "<tr><td class='titre'>Effectif maximal de la séance</td><td>$EffMax</td></tr></table>";
        }

        mysqli_close($connect);
      ?>
  </body>
</html>
