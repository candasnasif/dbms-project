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
	
	<div id="wrapper4">																																																																																																																													
			
			
			
			<p class="WordsT">  Appropriate Plane Tickets </p>
			<p class="WordsTs1"> A&C Tour Agency air ticket site, you can easily check cheap domestic flights and cheap international flights and you can make your reservation quickly. You can easily get the most suitable airline ticket with Etstur assurance by examining the current campaign prices and flights on domestic airline tickets of different airlines or in international airline tickets on the same screen. </p>
			
		    <p class="WordsTs1">	---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- </p>
			<p class="WordsT">	Cruise Tours </p>
			<p class="WordsTs1">  What do you say to a great holiday in the middle of the vast blue when you are heading towards the most beautiful beaches in the world? From the moment you stepped into Yola, explore the world with a choice of cruise or visa-free tours on the world's most comfortable cruise ships, stepping into a five-star holiday. </p>
			
			<p class="WordsTs1">	---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- </p>
			<p class="WordsT">	Comfortable Buses </p>
			<p class="WordsTs1">  Discovering the streets of your dream city, being part of different cultures, enjoying the unique tastes of the world cuisines ... All of you are waiting for you as the beauties you can easily pass on with A&C Tour Agency's Foreign Tours. You can experience unique experiences with attractive prices and rich excursion programs in the most interesting cities in Europe, America, Far East or a different point of the world. You can easily make your reservation with online sales privilege by choosing one of the tour packages prepared with different air way services, long or short tour programs at the dates that best suits you with A&C Tour Agency assurance. When planning your travel abroad, A&C Tour Agency will be interested in your name with details such as Turkish guidance service, travel health insurance and visa services. </p>
			
			
			<div id="search">
				
				<form action="transportation.php" method = "POST">
					<p class="pad">Type of Transportation <select name = "Type_Of_Transportation" class="select4"><option value='Ucak'>Plane</option><option value='Tren'>Train</option><option value='Otobus'>Bus</option><option value='Gemi'>Cruise</option><option value='Kiralik Arac'>Rent a Car</option> </select> <span class="pad">Departure date
				<select name = "CheckinD" class="select1">
				<option>01</option>
				<option>02</option>
				<option>03</option>
				<option>04</option>
				<option>05</option>
				<option>06</option>
				<option>07</option>
				<option>08</option>
				<option>09</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>	
				<option>30</option>
				<option>31</option></select> 
				<select name = "CheckinM" class="select1">
				<option>01</option>
				<option>02</option>
				<option>03</option>
				<option>04</option>
				<option>05</option>
				<option>06</option>
				<option>07</option>
				<option>08</option>
				<option>09</option>
				<option>10</option>
				<option>11</option>
				<option>12</option></select> 
				<select name = "CheckinY" class="select2">
				<option>2017</option>
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option></select></span>
				<button class= Button1 type="submit" value="Submit"> Search Transportations </button> </p>
					
				</form>
			</div>
				
				
			</div>


	
</body>

</html>
<?php
		}
	
			
			
			if($_POST)
		{
		
			
			$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
			if($c = OCILogon("C##b21328232","21328232",$conn)){
				$DepartureDate=$_POST['CheckinD'].".".$_POST['CheckinM'].".".$_POST['CheckinY'];
				$Type_Of_Transportation=$_POST['Type_Of_Transportation'];
				$_SESSION['DepartureDate']=$DepartureDate;
				$_SESSION['Type_Of_Transportation']=$Type_Of_Transportation;
				$queryTrans="SELECT TransportationID,Transportation_Date,Cost,Explanation FROM Transportation inner join Type_Of_Transportation on Transportation.Type_Of_TransportationID = Type_Of_Transportation.Type_Of_TransportationID WHERE Transportation.Transportation_Date ='$DepartureDate' and Type_Of_Transportation.Explanation like '%$Type_Of_Transportation%'";
				$queryTrans2="SELECT Count(*) AS count FROM Transportation inner join Type_Of_Transportation on Transportation.Type_Of_TransportationID = Type_Of_Transportation.Type_Of_TransportationID WHERE Transportation.Transportation_Date ='$DepartureDate' and Type_Of_Transportation.Explanation like '%$Type_Of_Transportation%'";
				$_SESSION['queryTrans']=$queryTrans;
				$_SESSION['queryTrans2']=$queryTrans2;
				header("Location:transportation2.php");
	   			exit;
			}

		}
?>