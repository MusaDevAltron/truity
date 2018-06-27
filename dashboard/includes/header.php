<?php
   session_start();
   //Checking if the session is set)
   if(isset($_SESSION['SessionID'])) {
      $usersession = $_SESSION['SessionID'];
   }
   else {
    //  echo "Unknown user";
    header('Location:../'); // Kick you back to login
    }

    // error_reporting(E_ALL); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Truity Portal | Dashboard</title>
<link rel="stylesheet" href="resources/css/dash.css" crossorigin="anonymous">
<link rel="stylesheet" href="resources/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="resources/js/radio.js"></script>
<script type="text/javascript" src="resources/js/preload.js"></script>
</head>
<body>
<div class="spinner">
  <div class="loader"></div>
  <div class="double-bounce2"></div>
</div>