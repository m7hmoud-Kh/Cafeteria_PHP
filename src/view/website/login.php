<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container border border-primary col-6">
<form action="../../controller/website/UserController.php" method="POST">
    <input type="text"  name="email" placeholder="enter your email" class="form-control mb-3 "/>
    <input type="text" name="password" placeholder="enter your password" class="form-control mb-3 "/>
    <input type="submit" value="Login" class="btn btn-primary">
    
    
</form>
<?php 
if(isset($_GET['error']))
{
    echo "<span class='text-danger'> Password or email incorrect </span>";  
}
?>
<a href="" class="text-primary">forget password?</a>
<!-- <a type="button" href= class="btn btn-primary">Forget Password</a> -->
<div>
    
</div>
</div>