<?php
include('../classes/db_class.php');
if(isset($_POST['submit'])){
  $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
  $db->dbinsert("`project 3 nov`.`users` (`Name`, `Company Name`, `Domain Name`, `User Name`, `Password`, `Server`, `Port`)", "'".$_POST["Name"]."',  '".$_POST["Company"]."',  '".$_POST["Domain"]."',  '".$_POST["Username"]."',  '".$_POST["Password"]."',  '".$_POST["Server"]."',  '".$_POST["Port"]."'");


  header('Location: ../index.php');
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
              <input type="name" class="form-control" name="Name" id="exampleInputName1" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="exampleInputCompany1">Company</label>
              <input type="name" class="form-control" name="Company" id="exampleInputCompany1" placeholder="Company">
            </div>
            <div class="form-group">
              <label for="exampleInputDomain1">Domain Name</label>
              <input type="name" class="form-control" name="Domain" id="exampleInputDomain1" placeholder="Domain Name">
            </div>
            <div class="form-group">
              <label for="exampleInputUser1">User Name</label>
              <input type="name" class="form-control" name="Username" id="exampleInputUser1" placeholder="User Name">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="Password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="exampleInputServer1">Server/Host</label>
              <input type="name" class="form-control" name="Server" id="exampleInputServer1" placeholder="Server/Host">
            </div>
            <div class="form-group">
              <label for="exampleInputPort1">Port</label>
              <input type="name" class="form-control" name="Port" id="exampleInputPort1" placeholder="Port">
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
          </form>
      </div>
    </div>
    </body>
</html>
