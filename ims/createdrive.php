<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Login</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">

</head>
<!-- NAVBAR
================================================== -->

<body>

<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
      
        
<form name="createdrive" method="post" action="createdrive.php" role="form">
<fieldset>
<h2>Please Select Drive Date</h2>
          <hr class="colorgraph">
          <div class="form-group">
<input type="date" name="drivedate">
</div>
<hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
<input type="submit" name="submit" value="Create" class="btn btn-lg btn-success btn-block">
</div>
</div>
        </fieldset>
</form>

<?php     //start php tag
	  
	  If(isset($_REQUEST['submit'])!='') {
	  session_start();
	  //echo $_SESSION['username'];
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
   header("location:login.php");
}

require_once("dbcontroller.php");
$db_handle = new DBController("ims");
$drivedate=date_format(new DateTime($_REQUEST['drivedate']),"ymd");
$sql1="select orgcode from users where username='".$_SESSION['username']."'";
$res = $db_handle->runQuery($sql1);
$driveid=$res[0]['orgcode'].$drivedate;
$sql1= "insert into drives (driveid,username) values ('".$driveid."','".$_SESSION['username']."')";
$res = $db_handle->runQueryOnly($sql1);
If($res)
{
	$sql1= "create table candidates_".$driveid." (id INT NOT NULL AUTO_INCREMENT , username VARCHAR(50) NOT NULL , name VARCHAR(150) NOT NULL , password VARCHAR(100) NOT NULL , phno INT(10) NOT NULL , PRIMARY KEY (id)) ENGINE = InnoDB";
	echo $sql1;
	$res = $db_handle->runQueryOnly($sql1);
	If($res) {
	Echo "Drive created";
	header("location:orghomepage.php");
	}
}
}
?>

</body>
</html>