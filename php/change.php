<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];


$pa = $_REQUEST['pa'];
$npa = $_REQUEST['pass'];
$cpa = $_REQUEST['con'];
$bu = $_REQUEST['but'];

if ($bu == 'Change Password') {
    if ($npa == $cpa) {
        $res = mysql_query("select * from login where acc='$acc'");
        while ($rec = mysql_fetch_array($res)) {
            if ($rec[2] == $pa) {
                mysql_query("update login set pass='$npa' where acc='$acc'");
                header("location: http://localhost/FITS/php/lout.php");
            } else {
                header("location: http://localhost/FITS/home.php?val=er");
            }
        }
    } else {
        header("location: http://localhost/FITS/home.php?val=er");
    }
} else if ($bu == 'Change email') {
    $res = mysql_query("select * from login where acc='$acc'");
    while ($rec = mysql_fetch_array($res)) {
        if ($rec[2] == $pa) {
            mysql_query("update login set email='$npa' where acc='$acc'");
            header("location: http://localhost/FITS/home.php?val=home");
        } else {
            header("location: http://localhost/FITS/home.php?val=er");
        }
    }
}

?>