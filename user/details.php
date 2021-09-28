<?php
session_start();
require_once("manager/UserManager.php");
require_once("entity/User.php");
require_once("../conf.php");

try {

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Afficher un type de livre</title>
</head>
<body>
    
<main class="container">
    <div class="row">
        <section class="col-12">
        <h1>Détails du type de livre <?php print($label); ?></h1>
        <p>ID : <span class="badge bg-secondary"> <?php print($id); ?></span></p>
        <p>Libellé :  <span class="badge bg-secondary"><?php print($label); ?></span></p>
        <p>
        <a class="btn btn-primary" href='edit.php?id=<?php print($id); ?>'>Modifier</a><br><br>
        <a class="btn btn-secondary" href='index.php'>Retour à la liste</a><br>
        </p>
        </section>
    </div>
</main>

</body>
</html>