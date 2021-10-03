<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Ajout d'un élève</title>
  </head>
  <body>
      <?php
          include 'connexion.php';

          $nom=$_POST['nom'];
          //echo "<br/>Nom de l'élève : $nom";
          $prenom=$_POST['prenom'];
          //echo "<br/>Prénom de l'élève : $prenom";
          $date_nais=$_POST['date_nais'];
          //echo "<br/>Date de naissance : $date_nais";
          date_default_timezone_set('Europe/Paris');
          $date = date("Y-m-d");
          //echo "<br> Date du jour : "."$date"." <br>";

          $query1 = "SELECT * FROM eleves WHERE nom='$nom' AND prenom='$prenom'";
          //echo $query1;
          $result1 = mysqli_query($connect, $query1);
          if (!$result1) {
            echo "Erreur".mysqli_error($connect);
            exit;
          }
          $test = mysqli_num_rows($result1);

          if($test==0) {
              $query2 = "INSERT INTO eleves VALUES (NULL, '$nom', '$prenom', '$date_nais', '$date')";
              //echo "$query2";
              $result2 = mysqli_query($connect, $query2);
              if (!$result2) {
                echo "Erreur".mysqli_error($connect);
                exit;
              } else {
                echo "L'élève a bien été ajouté <br/>";
                echo "<table><tr><td class='titre'>Nom de l'élève</td><td>$nom</td></tr>";
                echo "<tr><td class='titre'>Prénom de l'élève</td><td>$prenom</td></tr>";
                echo "<tr><td class='titre'>Date de naissance</td><td>$date_nais</td></tr></table>";
              }
          } else {
              echo "Il y a déjà un élève avec le même nom et prénom dans la base de données.<br><br>";
              echo "Voulez-vous vraiment ajouter un autre élève ? :";
              echo "<table>";
              echo "<form method='POST' action='valider_eleve.php'>";
              echo "<tr><td>";
              echo "<input type='radio' name='choix' value='0'>Oui<br>";
              echo "<input type='radio' name='choix' value='1' checked>Non";
              echo "<input type='hidden' name='nom' value='$nom'>";
              echo "<input type='hidden' name='date_nais' value='$date_nais'>";
              echo "<input type='hidden' name='prenom' value='$prenom'>";
              echo "</td></tr>";
              echo "<tr><td><input type='submit' value='Valider'></td></tr>";
              echo "</form>";
              echo "</table>";
          }

          mysqli_close($connect);
      ?>
  </body>
</html>
