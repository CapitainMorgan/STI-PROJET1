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
  $allUser = $db->getAllUserNameWithoutCurrentUser($_SESSION['id']);
}else{
  $allUser = $db->getMessageById($_GET['id']);
}

?>
<h1>Envoyer un message</h1>
<form action="insertMessage.php<?php if(!empty($_GET['id'])) echo '?id='.$_GET['id']?>" method="POST">
  <div class="form-group">
    <label for="staticDest" class="col-sm-2 col-form-label">Destinataire</label>
 
    <select class="form-control" id="selectDest" name="selectDest" required>
      <?php
        if(count($allUser) < 1)
        {
            echo '<option>Il n\'y a que vous sur l\'application ;(</option>';
        }else{          
          foreach ($allUser as $user){
            echo '<option value="'.$user['IdUser'].'">'
            .$user['Nom'].' '.$user['Prenom'].
            '</option>';
          }            
        }      
      ?>      
    </select>
  </div>
  <div class="form-group">
    <label for="inputSujet" class="col-sm-2 col-form-label">Sujet</label>
    <input class="form-control" id="inputSujet" name="inputSujet">
  </div>
  <div class="form-group">
      <label for="textareaMessage" class="form-label">Message</label>
      <textarea class="form-control" id="textareaMessage" name="textareaMessage" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" <?php if(count($allUser) < 1) echo 'disabled' ?>>Envoyer</button>    
</form>