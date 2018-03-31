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
	<div id="wrapper">																																																								<?php
			$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
					if($c = OCILogon("C##b21328232","21328232",$conn)){
					$i=0;
					$attribute=array("0"=>"Movement Date and Time","1"=>"Movement");	
  
						$stid = oci_parse($c, 'SELECT * FROM NEWS ORDER BY DATA_DATE');
						oci_execute($stid);
						echo "<table border='1'>\n";
					while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
					if($i==0){
						echo "<tr>\n";
    					foreach ($attribute as $item) {
        				echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
    					}
						$i=1;
    					echo "<tr>\n";
						}	
    				echo "<tr>\n";
    				foreach ($row as $item) {
      				  echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
   				}
   				 echo "</tr>\n";
			}
				echo "</table>\n";

			
	}

else {
	print "Connected to Oracle!";
	exit;
}
// Close the Oracle connection
oci_close($c);

		 ?>																																																																						
	  <div id="left">
			
				
				
				</div>
			</div>
			
		
			
			
			
			
</body>			
		
