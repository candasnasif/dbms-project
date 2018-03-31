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
	
	<div id="wrapper5">																																																																																																																													
			
			
			
			<p class="WordsT">  Campaigns </p>
			<p class="WordsTs1">Ethical Travel Issues

The focus of our current campaigns is about making tourism better. Recognising that tourism can be a force for good and as a tool for international development. We will work with industry to improve their operations and provide advice and information to tourists, in order that they can make better and more informed decisions about their holidays – ensuring that holidays bring real benefits to destination communities.

The negative impacts of tourism remain largely unchecked and are increasing. As one of the largest industries in the world, tourism’s influence is staggering. However, like many international and globalised industries, tourism can undermine human rights and sadly it is often only possible to see the damage done when communities, livelihoods and environments have already been irreparably damaged. Tourism Concern provides a voice for local people in destination countries, who rarely have the opportunity to tell their story. However we need you to add your voice to our Campaigns so please take a few minutes to sign a petition or send an email. </p>
			
		    
			
			
			<div id="search">
				
				<form action="Campaign.php" method = "POST">
					
					<p class="pad">Type of Campaign <select name="Type" class="select4"><option value="1">Cost discount</option><option value="2">Spring Campaign</option><option value="3">Early Rezervation</option><option value="4">Special Days</option> <option value="5">Bank Campaign</option><option value="6">Stay Much Pay Less</option><option value="7">Last Minute</option></select>  </span> <button class= Button1 type="submit" value="Submit"> Search Campaigns </button> </p>
				</form>
			</div>
			
		
			<?php
			if(!empty($_SESSION['Campaign1'])){
				$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
					if($c = OCILogon("C##b21328232","21328232",$conn)){
					$query1=$_SESSION['Campaign1'];
					$query2=$_SESSION['Campaign2'];
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
					$attribute=array("0"=>"Branch Name","1"=>"Campaign Name","2"=>"Campaign Date","3"=>"Explanation",);
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
					$_SESSION['Campaign1']=NULL;
			}
			?>
				
			</div>
	<?php
}
		if($_POST)
		{
		$select=$_POST['Type'];
	    $query2="SELECT Count(*) FROM Campaign inner join Type_Of_Campaign on Campaign.Type_Of_CampaignID=Type_Of_Campaign.Type_Of_CampaignID inner join Branch_Provides_Campaign on Campaign.CampaignID=Branch_Provides_Campaign.CampaignID inner join Branch on Branch.BranchID=Branch_Provides_Campaign.BranchID WHERE  Type_Of_Campaign.Type_Of_CampaignID=$select";
		$query1="SELECT Branch.Name,Campaign.Campaign_Name,Campaign.Campaign_Date,Type_Of_Campaign.Explanation FROM Campaign inner join Type_Of_Campaign on Campaign.Type_Of_CampaignID=Type_Of_Campaign.Type_Of_CampaignID inner join Branch_Provides_Campaign on Campaign.CampaignID=Branch_Provides_Campaign.CampaignID inner join Branch on Branch.BranchID=Branch_Provides_Campaign.BranchID WHERE  Type_Of_Campaign.Type_Of_CampaignID=$select";
		$_SESSION['Campaign1']=$query1;
		$_SESSION['Campaign2']=$query2;
		header("location:Campaign.php");
		exit;			
	
		}
		?>	

	
</body>
</html>