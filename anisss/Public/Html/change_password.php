<?php

require_once "../../core/autoload.php";
session_start();
if(!isset($_SESSION['Valid'])){
    header('location:login.php');
}
$error=0;
if(isset($_POST['new']))
{
    if(!isset($_POST['email']) || $_POST['email']=="")
    {
           $e_email="required!";
           $error=1;
    }else if(filter_var($_POST['email'],FILTER_VALIDATE_INT) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        $e_email="Enter a correct Email!";
        $error=1;
    }else{
        $email=clear($_POST['email']);
    }    

    if(!isset($_POST['password']) || $_POST['password']=="")
    {
        $e_password="required!";
        $error=1;
    }else if(strlen($_POST['password']) <8 )
    {
        $e_password="password must consist at least 8 caracters!";
        $error=1;
    }else
    {
        $password=clear($_POST['password']);
    }


    
    if(!isset($_POST['confirm_password']) || $_POST['confirm_password']=="")
    {
        $ec_password="required!";
        $error=1;
    }else if(strlen($_POST['confirm_password']) <8 )
    {
        $ec_password="password must consist at least 8 caracters!";
        $error=1;
    }else{
        $confirm_password=clear($_POST['confirm_password']);


    }   


    if(!isset($_POST['password_token']) || $_POST['password_token']=="")
    {
        $error=1;
    }else{
        $password_token=clear($_POST['password_token']);


    }   
 if($error==0)
 {

     if(!empty($password_token) )
     {
       
         if(!empty($email) && !empty($password) && !empty($confirm_password) )
         {
              $check_token=mysqli_query($conn,"SELECT `code_verif` FROM `users` WHERE code_verif='$password_token' LIMIT 1");
              if(mysqli_num_rows($check_token) > 0)
              {
                      if($password==$confirm_password)
                      {
                            $hash=password_hash($password,PASSWORD_DEFAULT);
                            $update_password=mysqli_query($conn,"UPDATE users SET password='$hash' WHERE code_verif='$password_token' LIMIT 1");
 
                            if($update_password)
                            {
                             $upd_token=md5(rand());
                             $_SESSION['creat']="passowrd updated succssecfully";
                             $updat=mysqli_query($conn,"UPDATE users SET code_verif='$upd_token' WHERE code_verif='$password_token' LIMIT 1");
                             header('location:login.php');
                             die;
 
                            }else
                            {
                             $_SESSION['creat']="didn't update password,sommething went wrong";
                             header("location:change_password.php?token=$password_token&email=$email");
                             die;
                            }
 
 
                      }else
                      {
                         $_SESSION['creat']="password does not match";
                         header("location:change_password.php?token=$password_token&email=$email");
                         die;
                         
                      }
                      
              }else
              {
                 $_SESSION['creat']="Link Expired";
                 header('location:change_password.php');
                 die;
              }
 
         }else
         {
             $_SESSION['creat']="Enter your information !";
             header('location:change_password.php');
             die;
         }
 
     }else
     {
         $_SESSION['creat']="No Email Received";
         header('location:change_password.php');
         die;
     }
 
 

 } 



     


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        body{
    background: linear-gradient(to left, #A5CC82, #00467F);
}



*{
    margin:0;
    padding:0;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    
}
label{
    color:white;
}
.login_box{
   display: flex;
   justify-content:center;
   align-items: flex-start;
   position: relative;
    margin: 140px auto;
    width: 490px;
    height: 480px;
    background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 1px 20px 1px;
    transition: all .2s;


}
input[type="email"],[type="password"]{
    padding:12px;
     width:320px;
     border-radius: 6px;
     border: none;
   
     outline: none;

}
input[type="submit"]
{
    padding:12px;
     width:320px;
     border-radius: 6px;
     background-color: #4CAF50;
     margin-left: 12px;
     cursor: pointer;
     border: none;
transition: 0.6s;
     outline: none;
     font-size:large;
     color: white;
}
input[type="submit"]:hover {
	background-color: #266328;
}
.ok{
    background-color: rgb(148, 179, 101);
     color: #ffffff;
   text-align: center;
    padding: 10px;
   
}

</style>

<?php if(isset($_SESSION['creat']) && $_SESSION['creat']!=""): ?>

<div class="ok">

  <?php
    
    {
       
         echo $_SESSION['creat'];
            
    }
    unset($_SESSION['creat']);

  ?>

</div>
<?php endif; ?>
<div class="card">
    <div class="login_box">
        <form action="" method="post">
            <br>
            <h2 style="text-align:center; color:white;">NEW Password</h2><br>
           
            
            <div class="id">
                <input  type="hidden" name="password_token" id="user-id" value="<?php if(isset($_GET['token'])) echo $_GET['token'] ?>"><br>
                 <label for="">Email:  <?php if(isset($e_email) && $e_email!="") echo $e_email; ?></label><br><br>
                <input  type="email" name="email"  value="<?php if(isset($_GET['email'])) echo$_GET['email'] ?>" placeholder="Email" ><br><br>
            </div>
             <label for="">Password:     <?php if(isset($e_password) && $e_password!="") echo $e_password; ?></label><br><br>
            <input type="password" name="password" id="" placeholder="password"><br><br>
            <label for="">Confirm:   <?php if(isset($ec_password) && $ec_password!="") echo $ec_password; ?></label><br><br>
            <input type="password" name="confirm_password" id="" placeholder="confirm password"><br><br><br>
            <div>

              <input type="submit" name="new" id="" value="Change">
            </div>
    </div>        
</div>        
</body>
</html>