<?php
	session_start();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>A&C Tour Agency</title>
  
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="style1.css">

  
</head>

<body>
<?php
if (! $_POST) {
?>
	<form action="index.php" method="post" accept-charset="UTF-8"  enctype="multipart/form-data">
  <div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="username1" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="password1" class="input" data-type="password">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In">
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="username2" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="password2" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="name" class="label">First Name</label>
					<input id="name" type="text" name="first_name" class="input">
				</div>
				<div class="group">
					<label for="lastname" class="label">Last Name</label>
					<input id="lastname" type="text" name="last_name" class="input">
				</div>
				<div class="group">
					<label for="email" class="label">Email Address</label>
					<input id="email" type="email" name="email" class="input">
				</div>
				<div class="group">
					<label for="age" class="label">Age</label>
					<input id="age" type="number" name="age" class="input">
				</div>
				<div class="group">
					<label for="Tel" class="label">Telephone No</label>
					<input id="Tel" type="text" name="telephone" class="input" data-type="number"> 
				</div>
				<div class="group">
					<label for="Credit" class="label">Credit Card Number</label>
					<input id="Credit" type="text" name="credit_card" class="input">
				</div>
				<div class="group">
					<label for="Credit" class="label">Profil Picture</label>
					<input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<div class="group">
					<input type="submit" name="SignUP" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
  
</body>
</html>
<?php
 }
 if($_POST){
 	$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
	if($c = OCILogon("C##b21328232","21328232",$conn)){

 	$username1 = $_POST ['username1'];
 	$_SESSION['username1']=$username1;
 	$username2 = $_POST ['username2'];
 	$password1 = md5($_POST ['password1']);
 	$password2 = md5($_POST ['password2']);
 	$_SESSION['password1']=$password1;
 	$first_name = $_POST ['first_name'];
 	$last_name = $_POST ['last_name'];
 	$email = $_POST ['email'];
 	$age = $_POST ['age'];
 	$telephone = $_POST ['telephone'];
 	$credit_card= $_POST ['credit_card'];
 	$_SESSION['username1']=$username1;
 	$target_dir = "pictures/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 	if(isset($_POST['SignUP'])){
 		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    	if($target_file == 'pictures/'){
			$target_file="pictures/default.PNG";
		}
 		$stid = oci_parse($c, "CALL INSERTCUSTOMER('$age','$first_name','$last_name','$telephone','$email','$username2','$password2','$credit_card','$target_file')");
 		oci_execute($stid);
 		header("Location:index.php");
    	exit;	
 	}
 	else{
 		

 		$stid = oci_parse($c, "SELECT * FROM Account WHERE Username='$username1'and Password='$password1'");
 		oci_execute($stid);

	if ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$pp=$row['PROFIL_PICTURE'];
		$_SESSION['Profil_Picture']=$pp;
		
		$AccountID=$row['ACCOUNTID'];
    	$account=oci_parse($c, "SELECT PEOPLEID FROM Customer WHERE AccountID=$AccountID");
    	oci_execute($account);
    	if($row1=oci_fetch_array($account,OCI_ASSOC+OCI_RETURN_NULLS)){
    		$PeopleID=$row1['PEOPLEID'];
    		$Customer=oci_parse($c, "SELECT FIRST_NAME,LAST_NAME FROM People WHERE PeopleID=$PeopleID");
    		oci_execute($Customer);
    		if ($row2=oci_fetch_array($Customer,OCI_ASSOC+OCI_RETURN_NULLS)) {
    			$Name=$row2['FIRST_NAME'];
    			$Surname=$row2['LAST_NAME'];
    				$_SESSION['name']=$Name;
 					$_SESSION['surname']=$Surname;
 					if(($username1 == 'Admin' && $password1 == md5('admin')) || ($username1 == 'Master' && $password1 == md5('master'))){
 						header("Location:dashboard.php");
 						exit;
 					}
    		}
    	}
    	header("Location:home.php");
	   	exit;
	}
	else {
		echo "<p style='color:red;'>"."<font size=30 face='Arial'>"."Account could not found!";
	}

		oci_close($c);
 	}
	

 }
}
?>
