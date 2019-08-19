<?php
	session_start();
require __DIR__  . '/vendor/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AayvJD1oFEEPnPfWVaJH6diwfPRI1AGZUH0KYn4Y3g2iUn3kJUPk6QlDEh27kfVcobKWtdEA3MUjGzWz',    
        'EOUhaS1hLKgHTOVs02uda4VlL4d4ceF-p_rRDj30IMYepx0xstM6Ec0RcT8qPMckCSml_QEkY3H2Wfp5'      
    )
);


$apiContext->setConfig([
    'mode'=>'sandbox',
    'http.ConnectionTimeOut'=>30,
 'log.LogEnabled' => false,
 'log.FileName' => '',
 'log.LogLevel' => 'Fine',
 'validation.level'=>'log'

]);

$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal($_SESSION['billcost']);
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/online%20bill%20payment%20system/mainPaypalSuccess.php?approved=true")
    ->setCancelUrl("http://localhost/online%20bill%20payment%20system/first.php?approved=false");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

try {
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

    $payment->create($apiContext);
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $paymentID=$payment->getId();
    date_default_timezone_set('Asia/Karachi');
    $dateTime= date('Y/m/d H/i/s');
    session_start();
    $billID=$_SESSION['billid'];

$stmt = $conn->prepare("

INSERT INTO transactions(paymentID,dateAndTime,billID)
VALUES(:paymentID, :dateAndTime, :billID)
 
");

$stmt->bindParam(':paymentID', $paymentID);
$stmt->bindParam(':dateAndTime', $dateTime);
$stmt->bindParam(':billID',$billID);


$stmt->execute();

}catch (\PayPal\Exception\PayPalConnectionException $ex) {
 
    echo $ex->getData();
}

header("Location:".$payment->getApprovalLink());

?>