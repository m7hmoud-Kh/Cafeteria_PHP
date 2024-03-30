<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<div class="container border border-primary col-6 h-5">
<div style="color:aqua">we sent code for your email confirm it</div>
<form action="../../controller/website/UserController.php" method="POST">
    <input type="text"  name="code" placeholder="enter code" class="form-control mb-3 "/>
    <input type="submit" value="confirm" name="confirm" class="btn btn-primary">
    
    
</form>
<?php 
if(isset($_GET['error']))
{

   echo "<sapn style='color:red'>wrong code</span>";
    

}
?>
</div>