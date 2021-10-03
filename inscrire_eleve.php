<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Inscription d'un élève</title>
  </head>
  <body>
      <?php
        include 'connexion.php';

        $idseance = $_POST['menuChoixSeance'];
        //echo "<br/> $idseance";
        $ideleve = $_POST['menuChoixEleve'];
        //echo "<br/> $ideleve";

        $query1 = "SELECT * FROM inscription WHERE idseance='$idseance' AND ideleve='$ideleve'";
        //echo $query1;
        $result1 = mysqli_query($connect, $query1);
        if (!$result1) {
          echo "Erreur".mysqli_error($connect);
          exit;
        }
        $test = mysqli_num_rows($result1);

        if($test==0) {
          $query2 = "INSERT INTO inscription VALUES ($idseance, $ideleve, -1)";
          //echo "<br>$query2<br>";
          $result2 = mysqli_query($connect, $query2);
          if (!$result2) {
            echo "Erreur".mysqli_error($connect);
            exit;
          } else {
              echo "Cet élève a bien été inscrit à la séance.";
          }
        } else {
            echo "Cet élève est déjà inscrit à cette séance<br><br>";
            echo '<br/>Cliquez <a href="inscription_eleve.php" target=contenu>ici</a> pour inscrire un nouvel élève';
        }

        mysqli_close($connect);
      ?>
  </body>
</html>
