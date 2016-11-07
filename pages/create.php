<?php
session_start();

if(empty($_SESSION['result'])){$_SESSION['result'] = '';}

if(isset($_POST['submit'])){
  $dbh = new PDO("mysql:host=localhost:3307;dbname=project 3 nov;","root","usbw");
  $sth = $dbh->prepare('INSERT INTO `project 3 nov`.`users` (`Name`, `Company Name`, `Domain Name`, `User Name`, `Password`, `Server`, `Port`)
    VALUES (:Name , :Company, :Domain, :Username, :Password, :Server, :Port)');


  $_SESSION['result'] = '';
  $regexname = "/^[a-zA-Z ]{1,30}$/";
  $regexcompany = "/^[a-zA-Z0-9 ]{1,40}$/";
  $regexdomain= "/^[a-zA-Z0-9 ]{1,100}$/";
  $regexusername = "/^[a-zA-Z-_]{1,30}$/";
  $regexpassword = "/^[a-zA-Z0-9]{1,20}$/";
  $regexserver = "/^[a-zA-Z0-9]{1,255}$/";
  $regexport = "/^[0-9]{1,5}$/";
  $count = 0;
  $gebruikt = 0;

  if(preg_match($regexname, $_POST['Name']) == False){
    $count++;
  }
  if (preg_match($regexcompany, $_POST['Company']) == False){
    $count++;
  }
  if (preg_match($regexdomain, $_POST['Domain']) == False){
    $count++;
  }
  if (preg_match($regexusername, $_POST['Username']) == False){
    $count++;
  }
  if (preg_match($regexpassword, $_POST['Password']) == False){
    $count++;
  }
  if (preg_match($regexserver, $_POST['Server']) == False){
    $count++;
  }
  if (preg_match($regexport, $_POST['Port']) == False){
    $count++;
  }

  if($count == 0 AND $gebruikt == 0){
    $passwordcreate = $_POST['Password'];
    $passwordcreate = crypt($passwordcreate, $salt);
    $sth->bindParam(':Name', $_POST['Name']);
    $sth->bindParam(':Company', $_POST['Company']);
    $sth->bindParam(':Domain', $_POST['Domain']);
    $sth->bindParam(':Username', $_POST['Username']);
    $sth->bindParam(':Password', $passwordcreate);
    $sth->bindParam(':Server', $_POST['Server']);
    $sth->bindParam(':Port', $_POST['Port']);
    $sth->execute();

    header('Location: ../index.php');
  }
}

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
        <link rel="stylesheet" href="../assets/css/main.css">

        <script src="../assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <div  class="container">
        <div class="col-lg-4 col-lg-offset-4 Form">
          <form method="post">
            <div class="form-group">
              <label for="exampleInputName1">Name</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexname, $_POST['Name']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Name" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputCompany1">Company</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexcompany, $_POST['Company']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Company" id="exampleInputCompany1" placeholder="Company">
            </div>
            <div class="form-group">
              <label for="exampleInputDomain1">Domain Name</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexdomain, $_POST['Domain']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Domain" id="exampleInputDomain1" placeholder="Domain Name">
            </div>
            <div class="form-group">
              <label for="exampleInputUser1">User Name</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexusername, $_POST['Username']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Username" id="exampleInputUser1" placeholder="User Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexpassword, $_POST['Password']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputServer1">Server/Host</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexserver, $_POST['Server']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Server" id="exampleInputServer1" placeholder="Server/Host">
            </div>
            <div class="form-group">
              <label for="exampleInputPort1">Port</label>
              <?php
              if(isset($_POST['submit'])){
                if(preg_match($regexport, $_POST['Port']) == False){
                  echo '<a style="color:Red">*</a>';
                }
              }?>
              <input type="name" class="form-control" name="Port" id="exampleInputPort1" placeholder="Port">
            </div>
            <?php
            if(isset($_POST['submit'])){
              if($count != 0){
                echo '<a style="color:Red">All fields with * are false<a>';
              }
            }?>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
            <a style="margin-top:10px;" href="../index.php" class="btn btn-default">homepage</a>

          </form>
      </div>
    </div>
    </body>
</html>
