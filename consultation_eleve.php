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

        $query1 = "SELECT * FROM eleves";
        //echo $query1;
        $result1 = mysqli_query($connect,$query1);
        if (!$result1) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        echo "<FORM METHOD='POST' ACTION='consulter_eleve.php' >";
        echo "<table>";
        echo "<tr><td class='titre'>Choix de l'élève</td>";
        echo "<td><select name='menuChoixEleve' size='5' required>";
        while ($row = mysqli_fetch_array($result1, MYSQLI_NUM))
        {
          echo "<OPTION VALUE='$row[0]'>$row[1] $row[2]</OPTION>";
        }
        echo "</select></td></tr>";
        echo "<tr><td colspan='2' class='bouton'><INPUT type='submit' value='Valider'></td></tr>";
        echo "</table>";
        echo "</FORM>";

        mysqli_close($connect);
      ?>
  </body>
</html>
