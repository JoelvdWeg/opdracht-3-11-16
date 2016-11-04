<?php
include('../classes/db_class.php');

$db = new db('localhost', 'root', 'usbw', 'project 3 nov');
$gegevens = $db->dbselect(' * ', 'users');
 ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">


   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="../assets/js/vendor/bootstrap.min.js"></script>


</head>

<body>

  <div class="container">
    <div class="col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 wrapper">
      <h3 style="text-align:center;">Mail</h3>
      <form class="form" action="mail.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="Email" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="exampleInputText1">Subject</label>
          <input type="text" class="form-control" id="exampleInputText1" name="Subject" placeholder="Subject" value="ftp info">
        </div>
        <button type="Submit" Name="Send" class="btn btn-default">Send</button>

        <br>
      </form>


  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/b-1.2.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
       </body>
   </html>
