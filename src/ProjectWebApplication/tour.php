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
	
	<div id="wrapper3">																																																																																																																													
			
			
			
			<p class="WordsT">  Tours </p>
			<p class="WordsT1"> Traveling enthusiasts, adventurers, explorers; Those who want to follow natural beauties, tastes or history ... There are countless domestic and international tours and exciting experiences awaiting you at A&C Tour Agency, offering very special programs and privileged services. You can plan a short or long-term, near or far-off holiday in four different corners of the world in different cities of Anatolia and you can follow brand-new stories with tour packs provided with confidence. </p>
			
		    <p class="WordsT1">	---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- </p>
			<p class="WordsT">	Cultural Tours </p>
			<p class="WordsT1">  The cultural heritage of Turkey's rich history, splendid natural scenery, unique locales and local tastes await discovery with A&C Tour Agency's Cultural Tours. With Culture Tours you can find options for every budget, you can enjoy the most special corners of the country and spend an unforgettable holiday with your loved ones. Take a Black Sea Trip for a cool break on the green springs, Safranbolu Tours for the traces of history or Cappadocia Tours for a fairy-tale experience. From different lap options you can go on a journey along the Aegean and Mediterranean coasts, enjoy boat trips, golden beaches, sparkling seas, and big blue boats. </p>
			
			<p class="WordsT1">	---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- </p>
			<p class="WordsT">	Tours Abroad </p>
			<p class="WordsT1">  Discovering the streets of your dream city, being part of different cultures, enjoying the unique tastes of the world cuisines ... All of you are waiting for you as the beauties you can easily pass on with A&C Tour Agency's Foreign Tours. You can experience unique experiences with attractive prices and rich excursion programs in the most interesting cities in Europe, America, Far East or a different point of the world. You can easily make your reservation with online sales privilege by choosing one of the tour packages prepared with different air way services, long or short tour programs at the dates that best suits you with A&C Tour Agency assurance. When planning your travel abroad, A&C Tour Agency will be interested in your name with details such as Turkish guidance service, travel health insurance and visa services. </p>
			
			
			<div id="search">
				
				<form action="tour.php" method = "POST">
					<p class="pad">Type of Tour <select name="Type"><option value="2">Culture</option><option value="3">Cruise</option><option value="1">Abroad</option><option value="4">Domestic</option> </select> </span> 
				<button class= Button1 type="submit" value="Submit"> Search Tour </button> </p>
					
				</form>
			</div>
				
				
			</div>
	<?php
}
		if($_POST)
		{
			$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
			if($c = OCILogon("C##b21328232","21328232",$conn)){
				
				$Type=$_POST['Type'];
				$query1="SELECT TourID,Tour_Date,Tour_Name,Cost FROM Tour WHERE Type_Of_TourID=$Type";
				$query2="SELECT Count(*) FROM Tour WHERE Type_Of_TourID=$Type";
				$_SESSION['Type']=$Type;
				$_SESSION['query1']=$query1;
				$_SESSION['query2']=$query2;
				header("location:tour2.php");
	   			exit;
			}
	     
	
		}
?>	

	
</body>
</html>
