<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Ajouter un thème</title>
  </head>
  <body>
      <?php
      include 'connexion.php';

      $nom=$_POST['nom'];
      //echo "<br/>Nom du thème : $nom";
      $desc=$_POST['desc'];
      //echo "<br/>Description du thème : $desc";

      $query1 = "SELECT * FROM themes WHERE nom='$nom' AND supprime=1";
      //echo $query1;
      $result1 = mysqli_query($connect, $query1);
      if (!$result1) {
        echo "Erreur".mysqli_error($connect);
        exit;
      }
      $result1 = mysqli_query($connect, $query1);
      if (!$result1) {
        echo "Erreur".mysqli_error($connect);
        exit;
      }

      if(mysqli_num_rows($result1)==0){  //Vérification si un thème supprimé existe déjà à ce nom

          $query2 = "SELECT * FROM themes WHERE nom='$nom' AND supprime=0";
          //echo $query2;
          $result1 = mysqli_query($connect, $query1);
          if (!$result1) {
            echo "Erreur".mysqli_error($connect);
            exit;
          }
          $result2 = mysqli_query($connect, $query2);
          if (!$result2) {
            echo "Erreur".mysqli_error($connect);
            exit;
          }

          if(mysqli_num_rows($result2)==0){      //Vérification si un thème actif à déjà le même nom

            $query3 = "INSERT INTO themes VALUES (NULL, '$nom', '0', '$desc')";
            //echo "<br>$query3<br>";
            $result3 = mysqli_query($connect, $query3);
            if (!$result3) {
              echo "Erreur".mysqli_error($connect);
              exit;
            } else {
              echo "Le thème a bien été ajouté.";
              echo "<table><tr><td class='titre'>Nom du thème</td><td>$nom</td></tr>";
              echo "<tr><td class='titre'>Description du thème</td><td>$desc</td></tr></table>";
            }

          } else{
              echo "Il y a déja un thème actif avec le même nom.<br/>";
              echo "<br/>L'enregistrement du thème est annulé.<br/>";
              echo '<br/>Cliquez <a href="ajout_theme.html" target=contenu>ici</a> pour ajouter un nouveau thème';
          }

      } else{     //Réactivation d'un thème supprimé

          $query4 = "UPDATE themes SET supprime=0, descriptif='$desc' WHERE nom='$nom'";
          //echo $query4;
          $result1 = mysqli_query($connect, $query1);
          if (!$result1) {
            echo "Erreur".mysqli_error($connect);
            exit;
          }
          $result4 = mysqli_query($connect, $query4);
          if (!$result4) {
            echo "Erreur".mysqli_error($connect);
            exit;
          } else {
            echo "Le thème existait déjà, il a été réactivé.";
            echo "<table><tr><td class='titre'>Nom du thème</td><td>$nom</td></tr>";
            echo "<tr><td class='titre'>Description du thème</td><td>$desc</td></tr></table>";
          }
      }

      mysqli_close($connect);
      ?>
  </body>
</html>
