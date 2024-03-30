
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<?php
require ("../../model/UserModel.php");
$users=new User;
$id=$_GET['id'];
$data=$users->get_user($id);

?>

          <h1 class="text-primary">Update User</h1>

<div style="width:100%; " class="min-vh-100   col-6 d-flex  justify-content-center align-items-center" >
  <form method="post" class="col-lg-6 " action="../../views/dashboard/UpdateUser.php" enctype="multipart/form-data">
    <div class="form-group ">
    <input type="hidden" id="fname" value="<?php echo $data['id']?>" name="id"><br><br>
      <label for="exampleInputName">Name</label>
      <input type="text" class="form-control" id="username" value="<?php echo $data['username']?>" aria-describedby="nameHelp" name="username" >
      <small class="text-danger" ><?php if(isset($error['$username'])){
        echo $error['$username'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputEmail">Email</label>
      <input type="email" value="<?php echo $data['email']?>" class="form-control" id="exampleInputEmail" name="email" >
      <small class="text-danger" ><?php if(isset($error['$email'])){
        echo $error['$email'];
      } ?></small>
      <small class="text-danger" ><?php if(isset($error['$existEmail'])){
        echo $error['$existEmail'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" value="<?php echo $data['password']?>" class="form-control" id="exampleInputPassword1" name="password" >
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
      <input type="text" class="form-control" "  id="exampleInputRomeNumber" name="name" >
      <small class="text-danger" ><?php if(isset($error['$name'])){
        echo $error['$name'];
      } ?></small>
    </div>
    <div>
    <label for="photo">Choose a photo:</label>
    <?php if(isset($error['$image'])){
        echo $error['$image'];
      } ?>
    <input type="file" id="photo" value="<?php echo $data['image']?>" name="image" accept="image/*">
    </div>
      <button type="submit " class="btn btn-primary my-sm-2 ">Save</button>

      <input class="col-lg2 text-light p-1 my-sm-2 bg-danger rounded-1 border-0 " type="reset">
    
  </form>

</div>

      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
