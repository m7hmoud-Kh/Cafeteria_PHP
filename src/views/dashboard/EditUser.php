
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
require ("../../model/User.php");
require("../../model/Connection.php");
require("../../model/Room.php");
$id=$_GET['id'];
  $data=new Room;
  $rooms=$data->getAllRooms();
$error=[];
if(isset($_GET['error'])){
  $error=json_decode($_GET['error'],true);
}
$users=new User;

$data=$users->get_user($id);
?>

          <h1 class="text-primary">Update User</h1>

<div style="width:100%; " class="min-vh-100   col-6 d-flex  justify-content-center align-items-center" >
  <form method="post" class="col-lg-6 " action="../../views/dashboard/UpdateUser.php" enctype="multipart/form-data">
    <div class="form-group ">
      
    <input type="hidden" id="fname" value="<?php echo $id?>" name="id"><br><br>
      <label for="exampleInputName">Name</label>
      <input type="text" class="form-control" id="username" value="<?php echo $data['username']?>" aria-describedby="nameHelp" name="username" required>
      <small class="text-danger" ><?php if(isset($error['$username'])){
        echo $error['$username'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputEmail">Email</label>
      <input type="email" value="<?php echo $data['email']?>" class="form-control" id="exampleInputEmail" name="email" required>
      <small class="text-danger" ><?php if(isset($error['$email'])){
        echo $error['$email'];
      } ?></small>
      <small class="text-danger" ><?php if(isset($error['$existEmail'])){
        echo $error['$existEmail'];
      } ?></small>
    </div>
    <div class="">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" value="<?php echo $data['password']?>" class="form-control" id="exampleInputPassword1" name="password" required>
    </div>
    <div class="">
      <label for="exampleInputPassword1">Confirm Password</label required>
      <input value="<?php echo $data['password']?>" type="password" class="form-control" id="exampleInputPassword1" name="password" >
      <small class="text-danger" ><?php if(isset($error['$password'])){
        echo $error['$password'];
      } ?></small>
    </div>

    <select name="room_id" class="form-control custom-select js-example-multiple" id="room" required>
      <?php
        foreach($rooms as $room){?>
        <option value="<?php  echo $room['id'];?>"><?php echo $room['name'];?></option>
        <?php }?>
      </select> 
    <div>

      <button   name="updateUser" type="submit " class="btn btn-primary my-sm-2 ">Update</button>

      <input  class="col-lg2 text-light p-1 my-sm-2 bg-danger rounded-1 border-0 " type="reset">
      
  </form>
  <!-- value="<?php echo $data['image']?>"  -->
</div>

      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
