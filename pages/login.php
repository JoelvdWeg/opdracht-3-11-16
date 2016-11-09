<?php
session_start();
$dbh = new PDO("mysql:host=localhost:3307;dbname=project 3 nov;","root","usbw");
$sql = 'SELECT * FROM `users`';
$gegevens = $dbh->query($sql);
$result = '';
if(isset($_POST['submit'])){
  $salt = '$1$3neee';
  $password = $_POST['Password'];
  $password = crypt($password, $salt);
    foreach ($gegevens as $acc) {
      if($_POST['Username'] == $acc['User Name'] AND $password == $acc['Password']){
        $_SESSION['login'] = True;
        header('Location: ../index.php');
    }
    else{
      $result = '<div style="color: red;">Wrong Username or Password.</div>';
    }
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
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/main.css">


       <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

       <!-- Latest compiled JavaScript -->
       <script src="assets/js/vendor/bootstrap.min.js"></script>


    </head>

    <body>
    <div  class="container">
      <div class="col-lg-4 col-lg-offset-4 Form">
      <form method="post">
      <div class="form-group">
        <label for="exampleInputUser1">username</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
          <input type="name" class="form-control" name="Username" id="exampleInputUser1" placeholder="User" aria-describedby="basic-addon1">
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon2"><i class="fa fa-lock" aria-hidden="true"></i></span>
          <input type="password" class="form-control" name="Password" id="exampleInputPassword1" placeholder="Password" aria-describedby="basic-addon2">
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
    <?php echo $result; ?>
  </div>
</div>
      <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/b-1.2.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
  </body>
</html>
