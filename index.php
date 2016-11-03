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
         <link rel="stylesheet" href="assets/css/main.css">

         <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
     </head>
     <body>
       <div  class="container">
         <?php
         $con=mysqli_connect("localhost","root","usbw","project");
         // Check connection
         if (mysqli_connect_errno())
           {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }

         $result = mysqli_query($con,"SELECT * FROM Persons");

         echo "<table border='1'>
         <tr>
         <th>Firstname</th>
         <th>Lastname</th>
         </tr>";

         while($row = mysqli_fetch_array($result))
           {
             echo "<tr>";
             echo "<td>" . $row['FirstName'] . "</td>";
             echo "<td>" . $row['LastName'] . "</td>";
             echo "</tr>";
           }
            echo "</table>";

         mysqli_close($con);
         ?>
     </div>
     </body>
 </html>
