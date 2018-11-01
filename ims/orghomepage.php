<?php     //start php tag
	  
	  session_start();
	  //echo $_SESSION['username'];
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
   header("location:login.php");
}

require_once("dbcontroller.php");
$db_handle = new DBController("ims");
$sql1= "select * from drives where username= '".$_SESSION['username']."'";
$drives = $db_handle->runQuery($sql1);
?>
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

<SCRIPT LANGUAGE="JavaScript">
<!--
myPopup = '';

function openPopup(url) {
    myPopup = window.open(url,'popupWindow','width=640,height=480');
    if (!myPopup.opener)
         myPopup.opener = self;
}
//--></SCRIPT>

</head>

<body>

<div class="container">
  <div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<form name="orghomepage" method="post" action="pay.php">
<!-- we will create registration.php after registration.html -->

<fieldset>
          <h2>Welcome <?php echo $_SESSION['username']; ?></h2>
		  <h3>Your Drives:</h3>
          <hr class="colorgraph">
		  <?php if($drives) { foreach ($drives as $drive) { ?>
          <div class="form-group">            
			<a href="candidatemanagement.php?driveId=<?php echo $drive['driveid']; ?>"><?php echo $drive['driveid']; ?></a>			
          </div>
		  <?php } } ?>		  
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <input type="submit" name="submit" value="Pay" class="btn btn-lg btn-success btn-block">
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6"> <a class="btn btn-lg btn-primary btn-block" onclick="location.reload();location.href='createdrive.php'">Create New Drive</a> </div> <!-- javascript: openPopup('createdrive.php') -->
          </div>
        </fieldset>

</form>
</div>
  </div>
</div>

<?php     //start php tag


?>

</body>

</html>

