<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
?>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Login Form -->
    <form action="validation.php" method="post">

      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Nom utilisateur" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
        <div class="g-recaptcha" style="padding-left: 70px" data-sitekey="<?php echo'6Ldl6OwdAAAAADbhthvzsiiOmnflItytfLJUzugC';?>"></div>
        <input type="submit" class="fadeIn fourth" name="login" value="Log In">


    </form>

  </div>
</div>
