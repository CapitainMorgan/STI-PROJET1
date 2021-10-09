<?php
/**
 * 
 * Created by PhpStorm.
 * User: 
 * Date: 
 */
include 'classes/DB.php';
$db = new DB();
if(empty($_GET['id']))
{
  $allUser = $db->getAllUserName();
}else{
  $allUser = $db->getMessageById($_GET['id']);
}

?>
<h1>Envoyer un message</h1>
<form action="insertMessage.php?id=<?php echo $_GET['id']?>" method="POST">
<div class="mb-3 row">
    <label for="staticDest" class="col-sm-2 col-form-label">Destinataire</label>
    <div class="col-sm-10">
    <select class="form-control" id="selectDest">
      <?php
        if(count($allUser) < 1)
        {
            echo '<option>Il n\'y a que vous sur l\'application ;(</option>';
        }else{          
          foreach ($allUser as $user){
            echo '<option value="'.$user['idUser'].'">'
            .$user['Nom'].' '.$user['Prenom'].
            '</option>';
          }            
        }      
      ?>
      
    </select>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputSujet" class="col-sm-2 col-form-label">Sujet</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSujet">
    </div>
    <div class="mb-3 row">
        <label for="textareaMessage" class="form-label">Message</label>
        <textarea class="form-control" id="textareaMessage" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" value="Submit" class="btn btn-primary mb-3">Envoyer</button>
    </div>
  </div>
</form>