<?php
require_once "../../core/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
session_start();
$error=0;

if(isset($_POST['reset']))
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

    if($error==0)
    {

        $token=md5(rand());
        $cherche=mysqli_query($conn,"SELECT `email` FROM `users` WHERE email='$email' LIMIT 1");

        if(mysqli_num_rows($cherche) > 0)
        {
            $info=mysqli_fetch_array($cherche);
            $get_email=$info['email'];
            $update=mysqli_query($conn,"UPDATE `users` SET `code_verif`='$token' WHERE email='$get_email' LIMIT 1");
            if($update)
            {
                $_SESSION['Valid'] = '1';
                $mail = new PHPMailer(true);            
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com';                    
                $mail->SMTPAuth   = true;                                  
                $mail->Username   = 'odysseytravelsagency23@gmail.com';                    
                $mail->Password   = 'qnhemlboslyltjpx';                           
                $mail->SMTPSecure = 'ssl';           
                $mail->Port       = 465;                                   
                $mail->setFrom('odysseytravelsagency23@gmail.com');
                $mail->addAddress($get_email);    
                $mail->isHTML(true);
                                    
                $mail->Subject = ' Reset Password';
                $style = " <a href='http://localhost/OdysseyTravels/Public/Html/change_password.php?token=$token&email=$get_email'>click to reset password!</a>";
                $mail->Body  = $style;
                
         
            $mail->send();
            $_SESSION['creat']="Check your email";
            header('location:reset_password.php');
            die;

    

            }else
            {
                $_SESSION['creat']="Sommething wrong";
                header('location:reset_password.php');
                die;
            }


        }else
        {
            $_SESSION['creat']="Email not found";
            header('location:reset_password.php');
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
.login_box{
   display: flex;
   justify-content: center;
   position: relative;
    margin: 140px auto;
    width: 380px;
    height: 300px;
    background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0px 1px 20px 1px;
    transition: all .2s;


}
input[type="email"]{
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
            <h2 style="text-align:center; color:white;">Reset Password</h2><br>
           
            
            <div class="id">
                <br>
                <label style="color:white;" for="user-id">Email:  <?php if(isset($e_email) && $e_email!="") echo $e_email; ?></label><br><br>
                <input  type="email" name="email" id="user-id" >
            </div>
              <br><br>
            <div>

              <input type="submit" name="reset" id="" value="Resend">
            </div>
    </div>        
</div>        
</body>
</html>