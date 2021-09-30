<?php
/**
 * 
 * Created by PhpStorm.
 * User: 
 * Date: 
 */
?>
<h1>Envoyer un message</h1>
<div class="mb-3 row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10 <?php echo 'hidden'; ?>">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
    </div>
    <div class="col-sm-10 <?php ?>">
      <input type="text" class="form-control" id="staticEmail">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputSujet" class="col-sm-2 col-form-label">Sujet</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputSujet">
    </div>
    <div class="mb-3">
        <label for="textareaMessage" class="form-label">Message</label>
        <textarea class="form-control" id="textareaMessage" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary mb-3">Envoyer</button>
    </div>
  </div>