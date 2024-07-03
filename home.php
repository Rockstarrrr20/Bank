<?php
session_start();
mysql_connect("localhost", "root", null);
mysql_select_db("FITS");
$id = $_SESSION['uid'];
$acc = $_SESSION['acc'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank</title>
    <style>
        
    body {

color: #333;
background-color: #ddd
}

* {
box-sizing: border-box;

}

.logo {
padding-top: 10px;
}
.acc{  
    margin-right:10px;
      border-radius:60px;
}

/* Add a black background color to the top navigation */
ul img{
margin-left: -30px;
}
ul {
list-style-type: none;
margin: 0;

overflow: hidden;
background-color: rgb(90, 160, 218);
}

li {
font-size: 20px;
float: left;
}

li a, .dropbtn {
display: inline-block;
color: rgb(8, 8, 8);
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
background-color:  #f9f9f9;
}

li.dropdown {
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 100px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
display: block;
}



.contianer {
width: 100%;
height: 400px;
margin-bottom: 100px;

}





.footer {
margin-top: 20px;
width: 100%;
padding: 0px 100px 100px 100px;
background-color: #333;
color: #efefef;
display: flex;
margin-right: 100%;
}

.footer div {
text-align: center;
}

.col-2 {
flex-grow: 5;
}

.footer div h2 {
font-weight: 300;
margin-top: 10px;
letter-spacing: 2px;

}

.active {
color: #333;
}

.col-1 a {
display: block;
text-decoration: none;
color: #efefef;
margin-bottom: 10px;
}

.s {
text-decoration: none;
color:blue;
}

    </style>
</head>


<body>
<ul>
  <a href="#news" style="font-size: 20px; float:left; text-decoration:none; color:rgb(70, 205, 207);"><img src="fit.png" alt="" width="60px" height="40px">
    FITS bank</a>
  <li><a href="home.php?val=home">Home</a></li>
  <li class="dropdown">
    <a href="" class="dropbtn">Setting</a>
    <div class="dropdown-content">
      <a href="home.php?val=cp">Change Pass</a>
      <a href="home.php?val=ce">Change Email</a>
      <a href="php/lout.php">log out</a>
      <a href="home.php?val=ab">About Us</a>
    </div>
  </li>
  <li><a href="home.php?val=invest">Invest</a></li>
  <li><a href="home.php?val=cu">Contact Us</a></li>
  <a  style="float:right;color:black;" href="home.php?val=detail"><?php echo $id;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class=acc src="icon/acc.png" alt="not" height="40px" width="40px"></a>
</ul>
    <!-- Main column -->

    <div class="container">
        <?php
        $val = $_REQUEST['val'];
        if ($val == 'invest') {
            include("html/Invest.html");
        } else if ($val == 'detail') {
            include("php/detail.php");
        } else if ($val == 'home') {
            include("html/home.html");
        } else if ($val == 'de') {
            include("html/Deposite.html");
        } else if ($val == 'mt') {
            include("html/mobile.html");
        } else if ($val == 'wi') {
            include("html/withdraw.html");
        } else if ($val == 'tr') {
            include("html/transfer.html");
        } else if ($val == 'ab') {
            include("html/About.html");
        }else if ($val == 'er') {
            include("html/error.html");
        } else if ($val == 'su') {
            include("html/success.html");
        } else if ($val == 'cb') {
            include("html/cb.html");
        } else if ($val == 'ba') {
            $b = $_REQUEST['bala'];
            echo "Account balance:" . $b; ?>
                  <br><a class=s href="home.php?val=home">redirect to home</a>
                  <?php } 
                  
        else if ($val == "tran") {
            include("php/tran.php");
        } 
        
        
        else if ($val == "st") {
           include("php/state.php");
        }else if ($val == "cp") {
            include("html/cpass.html");
         }else if ($val == "ce") {
            include("html/cemail.html");
         }else if ($val == "lo") {
            include("php/lout.php");
         }
        ?>
    </div>



    <div class="footer">
        <div class="col-1">
            <h2> Links</h2>
            <a href="home.php?val=home">Home</a></li>
            <a href="home.php?val=ab">About us</a>
            <a href="#">Event</a>
            <a href="#"> Gallery</a>
        </div>


        <div class="col-2">
            <h2>Contact Info</h2>
            <b>Email :</b> fitsbank@gmail.com<br>
            <b>Call :</b> +91 7891387514<br>
            <b>Fax :</b> +91 -123 4567890 <br>
            <b>Website :</b> https://www.FITS.com <br>

        </div>
        <div class="col-3">
            <h2>Available On</h2>

            <img src="https://img.freepik.com/free-vector/instagram-icon_1057-2227.jpg?size=626&ext=jpg&ga=GA1.1.1211183132.1688722041&semt=ais"
                alt="" width="50px">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/768px-Logo_of_Twitter.svg.png?20220821125553"
                alt="" width="50px">
            <img src="https://1000logos.net/wp-content/uploads/2021/04/Facebook-logo-768x480.png" alt="" width="70px">

        </div>

    </div>




</body>

</html>