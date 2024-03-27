
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
$result=$users->get_user($id);
$data=$result->fetch(PDO::FETCH_ASSOC);

?>
<form method="post" class="col-lg-6 " action="../../views/dashboard/UpdateUser.php" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="exampleInputName">Name</label>
      <input type="text" value="<?php echo $data['username']?>" class="form-control" id="username" aria-describedby="nameHelp" name="username" >
    </div>
    <input type="hidden" id="fname" value="<?php echo $data['id']?>" name="id"><br><br>

    <div class="">
      <label for="exampleInputEmail">Email</label>
      <input type="email" value="<?php echo $data['email']?>" class="form-control" id="exampleInputEmail" name="email" >
     
    </div>
    <div class="">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" value="<?php echo $data['password']?>" class="form-control" id="exampleInputPassword1" name="password" >
    </div>
    <div class="">
     
    </div>
    
    </div>
   
      <button type="submit " class="btn btn-primary my-sm-2 ">Update</button>

      <input class="col-lg2 text-light p-1 my-sm-2 bg-danger rounded-1 border-0 " type="reset">
    
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
