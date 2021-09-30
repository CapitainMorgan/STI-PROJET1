<?php
/**
 */
session_start();
?>
<!doctype html>
<html lang="fr" onkeydown="pressKey(event)" >
<head>
    <title>STI - Projet1</title>
    <link href="../../resources/css/default.css" rel="Stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="?">STI - Projet1 <?php if((isset($_SESSION['typeCompte']) && $_SESSION['typeCompte'] == "moderateur") || (isset($_GET['typeConnexion']) && $_GET['typeConnexion'] == "mod")) echo 'Moderateur' ?></a>
    </nav>
    <section>
        <?php
        if(isset($_GET['page'])) {
            if(file_exists($_GET['page'] . '.php')) {
                include $_GET['page'] . '.php';
            }else{
                include "404.php";
            }
        }else{
            if(isset($_SESSION['pseudo']))
                include "accueil.php";
            else
                include "connexion.php";
        }
        ?>
    </section>
    <footer  class="fixed-bottom">
        <div class="container-fluid">
            <p class="text-center">Godi - Issolah</p>
        </div>
    </footer>

</body>
</html>
