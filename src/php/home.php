<?php
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
            <tr onclick=\"window.location='index.php?page=message&id=".$message['IdMsg']."'\">                
                    <td>".$message['DateReception']."</td>                    
                    <td>".$message['Nom']." ".$message['Prenom']."</td>
                    <td>".$message['Sujet']."</td>
                    <td class=\"text-center\"><a class='btn btn-info btn-xs' href=\"?page=sendMessage&id=".$message['IdMsg']."\"><span class=\"glyphicon glyphicon-edit\"></span> Répondre</a> <a href=\"?page=delMessage&id=".$message['IdMsg']."\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span> Supprimer</a></td>
                </a>
            </tr>               
            ";

 
        }?>
        
    </table>
</div>