<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
$db = new DB();
$user = $db->getUserById($_SESSION['id'])[0];

?>
<h3>Nom utilisateur</h3>
<p><?php echo $user['NomUtilisateur']?></p>

<h3>Nom</h3>
<p><?php echo $user['Nom']?></p>

<h3>Prénom</h3>
<p><?php echo $user['Prenom']?></p>

<a class="btn btn-primary" href="?page=changeMDP">Modifier mon mot de passe</a>