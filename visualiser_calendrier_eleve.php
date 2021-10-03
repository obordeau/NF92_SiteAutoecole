<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Calendrier d'un élève</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        echo "<h1>Calendrier d'un élève</h1>";

        $ideleve = $_POST['menuChoixEleve'];
        //echo "<br> $ideleve";

        $query = "SELECT nom, DateSeance FROM inscription, seances, themes WHERE inscription.ideleve=$ideleve AND inscription.idseance=seances.idseance AND seances.Idtheme=themes.idtheme AND seances.DateSeance>=CURDATE()";
        //echo $query;
        $result = mysqli_query($connect, $query);
        if (!$result) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }
        if (mysqli_num_rows($result)==0) {
          echo "L'élève n'est inscrit à aucune séance future.";
        } else {
          echo "<table>";
          echo "<tr><td class='titre'>Date de la séance</td><td class='titre'>Thème</td></tr>";
          while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
              echo "<tr><td>".$row[1]."</td><td>".$row[0]."</td></tr>";
          }
          echo "</table>";
        }

        mysqli_close($connect);
      ?>
  </body>
</html>
