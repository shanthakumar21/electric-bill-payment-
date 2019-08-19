$payer= new \PayPal\api\payer();
$details= new \PayPal\api\Details();
$amount= new \PayPal\api\Amount();
$transaction= new \PayPal\api\Transactions();
$payment=new \PayPal\api\Payment();
$redirectUrls= new \PayPal\api\RedirectUrls();
//payer

$payer->setPaymentMethod('paypal');

//Details
$details->setShipping('2.00')
->setTax('0.00')
->setSubtotal('20.00');

//Amount

$amount->setCurrency('GBP')
->setTotal('22.00')
->setDetails($details);

//transiction
//->setDescription('Membership');
$transaction-> setAmount($amount);

//payment
$payment->setIntent('sale')
->setPayer($payer)
->setTransactions($transaction);


// redirectUrls

$redirectUrls-> setReturnUrl('http://localhost/kkk/ixax.php?approved=true')
->setCancelUrl('http://localhost/kkk/cancel.php?approved=false');
$payment-> setRedirectUrls($redirectUrls);
////jjjjjjjjjjjj


$apiContext->setConfig([
         'mode'=>'sandbox',
         'http.ConnectionTimeOut'=>30,
      'log.LogEnabled' => false,
      'log.FileName' => '',
      'log.LogLevel' => 'Fine',
      'validation.level'=>'log'

]);