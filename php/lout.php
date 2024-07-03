<?php
session_start();


$_SESSION['uid']=null;
$_SESSION['acc']=null;
unset($_SESSION['acc']);
unset($_SESSION['id']);

session_destroy();
header("location: http://localhost/FITS/");

?>