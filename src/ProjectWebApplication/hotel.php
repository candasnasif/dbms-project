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
		
		
		
		
		<div id="wrapper2">																																																																																																																														<div class="inner_copy"><a href="http://www.mgwebmaster.com/free-website-builders/">Best Free Website Builders - Choose Online Platform for...</a></div>
		 
				
				
				
				<p class="Words">	Hotels </p>
				<p class="Words1"> Hundreds of specialists with different specialties from the Honeymoon Suites to the Antalya Suites offered by A&C Tour Agency can have the features you are looking for. When it comes to holidays, the first thing that comes to mind is a comfortable hotel. Offering services according to different tastes and interests, these hotels offer a wide variety of options, both at affordable prices and at the region where they are located. </p>
				
			    <p class="Words1">	---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- </p>
				<p class="Words">	Accommodation </p>
				<p class="Words1"> A small hotel offering a boutique with a comfortable holiday village, different architecture and original design, a charming hostel offering a warm and economical holiday atmosphere or a city hotel that offers comfort with its central location and service for stressful business trips. More are waiting for you at A&C Tour Agency's Domestic Hotels page. With different concepts such as Room, Bed & Breakfast, Half Board, Full Board, All Inclusive and Ultra All Inclusive, luxury or affordable accommodation options are ready to welcome you with the booking process you can easily accomplish at A&C Tour Agency. </p>
				<div id="search">
					
					<form action="hotel.php" method="post" accept-charset="UTF-8">
						<p class="style1">Hotel Location <input type="text"  name="location"/> <span class="pad">
				Check-in <select name="CheckinD" class = "select1">
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
				<option>31</option>
				</select> <select name="CheckinM" class = "select1">
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
				</select> <select name="CheckinY" class = "select1">
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				</select></span> Check-out<select name="CheckoutD" class = "select1">
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
				<option>31</option>
				</select> <select name="CheckoutM" class = "select1">
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
				</select> <select name="CheckoutY" class = "select1">
				<option>2017</option>
				<option>2018</option>
				<option>2019</option>
				<option>2020</option>
				</select></span> <button class= Button1 type="submit" value="Submit"> Search Hotels </button> </p>
						
					</form>
				</div>
					
					
				</div>
		

	</body>
	</html>
	<?php
		}
		if($_POST){
			
			$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
			if($c = OCILogon("C##b21328232","21328232",$conn)){
				$Checkin=$_POST['CheckinD'].".".$_POST['CheckinM'].".".$_POST['CheckinY'];
				$Checkout=$_POST['CheckoutD'].".".$_POST['CheckoutM'].".".$_POST['CheckoutY'];
				$location=$_POST['location'];
				$_SESSION['Checkin']=$Checkin;
				$_SESSION['Checkout']=$Checkout;
				$query1="SELECT HotelID,Hotel_Name,Address,Telephone_No,Properties FROM Hotel WHERE Address like '%$location%'";
				$query2="SELECT Count(*) FROM Hotel WHERE Address like '%$location%'";
				$_SESSION['query1']=$query1;
				$_SESSION['query2']=$query2;
				header("Location:hotel2.php");
	   				exit;
			}

		}
	?>
