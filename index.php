<?php
  include('classes/db_class.php');

  $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
  $gegevens = $db->dbselect('*', 'users');
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

         <link rel="stylesheet" href="assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
         <link rel="stylesheet" href="assets/css/font-awesome.min.css">
         <link rel="stylesheet" href="assets/css/main.css">

         <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
     </head>
     <body>
       <div  class="container">
         <table>
           <tr>
             <th>Name</th>
             <th>Company Name</th>
             <th>Domain Name</th>
             <th>Username</th>
             <th>Password</th>
             <th>Server/Host</th>
             <th>Port</th>
             <th>Actions</th>
           </tr>
         <?php
         foreach ($gegevens as $account) {
          echo '<tr><td>' .$account['Name']. '</td>' ;
          echo '<td>'.$account['Company Name']. '</td>';
          echo '<td>'.$account['Domain Name']. '</td>';
          echo '<td>'.$account['User Name']. '</td>';
          echo '<td>'.$account['Password']. '</td>';
          echo '<td>'.$account['Server']. '</td>';
          echo '<td>'.$account['Port']. '</td>';
          echo '<td> <i onclick="delete('.$account['Id'].')" class="fa fa-trash-o" aria-hidden="true"></i> <i onclick="update('.$account['Id'].')" class="fa fa-pencil-square-o" aria-hidden="true"></i> </td></tr>';

         }
         ?>
       </table>
     </div>
     </body>
 </html>
