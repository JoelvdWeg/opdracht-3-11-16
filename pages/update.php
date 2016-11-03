<?php
  include('../classes/db_class.php');
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_GET['Id'])) {
      $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
      $db->dbupdate('users', "`Name`='".$_POST['Name']."', `Company Name`='".$_POST['Company']."', `Domain Name`='".$_POST['Domain']."',  `User Name`='".$_POST['Username']."', `Password`='".$_POST['Password']."', `Server`='".$_POST['Server']."', `Port`='".$_POST['Port']."'", $_GET['Id']);
      header('Location: ../index.php');
    }
      echo 'nee';
  }


?>
