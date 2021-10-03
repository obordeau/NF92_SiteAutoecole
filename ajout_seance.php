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

        echo "<h1>Ajouter une nouvelle séance de code</h1>";

        $query = "SELECT * FROM themes WHERE supprime=0";
        //echo $query;
        $result = mysqli_query($connect,$query);
        if (!$result) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        echo "<FORM METHOD='POST' ACTION='ajouter_seance.php'>";
        echo "<table>";
        echo "<tr><td class='titre'>Thème de la séance</td>";
        echo "<td><select name='menuChoixTheme' size='4' required>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
          echo "<OPTION VALUE='$row[0]'>$row[1]</OPTION>";
        }
        echo "</select></td></tr>";
        echo "<tr><td class='titre'>Date de la séance</td><td><input type='date' name='DateSeance' required></td></tr>";
        echo "<tr><td class='titre'>Effectif maximal de la séance</td><td><input type='number' name='EffMax' required></td></tr>";
        echo "<tr><td colspan='2' class='bouton'><INPUT type='submit' value='Enregistrer séance'></td></tr>";
        echo "</table>";
        echo "</FORM>";

        mysqli_close($connect);
      ?>
  </body>
</html>
