<?php
  include('classes/db_class.php');
  if(isset($_GET['Id'])){
    $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
    $db->dbdelete('users', $_GET['Id']);
    header( "Location: http://localhost:8080/")
  }
 ?>
