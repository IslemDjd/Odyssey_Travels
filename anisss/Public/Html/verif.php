<?php
require_once "../../core/autoload.php";
session_start();
if(isset($_GET['token']))
{
    $code=$_GET['token'];

    $test=mysqli_query($conn,"SELECT `checkk`, `code_verif` FROM `users` WHERE code_verif='$code' LIMIT 1");

    if(mysqli_num_rows($test) >0)
    {
            
        $row = mysqli_fetch_array($test);

        if($row['checkk']=="0")
        {
              $cd_v=$row['code_verif'];
              $update=mysqli_query($conn,"UPDATE `users` SET `checkk`='1' WHERE code_verif='$cd_v' LIMIT 1");

              if($update)
              {
                $_SESSION['creat']="Email  verifed successfully,log in now!";
                header('location:login.php');
                die;
    

              }else
              {
                $_SESSION['creat']="verification Failed !";
                header('location:login.php');
                die;
    

              }

        }else
        {
            $_SESSION['creat']="Email already verifed,log in now.!";
            header('location:login.php');
            die;

        }

    }else
    {
        $_SESSION['creat']="thid token does not exist!.";
        header('location:login.php');
        die;
    }

    
}else
{
    $_SESSION['creat']="NOT allowed";
    header('location:login.php');
    die;
}


?>