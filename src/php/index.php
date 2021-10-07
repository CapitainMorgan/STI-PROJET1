<?php
/**
 */
session_start();
?>
<!doctype html>
<html lang="fr" onkeydown="pressKey(event)" >
<head>
    <title>STI - Projet1</title>
    <link href="../../resources/css/common.css" rel="Stylesheet" type="text/css">
    <link href="../../resources/css/connexion.css" rel="Stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        </div>
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
