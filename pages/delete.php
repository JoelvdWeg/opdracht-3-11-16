<?php
  include('../classes/db_class.php');
  if(isset($_GET['Id'])){
    $dbh = new PDO("mysql:host=localhost:3307;dbname=project 3 nov;","root","usbw");
    $sth = $dbh->prepare('DELETE FROM `project 3 nov`.`users` WHERE `Id`=:Id');
    $sth->bindParam(':Id', $_GET['Id']);
    $sth->execute();
       header('Location: ../index.php');
  }
  else {
    header('Location: ../index.php');
  }
 ?>
