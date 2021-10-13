<?php
/**
 * 
 * Created by PhpStorm.
 * User: 
 * Date: 
 */

include 'classes/DB.php';

$db = new DB();

$users = $db->getAllUser();

?>
<a class='btn btn-info btn-xs' href="?page=formUser"><span class="glyphicon glyphicon-edit"></span> Créer un nouvelle utilisateur</a>
<table class="table custab">
    <thead>
        <tr>
            <th>Id</th>            
            <th>Nom</th>
            <th>Prenom</th>
            <th>Nom utilisateur</th>
            <th>Mot de passe</th>
            <th>Actif</th>
            <th>Role</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <?php foreach($users as $user){
            if($user['Actif'] != 0)
            $user['Actif'] = 'Actif';
            else
            $user['Actif'] = 'Pas actif';

            if($user['Role'] == 0)
            $user['Role'] = 'Collaborateur';
            if($user['Role'] == 1)
            $user['Role'] = 'Administateur';
            
            echo "                    
            <tr>                
                <td>".$user['IdUser']."</td>                    
                <td>".$user['Nom']."</td>
                <td>".$user['Prenom']."</td>
                <td>".$user['NomUtilisateur']."</td>
                <td>".$user['MotDePasse']."</td>
                <td>".$user['Actif']."</td>
                <td>".$user['Role']."</td>
                <td class=\"text-center\"><a class='btn btn-info btn-xs' href=\"?page=formUser&id=".$user['IdUser']."\"><span class=\"glyphicon glyphicon-edit\"></span> Modifier</a> <a href=\"?page=delUser&id=".$user['IdUser']."\" class=\"btn btn-danger btn-xs\"><span class=\"glyphicon glyphicon-remove\"></span> Supprimer</a></td>
                </a></td>
            </tr>               
            ";

 
        }?>
        
    </table>