<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
 ?>
<form action="updateMDP.php" method="POST">
  <div class="form-group">
    <label for="inputMDP" class="form-label">Nouveau mot de passe</label>
    <input class="form-control" type="password" id="inputMDP" name="inputMDP">
  </div>
  <div class="form-group">
      <label for="inputRMDP" class="form-label">Répéter le mot de passe</label>
      <input class="form-control"  type="password" id="inputRMDP" name="inputRMDP">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>    
</form>