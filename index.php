<?php
  include('classes/db_class.php');

  $db = new db('localhost', 'root', 'usbw', 'project 3 nov');
    $dbh = new PDO("mysql:host=localhost:3307;dbname=project 3 nov;","root","usbw");
    $sql = 'SELECT * FROM `users`';
  $gegevens = $dbh->query($sql);

if(empty($_GET['pdf'])){$_GET['pdf']='';}

  if($_GET["pdf"]=="true"){
    require_once('tcpdf.php');
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }
    $pdf->SetFont('helvetica', '', 9);
    $pdf->AddPage();
    $html = '<html>
    <head></head>
    <body>

    ';
    foreach ($gegevens as $account) {
      if($_GET['Id'] == $account['Id'])
    $html.= '
    <ul>
      <li>Name: ' .$account['Name']. '</li>
        <li>Company Name: '.$account['Company Name']. '</li>
        <li>Domain Name: '.$account['Domain Name']. '</li>
         <li>User Name: '.$account['User Name']. '</li>
         <li>Password(Crypt): '.$account['Password']. '</li>
         <li>Server: '.$account['Server']. '</li>
         <li>Port: '.$account['Port']. '</li>
         </ul>

    </body>
    </html>'
    ;};
    $pdf->writeHTML($html, true, 0, true, 0);
    $pdf->lastPage();
    $pdf->Output('htmlout.pdf', 'I');
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


     </head>

     <body>
       <div  class="container">
         <table id="table" class="stripe">
           <thead>
             <tr>
               <th>Name</th>
               <th>Company Name</th>
               <th>Domain Name</th>
               <th>Username</th>
               <th>Password(Crypt)</th>
               <th>Server/Host</th>
               <th>Port</th>
               <th  class="right">Actions</th>
             </tr>
           </thead>
           <tbody>
           <?php
           foreach ($gegevens as $account) {
            echo '<tr><td>' .$account['Name']. '</td>' ;
            echo '<td>'.$account['Company Name']. '</td>';
            echo '<td>'.$account['Domain Name']. '</td>';
            echo '<td>'.$account['User Name']. '</td>';
            echo '<td style="width: 400px;">'.$account['Password']. '</td>';
            echo '<td>'.$account['Server']. '</td>';
            echo '<td>'.$account['Port']. '</td>';
            echo '<td class="right">
            <a data-toggle="tooltip" data-placement="top" title="Delete">
            <i data-toggle="modal" data-target="#del'.$account['Id'].'" class="fa fa-trash-o fa-lg " aria-hidden="true"></i>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Edit" href="#">
              <i data-toggle="modal" data-target="#upd'.$account['Id'].'" class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="PDF" class="pdf" href="?pdf=true&Id='.$account['Id'].'" >
              <i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Send Mail" href="pages/mail.php?Id='.$account['Id'].'">
              <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>
            </a> </td></tr>';
           }
           ?>
           </tbody>
         </table>

       <?php
         foreach ($gegevens as $account) {echo '
<!-- Modal -->
<!-- update -->
<div class="modal fade" id="upd'.$account['Id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Edit</h4>
     </div>

     <div class="modal-body">
     <form action="pages/update.php?Id='.$account['Id'].'" method="post">
      <div class="form-group">
        <label for="exampleInputName1">Name</label>
        <input type="name" class="form-control" name="Name" id="exampleInputName1" value="' .$account['Name']. '">
      </div>
      <div class="form-group">
        <label for="exampleInputCompany1">Company Name</label>
        <input type="name" class="form-control" name="Company" id="exampleInputCompany1" value="' .$account['Company Name']. '">
      </div>
      <div class="form-group">
        <label for="exampleInputDomain1">Domain Name</label>
        <input type="name" class="form-control" name="Domain" id="exampleInputDomain1" value="' .$account['Domain Name']. '">
      </div>
      <div class="form-group">
        <label for="exampleInputUser1">User Name</label>
        <input type="name" class="form-control" name="Username" id="exampleInputNUser1" value="' .$account['User Name']. '">
      </div>
      <div class="form-group">
        <label for="exampleInputpass1">Password(Crypt)</label>
        <input type="name" class="form-control" name="Password" id="exampleInputPass1" value="' .$account['Password']. '">
      </div>
      <div class="form-group">
        <label for="exampleInputServer1">Server/host</label>
        <input type="name" class="form-control" name="Server" id="exampleInputServer1" value="' .$account['Server']. '">
      </div>
      <div class="form-group">
        <label for="exampleInputPort1">Port</label>
        <input type="name" class="form-control" name="Port" id="exampleInputPort1" value="' .$account['Port']. '">
      </div>
      <div class="modal-footer">
        <input class="btn btn-default" type="submit" name="submit">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
     </form>
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
        <a href="pages/delete.php?Id='.$account['Id'].'"><button type="button" class="btn btn-default">Delete</button></a>
      </div>
    </div>
  </div>
</div>
';}
?>
<div  class="creat">
<a class="create" href="pages/create.php"><i class="fa fa-plus" aria-hidden="true"></i></a>
</div>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/b-1.2.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>

     <script>
      $(function(){
        $("#table").dataTable();
      })
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
     </script>
     </body>
 </html>
