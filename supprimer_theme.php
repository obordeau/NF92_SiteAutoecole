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

        $idtheme = $_POST['menuChoixTheme'];
        //echo "<br> idtheme : $idtheme";

        $query = "UPDATE themes SET supprime=1 WHERE idtheme=$idtheme";
        //echo $query;
        $result = mysqli_query($connect,$query);
        if (!$result) {
          echo "Erreur".mysqli_error($connect);
          exit;
        } else {
          echo "Le thème a bien été supprimé.";
        }

        mysqli_close($connect);
      ?>
  </body>
</html>
