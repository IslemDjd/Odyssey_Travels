<?php
require_once "../../core/autoload.php";

session_start();

$error=0;
if(isset($_SESSION['email']))
{
    $emmail=$_SESSION['email'];
    $get_id_user=mysqli_query($conn,"SELECT id FROM users WHERE email='$emmail' LIMIT 1");
    foreach($get_id_user as $user)
    {
        $id_user=$user['id'];
    }
}
$r = mysqli_query($conn, "SELECT * from ville_depart");
$s = mysqli_query($conn, "SELECT * from ville_arrivee");

if(isset($_POST['reserve']))
{
    if(!isset($_SESSION['email'])){
        $_SESSION['notconnected'] = "You're Not Connected"; 
    } 
    
    if(!isset($_POST['country_from']) || empty($_POST['country_from']))
    {
        $e_country_from="required!";
        $eroor=1;
    }else
    {
        $countryfrom=clear($_POST['country_from']);
        if(!in_array($countryfrom,['AAE','ALG','BJA','BLJ','BMW','BSK','BUJ','CBH','CZL','DJG','EBH','ELG','ELU','GHA','GJL','HME','HRM','IAM','INF','INZ','LOO','MUW','MZW','OGX','ORN','QAS','QDJ','QSF','TEE','TGR','TID','TIN','TLM','TMR','TMX','VVZ']))
        {
            $e_country_from="select a wilaya not a text!";
            $error=1;
        }
    }
 
    if(!isset($_POST['country_to']) || empty($_POST['country_to']))
    {
        $e_country_to="required!";
        $eroor=1;
    }else
    {
        $country_to=clear($_POST['country_to']);
       
    }

    if(!isset($_POST['depart']) || empty($_POST['depart']))
    {
        $e_depart="required!";
        $eroor=1;
    }else
    {
        $depart=clear($_POST['depart']);
        $allow="/^\d{4}-\d{2}-\d{2}+$/";
        if(!preg_match($allow,$depart))
        {
            $e_depart="select a date please!";
            $eroor=1;
        }
    }

    if(!isset($_POST['return']) || empty($_POST['return']))
    {
        $e_return="required";
        $error=1;
    }else
    {
        $return=clear($_POST['return']);
        $allow="/^\d{4}-\d{2}-\d{2}+$/";
        if(!preg_match($allow,$return))
        {
            $e_return="select a date please!";
            $error=1;
        }
    }


    $today = new DateTime();
    $nextmonth = clone $today;
   
    $nextmonth->modify('+30 days');

        $departDate = new DateTime($_POST['depart']);
        $retourDate = new DateTime($_POST['return']);


        if ($departDate < $today || $departDate > $nextmonth) {
             $e_depart="invalid depart date!";
             $error=1;
            
        }
         if ($retourDate < $today || $retourDate > $nextmonth) {
            $e_return="invalid return date!";
            $error=1;
            
        }
          if ($departDate >= $retourDate) {
             $e_reserve="invalid reservation!";
             $error=1;
            
        }


         if(!isset($_POST['nbr']) || empty($_POST['nbr']))
         {
            $e_nbr_person="required!";
            $error=1;
         }else
         {
            $nbr_person=clear($_POST['nbr']);
            if(!in_array($nbr_person,['1','2','3','4','5','6','7','8','9','10']))
            {
                $e_nbr_person="select a number not a text!";
                $error=1;
            }
         }

         $timee = date("F j, Y, g:i a");
     
if($error==0)
{
      $test_reservation=mysqli_query($conn,"SELECT date_retour FROM `reservation_vol` WHERE id='$id_user' AND date_retour > '$depart' ");
      if(mysqli_num_rows($test_reservation) > 0)
      {
        $_SESSION['notconnected']="you can't choose this depart_date!";
        header('location:home2.php');
        die;

      }else{
        $sql=mysqli_query($conn,"INSERT INTO `reservation_vol`(`id`, `nbr_personne`, `date_depart`, `date_retour`, `ville_depart`, `ville_arive`, `time_reservation`) VALUES 
        ('$id_user','$nbr_person','$depart','$return','$countryfrom','$country_to','$timee')");
        if($sql)
        {
            $_SESSION['creat']="reservation saved successesfuly!";
            header('location:hotels.php');
            die;
        }
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
    <title>Book Your Flight</title>
    <link rel="stylesheet" href="NavBar/nav.css">
    <link rel="stylesheet" href="../Css/home2.css">
</head>
<body>

<style>
     .ok{
    background-color: rgb(148, 179, 101);
     color: #red;
   text-align: center;
    padding: 10px;
   
}
</style>
    <video src="../Backgrounds/4k Plane Landing at Sunset Light Sky.mp4" autoplay muted loop></video>
    <nav class="navbar">
        
        <div class="brand-title">
            <div><a href="home.php"><img class="logo" src="image/Logo.png" alt="logo"></a></div>
            <h1>ODYSSEY<span class="travels">Travels</span></h1></div>
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
               
               <!-- <li><a href="compte.php" class='<?php if($page== "account"){echo "active";}?>'>ACCOUNT</a></li> -->
               <li><a href="profil.php" class='<?php if($page== "profil"){echo "active";}?>'>PROFIL</a></li>

               
               
<?php endif;?>

<?php if(!isset($_SESSION['email'])):?>
      <div class="navbuttons">
          <a href="login.php"><button class="login">LOG IN</button></a>
          <a href="register.php"><button class="signup">SIGN UP</button></a>
          </div>
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

  
<?php if(isset($_SESSION['notconnected']) && $_SESSION['notconnected']!=""):?>

<div class="ok">
    <?php
    {
        echo $_SESSION['notconnected'];
    }
    unset($_SESSION['notconnected']);
    ?>
</div>
<?php endif; ?>


   
    <div class="main">
    <div class="flightbox">
        
        
        <form action="" method="post" >
            <fieldset>
                <legend>Book Now</legend>
                <?php if(isset($e_country_from)) echo $e_country_from; ?>
                <select name="country_from" id="country">
                    <option value="from" selected disabled>From</option>
                    <?php
                while($row = mysqli_fetch_array($r)){
                    echo "<option value=".$row['code_iata'].">". $row['code_iata']." --- ".$row['nom_ville']."</option>";
                }
            
            ?>
                </select>
                <br>
                <?php if(isset($e_country_to)) echo $e_country_to; ?>

                <select name="country_to" id="country">
                    <option value="from" selected disabled>To</option>
                    <?php
                while($row = mysqli_fetch_array($s)){
                    echo "<option value=".$row['id_iata'].">". $row['id_iata']." --- ".$row['nom']."</option>";
                }
            
            ?>
                </select>
                <br><br>
                <label class="date_depart" for="date_depart" >Depart:  <?php if(isset($e_depart)) echo $e_depart; ?>  <?php if(isset($e_reserve) && !isset($e_depart) && !isset($e_return)) echo $e_reserve; ?></label> <br>
               
                <input type="date" name="depart" id="date_depart"> 
                <br>
                
                <label class="date_return" for="date_return" >Return:   <?php if(isset($e_return)) echo $e_return; ?>  <?php if(isset($e_reserve) && !isset($e_depart) && !isset($e_return)) echo $e_reserve; ?></label> <br>
                
                <input type="date" name="return" id="date_return">
          
                <?php if(isset($e_nbr_person)) echo $e_nbr_person; ?>
                <br>
                <label for="d">Passengers</label>
                <select name="nbr" id="nb_passenger" >
                <option disabled></option><option value="1" selected>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>                                                  
                </select>
                <a href="#"><button type="submit" name="reserve" class="learn-more">
                    <span class="circle" aria-hidden="true">
                    <span class="icon arrow"></span>
                    </span>
                    <span class="button-text">Book Now</span>
                  </button></a>
                  <?php
                  if(isset($not_connected)){
                    echo $not_connected;
                  }
                  ?>
            </fieldset>
             
        </form>
    </div>
    </div>
</body>
</html>