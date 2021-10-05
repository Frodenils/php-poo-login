<?php

include('conf.php');

    $bdd = mysqli_connect(DBHOST,DBUSER,DBPSWD,DBNAME);

if (mysqli_connect_errno()){
    $_SESSION['error'] = 'Erreur de co a la BDD: ' . mysqli_connect_error();
    exit();
}
else {
    $_SESSION['Message'] = 'Connexion OK !';
}
?>