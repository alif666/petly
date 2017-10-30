
<?php
 @session_start();
  require_once("database/utility.php");

     if(isset($_POST["login"]))
		{
	      $result=mysqli_query($conn,"select * from user_admin where user_admin.UserName = '".$_POST['username']."' and user_admin.Password=Password('".$_POST['password']."')");
	      
		  $res= mysqli_fetch_row($result);
	      $count=mysqli_num_rows($result);
		if($count>0)
	        {
	            $_SESSION['UserId'] = $res[0];
				echo "password matched";
	            //header("Location: scheduleList");			  
				//echo "<script>window.location.href = 'scheduleList';</script>";
			}
			else
			{
				$msg="Do you forget? Retype User Name and Password......";	
			}			 
         } 
?>

<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style/loginPage.css">
  <title>Riverline</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center animated pulse" id = "heading">
  <h1 id = "headingText">Welcome To <br> RiverLine Logistics &amp; Transport <br></h1>
  <h2 id = "headingText2">VM Portal</h2>
</div>
  
<div class="container">
  <div class="row " align = "center">

  		<!--body box starts here-->
			    <div class=" col-md-4 col-md-offset-4 shadow animated pulse" id = "body_box" >
			      	<img class="img-responsive" src="style/images/logoLogin.png" alt="RiverLine"><br><br>
					  <form action="index" method ="POST" id = "boxForm">
					    <!--<div class="form-group">
					      <select class="form-control" id="user_type" name = "user_type">
					        <option value = "Captain">Captain</option>
					        <option value = "First Officer">First Officer</option>
					        <option value = "Super Admin">Super Admin</option>
					      </select>
					      </div>-->
					    <div class="form-group">
						<?php echo isset($msg)?  $msg:"Please Enter Your Information"; ?>
											
					      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="username" required>
					      </div>
					      <div class="form-group">
					      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
					    </div>
					    
					    <button name ="login" style="border-radius: 20px;" type="submit" class="btn btn-default btn-block">Submit</button>
					 </form>
				</div>
  
   <!--body box ends here-->


  </div>
</div>

</body>
</html>
