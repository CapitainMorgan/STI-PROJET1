<?php
/**
 */
session_start();
?>
<!doctype html>
<html lang="fr" onkeydown="pressKey(event)" >
<head>
    <title>StudiJob</title>
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
            <a class="navbar-brand" href="?">StudiJob <?php if((isset($_SESSION['typeCompte']) && $_SESSION['typeCompte'] == "moderateur") || (isset($_GET['typeConnexion']) && $_GET['typeConnexion'] == "mod")) echo 'Moderateur' ?></a>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 right">
                    <li class="nav-item dropdown  ">
                        <?php
                        /*if(isset($_SESSION['pseudo']) && isset($_SESSION['typeCompte'])) {
                            echo '<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . $_SESSION['pseudo'] . '</a>';
                            if ($_SESSION['typeCompte'] == "etudiant")
                                echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="?page=monCompte">Mon compte</a></li>
                                    <li><a class="dropdown-item" href="?page=accueil">Offre d\'emploi</a></li>
                                    <li><a class="dropdown-item" href="?page=listePostulation">Mes postulations</a></li>
                                    <li><a class="dropdown-item" href="?page=messagerie">Messageries</a></li>
                                    <li><a class="dropdown-item" href="?page=deconnexion">Se déconnecter</a></li>
                                </ul>';
                            elseif ($_SESSION['typeCompte'] == "employeur")
                                echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="?page=monCompte">Mon compte</a></li>
                                    <li><a class="dropdown-item" href="?page=accueil">Postulations</a></li>
                                    <li><a class="dropdown-item" href="?page=listeOffreEmploi">Mes offres d\'emploi</a></li>
                                    <li><a class="dropdown-item" href="?page=offreEmploiFrom">Créer une nouvelle offre</a></li>
                                    <li><a class="dropdown-item" href="?page=messagerie">Messageries</a></li>
                                    <li><a class="dropdown-item" href="?page=deconnexion">Se déconnecter</a></li>
                                </ul>';
                            elseif ($_SESSION['typeCompte'] == "moderateur")
                                echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="?page=monCompte">Mon compte</a></li>
                                    <li><a class="dropdown-item" href="?page=accueil">Offre d\'emploi</a></li>
                                    <li><a class="dropdown-item" href="?page=signalement">Signalements</a></li>
                                    <li><a class="dropdown-item" href="?page=tag">Tags</a></li>
                                    <li><a class="dropdown-item" href="?page=deconnexion">Se déconnecter</a></li>
                                </ul>';
                        }*/
                        ?>
                    </li>
                </ul>
            </div>
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
            <p class="text-center">&copy StudiJob</p>
        </div>
    </footer>

</body>
</html>
