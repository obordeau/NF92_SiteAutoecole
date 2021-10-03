<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Consultation d'un élève</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        echo "<h1>Consulter un élève</h1>";

        $ideleve = $_POST['menuChoixEleve'];
        //echo "<br/> $ideleve";

        $query1 = "SELECT * FROM eleves WHERE ideleve=$ideleve";
        //echo $query1;
        $result1 = mysqli_query($connect,$query1);
        if (!$result1) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        echo "<table>";
        while ($row = mysqli_fetch_array($result1, MYSQLI_NUM))
        {
          echo "<tr><td class='titre'>Nom</td><td>$row[1]</td></tr>";
          echo "<tr><td class='titre'>Prénom</td><td>$row[2]</td></tr>";
          echo "<tr><td class='titre'>Date de naissance</td><td>$row[3]</td></tr>";
          echo "<tr><td class='titre'>Date d'inscription</td><td>$row[4]</td></tr>";
        }
        echo "</table>";

        mysqli_close($connect);
      ?>
  </body>
</html>
