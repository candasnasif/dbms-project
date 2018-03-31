
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Travel - Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
 
    
<?php session_start(); 
$Username = $_SESSION['username1'];
$Name = $_SESSION['name'];
$LastName = $_SESSION['surname'];
if(!$_POST){

  ?>	
	
	<div id="header">																																																																																																																																																			
		<img class= "logo" src="images/logo.jpg" alt="" width="274" height="90"> 
	   <img class="profPic" src= "<?php echo $_SESSION['Profil_Picture'] ?>"  alt="" width="120" height="120">																																							
	  
			
		  																																																																			
		<ul id="menu">
			<li><a href="home.php">Home Page</a></li>
			<li><a href="company.php">About Company</a></li>
			<li><a href="hotel.php">Hotels</a></li>
			<li><a href="tour.php">Tours</a></li>
			<li><a href="transportation.php">Transportation</a></li>
			<li><a href="Campaign.php">Campaigns</a></li>
			<li><a href="UpdateUser.php">Update Profile</a></li>
			<li><user href="indexM.php ">Username:<?php echo $Username; ?></user></li>
			<li><user2 href="indexM.php ">FirstName:<?php echo $Name; ?></user2></li>
			<li><user2 href="indexM.php ">LastName:<?php echo $LastName; ?></user2></li>
			<li><a href="index.php">Logout</a></li>
		</ul>
	</div>
	<form action="UpdateUser.php" method="post" accept-charset="UTF-8"  enctype="multipart/form-data">
	<div id="wrapper">																																																																																																																														
	  <div id="left">
			


			
				
				<p class="style1 ">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" name="username2" class="input">
				</p>
				<p class="style1 ">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" name="password2" class="input" data-type="password">
				</p>
				<p class="style1">
					<label for="name" class="label">First Name</label>
					<input id="name" type="text" name="first_name" class="input">
				</p>
				<p class="style1">
					<label for="lastname" class="label">Last Name</label>
					<input id="lastname" type="text" name="last_name" class="input">
				</p>
				<p class="style1">
					<label for="email" class="label">Email Address</label>
					<input id="email" type="email" name="email" class="input">
				</p>
				<p class="style1">
					<label for="age" class="label">User Age</label>
					<input id="age" type="number" name="age" class="input">
				</p>
				<p class="style1">
					<label for="Tel" class="label">Telephone No</label>
					<input id="Tel" type="text" name="telephone" class="input" data-type="number"> 
				</p>
				<p class="style1">
					<label for="Credit" class="label">Credit Card Number</label>
					<input id="Credit" type="text" name="credit_card" class="input">
				</p>
				<p class="style1">
					<label for="Credit" class="label">Profil Picture</label>
					<input type="file" name="fileToUpload" id="fileToUpload">
				</p>
					<button class= "Button1" type="submit" value="Submit"> Save Profile </button>
				
				
				
				
				
				
				
				</div>
			</div>
		</form>	
		
			
			
</body>			
<?php }
if($_POST){
	$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
	if($c = OCILogon("C##b21328232","21328232",$conn)){
	$username1=$_SESSION['username1'];
	$password1=$_SESSION['password1'];
 	$username2 = $_POST ['username2'];
 	$password2 = md5($_POST ['password2']);
 	$first_name = $_POST ['first_name'];
 	$last_name = $_POST ['last_name'];
 	$email = $_POST ['email'];
 	$age = $_POST ['age'];
 	$telephone = $_POST ['telephone'];
 	$credit_card= $_POST ['credit_card'];
 	$target_dir = "pictures/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    	$stid = oci_parse($c, "SELECT * FROM Account WHERE Username='$username1'and Password='$password1'");
 		oci_execute($stid);

		if ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
		$AccountID=$row['ACCOUNTID'];
    	$account=oci_parse($c, "SELECT PEOPLEID,CUSTOMERID FROM Customer WHERE AccountID=$AccountID");
    	oci_execute($account);
    	if($row1=oci_fetch_array($account,OCI_ASSOC+OCI_RETURN_NULLS)){
    		$CustomerID=$row1['CUSTOMERID'];
    		$PeopleID=$row1['PEOPLEID'];
    		$Customer=oci_parse($c, "SELECT FIRST_NAME,LAST_NAME FROM People WHERE PeopleID=$PeopleID");
    		oci_execute($Customer);
   
    	}
    	$UCustomer=oci_parse($c, "CALL UpdateCustomer($CustomerID,$PeopleID,$age,$AccountID)");
    	$UPeople=oci_parse($c, "CALL UpdatePeople($PeopleID,'$first_name','$last_name','$telephone','$email')");
    	$UAccount=oci_parse($c, "CALL UpdateAccount($AccountID,'$username2','$password2','$credit_card','$target_file')");
    	$_SESSION['username1']=$username2;
    	$_SESSION['name']=$first_name;
 		$_SESSION['surname']=$last_name;
 		
 		oci_execute($UCustomer);
 		oci_execute($UPeople);
 		oci_execute($UAccount);
 		oci_close($c);
 		header("Location:home.php");
    	exit;
    }
	}
}
?>	
