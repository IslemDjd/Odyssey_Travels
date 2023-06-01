<?php
require_once "../../core/autoload.php";
session_start();
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
    table{
    border-collapse: collapse;
     width: 50%;
     margin:0 auto;
     margin-top:50px;
     border-radius: 6px;
    border-bottom: 1px solid;
}

h3{
    color: blue;
     width: 50%;
     margin:0 auto;
     margin-top:50px;
     font-size: 25px;
    }
th{
    color: black;
    font-size: 18px;
    padding: 12px;
    border-bottom: 1px solid;


}

td{
    color: #ffffff;
    font-size: 18px;
    padding: 15px;
    
}
body{
    background: linear-gradient(to left, #A5CC82, #00467F);
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
            </ul>
        </div>
        <div class="navbuttons" style="margin-bottom: 3em;">
            <a href="register.php" ><button class="logout">Log out</button></a>
            </div>
        
    </nav>

    <script>
        const toggleButton = document.getElementsByClassName('toggle_button')[0];
        const navbarLinks  = document.getElementsByClassName('navbar_links')[0];
    
        toggleButton.addEventListener('click',() =>{
            navbarLinks.classList.toggle('active');
        });
    </script>
<div class="">
                    <h3 class="">Users-Information</h3>
                    
                    <div class="col">
                        <table class="table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Id_user</th>
                                    <th>Telephone</th>
                                    <th>Gender</th>

                                </tr>
                            </thead>
                            <tbody>
                            
                                <?php 
                                $res = mysqli_query($conn, "SELECT * FROM `users`");
                                while ($data=mysqli_fetch_assoc($res))
                                {
                                    echo '<tr>';
                                    
                                    echo '<td>'.$data['id'].'</td>';
                                    echo '<td>'.$data['name'].'</td>';
                                    echo '<td>'.$data['lastname'].'</td>';
                                    echo '<td>'.$data['email'].'</td>';
                                    echo '<td>'.$data['id_user'].'</td>';
                                    echo '<td>'.$data['tele'].'</td>';
                                    echo '<td>'.$data['gender'].'</td>';

                                    echo '</tr>';
                                   
                                    
                                }

                                ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>

               </div>
</body>
</html>