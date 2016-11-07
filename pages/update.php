<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_GET['Id'])) {

      $dbh = new PDO("mysql:host=localhost:3307;dbname=project 3 nov;","root","usbw");
      $sth = $dbh->prepare('UPDATE `users`
        SET `Name`=:Name, `Company Name`=:Company, `Domain Name`=:Domain, `User Name`=:Username, `Password`=:Password, `Server`=:Server, `Port`=:Port
        WHERE `Id`=:Id');
        $sql = 'SELECT * FROM `users`';
        $select = $dbh->query($sql);
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

          if (preg_match($regexserver, $_POST['Server']) == False){
            $count++;
          }
          if (preg_match($regexport, $_POST['Port']) == False){
            $count++;
          }
          $password = $_POST['Password'];
          foreach ($select as $pass) {
            if($_GET['Id'] == $pass['Id']){
              if($pass['Password'] != $_POST['Password']){
                if (preg_match($regexpassword, $_POST['Password']) == False){
                  $count++;
                }
                $password = crypt($password, $salt);
              }
            
            }
          }
          if($count == 0 AND $gebruikt == 0){



            $sth->bindParam(':Name', $_POST['Name']);
            $sth->bindParam(':Company', $_POST['Company']);
            $sth->bindParam(':Domain', $_POST['Domain']);
            $sth->bindParam(':Username', $_POST['Username']);
            $sth->bindParam(':Password', $password);
            $sth->bindParam(':Server', $_POST['Server']);
            $sth->bindParam(':Port', $_POST['Port']);
            $sth->bindParam(':Id', $_GET['Id']);
            $sth->execute();
          }
      header('Location: ../index.php');
    }
    header('Location: ../index.php');
  }


?>
