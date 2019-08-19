<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h2 style="color:green" > The payment is successully done Thank you...................!</h2>
</body>
</html>
<?php
session_start();
$servername="localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$billID=$_SESSION['billid'];
$sql = "SELECT * FROM bill WHERE  Billid='$billID' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){

     
$Billid=$units=$dueDate=$cost=$Month='';
$cost="";
$units="";
    while($row = mysqli_fetch_assoc($result)) {
      $units=$row["units"];
     $cost=$row["cost"]; 
     $Billid=$row['Billid'];
      $dueDate=$row['dueDate'];
      $Month=$row['Month'];
      $customerID=$row['customerID'];
    }   
}
$dateTime=date('Y-m-d H-i-s');
  $sql2="INSERT INTO  billhistory (Billid,units,cost, Month, billStatus, dueDate,paymentDateAndTime, customerID) VALUES ('$Billid','$units','$cost','$Month','Paid','$dueDate',' $dateTime','$customerID')";
 mysqli_query($conn, $sql2);
    $sql3="UPDATE bill SET billStatus='Paid' WHERE Billid='$Billid' ";
    mysqli_query($conn, $sql3);

$sql4="SELECT * FROM registration WHERE  NIC='$customerID' ";
// $sql4="DELETE FROM bill WHERE Billid='$Billid' ";
$email2="";
    $khan=mysqli_query($conn, $sql4);
    while($row5 = mysqli_fetch_assoc($khan)) {
        $email2=$row5['Email'];

    }
    
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor2/autoload.php';

$mail = new PHPMailer();                              // Passing `true` enables exceptions
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ak9145993@gmail.com';                 // SMTP username
$mail->Password = 'Izaz12345';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;  
$mail->SMTPOptions = array(
    'ssl' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    
                                      // TCP port to connect to

$mail->From = 'ak9145993@gmail.com';
$mail->FromName = 'Mailer';
//$mail->addAddress('taimoorkhan525@gmail.com', 'Joe User');     // Add a recipient
$mail->addAddress($email2);               // Name is optional

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Bill Payment confirmation';
$mail->Body    = '<h1 style="color:green"> Thank you..... </h1> <br><br><br><b style="color:blue; font-size:15px;">your <h2></h2>bill is pay successfuly</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 

    








?>