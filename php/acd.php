<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];

$pa=$_REQUEST['pass'];


$res = mysql_query("select * from login where acc='$acc'");
    while ($rec = mysql_fetch_array($res)) {
        if($pa==$rec[2]){
            $bal=$rec['8'];
            header("location: http://localhost/FITS/home.php?val=ba&bala=$bal");
        }
        else{
            header("location: http://localhost/FITS/home.php?val=er");
        }
    }
    ?>
 