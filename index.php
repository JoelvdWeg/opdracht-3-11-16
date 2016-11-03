<?php
  include('classes/db_class.php');

  $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
  $gegevens = $db->dbselect(' * ', 'users');

  if(isset($_GET['Id']) && $_GET['action'] == 'delete'){
    $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
    $db->dbdelete('users', $_GET['Id']);
    header('Location: index.php');
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

         <link rel="stylesheet" href="assets/css/bootstrap.min.css">
         <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
         <link rel="stylesheet" href="assets/css/font-awesome.min.css">
         <link rel="stylesheet" href="assets/css/main.css">


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <!-- jquery data table -->
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

      <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
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
          echo '<td> <i data-toggle="modal" data-target="#del'.$account['Id'].'" class="fa fa-trash-o fa-lg " aria-hidden="true"></i> <i data-toggle="modal" data-target="#upd'.$account['Id'].'" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i> </td></tr>';
         }
         ?>
       </table>

       <?php
         foreach ($gegevens as $account) {echo '
<!-- Modal -->
<!-- update -->
<div class="modal fade" id="upd'.$account['Id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">are you sure you want to delete?</h4>
     </div>
     <div class="modal-body">

     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <a href="?Id='.$account['Id'].'&action=create"><button type="button" class="btn btn-default">Update</button></a>
     </div>
   </div>
 </div>
</div>

 <!-- create  -->
<div class="modal fade" id="cre'.$account['Id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">are you sure you want to delete?</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="?Id='.$account['Id'].'&action=create"><button type="button" class="btn btn-default">Create</button></a>
      </div>
    </div>
  </div>
</div>

<!-- delete  -->
<div class="modal fade" id="del'.$account['Id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">are you sure you want to delete?</h4>
      </div>
      <div class="modal-body">
        <ul>
          <li>' .$account['Name']. '</li>
            <li>'.$account['Company Name']. '</li>
            <li>'.$account['Domain Name']. '</li>
             <li>'.$account['User Name']. '</li>
             <li>'.$account['Password']. '</li>
             <li>'.$account['Server']. '</li>
             <li>'.$account['Port']. '</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="?Id='.$account['Id'].'&action=delete"><button type="button" class="btn btn-default">Delete</button></a>
      </div>
    </div>
  </div>
</div>
';}
?>

<a href="new.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
     <script>
     </script>
     </body>
 </html>
