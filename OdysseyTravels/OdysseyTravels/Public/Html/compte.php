<?php
require_once "../../core/autoload.php";
session_start();
$page="account";
if(!isset($_SESSION['email']))
{
     header('location:login.php');
     die;
}
$email=$_SESSION['email'];


$error=0;



$seelct = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email' LIMIT 1");







if(isset($_POST['delete'])){
mysqli_query($conn,"DELETE FROM users WHERE email = '$email'");
header('location:logout.php');
   die;

  }

  if(isset($_POST['delete_image'])){

    
    foreach($seelct as $res)
    {
        
        $gendr=$res['gender'];
    }
    if($gendr=="male")
    {

        mysqli_query($conn,"UPDATE users SET profile_picture='no-profil-picture-male.jpg' WHERE email = '$email'");
    }else if($gendr=="female")
    {
        mysqli_query($conn,"UPDATE users SET profile_picture='no-profil-picture-female.jpg' WHERE email = '$email'");

    }

    
    
    header('location:compte.php');
       die;
    
      }
  




if(isset($_POST['submit']))
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
                        $_SESSION['creat']="your informations has been saved successfully!";
                        header('location:compte.php');
                        die;
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
}

}

if(isset($_POST['Nv_pass']))
{
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


    if(!isset($_POST['new_password']) || $_POST['new_password']=="")
    {
        $ec_password="required!";
        $error=1;
    }else if(strlen($_POST['new_password']) <8 )
    {
        $ec_password="password must consist at least 8 caracters!";
        $error=1;
    }else{
        $new_password=clear($_POST['new_password']);


    }   

    if($error==0)
    {
        $sql=mysqli_query($conn,"SELECT password FROM users WHERE email='$email'");
        foreach($sql as $ros)
        {
            $old_password=$ros['password'];
        }
        if(password_verify($password,$old_password))
        {
            if(!empty($new_password))
            {
                $hash=password_hash($new_password,PASSWORD_DEFAULT);
                $update_password=mysqli_query($conn,"UPDATE users SET password='$hash' WHERE email='$email' LIMIT 1"); 
                $_SESSION['creat']="Password Updated successfully";
                header('location:compte.php');
                die;

            }else{
                 $ec_password="required!";

            }
              
             
        }else
        {
            $e_password="invalid password";
        }

    }


}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="NavBar/nav.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <style>
        input{
            color: black;
            background-color: #eee;
            border-radius: 6px;
            width: 320px;
            padding: 15px;
            border:none;

            font-size: medium;
        }

        button[type="submit"]
        {
            cursor:pointer;
            transition:0.6s;
            background-color: lightgreen;
            color: #ffffff;
             padding: 15px;
              width: 285px;
               border-radius: 6px;
             font-size:medium;

                border: 1px solid;

        }
        button[type="submit"]:hover
        {
            
            background-color: #266328;
            
        }

        body
        {
            line-height: 2;
            background: linear-gradient(to left, #A5CC82, #00467F);
        }
        
        .navbar
        {
            background: linear-gradient(to left, #A5CC82, #00467F);
            
        }
        .logout{
            margin-top:6px;
        }

        .delete button{
            position: relative;
             bottom: 37px;
             background-color: rgb(240, 43, 43);
             font-size:medium;
            color: #ffffff; 
            padding: 15px;
             width: 285px;
              border-radius: 6px; 
              border: 1px solid;
              transition:0.6s;
        }
        .delete button:hover{

            background-color: red; 
            
        }

        .pfp img
{
 width: 100px;
 height: 100px;
 border-radius: 50%;
 margin-left:18%;


 margin-top:6.5px;
 
}


.ajt label p
{
    background-color: lightgreen;
    padding: 12px;
    border-radius: 6px; 
    width:280px;
    transition:0.6s;
    cursor: pointer;
    color:white;
    text-align:center;
    font-size:meduim;
}

.ajt label p:hover
{
    background-color: #266328;

}
.ok{
    background-color: rgb(148, 179, 101);
     color: #ffffff;
   text-align: center;
    padding: 10px;
   
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
            <li><a href="home.php" class='<?php if($page== "home"){echo "active";}?>'>HOME</a></li>
          <li><a href="hotels.php" class='<?php if($page== "hotels"){echo "active";}?>'>HOTELS</a></li>
          <li><a href="ourtours.php" class='<?php if($page== "ourtours"){echo "active";}?>'>OUR TOURS</a></li>
          <li><a href="destinations.php" class='<?php if($page== "destinations"){echo "active";}?>'>DESTINATIONS</a></li>
          <li><a href="aboutus.php" class='<?php if($page== "aboutus"){echo "active";}?>'>ABOUT US</a></li>
          <?php if(isset($_SESSION['email'])):?>
               
               <li><a href="compte.php" class='<?php if($page== "account"){echo "active";}?>'>ACCOUNT</a></li>
               <li><a href="profil.php" class='<?php if($page== "profil"){echo "active";}?>'>PROFIL</a></li>
              

               
               
<?php endif;?>
            </ul>
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
 <br>

    <main class="container-flud">
        <section>
        <article class="col">
              
                <div style="position: relative;">
                

                   
                <form action"" method="post"  enctype="multipart/form-data" style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">
                    <div class="pfp"><span>
                        
<?php 

while($data=mysqli_fetch_assoc($seelct))
{
    if(empty($data['profile_picture']) && $data['gender']=="male"){
        echo '<img src="pfp_picture/no-profil-picture-male.jpg" alt="" width="200" id="photo">';

    }else if(empty($data['profile_picture']) && $data['gender']=="female"){
        echo '<img src="pfp_picture/no-profil-picture-female.jpg" alt="" width="200" id="photo">';
    }else
    {
        echo '<img src="pfp_picture/'.$data['profile_picture'].'" alt="" width="200" id="photo">';
    }
}
?>
</span>

</div>
<?php if(isset($erreur)) echo $erreur;?>

                
                        <br>

                  
        
                            
                     
            


                        
 

 <div  class="profile-pic-div">                          
<input type="file" name="pic_profile" id="file" hidden>
<div class="ajt">
<label for="file" id="uploadBtn" class="add" ><p>Add Image</p></label>

</div>
<br>
<button type="submit" name="submit">Upload</button>
<br><br><br>    


<!-- Submit button -->
                            <div class="delete">
                            <button  onclick="return confirm('are sure you want to delete your profile picture?');"
                            type="submit" name="delete_image" id="submit"> Delete image </button>
                            </div>
                            
                            
                 </form>

                        
                    
            </article>
                    
            
            <article class="col-sm">
             
                 <form action"" method="post" style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">

                 <h2>Vos informations</h2>
                    <p>Modifier vos informations.</p><br>
                        <!-- nom input -->
                         
                        <div>
                     
                        <div>
                            <div>
                            <?php $ph=mysqli_query($conn,"SELECT name FROM users WHERE email='$email'"); 
                                $info=mysqli_fetch_assoc($ph);

                                $name=$info['name'];
                                $_SESSION['Name']=$name;
                                ?>
                                <label for="">Name</label>
                            </div>

                            <div>
                            <?php $ph=mysqli_query($conn,"SELECT lastname FROM users WHERE email='$email'"); 
                                $info=mysqli_fetch_assoc($ph);

                                $lastname=$info['lastname'];
                                $_SESSION['lastname']=$lastname;
                                ?>
                                 <input type="text" class="form-control" id="floatingInput"  value="<?= $_SESSION['Name']; ?>" placeholder="Your name">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="">Last name</label>
                            </div>
                            <div>
                                 <input type="text" class="form-control" id="floatingInput"  value="<?= $_SESSION['lastname']; ?>" placeholder="Last name">
                            </div>
                        </div>
                        <!-- Email input -->
                        
                        <div>
                            <div>
                                <label for="">Email</label>
                            </div>
                            <div>
                                 <input type="email" class="form-control" id="floatingInput"  value="<?= $_SESSION['email']; ?>" placeholder="email">
                            </div>
                        </div>

                        <!-- telephone input --> 
                        
                         

                        <div>
                            
                            <div>
                                <label for="">Number phone</label>
                            </div>
                            
                                
                            <div>
                                <?php $ph=mysqli_query($conn,"SELECT tele FROM users WHERE email='$email'"); 
                                $info=mysqli_fetch_assoc($ph);

                                $phone=$info['tele'];

                                $phone[2]='.';
                                $phone[3]=0;

                                $exx=explode('.',$phone);

                                $phonee=end($exx);
                                $_SESSION['phone']=$phonee;
                                
                                ?>

                                <input type="tel" class="form-control" id="floatingInput"  value="<?= $_SESSION['phone']; ?>"  placeholder="Your Number phone">
                            </div>
                        </div>

                         

                        <!-- Submit button -->

                       
                       
                    </form>
                    
            </article>


            <!-- form 2 -->
            <article class="col">
                
                <div style="position: relative;">

                    <form action"" method="post" style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">
                        <!-- TITLE -->
                        <h2>Votre mot de passe</h2>
                    <p>Modifier votre mot de passer pour vous connecter à votre compte.</p><br>


                        <!-- password input -->

                        <div>
                            <div>
                                <label for="">Password:  <?php if(isset($e_password)) echo $e_password; ?></label>
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Your password">

                            </div>
                        </div>
                           <!-- change password input -->

                           <div>
                            <div>
                                <label for="">New password: <?php if(isset($ec_password)) echo $ec_password; ?></label>
                            </div>
                            <div>
                                <input type="password" name="new_password"  placeholder="New password">

                            </div>
                        </div>
                        <br>

                        <!-- Submit button -->
                        <button  type="submit" name="Nv_pass" id="submit">Modifier votre mot de passe

                          
                        </button>
                       
                    </form>
                  

                   
        
                        <form action"" method="post"
                            style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">
                            <h2>Supprimer votre compte</h2>
                        <p>Toutes vos données seront supprimées définitivement</p><br><br>

                            <!-- Submit button -->
                            <div class="delete">
                            <button  onclick="return confirm('are sure you want to delete your account?');"
                            type="submit" name="delete" id="submit"> Delete account </button>
                            </div>
                            
                            
                        </form>

                        
                    
            </article>
                    

        </section>

        

    </main>


    <script>
                
const imgDiv = document.querySelector('.profile-pic-div');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');
const uploadBtn = document.querySelector('#uploadBtn');





file.addEventListener('change', function(){
//this refers to file
const choosedFile = this.files[0];

if (choosedFile) {

const reader = new FileReader(); //FileReader is a predefined function of JS

reader.addEventListener('load', function(){
img.setAttribute('src', reader.result);
});

reader.readAsDataURL(choosedFile);


}
});

    </script>
</body>
</html>