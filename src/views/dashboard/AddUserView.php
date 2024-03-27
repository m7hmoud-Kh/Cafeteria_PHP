
<?php
$error=[];
if(isset($_GET['error'])){
  $error=json_decode($_GET['error'],true);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


    <div class="container">
      <div class="row">
        <div>

          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                  </li>
                </ul>
                
              </div>
            </nav>
          </div>
          
          <h1 class="text-primary">Add User</h1>

        <div style="width:100%; " class="min-vh-100   col-6 d-flex  justify-content-center align-items-center" >
  <form method="post" class="col-lg-6 " action="../../controller/dashboard/UserControlar.php" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="exampleInputName">Name</label>
      <input type="text" class="form-control" id="username" aria-describedby="nameHelp" name="username" >
      <small class="text-danger" ><?php if(isset($error['$username'])){
        echo $error['$username'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputEmail">Email</label>
      <input type="email" class="form-control" id="exampleInputEmail" name="email" >
      <small class="text-danger" ><?php if(isset($error['$email'])){
        echo $error['$email'];
      } ?></small>
      <small class="text-danger" ><?php if(isset($error['$existEmail'])){
        echo $error['$existEmail'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" >
    </div>
    <div class="">
      <label for="exampleInputPassword1">Confirm Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" >
      <small class="text-danger" ><?php if(isset($error['$password'])){
        echo $error['$password'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputRomeNumber">Rome Number</label>
      <input type="text" class="form-control" id="exampleInputRomeNumber" name="name" >
      <small class="text-danger" ><?php if(isset($error['$name'])){
        echo $error['$name'];
      } ?></small>
    </div>
    <div>
    <label for="photo">Choose a photo:</label>
    <?php if(isset($error['$image'])){
        echo $error['$image'];
      } ?>
    <input type="file" id="photo" name="image" accept="image/*">
    </div>
      <button type="submit " class="btn btn-primary my-sm-2 ">Save</button>

      <input class="col-lg2 text-light p-1 my-sm-2 bg-danger rounded-1 border-0 " type="reset">
    
  </form>
</div>
</div>
  </div>
        
        
      </div>

      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
