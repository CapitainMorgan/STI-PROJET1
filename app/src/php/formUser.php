<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
$db = new DB();
if(!empty($_GET['id']) && $_SESSION['role'] == 1)
{
  $user = $db->getUserById($_GET['id']);
}
if(empty($_GET['id']) || count($user) == 1)
{
  if(!empty($_GET['id']))
    $user = $user[0];
?>

<form <?php if(empty($_GET['id'])) echo 'action="?page=createUser"'; else echo 'action="?page=updateUser&id='.htmlspecialchars($_GET['id']).'"'?> method="POST">
<div class="form-group">
    <label for="inputNom" class="col-sm-2 col-form-label">Nom</label>
    <input class="form-control" id="inputNom" name="inputNom" <?php if(!empty($_GET['id'])) echo 'readonly value ="'.htmlspecialchars($user['Nom']).'"'; ?> required>
  </div>
  <div class="form-group">
    <label for="inputPrenom" class="col-sm-2 col-form-label">Prénom</label>
    <input class="form-control" id="inputPrenom" name="inputPrenom" <?php if(!empty($_GET['id'])) echo 'readonly value ="'.htmlspecialchars($user['Prenom']).'"'?> required>
  </div>
  <div class="form-group">
    <label for="inputNomUtilisateur" class="form-label">Nom utilisateur</label>
    <input class="form-control" id="inputNomUtilisateur" name="inputNomUtilisateur" <?php if(!empty($_GET['id'])) echo 'readonly value ="'.htmlspecialchars($user['NomUtilisateur']).'"'?> required>
  </div>
  <div class="form-group">
    <label for="inputMDP" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="inputMDP" name="inputMDP" required>
  </div>
  <div class="form-group">
    <label for="staticActif" class="form-label">Actif</label>
 
    <select class="form-control" id="staticActif" name="staticActif" required>
      <option value="1" <?php if(!empty($_GET['id']) && $user['Actif'] != 0) echo 'selected'?>>Actif</option>
      <option value="0" <?php if(!empty($_GET['id']) && $user['Actif'] == 0) echo 'selected'?>>Pas actif</option>     
    </select>
  </div>

   <div class="form-group">
    <label for="staticRole" class="col-sm-2 col-form-label">Role</label>
 
    <select class="form-control" id="staticRole" name="staticRole" required>
      <option value="0" <?php if(!empty($_GET['id']) && $user['Role'] == 0) echo 'selected'?>>Collaborateur</option>
      <option value="1" <?php if(!empty($_GET['id']) && $user['Role'] == 1) echo 'selected'?>>Administrateur</option>     
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>    
</form>
<?php
}else{
  header("Location:index.php?page=404");
}
?>