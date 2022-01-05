<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
$db = new DB();
$message = $db->getMessageById($_GET['id']);

echo "
<h4>Date de réception</h4>
<p>".htmlspecialchars($message[0]['DateReception'])."</p>     
<h4>Expéditeur</h4>     
<p>".htmlspecialchars($message[0]['Nom'])." ".htmlspecialchars($message[0]['Prenom'])."</p>
<h4>Sujet</h4>
<p>".htmlspecialchars($message[0]['Sujet'])."</p>
<h4>Contenu</h4>
<p>".htmlspecialchars($message[0]['Contenu'])."</p>
";
?>