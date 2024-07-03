<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];


$na = $_REQUEST['name'];
$am = $_REQUEST['amt'];
$pa = $_REQUEST['pass'];
$bu = $_REQUEST['but'];
$c = 0;

if ($na) {
    $res = mysql_query("select * from login where acc='$na' or phone='$na'");
    while ($rec = mysql_fetch_array($res)) {
        $c = $c + 1;
    }
    if ($c == 0) {
        header("location: http://localhost/FITS/home.php?val=er");
    } else {
        $res = mysql_query("select * from login where acc='$acc'");
        while ($rec = mysql_fetch_array($res)) {
            if ($rec[8] >= $am and $rec[2] == $pa) {
                if ($bu == 'Transfer') {
                    mysql_query("update login set bal=bal-'$am' where acc='$acc'");
                    mysql_query("update login set bal=bal+'$am' where acc='$na'");
                    mysql_query("insert into tran(sacc,racc,amount) values('$acc','$na','$am')");
                    header("location: http://localhost/FITS/home.php?val=su");
                } else if ($bu == 'Send') {
                    mysql_query("update login set bal=bal-'$am' where acc='$acc'");
                    mysql_query("update login set bal=bal+'$am' where acc='$na'");
                    $res = mysql_query("select * from login where phone='$na'");
                    while ($ret = mysql_fetch_array($res)) {
                        mysql_query("insert into tran(sacc,racc,amount) values('$acc','$ret[0]','$am')");
                        header("location: http://localhost/FITS/home.php?val=su");
                    }
                }
            } else {
                header("location: http://localhost/FITS/home.php?val=er");
            }
        }
    }
} else{
    header("location: http://localhost/FITS/home.php?val=er");
}

?>