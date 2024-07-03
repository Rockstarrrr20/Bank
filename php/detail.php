<?php
session_start();
mysql_connect("localhost","root",null);
mysql_select_db("FITS");
$id=$_SESSION['uid'];
$acc=$_SESSION['acc'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

table{
    margin: 100px 450px 30px ;
}
td{
    background-color: #eee;

    width:100px;
   font-size: 25px;
}
a{
    color: blue;
    text-decoration: none;
}
    </style>
   
</head>
<body>
<?php $res = mysql_query("select * from login where acc='$acc'");
    while ($rec = mysql_fetch_array($res)) {
        $add=$rec[5];
        $em=$rec[3];
    }?>
    <table>
        <tr>
            <td>name</td>
            <td > <?php echo $id;?> </td>
        </tr>
        <tr>
            <td>Account No.</td>
            <td > <?php echo $acc;?> </td>
        </tr>
        <tr>
            <td>Address</td>
            <td > <?php echo $add;?> </td>
        </tr>
        <tr>
            <td>email</td>
            <td > <?php echo $em;?> </td>
        </tr>
        <tr>
            <td>Balance</td>
            <td > <a href="home.php?val=cb">click to check</a> </td>
        </tr>
    </table>
</body>
</html>