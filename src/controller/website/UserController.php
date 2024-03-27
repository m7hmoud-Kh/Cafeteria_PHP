<?php
require '../../model/User.php';
class UserController 
{
    private $flag;
    private $userModel;
    function __construct()
    {
        $this->userModel=new User;

    }
    function login($email,$pass)
    {
        //var_dump($email);
         $this->flag=$this->userModel->getUserData($email);
        // var_dump($this->flag);
        $HashedPass=$this->flag['password'];
         if($this->flag && password_verify($pass,$HashedPass))
         {
                // check pass
             //echo $this->flag['password'];
                 echo "welcome ".$this->flag['username'];
                 // render to list product page on mostafa code 

            
         }
         else
         {
             header("Location:../../view/website/login.php?error=1");
         }
    }   
    function forget($email)
    {
        
        $this->flag=$this->userModel->getUserData($email);
        if($this->flag)
         {
                //send email
                $receiver = $email;
                $subject = " Password Reset Request";
                $body = "You recently requested to reset your password for Cafeteria WebSite.";
                $sender = "From:sonbaty1937@gmail.com";
            if(mail($receiver, $subject, $body, $sender)){
            echo "Email sent successfully to $receiver";
            }else{
            echo "Sorry, failed while sending mail!";
            }  
         }
         else
         {
           //  header("Location:../../view/website/login.php?error=1");
         }
    } 
}
$userControler=new UserController;
if(isset($_POST['email']))
{
    $userControler->login($_POST['email'],$_POST['password']);
}
else if(isset($_POST['sendmail']))
{
    $userControler->forget($_POST['sendmail']);

}
?>