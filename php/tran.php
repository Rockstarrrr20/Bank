<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];
?>
<html>
<head>
    <style>
    table{
            margin-left: 450px;
            margin-top:10px;
        }
    </style>
</head>
<body>
    <table border="1">
    <tr>
                    <td><b>Event</b></td>
                    <td><b>Reciever/sender</b></td>
                    <td><b>Amount</b></td>
                </tr>
        <?php
        $res = mysql_query("Select * from tran where sacc='$acc'or racc='$acc'");
        while ($rec = mysql_fetch_array($res)) {
            if ($rec[1] == 0 and $rec[2] == $acc) { ?>
                <tr>
                    <td>Deposit to</td>
                    <td>Self</td>
                    <td><?php echo $rec[3];?></td>
                </tr>
            <?php }else if ($rec[1] == $acc and $rec[2] == 0){?>
                <tr>
                <td>withdawl</td>
                <td>Self</td>
                <td><?php echo $rec[3];?></td>
            </tr>
           <?php }else if($rec[1]==$acc){ ?>
            <tr>
                    <td>sent to</td>
                    <td> <?php echo $rec[2];?> </td>
                    <td><?php echo $rec[3];?></td>
                </tr>
          <?php } else if($rec[2]==$acc){?>
            <tr>
                    <td>recieved from</td>
                    <td> <?php echo $rec[1];?> </td>
                    <td><?php echo $rec[3];?></td>
                </tr>
         <?php }
         }?>
          
    </table>
</body>

</html>