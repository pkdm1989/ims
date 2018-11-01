<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>REGISTRATION</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
</head>

<body>

<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<form name="registration" method="post" action="oregistration.php">
<!-- we will create registration.php after registration.html -->

<fieldset>
          <h2>Please Sign Up</h2>
          <hr class="colorgraph">
          <div class="form-group">
            <input name="username" type="text" id="username" class="form-control input-lg" placeholder="Email Address">
          </div>
		  <div class="form-group">
            <input name="name" type="text" id="name" class="form-control input-lg" placeholder="Full Name">
          </div>
		  <div class="form-group">
            <input name="phno" type="text" id="phno" class="form-control input-lg" placeholder="Phone Number">
          </div>
		  <div class="form-group">
            <input name="orgcode" type="text" id="orgcode" class="form-control input-lg" placeholder="Organization Code">
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
          </div>
		  <div class="form-group">
            <input type="password" name="repassword" id="repassword" class="form-control input-lg" placeholder="Reenter Password">
          </div>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="submit" value="Register" class="btn btn-lg btn-success btn-block">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6"> <a class="btn btn-lg btn-primary btn-block" onclick="location.reload();location.href='login.php'">Login</a> </div>
          </div>
        </fieldset>

</form>
</div>
  </div>
</div>

<?php     //start php tag
//include connect.php page for database connection
Include('connect.php');
//if submit is not blanked i.e. it is clicked.
If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['name']=='' || $_REQUEST['username']=='' || $_REQUEST['password']==''|| $_REQUEST['repassword']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql="insert into users(name,username,password,phno,orgcode) values('".$_REQUEST['name']."', '".$_REQUEST['username']."', '".$_REQUEST['password']."','".$_REQUEST['phno']."','".$_REQUEST['orgcode']."')";
$res=mysqli_query($con,$sql);
If($res)
{
Echo "Record successfully inserted";
}
Else
{
Echo "There is some problem in inserting record";
}


}
}

?>

</body>

</html>

