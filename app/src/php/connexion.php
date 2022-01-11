<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Login Form -->
    <form action="validation.php" method="post">

      <input type="text" id="username" class="fadeIn second" name="username" placeholder="Nom utilisateur" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
        <input type="submit" class="fadeIn fourth" name="login" value="Log In">
        <input type="hidden" name="recaptcha_response" value="" id="recaptchaResponse">

    </form>

  </div>
    <script>
        grecaptcha.ready(function(){
            grecaptcha.execute('6LepLPkdAAAAAPxabk3uO1p9b_HptCAJNmbU0Okr', { action:'submit'}).then(function (token){
                var recaptchaResponse=document.getElementById('recaptchaResponse');
                recaptchaResponse.value=token;
            })
        })
    </script>
</div>

