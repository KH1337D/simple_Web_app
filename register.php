<?php include 'inc/header.php' ; ?>
<?php include 'inc/navbar.php' ; ?>

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto my-5">
        <h2 class="border p-2 text-center">register</h2>
             <?php 
                    if(isset($_SESSION['errors'])):
                         foreach($_SESSION['errors'] as $error):?>
                         <div class="alert alert-danger text-center">
                         <?php echo $error ;?>
                         </div>
               <?php
               
                         endforeach;
                         unset($_SESSION['errors']);
                    endif;
                    
          ?>
            <form class="border p-3" action="handelers/handelregister.php" method="POST">
              <div class="form-group p-2 my-1">
                   <label for="name">name</label>
                   <input type="text" name="name" class="form-control" id="name">

              </div>
              <div class="form-group p-2 my-1">
                   <label for="email">email</label>
                   <input type="email" name="email" class="form-control" id="email">

              </div>
              <div class="form-group p-2 my-1">
                   <label for="password">password</label>
                   <input type="password" name="password" class="form-control" id="password">

              </div>
              <div class="form-group p-2 my-1">
                   <input type="submit" value="register" class="form-control">

              </div>

            </form>
    <?php include 'inc/footer.php' ; ?>