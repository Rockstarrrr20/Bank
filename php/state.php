<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];

$file = fopen("C:\Users\user\Downloads/Statement.txt", 'w');
fwrite($file,("T_id      Sender                   Reciever        Amount     \n"));
$res = mysql_query("Select * from tran where sacc='$acc'or racc='$acc'");
while ($rec = mysql_fetch_array($res)) {
    if ($rec[1] == 0 and $rec[2] == $acc) {
        $s = ($rec[0] . "     Deposit        " . "           Self               " . $rec[3] . "\n");
        fwrite($file, $s);
    }else if ($rec[1] == $acc and $rec[2] == 0) {
        $s = ($rec[0] . "     withdral        " . "          Self               " . $rec[3] . "\n");
        fwrite($file, $s);
    }else if ($rec[2] == $acc) {
        $s = ($rec[0] . "     Recieved from             " . $rec[1]."       " . $rec[3] . "\n");
        fwrite($file, $s);
    }else if ($rec[1] == $acc) {
        $s = ($rec[0] . "     Sent to                   " . $rec[2]."       " . $rec[3] . "\n");
        fwrite($file, $s);
    }
}
fclose($file);
?>
<html>
    <style>
        body{
            font-size: 20px;
        }
        a{
            color: blue;
            text-decoration: none;
        }
    </style>
    <body>
        Check Downloads.......... <br>
        <a href="home.php?val=home">redirect to home</a>
    </body>
</html>