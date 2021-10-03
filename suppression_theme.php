<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Supprimer un thème</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        echo "<h1>Supprimer un thème</h1>";

        $query = "SELECT * FROM themes WHERE supprime=0";
        //echo $query;
        $result = mysqli_query($connect,$query);
        if (!$result) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        echo "<FORM METHOD='POST' ACTION='supprimer_theme.php'>";
        echo "<table>";
        echo "<tr><td class='titre'>Choix du thème</td>";
        echo "<td><select name='menuChoixTheme' size='4' required>";
        while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
          echo "<OPTION VALUE='$row[0]'>$row[1]</OPTION>";
        }
        echo "</select></td></tr>";
        echo "<tr><td colspan='2' class='bouton'><INPUT type='submit' value='Valider'></td></tr>";
        echo "</table>";
        echo "</FORM>";

        mysqli_close($connect);
      ?>
  </body>
</html>
