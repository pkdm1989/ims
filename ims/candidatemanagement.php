<?php     //start php tag
	  
	  session_start();
	  //echo $_SESSION['username'];
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
   header("location:login.php");
}

require_once("dbcontroller.php");
$db_handle = new DBController("ims");
$sql1= "select * from candidates_".$_REQUEST['driveId']."";
$candidates = $db_handle->runQuery($sql1);

if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "addorupdate":
	$num_rows = $db_handle->numRows("select * from candidates_".$_REQUEST['driveid']." where username= '".$_REQUEST['email']."'");
		if($num_rows>0) {
			$num_rows = $db_handle->numRows("select * from candidates_".$_REQUEST['driveid']." where username= '".$_SESSION['username']."'");			
		}
		else {
			
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}

?>
<!DOCTYPE html>
<html class="no-js">
  <head>  
    <title>Manage Candidates</title>  
    <style>
      .username.ng-valid {
          background-color: lightgreen;
      }
      .username.ng-dirty.ng-invalid-required {
          background-color: red;
      }
      .username.ng-dirty.ng-invalid-minlength {
          background-color: yellow;
      }

      .email.ng-valid {
          background-color: lightgreen;
      }
      .email.ng-dirty.ng-invalid-required {
          background-color: red;
      }
      .email.ng-dirty.ng-invalid-email {
          background-color: yellow;
      }

    </style>
     
     <link rel="stylesheet" href="css/app.css">
	 
	 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<meta name="description" content="">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">

  </head>
  <body>
      <div class="container">
          <div class="panel panel-default">
              <div class="panel-heading"><span class="lead">Candidate Registration Form
			  <button type="button" class="btn btn-warning btn-sm floatRight" onClick="location.reload();location.href='logout.php'">Logout</button>
			  </span></div>
              <div class="tablecontainer">
			  <table class="table table-hover">
                  
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Phno</th>
                              <th>Email</th>
							  <th>Password</th>
                              <th width="20%"></th>
                          </tr>
                      </thead>
					  <tbody>
                          <tr >
                      
					  <td>
                          
                                  <input type="text" id="uname" class="username form-control input-sm" placeholder="Enter your name" required />
                                  
                              
                      </td>
                        
                      
                      <td>
                          
                                  <input type="text" id="phno" class="form-control input-sm" placeholder="Enter your Phno."/>
                              
                      </td>

                      <td>
                          
                                  <input type="email" id="email" class="email form-control input-sm" placeholder="Enter your Email" required/>
                                  
                              
                      </td>
					  
					  <td>
						  
                                  <input type="password" id="password" class="password form-control input-sm" placeholder="Enter your password" required/>
                                  
                              
						  </td>
                      
					  <td>
                          
                              <button type="button"  value="Add/Update" class="btn btn-primary btn-sm">Add/Update</button>
                              <button type="button" class="btn btn-warning btn-sm">Reset</button>
                          
						  </td>
                      
					  </tr>
                      </tbody>
                  
				  </table>
              </div>
          </div>
          <div class="panel panel-default">
                <!-- Default panel contents -->
              <div class="panel-heading"><span class="lead">List of Candidates </span></div>
              <div class="tablecontainer">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>ID.</th>
                              <th>Name</th>
                              <th>Phno</th>
                              <th>Email</th>
                              <th width="20%"></th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr >
						  <?php if($candidates) { foreach ($candidates as $candidate) { ?>
                              <td><span ><?php echo $candidate['id']; ?></span></td>
                              <td><span ><?php echo $candidate['name']; ?></span></td>
                              <td><span ><?php echo $candidate['phno']; ?></span></td>
                              <td><span ><?php echo $candidate['username']; ?></span></td>
                              <td>
                              <button type="button" class="btn btn-success btn-sm">Edit</button>  <button type="button" class="btn btn-danger btn-sm">Remove</button>
							  </td>
							  <?php } } ?>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>

	  
	  
  </body>
</html>