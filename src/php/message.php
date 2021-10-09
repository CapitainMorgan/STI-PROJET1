<?php

include 'classes/DB.php';
$db = new DB();
$message = $db->getMessageById($_GET['id']);

echo "
<h4>Date de réception</h4>
<p>".$message[0]['DateReception']."</p>     
<h4>Expéditeur</h4>     
<p>".$message[0]['Nom']." ".$message[0]['Prenom']."</p>
<h4>Sujet</h4>
<p>".$message[0]['Sujet']."</p>
<h4>Contenu</h4>
<p>".$message[0]['Contenu']."</p>
";
?>