<?php
require_once "../../core/autoload.php";
session_start();
$error=0;

if(isset($_POST['login'])){

    if(!isset($_POST['email']) || $_POST['email']=="")
    {
           $e_email="required!";
           $error=1;
    }else
    {
        $email=clear($_POST['email']);
    }


    if(!isset($_POST['password']) || $_POST['password']=="")
    {
           $e_password="required!";
           $error=1;
    }else
    {
        $password=clear($_POST['password']);
         
    }

    if($error==0)
    {
        $res=mysqli_query($conn,"SELECT `email`, `password`, `checkk` FROM `users` WHERE email='$email' Limit 1");
        
        $hash="";
        $chek="";
        foreach($res as $row){
            $hash = $row['password'];
            $check=$row['checkk'];
         }


        if(password_verify($password,$hash) && mysqli_num_rows($res) >0)
        {
           if($check=="1")
           {
                
            $_SESSION['email']=$email;
            header('location:profil.php');
            die;

           }else
           {
            $_SESSION['creat']="please verify your Email to log in!";
            header('location:login.php');
            die;
           }

        }else
        {
            $faux="worng email or password!";
            $error=1;
            $e="incorrect email or password";
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
    <link rel="stylesheet" href="NavBar/nav.css">
    <link rel="stylesheet" href="../Css/login.css">

    <title>Login</title>
</head>
<body>
    <nav class="navbar">
        
        <div class="brand-title">
            <div><a href="home.html"><img class="logo" src="image/Logo.png" alt="logo"></a></div>
            <h1>ODYSSEY <span class="travels">Travels</span></h1></div>
            <a href="#" class="toggle_button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

        <div class="navbar_links">
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="hotels.php">HOTELS</a></li>
                <li><a href="ourtours.php">OUR TOURS</a></li>
                <li><a href="destinations.php">DESTINATIONS</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>
            </ul>
        </div>
        <div class="navbuttons" style="margin-bottom: 3em;">
            <a href="register.php" ><button class="signup" >SIGN UP</button></a>
            </div>
        
    </nav>

    <script>
        const toggleButton = document.getElementsByClassName('toggle_button')[0];
        const navbarLinks  = document.getElementsByClassName('navbar_links')[0];
    
        toggleButton.addEventListener('click',() =>{
            navbarLinks.classList.toggle('active');
        });
    </script>
     <?php if(isset($_SESSION['creat']) && $_SESSION['creat']!=""):?>

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
            <h2>Log In</h2>
            <span style="position: relative; top: 23px;"><?php if(isset($e_email) && $e_email!="") echo $e_email; ?> <?php if(isset($faux) && $faux!="") echo $faux; ?></span>
            <div class="id">
                <input class="id_input" type="email" name="email" id="user-id" >
                <label class="id_label" for="user-id">ID</label><br>
            </div>
            <span style="position: relative; top: 17px;"> <?php if(isset($e_password) && $e_password!="") echo $e_password; ?> <?php if(isset($faux) && $faux!="") echo $faux; ?> </span>
            
            <div class="password" >
                <input class="password_input" type="password" name="password" id="password" >
                <label class="password_label" for="password">PASSWORD</label><br>
                <img src="image/close.png" alt="" id="img" width="20px" style="transform: translate(-35px,6px); cursor:pointer;" onclick="show()">
                <script src="index.js"></script>
            </div>

            <div class="Forget">
                <a href="reset_password.php">Forget password?</a>
            </div>
            <div>
                <button type="submit" name="login" class="submit">Log In</button>     
            </div>
        </form>

    </div>
    </div>
</body>
</html>