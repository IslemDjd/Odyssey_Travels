<?php
require_once "../../core/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
$k=0;
$error=0;

if(isset($_POST['register']))
{
    if(!isset($_POST['name']) || $_POST['name']=="")
    {
        $e_name="required!";
        $error=1;
    }else if(filter_var($_POST['name'],FILTER_VALIDATE_INT))
    {
        $e_name="Enter a text not a number!";
        $error=1;
    }else
    {
        $name=clear($_POST['name']);
        

        if(empty($name))
        {
            $e_name="required!";
            $error=1;
        }else if(strlen($_POST['name']) > 20)
        {
            $e_name="Big name!";
            $error=1;
        }
    }

     
    if(!isset($_POST['lastname']) || $_POST['lastname']=="")
    {
        $e_lastname="required!";
        $error=1;
    }else if(filter_var($_POST['lastname'],FILTER_VALIDATE_INT))
    {
        $e_lastname="Enter a text not a number!";
        $error=1;
    }else
    {
        $lastname=clear($_POST['lastname']);
        

        if(empty($lastname))
        {
            $e_lastname="required!";
            $error=1;
        }else if(strlen($_POST['lastname']) > 25)
        {
            $e_lastname="Big lastname!";
            $error=1;
        }
    }

    if(!isset($_POST['email']) || $_POST['email']=="")
    {
        $e_email="required!";
        $error=1;
    }else if(filter_var($_POST['email'],FILTER_VALIDATE_INT) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        $e_email="Enter a correct Email!";
        $error=1;
    }else
    {
        $email=clear($_POST['email']);
        $test=mysqli_query($conn,"SELECT  `email` FROM `users` WHERE  email='$email' LIMIT 1");

        if(empty($email))
        {
            $e_email="required!";
            $error=1;
        }else if(strlen($_POST['email']) > 30)
        {
            $e_email="Enter a correct Email!!";
            $error=1;
        }else if(mysqli_num_rows($test) > 0)
            {
                $e_email="Email already exist!,enter new email!";
                $error=1;
            }
        

    }

    if(!isset($_POST['tele']) || $_POST['tele']=="")
    {
        $e_tele="required!";
        $error=1;
    }else
    {
        $tele=clear($_POST['tele']);
        $allow="/^[0]{1}+[5-6-7]{1}+[\d]{8}$/";
        if(empty($tele))
        {
            $e_tele="required!";
            $error=1;   
        }else if(!preg_match($allow,$tele))
        {
            $e_tele="Enter a correct phone number!";
            $error=1;   
        } else
        {
            $tele[0]='.';
            $te=explode('.',$tele);
            $tele='+213'.end($te);
            $test_tel=mysqli_query($conn,"SELECT  `tele` FROM `users` WHERE  tele='$tele' LIMIT 1");

            if(mysqli_num_rows($test_tel) > 0)
            {
                $e_tele="Phone number already exist,enter new one!";
                $error=1;
            }

        }

    }

    if(!isset($_POST['gender']) || $_POST['gender']=="")
    {
        $e_gender="required!";
        $error=1;
    }else if(!in_array($_POST['gender'],['male','female']))
    {
        $e_gender="Select a gender not a text!";
        $error=1;
    }else
    {
        $gender=clear($_POST['gender']);
        if(empty($gender))
        {
            $e_gender="required!";
            $error=1;
        }

        if($gender=='male'){
            $picture="no-profil-picture-male.jpg";
        }elseif($gender=='female'){
            $picture="no-profil-picture-male.jpg";
        }
        

    }

    if(empty($_POST['birthday_day']) || empty($_POST['birthday_month']) || empty($_POST['birthday_year']))
    {
        $e_birthday="required!";
        $error=1;
    }

    if(isset($_POST['birthday_day']) && isset($_POST['birthday_month']) && isset($_POST['birthday_year']))
    {
       
        if(!in_array($_POST['birthday_day'],[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]))
        {
            $e_day="select a day please! <br>";
            $k=1;
            $error=1;
        }

        if(!in_array($_POST['birthday_month'],[1,2,3,4,5,6,7,8,9,10,11,12]))
        {
            $e_month="select a month please! <br>";
            $k=1;
            $error=1;
        }

   
        if(!in_array($_POST['birthday_year'],[2023,2022,2021,2020,2019,2018,2017,2016,2015,2014,2013,2012,2011,2010,2009,2008,2007,2006,2005,2004,2003,2002,2001,2000,1999,1998,1997,1996,1995,1994,1993,1992,1991,1990,1989,1988,1987,1986,1985,1984,1983,1982,1981,1980,1979,1978,1977,1976,1975,1974,1973,1972,1971,1970,1969,1968,1967,1966,1965,1964,1963,1962,1960,1959,1958,1957,1956,1955,1954,1953,1952,1951,1950,1949,1948,1947,1946,1945,1944,1943,1942,1941,1940,1939,1938,1937,1936,1935,1934,1933,1932,1931,1930,1929,1928,1927,1926,1925,1924,1923,1922,1921,1920,1919,1918,1917,1916,1915,1914,1913,1912,1911,1910,1909,1908,1907,1906,1905]))
        {
              $e_year="select a year please! <br>";
              $k=1;
              $error=1;

        }

        if($k==0)
        {
            $day= (int) clear($_POST['birthday_day']);
            $month= (int) clear($_POST['birthday_month']);
            $year= (int) clear($_POST['birthday_year']);
    
            $birthday=clear($day.'-'.$month.'-'.$year);
            
            if(empty($birthday))
            {
                $e_birthday="required!";
                $error=1;
                
            }
            
        }
    }

    if(!isset($_POST['password']) || $_POST['password']=="")
    {
        $e_password="required!";
        $error=1;
    }else if(strlen($_POST['password']) <8 )
    {
        $e_password="Password must consist al least 8 caracters!";
        $error=1;
    }else
    {
        $password=clear(password_hash($_POST['password'],PASSWORD_DEFAULT));
        if(empty($password))
        {
            $e_password="required";
            $error=1;
        }
    }

       

    if(!isset($_POST['id_user']) || $_POST['id_user']=="")
    {
        $e_id="required";
        $error=1;
    }else if(!filter_var($_POST['id_user'],FILTER_VALIDATE_INT))
    {
        $e_id="id must be number not a text!";
        $error=1;
    }else{
        $id_user=clear($_POST['id_user']);
        $test_id=mysqli_query($conn,"SELECT  `id_user` FROM `users` WHERE  id_user='$id_user' LIMIT 1");
        if(empty($id_user))
        {
            $e_id="required!";
            $error=1;
        }else if(strlen($id_user) < 9 || strlen($id_user) >9)
        {
            $e_id="invalid id!";
            $error=1;
        }else if(mysqli_num_rows($test_id) > 0)
        {
            $e_id="id user already exist!";
            $error=1;
        }
    }
    
    $code_verif=md5(rand());
    $time = date("F j, Y, g:i a");

    if($error==0)
    {
        $creat=mysqli_query($conn,"INSERT INTO `users`(`name`, `lastname`, `email`, `tele`, `gender`, `birthday`,`id_user`, `password`, `code_verif`, `time`) 
        VALUES ('$name','$lastname','$email','$tele','$gender','$birthday','$id_user','$password','$code_verif','$time')");

        if($creat){
            $_SESSION['creat']=" please,verifie your email to log in.!";

            $mail = new PHPMailer(true);            
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'odysseytravelsagency23@gmail.com';                    
            $mail->Password   = 'qnhemlboslyltjpx';                           
            $mail->SMTPSecure = 'ssl';           
            $mail->Port       = 465;                                   
            $mail->setFrom('odysseytravelsagency23@gmail.com');
            $mail->addAddress($email);    
            $mail->isHTML(true);
                                
            $mail->Subject = ' Verification Email Addresse';
            $style = " <a href='http://localhost/OdysseyTravels/Public/Html/verif.php?token=$code_verif'>confirm your email address</a>";
            $mail->Body  = $style;
            
     
        $mail->send();


            header('location:register.php');
            die;
        }else
        {
            $_SESSION['creat']=" register failed!";
            header('location:register.php');
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

   <link rel="stylesheet" href="../css/register.css">
    <title>sign up</title>
</head>
    <nav class="navbar">
        
        <div class="brand-title">
            <div><a href="home.php"><img class="logo" src="image/Logo.png" alt="logo"></a></div>
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
                <div class="navbuttons" style="margin-right: 0;">
                    <a href="login.php"><button class="login">LOG IN</button></a>
                </div>
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

            <style>
                h3{
                    color:white;
                    margin-left:90px;

                }
                h3 a:hover{
                    text-decoration:underline;
                }
            </style>
    <div class="card">
    <div class="register_box">
        <form action="" method="post">
            
            
            <h2>Sign Up</h2>


                <div>
               
                  <label for="">Nom: <?php if(isset($e_name) && $e_name!="") echo $e_name; ?></label> <br>
                  <input type="text" name="name" id="" >
                  <img src="image/icons8-user.gif" alt="" style="width: 25px; transform: translate(-35px,5px); cursor:no-drop;">
               </div>

                <div>
                    <label for="">Prenom: <?php if(isset($e_lastname) && $e_lastname!="") echo $e_lastname; ?></label><br>
                    <input type="text" name="lastname" id="">
                    <img src="image/icons8-male-user-32.png" alt="" style="width: 25px; transform: translate(-35px,6px); cursor:no-drop;">
                </div>

                <div id="Eicon">
                    <label for="">Email:  <?php if(isset($e_email) && $e_email!="") echo $e_email; ?></label><br>
                    <input type="text" name="email" id="">
                    <img src="image/icons8-secured-letter.gif" alt="" style="width: 25px; transform: translate(-35px,5px); cursor:no-drop;">
                </div>

                <div>
                    <label for="">Teléphone:  <?php if(isset($e_tele) && $e_tele!="") echo $e_tele; ?></label><br>
                    <input type="tel" name="tele" id="">
                    <img src="image/icons8-telephone-48.png" alt="" style="width: 20px; transform: translate(-35px,5px);cursor: no-drop;">
                    
                </div>

                
                <div>
                <label for="">Gender:  <?php if(isset($e_gender) && $e_gender!="") echo $e_gender; ?></label> <br>
                    <select name="gender" id="gender" class="gender">
                           <option value="" selected disabled>Gender</option>
                           <option value="male">Male</option>
                           <option value="female">female</option>
                    </select><br>
                    </div>
                    
                    <div>
                        <label for="">Date de naissance:  <?php if(isset($e_day) && $e_day!=""){ echo $e_day;}  ?>  <?php if(isset($e_month) && $e_month!="") echo $e_month;?>  <?php if(isset($e_year) && $e_year!="") echo $e_year ; ?> <?php if(isset($e_birthday) && $e_birthday!="") echo $e_birthday; ?> </label><br>
                      <select aria-label="Day" name="birthday_day" id="day" title="Jour" class="_9407 _5dba _9hk6 _8esg"><option  selected disabled>Day</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>
                      
                       <select aria-label="Mounth" name="birthday_month" id="month" title="Mois" class="_9407 _5dba _9hk6 _8esg"><option  selected disabled>Month</option><option value="1">jan</option><option value="2">fév</option><option value="3">mar</option><option value="4">avr</option><option value="5">mai</option><option value="6">jun</option><option value="7">juil</option><option value="8">août</option><option value="9">sep</option><option value="10">oct</option><option value="11">nov</option><option value="12">déc</option></select>
                       <select aria-label="Year" name="birthday_year" id="year" title="Année" class="_9407 _5dba _9hk6 _8esg"><option  selected disabled>Year</option><option value="2023">2023</option><option value="2022">2022</option><option value="2021">2021</option><option value="2020">2020</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option></select>
                    </div>
                <div>

                    <label for="">ID:  <?php if(isset($e_id) && $e_id!="") echo $e_id; ?></label><br>
                   <input type="number" name="id_user" value="<?= mt_rand(99999,999999999);?>" id="" >

                </div>


                <div id="pw">
                    <label for="">Password:   <?php if(isset($e_password) && $e_password!="") echo $e_password; ?></label><br>
                    <input type="password" name="password" id="password">
                    <img src="image/close.png" alt="" id="img" width="20px" onclick="show()">
                    <script src="index.js"></script>
                </div><br>

                <div>
                    <input type="submit" name="register" value="Create Account" id="">
                    
                </div>
                 <br>
                <h3>didn't resive Emai? <a  style="color:blue;" target="_blank" href="resend.php">Resend</a> </h3>
            
               

       
        </form>
          
    </div>
    
    </div>

    <

</body>