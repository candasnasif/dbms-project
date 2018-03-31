<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Travel - About</title>
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
		 <div class="about">
			   <a href="#" id="banner"><img src="images/banner.jpg" alt="" width="420" height="770" /></a>
			   <img src="images/title9.jpg" alt="" width="235" height="41" />
			   <p>A&C Tour Agency is a tourism travel and organization agency that has taken a distinguished place in the sector and is leading with an innovative and perfectionist approach that aims to be a pioneer with experienced management staff.Our precision in achieving customer satisfaction and comfort at the highest level is a prime indicator of our excellent service understanding. Our agency has been established with the aim of providing travelers with the opportunity to travel with the most effortless, quality and affordable accommodation. With A&C Tour Agency's professional staff, your organization will be able to maximize your company profile by transforming it into a breakthrough, which will be the most reliable name for all support for corporate communications. It will be a privilege to travel with A&C Tour Agency, which combines travel around the world, private tour organizations, ship tours, congress and assis- tance services, and trust and comfort with unlimited service. </p>
			   <p>A&C Tour Agency Tourism concept, you can organize individual and corporate domestic and international airline ticket bookings, tour organizations, ship trips, congresses, fairs and dealers meetings, aircraft brokers, all kinds of vehicles and boat rentals, domestic and foreign hotels , Congress, seminar services. As a company that is open to technology and innovation, we are proud to be with you in the understanding of unlimited service of trust and quality.Our mission; Is to provide our customers with superior services, service and quality in a professional, innovative team spirit, always knowing that '' we are in the details of excellence '' by following fast developing world of dynamic tourism.
Our vision; To respond to the expectations of our valued customers with a professional point of view, to respond with stability within the principle of honesty and integrity, and always to be with you as your advisor with our quality travel services.
Our basic ilk; A&C Tour Agency aims to turn your expectations into reality to provide maximum benefit in the most advantageous conditions with tourism, services you need, customer-oriented service understanding, experienced dynamic staff, always with the same modern understanding and superior service quality </p>
			 </div>
	  </div>
		
</body>
</html>
