
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
    text-align:center;
    background-color: lightgreen;
    padding: 12px;
    border-radius: 6px; 
    width:280px;
    transition:0.6s;
    cursor: pointer;
    color:white;
    font-size:meduim;
}

.ajt label p:hover
{
    background-color: #266328;

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
                <li><a href="home.php">HOME</a></li>
                <li><a href="hotels.php">HOTELS</a></li>
                <li><a href="ourtours.php">OUR TOURS</a></li>
                <li><a href="destinations.php">DESTINATIONS</a></li>
                <li><a href="aboutus.php">ABOUT US</a></li>

<?php if(isset($_SESSION['email'])):?>
               
               <li><a href="compte.php">ACCOUNT</a></li>
               
<?php endif;?>
            </ul>
        </div>

        <div>
       




</div>
      

        
    </nav>
    

    <script>
        const toggleButton = document.getElementsByClassName('toggle_button')[0];
        const navbarLinks  = document.getElementsByClassName('navbar_links')[0];
    
        toggleButton.addEventListener('click',() =>{
            navbarLinks.classList.toggle('active');
        });
    </script>



 <br>

    <main class="container-flud">
        <section>
        <article class="col">
                <div style="position: relative; bottom: 20px;" >
                    <h2>Votre mot de passe</h2>
                    <p>Modifier votre mot de passer pour vous connecter à votre compte.</p>
                </div>
                <div style="position: relative;">
                

                   
                <form action"" method="post"  enctype="multipart/form-data" style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">
                    <div class="pfp"><span>
                        
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
</span>

</div>
<?php if(isset($erreur)) echo $erreur;?>

                
                        <br>

                  
        
                        
                         
                        
                            
<input type="file" name="pic_profile" id="add" hidden>
<div class="ajt">
     <label for="add" class="add" ><p>Add Image</p></label>
</div>
<br>
<button type="submit" name="submit">Upload</button>
<br><br>  <br>                          <!-- Submit button -->
                            <div class="delete">
                            <button  onclick="return confirm('are sure you want to delete your profile picture?');"
                            type="submit" name="delete_image" id="submit"> Delete image </button>
                            </div>
                            
                            
                 </form>

                        
                    
            </article>
                    
            
            <article class="col-sm">
                <div style="position: relative; bottom: 20px;">
                    <h2>Vos informations</h2>
                    <p>Modifier vos informations.</p>
                </div>
                 <form action"" method="post" style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">


                        <!-- nom input -->
                         
                        <div>
                            <div>
                                <label for="">Name</label>
                            </div>
                            <div>
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Your name">
                            </div>
                        </div>
                        <!-- Preom input -->

                         <div>
                            <div>
                                <label for="">Lastname</label>
                            </div>
                            <div>
                                 <input type="text" class="form-control" id="floatingInput" placeholder="Your lastname">
                            </div>
                        </div>

                        <!-- Email input -->
                        
                        <div>
                            <div>
                                <label for="">Email</label>
                            </div>
                            <div>
                                 <input type="email" class="form-control" id="floatingInput" placeholder="email">
                            </div>
                        </div>

                        <!-- telephone input -->
                        

                        <div>
                            <div>
                                <label for="">Number phone</label>
                            </div>
                            <div>
                                <input type="tel" class="form-control" id="floatingInput" placeholder="Your Number phone">
                            </div>
                        </div>

                         <br>

                        <!-- Submit button -->

                        <button
                            type="submit" name="submit" id="submit"> Enregistrer
                        </button>
                       
                       
                    </form>
                    
            </article>


            <!-- form 2 -->
            <article class="col">
                <div style="position: relative; bottom: 20px;" >
                    <h2>Votre mot de passe</h2>
                    <p>Modifier votre mot de passer pour vous connecter à votre compte.</p>
                </div>
                <div style="position: relative;">

                    <form action"" method="post" style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">
                        <!-- TITLE -->
                       


                        <!-- password input -->

                        <div>
                            <div>
                                <label for="">Password</label>
                            </div>
                            <div>
                                <input type="password"  placeholder="Your password">

                            </div>
                        </div>
                           <!-- change password input -->

                           <div>
                            <div>
                                <label for="">New password</label>
                            </div>
                            <div>
                                <input type="password"  placeholder="New password">

                            </div>
                        </div>
                        <br>

                        <!-- Submit button -->
                        <button  type="submit" name="submit" id="submit">Modifier votre mot de passe

                          
                        </button>
                       
                    </form>
                  

                    <div style="position: relative; bottom: 20px;">
                        <h2>Supprimer votre compte</h2>
                        <p>Toutes vos données seront supprimées définitivement</p>
                    </div>
        
                        <form action"" method="post"
                            style="max-width: 550px; margin: 20px auto; padding: 20px; border-radius: 8px;">
                        

                            <!-- Submit button -->
                            <div class="delete">
                            <button  onclick="return confirm('are sure you want to delete your account?');"
                            type="submit" name="delete" id="submit"> Delete account </button>
                            </div>
                            
                            
                        </form>

                        
                    
            </article>
                    

        </section>

        

    </main>
</body>
</html>