<?php
	require_once __DIR__ . '/../_inc/header.php';		
	require_once __DIR__ . '/../_inc/nav.php';
?>
  <div class="container pt-5">
    <h1 class="mb-4 pt-5 ps-5">Vous voulez nous contacter ?</h1>
    <small class="mb-4 ps-5">Veuillez remplir le formulaire ci-dessous</small>
    <form class="m-5">
        <!-- Name input -->
        <div class="form-outline mb-4 ">
            <label class="form-label" for="form4Example1">Nom</label>
          <input type="text" id="form4Example1" class="form-control" required/>
        </div>
      
        <!-- Email input -->
        <div class="form-outline mb-4 ">
            <label class="form-label" for="form4Example2">Adresse email</label>
          <input type="email" id="form4Example2" class="form-control" required/>
        </div>
      
        <!-- Message input -->
        <div class="form-outline mb-4 ">
            <label class="form-label" for="form4Example3">Message</label>
          <textarea class="form-control" id="form4Example3" rows="4"required></textarea>
        </div>
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-success btn-block mb-4">Envoyer</button>
    </form>
  </div>

    <div class="text-center">
    <small>Vous pouvez aussi nous contactez sur nos réseaux sociaux.</small><br>
        <button type="button" class="btn btn-success btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>
    
        <button type="button" class="btn btn-success btn-floating mx-1">
          <i class="fab fa-instagram"></i>
        </button>
    
        <button type="button" class="btn btn-success btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>
    </div>


<?php
	require_once __DIR__ . '/../_inc/footer.php';		
?>
