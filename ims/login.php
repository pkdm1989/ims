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
      <form name="form_login" method="post" action="login.php" role="form">
        <fieldset>
          <h2>Please Sign In</h2>
          <hr class="colorgraph">
          <div class="form-group">
            <input name="username" type="text" id="username" class="form-control input-lg" placeholder="Email Address">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
          </div>
		  <div class="form-group">
		  <select id="logintype" name="logintype" class="form-control input-lg">
			<option value="C">I am Candidate</option>
			<option value ="O">I am Organization</option>
		  </select>
		  </div>
		  <div class="form-group">
            <input name="driveid" type="text" id="driveid" class="form-control input-lg" placeholder="Drive Id">
          </div>
          <span class="button-checkbox">
          <button type="button" class="btn" data-color="info">Remember Me</button><!-- Additional Option -->
          <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">		  
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="Submit" value="Login" class="btn btn-lg btn-success btn-block">
            </div>
            <div id="registerbtn1" class="col-xs-6 col-sm-6 col-md-6"> <a class="btn btn-lg btn-primary btn-block" onclick="location.reload();location.href='cregistration.php'">Register</a> </div>
			<div id="registerbtn2" style="display: none;" class="col-xs-6 col-sm-6 col-md-6"> <a class="btn btn-lg btn-primary btn-block" onclick="location.reload();location.href='oregistration.php'">Register</a> </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>



<?php     //start php tag
//include connect.php page for database connection
require_once("dbcontroller.php");

//Include('connect.php');
//if submit is not blanked i.e. it is clicked.
if (isset($_REQUEST['Submit'])) //here give the name of your button on which you would like    //to perform action.
{
// here check the submitted text box for null value by giving there name.
	if($_REQUEST['username']=="" || $_REQUEST['password']=="")
	{
	echo " Field must be filled";
	}
	else
	{
		$db_handle = new DBController("ims");
		if($_REQUEST['logintype']=="O") {
			
	   $sql1= "select * from users where username= '".$_REQUEST['username']."' &&  password ='".$_REQUEST['password']."'";
		} else {
			//$db_handle = new DBController($_REQUEST['driveid']);
	   $sql1= "select * from candidates_".$_REQUEST['driveid']." where username= '".$_REQUEST['username']."' &&  password ='".$_REQUEST['password']."'";
		}
	   
	  //$result=mysqli_query($con,$sql1)
	    //or exit("Sql Error".mysqli_error($con));
	    //$num_rows=mysqli_num_rows($result);
		$num_rows = $db_handle->numRows($sql1);
		
	   if($num_rows>0)
	   {
//here you can redirect on your file which you want to show after login just change filename ,give it to your filename.
session_start();
$_SESSION['username'] = $_REQUEST['username'];

if($_REQUEST['logintype']=="O") {
		   header("location:orghomepage.php"); 
} else {
	header("location:status.php");
}
		   
 //OR just simply print a message.
         //Echo "You have logged in successfully";	
        }
	    else
		{
			echo "username or password incorrect";
		}
	}
}	
?>

<script type="text/javascript">
document.getElementById('logintype').addEventListener('change', function () {
    if (this.value == 'O') {
		document.getElementById('driveid').style.display = 'none';
    document.getElementById('registerbtn1').style.display = 'none';
	document.getElementById('registerbtn2').style.display = 'block';
	} else {
		document.getElementById('driveid').style.display = 'block';
    document.getElementById('registerbtn1').style.display = 'block';
	document.getElementById('registerbtn2').style.display = 'none';
	}
});
</script>

</body>
</html>
