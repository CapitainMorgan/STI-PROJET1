<?php

/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
$db = new DB();
$messages = $db->getAllMessageToUser($_SESSION['id']);


?>
<h3 class="page-title">Liste des messages reçus</h3>
<div class="container">
<a class='btn btn-info btn-xs' href="?page=sendMessage"><span class="glyphicon glyphicon-edit"></span> Envoyer un message</a>
    <table class="table custab">
    <thead>
        <tr>
            <th>Date de réception</th>            
            <th>Expéditeur</th>
            <th>Sujet</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
        <?php foreach($messages as $message){
            echo "                    
            <tr onclick=\"window.location='index.php?page=message&id=".htmlspecialchars($message['IdMsg'])."'\">                
                    <td>".htmlspecialchars($message['DateReception'])."</td>                    
                    <td>".htmlspecialchars($message['Nom'])." ".htmlspecialchars($message['Prenom'])."</td>
                    <td>".htmlspecialchars($message['Sujet'])."</td>
                    <td class=\"text-center\"><a class='btn btn-info btn-xs' href=\"?page=sendMessage&id=".htmlspecialchars($message['IdMsg'])."\"><span class=\"glyphicon glyphicon-edit\"></span> Répondre</a> <a href=\"?page=delMessage&id=".htmlspecialchars($message['IdMsg'])."\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span> Supprimer</a></td>
                </a>
            </tr>               
            ";

 
        }?>
        
    </table>
</div>