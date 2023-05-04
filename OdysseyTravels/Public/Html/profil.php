<?php

require_once "../../core/autoload.php";
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email']))
{
     header('location:login.php');
     die;
}
$email=$_SESSION['email'];
require_once "../../core/autoload.php";

$seelct = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' LIMIT 1");






if(isset($_POST['save']))
{

if(isset($_FILES['pic_profile'])){
    $image_name = $_FILES['pic_profile']['name'];
    $image_size = $_FILES['pic_profile']['size'];
    $image_error = $_FILES['pic_profile']['error'];
   
    
    $ex = explode('.',$image_name);   
    $end_name =  strtolower(end($ex));  
    $allowed = array('png','jpg','jpge','svg','gif'); 

    if(in_array($end_name,$allowed)){

        if($image_error === 0){
            
            if($image_size < 2000000){    // 2000000 = 2mb 

                $new_name = time().'.'.$end_name;
          
                $dir = "./pfp_picture/".$new_name;  


                
$sql = "UPDATE `users` SET `profile_picture`='$new_name' WHERE email = '$email'";
                if(!empty($image_name)){
                    mysqli_query($conn,$sql);
                    if(move_uploaded_file($_FILES['pic_profile']['tmp_name'],$dir)){
                        header('location:profil.php');
                    }

                }

            }else{
                $erreur= "your image is too big!";
            }

        }else{
            $erreur= "we have error in your image!";
        }
        
    }else{
        $erreur="choose an image with correct type!";
    }
}else{
    $erreur="gfdsrdfhrst";
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
    <title>Document</title>
</head>
<body>
    <style>
        body{
    background: linear-gradient(to left, #A5CC82, #00467F);
}

.pfp img
{
 width: 40px;
 height: 40px;
 border-radius: 50%;
 margin-left: 30px;
 margin-top:6.5px;
 
}




    </style>
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
            <li><a href="home.php"class='<?php if($page== "home"){echo "active";}?>'>HOME</a></li>
                <li><a href="hotels.php"class='<?php if($page== "hotels"){echo "active";}?>'>HOTELS</a></li>
                <li><a href="ourtours.php"class='<?php if($page== "ourtours"){echo "active";}?>'>OUR TOURS</a></li>
                <li><a href="destinations.php"class='<?php if($page== "destinations"){echo "active";}?>'>DESTINATIONS</a></li>
                <li><a href="aboutus.php"class='<?php if($page== "aboutus"){echo "active";}?>'>ABOUT US</a></li>
                <?php if(isset($_SESSION['email'])):?>
               
               <li><a href="compte.php" class='<?php if($page== "login"){echo "active";}?>'>ACCOUNT</a></li>
               
      <?php endif;?>
            </ul>
        </div>
        <div>
        <div class="pfp">
<?php 

while($data=mysqli_fetch_assoc($seelct))
{
    if(empty($data['profile_picture']) && $data['gender']=="male"){
        echo '<img src="pfp_picture/no-profil-picture-male.jpg" alt="" width="200">';

    }else if(empty($data['profile_picture']) && $data['gender']=="female"){
        echo '<img src="pfp_picture/no-profil-picture-female.jpg" alt="" width="200">';
    }else
    {
        echo '<img src="pfp_picture/'.$data['profile_picture'].'" alt="" width="200">';
    }
}
?>
</div>
<?php if(isset($erreur)) echo $erreur; ?>

<div class="id">
    <?php
    foreach($seelct as $row)
    {
        $pffp=$row['id_user'];
    }
     echo 'ID: '.$pffp; ?>
</div>
</div>
        <?php if(isset($_SESSION['email'])):?>

        <div class="navbuttons" style="margin-bottom: 3em;">
            <a href="logout.php"><button class="logout">Log out</button></a>
            </div>
      <?php endif;?>

        
    </nav>

    <script>
        const toggleButton = document.getElementsByClassName('toggle_button')[0];
        const navbarLinks  = document.getElementsByClassName('navbar_links')[0];
    
        toggleButton.addEventListener('click',() =>{
            navbarLinks.classList.toggle('active');
        });
    </script>






</body>
</html>