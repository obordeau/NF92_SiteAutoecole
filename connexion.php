<?php
$dbhost = 'tuxa.sme.utc';
$dbuser = 'nf92p077';
// remplacer les SXXX avec le semestre et le numero de votre compte
// exemples nf92p014 ou nf92a078
$dbpass = 'KqBNh5zo';
// remplacer  votremotdepasse par votre mot de passe
$dbname = 'nf92p077';
// remplacer les SXXX comme indiqué ci-desus
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
mysqli_set_charset($connect, 'utf8'); //les données envoyées vers mysql sont encodées en UTF-8
?>
