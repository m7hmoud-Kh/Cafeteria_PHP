<?php 
$errors=[];
if(isset($_GET['errors']))
{
    $errors=json_decode($_GET['errors'],true);
}


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container border border-primary col-6">
<form action="../../controller/website/UserController.php" method="POST">
    <input type="text"  name="email" placeholder="enter your email" class="form-control mb-3 "/>
    <?php 
        if(isset($errors['email']))
        {
            echo "<span style='color:red'>". $errors['email'] ."</span>";
        }
    ?>
    <input type="text" name="password" placeholder="enter your password" class="form-control mb-3 "/>
    <?php
    if(isset($errors['password']))
        {
            echo "<span style='color:red'>". $errors['password'] ."</span>";
        }
    ?>
    <input type="submit" value="Login" name="login" class="btn btn-primary">
    
    
</form>

<a href="forget.php" class="text-primary">forget password?</a>
<!-- <a type="button" href= class="btn btn-primary">Forget Password</a> -->
<div>
<?php
if(isset($_GET['error']))
{
    echo "<span style='color:red'> Password or email incorrect </span>";  
}
?>
</div>
</div>