<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Désinscrire un élève</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        echo "<h1>Désinscrire un élève d'une séance de code</h1>";

        $idseance = $_POST['menuChoixSeance'];
        //echo "<br/> $idseance";
        $ideleve = $_POST['menuChoixEleve'];
        //echo "<br/> $ideleve";

        $query1 = "SELECT * FROM inscription WHERE ideleve=$ideleve AND idseance=$idseance";
        //echo $query1;
        $result1 = mysqli_query($connect, $query1);
        if (!$result1) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }

        if(mysqli_num_rows($result1) != 0) { //Vérification si l'élève est inscrit à cette séance
          $query2 = "DELETE FROM inscription WHERE idseance = $idseance AND ideleve = $ideleve";
          //echo $query2;
          $result2 = mysqli_query($connect, $query2);
          if (!$result2) {
            echo "Erreur".mysqli_error($connect);
            exit;
          } else {
            echo "L'élève a bien été désinscrit.";
          }
        } else {
          echo "L'élève n'était pas inscrit à cette séance.<br/>";
          echo '<br/>Cliquez <a href="desinscription_seance.php" target=contenu>ici</a> pour désinscrire un élève';
        }
        mysqli_close($connect);
      ?>
  </body>
</html>
