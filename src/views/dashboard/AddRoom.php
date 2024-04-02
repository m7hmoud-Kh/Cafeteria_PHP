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

<h1 class="text-primary">Add Room</h1>
<div style="width:100%; " class="min-vh-100   col-6 d-flex  justify-content-center align-items-center" >
<form method="post" class="col-lg-6 " action="../../controller/dashboard/Room.php" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="exampleInputName">Room name</label>
      <input type="text" class="form-control" id="username" aria-describedby="nameHelp" name="name" >
      <small class="text-danger" ><?php if(isset($error['$name'])){
        echo $error['$name'];
      } ?></small>
    </div>
    <button type="submit " class="btn btn-primary my-sm-2 ">Save</button>
      <input class="col-lg2 text-light p-1 my-sm-2 bg-danger rounded-1 border-0 " type="reset">
    
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>