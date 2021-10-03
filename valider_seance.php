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

        echo "<h1>Noter les élèves</h1>";

        $idseance = $_POST['menuChoixSeance'];
        //echo "<br> $idseance";

        $query = "SELECT nom, prenom, eleves.ideleve, note FROM eleves INNER JOIN inscription ON inscription.ideleve=eleves.ideleve AND inscription.idseance=$idseance";
        //echo $query;
        $result = mysqli_query($connect, $query);
        if (!$result) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        if(mysqli_num_rows($result)==0){
            echo "Aucun élève n'est inscrit à cette séance.";
            echo "<br/>La validation de la séance est annulée.";
            echo '<br/><br/>Cliquez <a href="validation_seance.php" target=contenu>ici</a> pour valider une nouvelle séance.';
            exit;
        }
        else{
            echo "<form method='POST' action='noter_eleves.php'>";
            echo "<table>";
            echo "<input type='hidden' name='menuChoixSeance' value='$idseance'>";
            echo "<tr><th class='titre'>Elève</th><th>Note</th></tr>";
            while($row=mysqli_fetch_array($result)){
                echo "<tr><td>";
                echo "$row[0] $row[1]";
                echo "</td>";
                if($row[3]!=-1){    //Vérification si l'élève a déja été noté
                    echo "<td><input name='note".$row[2]."' type='number' min='0' max='40' value='$row[3]' readonly></td</tr>";
                }
                else {
                    echo "<td><input name='note".$row[2]."' type='number' min='0' max='40' required></td</tr>";
                }
            }
            echo "</td></tr>";
            echo "<tr><td colspan='2' class='bouton'><input type='submit' value='Valider la séance'></td></tr>";
            echo "</table>";
            echo "</form>";
        }

        mysqli_close($connect);
      ?>
  </body>
</html>
