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

          $idseance = $_POST['menuChoixSeance'];
          //echo "<br/> $idseance";

          $query1 = "SELECT ideleve FROM inscription WHERE inscription.idseance=$idseance";
          //echo $query1;
          $result1 = mysqli_query($connect, $query1);
          if (!$result1) {
            echo "Erreur".mysqli_error($connect);
            exit;
          }

          while($row = mysqli_fetch_array($result1)){
              $ideleve = $row[0];
              $note = $_POST["note".$ideleve];
              //echo "<br/> $ideleve $note";
              if(empty($note)){
                  $note = -1;
              }

              $query2 = "UPDATE inscription SET note=$note WHERE inscription.idseance=$idseance AND inscription.ideleve=$ideleve";
              //echo $query2;
              $result2 = mysqli_query($connect, $query2);
              if (!$result2) {
                echo "Erreur".mysqli_error($connect);
                exit;
              }
          }

          $query3 = "SELECT inscription.ideleve, nom, prenom, note FROM inscription, eleves WHERE inscription.idseance=$idseance AND inscription.ideleve=eleves.ideleve";
          //echo $query3;
          $result3 = mysqli_query($connect, $query3);
          if (!$result3) {
            echo "Erreur".mysqli_error($connect);
            exit;
          }

          echo"Les notes ont bien été enregistrées.";
          echo "<table>";
          echo "<tr><th class='titre'>Elève</th><th class='titre'>Note</th></tr>";
          while($row1 = mysqli_fetch_array($result3)){
              if($row1[3]==-1){
                  $row1[3] = "x";
              }
              echo "<tr><td>$row1[1] $row1[2] </td><td> $row1[3]</td></tr>";
          }
          echo "</table>";

          mysqli_close($connect);
      ?>
  </body>
</html>
