<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <title>Valider eleve</title>
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
          //echo "<br> Date du jour : "."'$date'"." <br>";
          $choix = $_POST['choix'];

          if($choix==0) {
              $query = "INSERT INTO eleves VALUES (NULL, '$nom', '$prenom', '$date_nais', '$date')";
              //echo $query;
              $result = mysqli_query($connect, $query);
              if (!$result) {
                echo "Erreur".mysqli_error($connect);
                exit;
              } else {
                echo "L'élève a bien été ajouté <br/>";
                echo "<table><tr><td class='titre'>Nom de l'élève</td><td>$nom</td></tr>";
                echo "<tr><td class='titre'>Prénom de l'élève</td><td>$prenom</td></tr>";
                echo "<tr><td class='titre'>Date de naissance</td><td>$date_nais</td></tr></table>";
              }
          } else {
              echo "L'élève n'a pas été ajouté.<br/>";
              echo '<br/>Cliquez <a href="ajout_eleve.html" target=contenu>ici</a> pour ajouter un nouvel élève.';
          }

          mysqli_close($connect);
      ?>
  </body>
</html>
