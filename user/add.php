<?php
    session_start();

    if ((isset($_POST['label'])) && (!empty($_POST['label'])))
    {
        $_SESSION['message'] = ' not empty-Nouveau type de livre : "' . $_POST['label'] . '"';

        include_once 'connect.php';

        try
        {
            $label = strip_tags($_POST['label']);
            $sql = "INSERT INTO type_livre (libelle) VALUES(?);";
            $stmt = mysqli_prepare($db, $sql);

            mysqli_stmt_bind_param($stmt, 's', $label);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }

        catch (Exception $e)
        {
            $_SESSION['erreur'] = "Une erreur est intervenue : " . $e->getMessage();
        }

        $_SESSION['message'] = 'Le type de livre "' . $label . '" a été enregistré';

        include_once 'close.php';

        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">     
        
        <title>Ajouter un type de Livre</title>
    </head>

    <body>
        <main class="container">
            <div class="row">
                <section class="col-12">
                    <?php
                        if (!empty($_SESSION['erreur']))
                        {
                            print('<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>');

                            $_SESSION['erreur'] = "";
                        }

                        if (!empty($_SESSION['message']))
                        {
                            print('<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>');

                            $_SESSION['messgae'] = "";
                        }
                    ?>

                    <h1>Ajouter un type de Livre</h1>

                    <form method="POST">
                        <div class="mb-3">
                            <label>Libéllé</label>

                            <input type ="text" id="label" name="label" class="form-control">
                        </div>
                            <button class="btn btn-primary">Enregistrer</button>

                            <a class ="btn btn-info"href="index.php">Retour à la liste</a>
                    </form>
                </session>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>