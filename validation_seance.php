<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Valider une séance</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        echo "<h1>Valider une séance de code</h1>";

        $query = "SELECT idseance, DateSeance, seances.Idtheme, nom FROM seances INNER JOIN themes ON seances.Idtheme=themes.idtheme WHERE DateSeance < CURDATE()";
        //echo $query;
        $result = mysqli_query($connect,$query);
        if (!$result) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        echo "<FORM METHOD='POST' ACTION='valider_seance.php' >";
        echo "<table><tr><td class='titre'>Choix de la séance</td>";
        echo "<td><select name='menuChoixSeance' size='5' required>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
          echo "<OPTION VALUE='$row[0]'>$row[1] $row[3]</OPTION>";
        }
        echo "</select></td></tr>";
        echo "<tr><td colspan='2' class='bouton'><INPUT type='submit' value='Valider la séance'></td></tr>";
        echo "</table>";
        echo "</FORM>";

        mysqli_close($connect);
      ?>
  </body>
</html>
