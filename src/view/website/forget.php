<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container border border-primary col-6 h-5">
<form action="../../controller/website/UserController.php" method="POST">
    <input type="text"  name="email" placeholder="enter your email " class="form-control mb-3 "/>
   
    <input type="submit" value="forget" name="forget" class="btn btn-primary">
    
    
</form>
<?php 
if(isset($_GET['error']))
{
    if($_GET['error']=="1")
   echo "<sapn class='alert alert-danger'>email required</span>";
    else
   echo "<sapn class='alert alert-danger'>email invalid</span>";

}
?>
</div>