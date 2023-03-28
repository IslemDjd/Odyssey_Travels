<?php
require_once "config.php";

$conn=mysqli_connect(HOST,USER,PASS,DBNAME);

if(!$conn)
{
    echo "Error IN DATABASE";
}

?>