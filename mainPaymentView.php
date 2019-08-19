<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php



$reference=$_POST['refernceid'];
$month=$_POST['month'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$cost="";
$units="";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM bill WHERE Billid= '$reference' and Month='$month' and billStatus ='Non Paid' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{  
	//main curly brases?>

<div class="well form-horizontal"   id="contact_form">

<table class="table table-hover table-responsive">
	<thead>
	<tr style="color:green;"class="success">
		<th>Reference_ID</th>
		<th>NO_Units</th>
		<th>Bill_Cost</th>
		<th>Month</th>
		<th >Bill_Status</th>
		<th>Due_date</th>
		<th> payment</th>
	</tr>
	</thead>
	<tbody>
	<?php
	  while($row = mysqli_fetch_assoc($result)) {
		  $units=$row["units"];
		  $cost=$row["cost"];
		 echo"<tr class='info'>";
		 echo"<td>".$row["Billid"]."</td>";
		 	 echo"<td>".$row["units"]."</td>";
			 	 echo"<td>".$row["cost"]."</td>";
				 	 echo"<td>".$row["Month"]."</td>";
					 	 echo"<td id='change' style='color:red'>".$row["billStatus"]."</td>";
						 	 echo"<td>".$row["dueDate"]."</td>";
		                         echo"<td> <a href='mainPaypal.php'><button class='btn btn-sm btn-info'> Pay Bill  <span class='glyphicon glyphicon-send'></span></button></a> </td>";
		 echo"</tr>";
	 $duedate=$row["dueDate"];
	 $billID=$row["Billid"];
     $billCost=$row["cost"];
	}  
	
	
$_SESSION['billid']= $billID;
$_SESSION['billcost']=  $billCost;
	?>
	</tbody>

</table>

</div>
<?php


}else{//main curly brases
	
	echo"<script type='text/javascript'> alert('sorry record is not found! Thank You')</script>";
}  ?>
</body>
</html>