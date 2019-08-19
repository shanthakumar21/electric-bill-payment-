<!DOCTYPE html>

<html lang="en">
<?PHP

session_start();
?>
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="RegisHTML.css">
	<script scr="RegisJS.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="mainPaymentCss.css">
<script type="text/javascript">

   $(document).ready(function(){
    $("input").focus(function(){
        $(this).css("background-color", "#cccccc");
    });
    $("input").blur(function(){
        $(this).css("background-color", "#ffffff");
    });
});

</script>


</head>
<body style="background-color:gray;">

	    <div class="container">

    <form class="well form-horizontal" action=" " method="post"  id="contact_form">




<div class="form-group">
<span style="color:red;">*<?php


?></span>
  <label class="col-md-4 control-label"  > Reference ID:</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input   name="refernceid" placeholder="Bill reference ID" class="form-control "  type="text">
    </div>
  </div>
</div>

  <div class="form-group"> 
  <span style="color:red;">*<?php

 //echo $departmentErr;
?></span>
  <label class="col-md-4 control-label" >Month:</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select  name="month" class="form-control selectpicker">
      <option >Month</option>
      <option value="January ">January </option>
      <option  value="February">February</option>
      <option value="March " >March </option>
      <option  value="April ">April </option>
      <option  value="May">May</option>
      <option  value="June ">June </option>
      <option  value="July">July</option>
      <option  value="August">August</option>
	  <option  value="September">September</option>
	  <option  value="October">October</option>
	  <option  value="November">November</option>
	  <option  value="December ">December </option>
    </select>
  </div>
</div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button id="kk" name="submit" type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>
</form>
 
 <?php

 if(isset($_POST['submit'])){
	 
	 include'mainPaymentView.php';
 }
 
 
 
 ?> 
</body>