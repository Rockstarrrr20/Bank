<?php
session_start();
mysql_connect("localhost","root",null);
mysql_select_db("FITS");

$na=$_REQUEST['firstname'];
$em=$_REQUEST['email'];
$add=$_REQUEST['address'];
$city=$_REQUEST['city'];
$pn=$_REQUEST['PhoneNumber'];
$pi=$_REQUEST['pin'];
$pa=$_REQUEST['password'];
$cpa=$_REQUEST['con'];
$but=$_REQUEST['but'];
$bal=1000;
$r=rand(10,99);
$acc=$pn.$r;
$c=0;
if($but=='register')
{
if($pa==$cpa)
{
$res=mysql_query("select * from login where phone='$pn'");
while($rec=mysql_fetch_array($res))
{
$c=$c+1;
}
if($c==0)
{
mysql_query("insert into login values('$acc','$na','$pa','$em','$pn','$add','$pi','$city','$bal')");
$_SESSION['uid']=$na;
$_SESSION['acc']=$acc;
header("location: http://localhost/FITS/home.php?val=home");
}
else
{
echo "user with phone no. found";
}
}
else
{
    echo "Check your Password Again!";
}
}
else if($but=='Signin')
{
    $res=mysql_query("select * from login where phone='$pn'");
    while($rec=mysql_fetch_array($res))
    {
    $c=$c+1;
    $na=$rec[1];
    $acc=$rec[0];
    }
    if($c==0)
    {
        echo "User not found!";
    }
    else
    {
        $_SESSION['uid']=$na;
        $_SESSION['acc']=$acc;
        header("location: http://localhost/FITS/home.php?val=home");
    }
}

?>