<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Php send sms</title>
<!-- CSS only -->


<body>

<div>
<h1 >Send OTP IN PHP</h1>
<form action="" >
<input type="text"  name="otp" ><br>
<input type="submit"  value="Sign in" name="btn">
</form>
</div>

</body>

</html>
<?php
$otp=$_REQUEST['otp'];
$otpc=$_REQUEST['ot'];
if($otp==$otpc)
{
    header("location: http://localhost/FITS/home.php?val=home");
}
else{
    echo "Wrong otp";
}
?>