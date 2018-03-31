<?php
	session_start();
	require('fpdf/fpdf.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Travel - About</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php 
$Username = $_SESSION['username1'];
$Name = $_SESSION['name'];
$LastName = $_SESSION['surname'];
	if(!$_POST){
	?>
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
	<div id="wrapper2">																																																																																																																														
	 
			

			
			 <div id="search2">
				<h1>  Filter Hotels   <br></h1>
				<p class="Words2">	Type Of Hotels Filter </p>
				<form action="hotel2.php" method="post" accept-charset="UTF-8">
				 <select name="Type">
 				 <option >Airport Hotel</option>
 				 <option >Suite  Hotel</option>
  				 <option >Extended Stay Hotel</option>
  				 <option >Serviced Apartment</option>
  				 <option >Resort Hotel</option>
  				 <option >Bed and Breakfast / Homestays</option>
  				 <option >Timeshare / Vacation Rentals</option>
  				 <option >Casino Hotel</option>
  				 <option >Conference and Convention Centres</option>
  				 <option >Business Hotel</option>
				 </select>
				 
				 
				 <p class="Words2">	Stars Filter </p>
				  <select name="Stars">
 				 <option value="Iki">Two</option>
 				 <option value="Uc">Three</option>
  				 <option value="Dort">Four</option>
  				 <option value="Bes">Five</option>
				 </select>
				<button class= Button2 type="submit" name="Filter" value="Submit">Filter </button>
				<p class="style2">Enter Hotel ID for buy <input type="text"  name="ID"/>
				<button class= Button2 type="submit" name="Buy" value="Submit"> Buy </button>
				<p class="style2">Click to select type of Report </p>
				<button class= Button2 type="submit" name="TXT" value="Submit"> TXT </button>
				<button class= Button2 type="submit" name="HTML" value="Submit"> HTML </button>
				<button class= Button2 type="submit" name="PDF" value="Submit"> PDF </button>
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
					$attribute=array("0"=>"ID","1"=>"Hotel Name","2"=>"Address","3"=>"Telephone_No","4"=>"Properties");
					echo "<table border='1'  table bgcolor='#00FF00' >\n";
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
if($_POST){
$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";

if($c = OCILogon("C##b21328232","21328232",$conn)){

	if (isset($_POST['TXT']))
		{
			
			$query1 = $_SESSION['query1'];
			$stidTXT = oci_parse($c,$query1);
			oci_execute($stidTXT);
			$myFile = fopen("reportType/report.txt","w");
			$outputTXT = '';
			while(($row = oci_fetch_assoc ($stidTXT)) != false )
			{
				
				$outputTXT .= $row["HOTELID"]." ".$row["HOTEL_NAME"] ." ". $row["ADDRESS"]." ". $row["TELEPHONE_NO"]." ".$row["PROPERTIES"] ."\n";
				
			}
			file_put_contents('reportType/report.txt',$outputTXT);
			
		}
		
		
			if (isset($_POST['HTML']))
		{
			
			$query1 = $_SESSION['query1'];
			$stidHTML = oci_parse($c,$query1);
			oci_execute($stidHTML);
			$myFile = fopen("reportType/report.html","w");
						$outputHTML = '<!DOCTYPE html>
				<html>
				<head>
				<style>
				table {
					font-family: arial, sans-serif;
					border-collapse: collapse;
					width: 100%;
			}

			td, th {
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even) {
		background-color: #dddddd;
}
		</style>
		</head>
		<body>

<table>

<tr>
    <th>HOTELID</th>
    <th>HOTEL_NAME</th>
    <th>ADDRESS</th>
	<th>TELEPHONE_NO</th>
    <th>PROPERTIES</th>
   
  </tr>';
			while(($row = oci_fetch_assoc ($stidHTML)) != false )
			{
				
				$outputHTML .= '<tr> <td>'.$row["HOTELID"].'</td> <td>'.$row["HOTEL_NAME"].'</td> <td>'.$row["ADDRESS"].'</td> <td>'.$row["TELEPHONE_NO"].'</td> <td>'.$row["PROPERTIES"].'</td></tr>';
    
				
			}
			file_put_contents('reportType/report.html',$outputHTML);
			
			
		}
		
		
			if (isset($_POST['PDF']))
		{
			
			
			$query1 = $_SESSION['query1'];
			$stidPDF = oci_parse($c,$query1);
			oci_execute($stidPDF);
			$columns = array (array("name" => "HOTELID" ,"width" => 10),
			array("name" => "HOTEL_NAME","width" => 20),
			array("name" => "ADDRESS","width" => 20),
			array("name" => "TELEPHONE_NO","width" => 30),
			array("name" => "PROPERTIES","width" => 90));
			
			$pdf = new FPDF();
			$pdf -> AddPage();
			
			
			$pdf -> SetFillColor(232,232,231);
			$pdf -> SetFont('Arial','B',8);
			foreach($columns as $column )
			{
				
				$pdf -> Cell($column['width'],6,strtoupper($column['name']),1,0,'L',1);
				
			}
			$pdf -> Ln();
			
			while(($row = oci_fetch_assoc($stidPDF)) != false)
			{
				foreach($columns as $column)
				{
					$pdf -> Cell($column['width'],6,$row[$column['name']],1);
					
				}
				$pdf -> Ln();
				
				
			}
			
			$pdf -> Output("F","reportType/report.pdf");
			
		}


	
		if (isset($_POST['Filter'])) {
		$select1=$_POST['Type'];
		$select2=$_POST['Stars'];
		$query1="SELECT HotelID,Hotel_Name,Address,Telephone_No,Properties FROM Hotel WHERE Hotel_Name like '%$select1%' and Properties like '%$select2%'";
		$query2="SELECT Count(*) AS count FROM Hotel WHERE Hotel_Name like '%$select1%' and Properties like '%$select2%'";
		$_SESSION['query1']=$query1;
		$_SESSION['query2']=$query2;
		oci_close($c);
		header("location:hotel2.php");
		exit;
		}
		
		
	
		
		else{
			$ID=$_POST['ID'];
			$Type=$_POST['Type'];
			$Stars=$_POST['Stars'];
			$First_Name=$_SESSION['name'];
			$Last_Name=$_SESSION['surname'];
			$Checkin=$_SESSION['Checkin'];
			$Checkout=$_SESSION['Checkout'];
			$Cost=($ID+10)*5;
			$query="SELECT CustomerID FROM People inner join Customer on People.PeopleID=Customer.PeopleID WHERE People.First_Name='$First_Name' and People.Last_Name='$Last_Name'";
			$stid=oci_parse($c, $query);
			oci_execute($stid);
			if ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
				$CustomerID=$row['CUSTOMERID'];
				$insert="CALL InsertBooking('$Checkin - $Checkout',$Cost,$ID)";
				$insertS=oci_parse($c, $insert);
				oci_execute($insertS);
				
			}
			$stid2=oci_parse($c, "SELECT MAX(BookingID) FROM Booking");
			oci_execute($stid2);
			if($row1 = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)){
	
				$BookingID=oci_result($stid2, 1);
				$insertB=oci_parse($c, "CALL InsertCustomer_Books_Booking($BookingID,$CustomerID)");
				oci_execute($insertB);
				$nCount=oci_parse($c,"SELECT COUNT(*) FROM NEWS");
					oci_execute($nCount);
					oci_fetch($nCount);
					$s= oci_result($nCount, 1);
					if($s >=10){
						
						$del=oci_parse($c, "DELETE FROM NEWS WHERE DATA_DATE=(SELECT MIN(DATA_DATE) FROM NEWS)");
						oci_execute($del);
					}
				
					$new=$Name." ".$LastName."(".$Username.") made a reservation a Hotel, HotelID is ".$ID." and BookingID is ".$BookingID;
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

