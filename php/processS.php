<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];


$am = $_REQUEST['amt'];
$pa = $_REQUEST['pass'];
$bu = $_REQUEST['but'];

if ($bu == 'Withdraw') {
    $res = mysql_query("select * from login where acc='$acc'");
    while ($rec = mysql_fetch_array($res)) {
        if ($rec[8] >= $am and $rec[2] == $pa) {

            mysql_query("update login set bal=bal-'$am' where acc='$acc'");
            mysql_query("insert into tran(sacc,racc,amount) values('$acc','self','$am')");
            header("location: http://localhost/FITS/home.php?val=su");
        } else {
            header("location: http://localhost/FITS/home.php?val=er");
        }
    }
}
if ($bu == 'Deposit') {
    $res = mysql_query("select * from login where acc='$acc'");
    while ($rec = mysql_fetch_array($res)) {
        if ($rec[2] == $pa) {

            mysql_query("update login set bal=bal+'$am' where acc='$acc'");
            mysql_query("insert into tran(sacc,racc,amount) values('self','$acc','$am')");
            header("location: http://localhost/FITS/home.php?val=su");
        } else {
            header("location: http://localhost/FITS/home.php?val=er");
        }
    }

}
?>