<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Travel - About</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<?php
$Username = $_SESSION['username1'];
$Name = $_SESSION['name'];
$LastName = $_SESSION['surname'];
if(!$_POST){

?>
<body>
	<div id="header">																																																																																																																																																			<div class="inner_copy"><a href="http://ecommercebuilders.blogspot.com/2016/07/shopify-review.html">http://ecommercebuilders.blogspot.com/2016/07/shopify-review.html</a></div>
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
	<div id="wrapper3">																																																																																																																														<div class="inner_copy"><a href="http://www.mgwebmaster.com/free-website-builders/">Best Free Website Builders - Choose Online Platform for...</a></div>
	 
			
		
			
			<div id="search3">
				<h1>  Filter Tours   <br></h1>
				<p class="Words2">	Cost Filter </p>
				<form action="tour2.php" method="post" accept-charset="UTF-8">
				<select name="Cost1" class="select4" >
					<option value="5">Upper2000</option>
					<option value="4">1500-2000</option>
					<option value="3">1000-1500</option>
					<option value="2">500-1000</option>
					<option value="1">Lower500</option>
				</select>				
				 <button class= "Button3" type="submit" value="Submit"> Filter </button>
				<p class="style2">Enter Tour ID for buy <input type="text"  name="ID"/>
				<button class= "Button3" type="submit" value="Submit"> Buy Tour </button>
					
				</form>
			</div>
					<?php
					$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
					if($c = OCILogon("C##b21328232","21328232",$conn)){

					$query2=$_SESSION['query2'];
					$query1=$_SESSION['query1'];
					$stid=oci_parse($c, $query1);
					$count=oci_parse($c,$query2);
					oci_execute($count);
					if ($row1 = oci_fetch_array($count, OCI_ASSOC+OCI_RETURN_NULLS)) {
						foreach ($row1 as $item) {
						
						echo ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . " result found!</td>\n";
					}
					}
					oci_execute($stid);
					$i=0;
					$attribute=array("0"=>"ID","1"=>"Tour_Date","2"=>"Tour_Name","3"=>"Cost",);
					echo "<table border='1' table bgcolor='#B22222'>\n";
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
					oci_free_statement($count);
					oci_free_statement($stid);
					oci_close($c);
?>
		
				
			</div>
		

</body>
</html>
<?php
}
		if($_POST)
		{
			$values = array("1"=>"<500", "2"=>">500 and Cost<1000", "3"=>">1000 and Cost<1500", "4"=> ">1500 and Cost<2000", "5"=> ">2000");
			$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
			if($c = OCILogon("C##b21328232","21328232",$conn)){
			if ($_POST['ID']==NULL) {
				
			
			
			$select1=$_POST['Cost1'];

			$select1 = $values[$select1];
			$Type=$_SESSION['Type'];
			$query1="SELECT TourID,Tour_Date,Tour_Name,Cost FROM Tour WHERE Cost $select1 and Type_Of_TourID=$Type";
			$query2="SELECT Count(*) FROM Tour WHERE Cost $select1 and Type_Of_TourID=$Type";
			echo $query1;
			$_SESSION['query1']=$query1;
			$_SESSION['query2']=$query2;
			oci_close($c);
			header("location:tour2.php");
			exit;
			}
			else{
				$ID=$_POST['ID'];
				$First_Name=$_SESSION['name'];
				$Last_Name=$_SESSION['surname'];
				$query="SELECT CustomerID FROM People inner join Customer on People.PeopleID=Customer.PeopleID WHERE People.First_Name='$First_Name' and People.Last_Name='$Last_Name'";
				$stid=oci_parse($c, $query);
				oci_execute($stid);
				if ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
					$CustomerID=$row['CUSTOMERID'];
					$insert="CALL InsertMake_Sale(null,$CustomerID,null,$ID,null,null,null)";
					$insertS=oci_parse($c, $insert);
					oci_execute($insertS);
					$nCount=oci_parse($c,"SELECT COUNT(*) FROM NEWS");
					oci_execute($nCount);
					oci_fetch($nCount);
					$s= oci_result($nCount, 1);
					if($s >=10){
						$del=oci_parse($c, "DELETE FROM NEWS WHERE DATA_DATE=(SELECT MIN(DATA_DATE) FROM NEWS)");
						oci_execute($del);
					}
					$new=$Name." ".$LastName."(".$Username.") bought a tour  TourID is ".$ID;
                   $date=date("Y.m.d H:i");
                   $news=oci_parse($c, "INSERT INTO  NEWS(DATA_DATE,DATA) VALUES('$date','$new')");
                   oci_execute($news);
				}
				
				header("location:home.php");
				exit;	
			}
		
			}
			
			
		}
?>