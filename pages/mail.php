<?php
session_start();
include('../classes/db_class.php');

$db = new db('localhost', 'root', 'usbw', 'project 3 nov');
$gegevens = $db->dbselect(' * ', 'users');
if(isset($_GET['Id'])){$_SESSION['Id'] = $_GET['Id'];}
if(isset($_POST['Send'])){
  require '../PHPMailer/PHPMailerAutoload.php';

  if(isset($_POST)) {
      $message = serialize($_POST);
  }
  else {
      $message = 'no post';
  }

  require_once('../tcpdf.php');
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
    if($_SESSION['Id'] == $account['Id'])
  $html.= '

  <table style="margin: 5px; border: 3px solid black; border-radius: 5px; background-color: grey ; padding: 10px; font-size: 2em;">
        <tr>
          <td>Name: </td>
          <td>' .$account['Name']. '</td>
        </tr>
        <tr>
          <td>Company Name: </td>
          <td>'.$account['Company Name']. '</td>
        </tr>
        <tr>
          <td>Domain Name: </td>
          <td>'.$account['Domain Name']. '</td>
        </tr>
        <tr>
          <td>User Name: </td>
          <td>'.$account['User Name']. '</td>
        </tr>
        <tr>
          <td>Password: </td>
          <td>'.$account['Password']. '</td>
        </tr>
        <tr>
          <td>Server: </td>
          <td>'.$account['Server']. '</td>
        </tr>
        <tr>
          <td>Port: </td>
          <td>'.$account['Port']. '</td>
        </tr>
  </table>
  </div>
      </body>
      </html>'
  ;};
  $pdf->writeHTML($html, true, 0, true, 0);
  $pdf->lastPage();
  $pdf->Output(getcwd().'/pdf.pdf', 'F');

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'one.mailgp.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'jvandijk.stage@onetoweb.nl';
  $mail->Password = 'N$@CFJO';
  $mail->Port = 25;
  $mail->From = 'jvandijk.stage@onetoweb.nl';
  $mail->FromName = 'Joey';

  $mail->addAddress($_POST['Email'], 'Name');
  $mail->isHTML(true);

  $mail->AddAttachment(getcwd().'/pdf.pdf');
  $mail->Subject = $_POST['Subject'];
  $mail->Body    = '<html>
  <head></head>
  <body>

  ';
  foreach ($gegevens as $account) {
    if($_SESSION['Id'] == $account['Id'])
  $mail->Body.= '
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
  </html>';}

  if(!$mail->send()) {
      echo 'er kon geen bericht verzonden worden.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
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
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/main.css">


   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

   <!-- Latest compiled JavaScript -->
   <script src="../assets/js/vendor/bootstrap.min.js"></script>


</head>

<body>

  <div class="container">
    <div class="col-lg-4 col-lg-offset-4 col-sm-8 col-sm-offset-2 wrapper">
      <h3 style="text-align:center;">Mail</h3>
      <form class="form" action="mail.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">E-mail</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="Email" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="exampleInputText1">Subject</label>
          <input type="text" class="form-control" id="exampleInputText1" name="Subject" placeholder="Subject" value="ftp info">
        </div>
        <button type="Submit" Name="Send" class="btn btn-default">Send</button>
        <a style="margin-top:10px;" href="../index.php" class="btn btn-default">homepage</a>
        <br>
      </form>


  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/dt-1.10.12/b-1.2.2/r-2.1.0/sc-1.4.2/se-1.2.0/datatables.min.js"></script>
       </body>
   </html>
