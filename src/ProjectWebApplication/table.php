<!doctype php>
<php lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" type="text/css" href="style.css" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
<?php if(!$_POST){
	?>
	<form action="table.php" method="post" accept-charset="UTF-8">
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
               
                <li class="active">
                    <a href="table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>

          
                <li>
                    <a href="statistics.php">
                        <i class="pe-7s-bell"></i>
                        <p>Statistics Screen</p>
                    </a>
                </li>
				
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Table List</a>
                </div>
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                
                        <li>
                             <a href="index.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
				
				
				  <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Account Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Account" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"AccountID","1"=>"Username","2"=>"Password","3"=>"Credit_Card_Number","4"=>"ProfilePicture",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
					
						  <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">People Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM People" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"PeopleID","1"=>"First_Name","2"=>"Last_Name","3"=>"Telephone_No","4"=>"EMail",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
					
					
						  <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Customer Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Customer" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"CustomerID","1"=>"PeopleID","2"=>"Age","3"=>"AccountID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
					
					
					  <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Branch Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Branch" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BranchID","1"=>"Name","2"=>"Address","3"=>"Telephone_No","4"=>"EMail",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> BranchName<input type="text" class=style3   name = "BranchName">  Address<input type="text" class=style3  name = "BranchAddress">
			   Telephone_No<input type="text" class=style3  name = "BranchTelephone_No">
			  EMail<input type="text" class=style3  name = "BranchEmail">
			<button class= "Button3" type="submit" name="BranchI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p>ID<input type="text" class=style3   name = "uBID"> BranchName<input type="text" class=style3   name = "uBranchName">  Address<input type="text" class=style3  name = "uBranchAddress">
			   Telephone_No<input type="text" class=style3  name = "uBranchTelephone_No">
			  EMail<input type="text" class=style3  name = "uBranchEmail">
			<button class= "Button3" type="submit" name="BranchU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
									
					 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Owner Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Owner" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"OwnerID","1"=>"PeopleID","2"=>"BranchID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> FirstName<input type="text" class=style3   name = "OFirstName">  Last_Name<input type="text" class=style3  name = "OLast_Name">
			   Telephone_No<input type="text" class=style3  name = "OTelephone_No">
			  EMail<input type="text" class=style3  name = "OEMail">
			  BranchID<input type="text" class=style3  name = "OBranchID">
			<button class= "Button3" type="submit" name="OwnerI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p>ID<input type="text" class=style3   name = "uOID">PID<input type="text" class=style3   name = "uoPID"> FirstName<input type="text" class=style3   name = "uOFirstName">  Last_Name<input type="text" class=style3  name = "uOLast_Name">
			   Telephone_No<input type="text" class=style3  name = "uOTelephone_No">
			  EMail<input type="text" class=style3  name = "uOEMail">
			  BranchID<input type="text" class=style3  name = "uOBranchID">
			<button class= "Button3" type="submit" name="OwnerU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
					
					
					 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Guide Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Guide" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"GuideID","1"=>"PeopleID","2"=>"Known_Languages",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
						<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Known_Languages<input type="text" class=style3   name = "GKnown_Languages">  First_Name<input type="text" class=style3  name = "GFirst_Name">
			   Last_Name<input type="text" class=style3  name = "GLast_Name">
			  Telephone_No<input type="text" class=style3  name = "GTelephone_No">
			  EMail<input type="text" class=style3  name = "GEMail">
			<button class= "Button3" type="submit" name="GuideI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> ID<input type="text" class=style3   name = "uGID">PID<input type="text" class=style3   name = "ugPID">Known_Languages<input type="text" class=style3   name = "uGKnown_Languages">  First_Name<input type="text" class=style3  name = "uGFirst_Name">
			   Last_Name<input type="text" class=style3  name = "uGLast_Name">
			  Telephone_No<input type="text" class=style3  name = "uGTelephone_No">
			  EMail<input type="text" class=style3  name = "uGEMail">
			<button class= "Button3" type="submit"  name="GuideU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
                    </div>

				
				
				
				<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Type_Of_Hotel Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Type_Of_Hotel" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Type_Of_HotelID","1"=>"Explanation",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
						
			<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p>Explanation<input type="text" class=style3  name = "HotelExplanation">			   
			<button class= "Button3" type="submit" class=style3 name="Type_Of_HotelI" value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> Type_Of_HotelID<input type="text" class=style3   name = "uType_Of_HotelID">  Explanation<input type="text" class=style3  name = "uHotelExplanation">			   
			<button class= "Button3" type="submit" class=style3 name="Type_Of_HotelU" value="Submit"> Update </button> </p>
			</form>
			</div>
										
                    </div>
					
				
				
					
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Hotel Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Hotel" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"HotelID","1"=>"Type_Of_HotelID","2"=>"Hotel_Name","3"=>"Address","4"=>"Telephone_No","5"=>"Properties",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						<p> Insert / Update Table </p>
			<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Type_Of_HotelID<input type="text" class=style3   name = "Type_Of_HotelID">  Hotel_Name<input type="text" class=style3  name = "Hotel_Name">
			   Address<input type="text" class=style3  name = "AddressHotel">
			  Telephone_No<input type="text" class=style3  name = "Telephone_NoHotel">
			  Properties<input type="text" class=style3  name = "Properties">
			<button class= "Button3" type="submit" name="HotelI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> ID<input type="text" class=style3   name = "uHotelID">  Type_Of_HotelID<input type="text" class=style3   name = "uType_Of_HotelID">  Hotel_Name<input type="text" class=style3  name = "uHotel_Name">
			   Address<input type="text" class=style3  name = "uAddressHotel">
			  Telephone_No<input type="text" class=style3  name = "uTelephone_NoHotel">
			  Properties<input type="text" class=style3  name = "uProperties">
			<button class= "Button3" type="submit" name="HotelU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
						
                    </div>
					
					
					
					   <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Booking Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Booking" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
												
                    </div>
					
					
					
					
					 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Type_Of_Transportation Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Type_Of_Transportation" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Type_Of_TransportationID","1"=>"Explanation",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
				<p> Insert / Update Table </p>
			<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Explanation<input type="text" class=style3  name = "ExplanationTrans">
			<button class= "Button3" type="submit" name="Type_Of_TransportationI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> Type_Of_TransportationID<input type="text" class=style3   name = "Type_Of_TransportationID">  uExplanation<input type="text" class=style3  name = "uExplanationTrans">
			<button class= "Button3" type="submit" name="Type_Of_TransportationU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>			
						
						
                    </div>
					
					
					
					 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Transportation Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Transportation" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"TransportationID","1"=>"Transportation_Date","2"=>"Cost","3"=>"Type_Of_TransportationID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
						<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Transportation_Date<input type="text" class=style3   name = "Transportation_Date">  Cost<input type="text" class=style3  name = "CostTrans">
			   Type_Of_TransportationID<input type="text" class=style3  name = "Type_Of_TransportationIDTrans">
			<button class= "Button3" type="submit" name="TransportationI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> TransportationID<input type="text" class=style3   name = "uTransportationID"> Transportation_Date<input type="text" class=style3   name = "uTransportation_Date">  Cost<input type="text" class=style3  name = "uCostTrans">
			   Type_Of_TransportationID<input type="text" class=style3  name = "uType_Of_TransportationIDTrans">
			<button class= "Button3" type="submit"  name="TransportationU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Type_Of_Tour Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Type_Of_Tour" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Type_Of_TourID","1"=>"Explanation",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
					<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Explanation<input type="text" class=style3  name = "TourExplanation">			   
			<button class= "Button3" type="submit" name="Type_Of_TourI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> Type_Of_TourID<input type="text" class=style3   name = "uType_Of_TourID">  Explanation<input type="text" class=style3  name = "uTourExplanation">			   
			<button class= "Button3" type="submit" name="Type_Of_TourU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tour Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Tour" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"TourID","1"=>"Type_Of_TourID","2"=>"Tour_Date","3"=>"Tour_Name","4"=>"Cost",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
						<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Type_Of_TourID<input type="text" class=style3   name = "Type_Of_TourIDTour">  Tour_Date<input type="text" class=style3  name = "Tour_Date">
			   Tour_Name<input type="text" class=style3  name = "Tour_Name">
			  Cost<input type="text" class=style3  name = "TourCost">  
			<button class= "Button3" type="submit" name="TourI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
				<p> TourID<input type="text" class=style3   name = "uTourID"> Type_Of_TourID<input type="text" class=style3   name = "uType_Of_TourIDTour">  Tour_Date<input type="text" class=style3  name = "uTour_Date">
			   Tour_Name<input type="text" class=style3  name = "uTour_Name">
			  Cost<input type="text" class=style3  name = "uTourCost">  
			<button class= "Button3" type="submit"  name="TourU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
					
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Type_Of_Campaign Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Type_Of_Campaign" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Type_Of_CampaignID","1"=>"Explanation",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						
					<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Explanation<input type="text" class=style3  name = "CampaignExplanation">			   
			<button class= "Button3" type="submit" name="Type_Of_CampaignI" class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p> Type_Of_CampaignID<input type="text" class=style3   name = "uType_Of_CampaignID">  Explanation<input type="text" class=style3  name = "uCampaignExplanation">			   
			<button class= "Button3" type="submit" name="Type_Of_CampaignU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
					
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Campaign Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Campaign" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"CampaignID","1"=>"Type_Of_CampaignID","2"=>"Campaign_Name","3"=>"Campaign_Date",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
						
						<div id="searchIns">
			<form action="table.php" method="post" accept-charset="UTF-8">
			<p> Type_Of_CampaignID<input type="text" class=style3   name = "Type_Of_CampaignIDCampaign">  Campaign_Name<input type="text" class=style3  name = "Campaign_Name">
			   Campaign_Date<input type="text" class=style3  name = "Campaign_Date">
			<button class= "Button3" type="submit" name="CampaignI"class=style3  value="Submit"> Insert </button> </p>
			</form>
			</div>
			<div id="searchIns">
			<form action="table.php" method = "POST">
			<p>CampaignID<input type="text" class=style3   name = "uCampaignID">Type_Of_CampaignID<input type="text" class=style3   name = "uType_Of_CampaignIDCampaign">  Campaign_Name<input type="text" class=style3  name = "uCampaign_Name">
			   Campaign_Date<input type="text" class=style3  name = "uCampaign_Date">
			<button class= "Button3" type="submit" name="CampaignU" class=style3  value="Submit"> Update </button> </p>
			</form>
			</div>
						
                    </div>
					
					
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Guide_Guides_Customer Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Guide_Guides_Customer" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"GuideID","1"=>"CustomerID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Customer_Books_Booking Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Customer_Books_Booking" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"CustomerID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Branch_Provides_Campaign Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Branch_Provides_Campaign" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BranchID","1"=>"CampaignID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Guide_Guides_Tour Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Guide_Guides_Tour" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"GuideID","1"=>"TourID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
			<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Make_Sale Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Make_Sale" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BranchID","1"=>"CustomerID","2"=>"OwnerID","3"=>"TourID","4"=>"HotelID","5"=>"TransportationID","6"=>"BookingID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
					
					
						<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tour_Provides_Housing Table</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sql = "SELECT * FROM Tour_Provides_Housing" ;
																
									$stid=oci_parse($c, $sql);
									
				
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"HotelID","1"=>"TourID",);
									echo "<table border='1' table bgcolor='#00FF00'>\n";
									while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
											if($i==0){
											echo "<tr>\n";
									foreach ($attribute as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
										}
									$i=1;
									echo "</tr>\n";
									}
									echo "<tr>\n";
									foreach ($row as $item) {
									echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
									}
									echo "</tr>\n";
									}
								echo "</table>\n";
										}
									
																								
									 ?>
                               
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
					
					

                </div>
            </div>
        </div>


    </div>
</div>
</form>
	
</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
<?php
}if($_POST){
		$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
		if($c = OCILogon("C##b21328232","21328232",$conn)){
		if(isset($_POST['BranchI'])){
			
			$BranchName = $_POST['BranchName'];
			$BranchAddress = $_POST['BranchAddress'];
			$BranchTelephone_No = $_POST['BranchTelephone_No'];
			$BranchEmail = $_POST['BranchEmail'];
			$stid=oci_parse($c,"CALL InsertBranch ('$BranchName ','$BranchAddress ','$BranchTelephone_No ','$BranchEmail')");
			oci_execute($stid);
			header("location:table.php");
			exit;	
			
									
		}
		else if(isset($_POST['BranchU'])){
			
			$uBID = $_POST['uBID'];
			$uBranchName = $_POST['uBranchName'];
			$uBranchAddress = $_POST['uBranchAddress'];
			$uBranchTelephone_No = $_POST['uBranchTelephone_No'];
			$uBranchEmail = $_POST['uBranchEmail'];
			$stid=oci_parse($c,"CALL UpdateBranch ('$uBID','$uBranchName ','$uBranchAddress ','$uBranchTelephone_No ','$uBranchEmail')");
			oci_execute($stid);
			header("location:table.php");
			exit;
			
			
			
			
		}
		else if(isset($_POST['OwnerI'])){
			
			
			
			$OFirstName = $_POST['OFirstName'];
			$OLast_Name = $_POST['OLast_Name'];
			$OTelephone_No = $_POST['OTelephone_No'];
			$OEMail = $_POST['OEMail'];
			$OBranchID = $_POST['OBranchID'];
			$stid=oci_parse($c,"CALL InsertOwner ('$OFirstName','$OLast_Name ','$OTelephone_No ','$OEMail ','$OBranchID')");
			oci_execute($stid);
			header("location:table.php");
			exit;
			
			
		}
		else if(isset($_POST['OwnerU'])){
			
			$uOID = $_POST['uOID'];
			$uoPID = $_POST['uoPID'];
			$uOFirstName = $_POST['uOFirstName'];
			$uOLast_Name = $_POST['uOLast_Name'];
			$uOTelephone_No = $_POST['uOTelephone_No'];
			$uOEMail = $_POST['uOEMail'];
			$uOBranchID = $_POST['uOBranchID'];
			$stid=oci_parse($c,"CALL UpdateOwner('$uOID','$uoPID','$uOFirstName ','$uOLast_Name ','$uOTelephone_No ','$uOEMail','$uOBranchID')");
			oci_execute($stid);
			header("location:table.php");
			exit;
			
		}
		else if(isset($_POST['GuideI'])){
			
			$GKnown_Languages = $_POST['GKnown_Languages'];
			$GFirst_Name = $_POST['GFirst_Name'];
			$GLast_Name = $_POST['GLast_Name'];
			$GTelephone_No = $_POST['GTelephone_No'];
			$GEMail = $_POST['GEMail'];
			$stid=oci_parse($c,"CALL InsertGuide ('$GKnown_Languages','$GFirst_Name ','$GLast_Name ','$GTelephone_No ','$GEMail')");
			oci_execute($stid);
			header("location:table.php");
			exit;
			
		}
		else if(isset($_POST['GuideU'])){
			
			$uGID = $_POST['uGID'];
			$ugPID = $_POST['ugPID'];
			$uGKnown_Languages = $_POST['uGKnown_Languages'];
			$uGFirst_Name = $_POST['uGFirst_Name'];
			$uGLast_Name = $_POST['uGLast_Name'];
			$uGTelephone_No = $_POST['uGTelephone_No'];
			$uGEMail = $_POST['uGEMail'];
			
			$stid=oci_parse($c,"CALL UpdateGuide ('$uGID','$ugPID','$uGKnown_Languages ','$uGFirst_Name ','$uGLast_Name ','$uGTelephone_No','$uGEMail')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_HotelI'])){
			
			$HotelExplanation = $_POST['HotelExplanation'];
			$stid=oci_parse($c,"CALL InsertType_Of_Hotel ('$HotelExplanation')");
		    oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_HotelU'])){
			
			$uType_Of_HotelID = $_POST['uType_Of_HotelID'];
			$uHotelExplanation = $_POST['uHotelExplanation'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Hotel ('$uType_Of_HotelID','$uHotelExplanation')");
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['HotelI'])){
			
			$Type_Of_HotelID = $_POST['Type_Of_HotelID'];
			$Hotel_Name = $_POST['Hotel_Name'];
			$AddressHotel = $_POST['AddressHotel'];
			$Telephone_NoHotel = $_POST['Telephone_NoHotel'];
			$Properties = $_POST['Properties'];
			
			
			$stid=oci_parse($c,"CALL InsertHotel ('$Type_Of_HotelID','$Hotel_Name ','$AddressHotel ','$Telephone_NoHotel ','$Properties')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['HotelU'])){
			
			$uHotelID = $_POST['uHotelID'];
			$uType_Of_HotelID = $_POST['uType_Of_HotelID'];
			$uHotel_Name = $_POST['uHotel_Name'];
			$uAddressHotel = $_POST['uAddressHotel'];
			$uTelephone_NoHotel = $_POST['uTelephone_NoHotel'];
			$uProperties = $_POST['uProperties'];
				
			$stid=oci_parse($c,"CALL UpdateHotel ('$uHotelID','$uType_Of_HotelID','$uHotel_Name ','$uAddressHotel ','$uTelephone_NoHotel ','$uProperties')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TourI'])){
			
			
			$TourExplanation = $_POST['TourExplanation'];
			$stid=oci_parse($c,"CALL InsertType_Of_Tour ('$TourExplanation')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TourU'])){
			
			$uType_Of_TourID = $_POST['uType_Of_TourID'];
			$uTourExplanation = $_POST['uTourExplanation'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Tour ('$uType_Of_TourID','$uTourExplanation')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['TourI'])){
			
			$Type_Of_TourIDTour =$_POST['Type_Of_TourIDTour'];
			$Tour_Date =$_POST['Tour_Date'];
			$Tour_Name =$_POST['Tour_Name'];
			$TourCost  =$_POST['TourCost'];
			$stid=oci_parse($c,"CALL InsertTour ('$Type_Of_TourIDTour','$Tour_Date','$Tour_Name','$TourCost')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['TourU'])){
		
			$uTourID = $_POST['uTourID'];
			$uType_Of_TourIDTour =$_POST['uType_Of_TourIDTour'];
			$uTour_Date =$_POST['uTour_Date'];
			$uTour_Name =$_POST['uTour_Name'];
			$uCost  =$_POST['uTourCost'];
			$stid=oci_parse($c,"CALL UpdateTour ('$uTourID','$uType_Of_TourIDTour','$uTour_Date','$uTour_Name','$uCost')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TransportationI'])){
			
			
			$ExplanationTrans = $_POST['ExplanationTrans'];
			$stid=oci_parse($c,"CALL InsertType_Of_Transportation ('$ExplanationTrans')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TransportationU'])){
			
			$Type_Of_TransportationID = $_POST['Type_Of_TransportationID'];
			$uExplanationTrans = $_POST['uExplanationTrans'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Transportation ('$Type_Of_TransportationID','$uExplanationTrans')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['TransportationI'])){
			
			
			$Transportation_Date =$_POST['Transportation_Date'];
			$CostTrans =$_POST['CostTrans'];
			$Type_Of_TransportationIDTrans =$_POST['Type_Of_TransportationIDTrans'];
			$stid=oci_parse($c,"CALL InsertTransportation ('$Transportation_Date','$CostTrans','$Type_Of_TransportationIDTrans')");
			oci_execute($stid);
			header("location:table.php");
			exit;
				
			
		}
		else if(isset($_POST['TransportationU'])){
		
			$uTransportationID =$_POST['uTransportationID'];
			$uTransportation_Date =$_POST['uTransportation_Date'];
			$uCostTrans =$_POST['uCostTrans'];
			$uType_Of_TransportationIDTrans =$_POST['uType_Of_TransportationIDTrans'];
			$stid=oci_parse($c,"CALL UpdateTransportation ('$uTransportationID','$uTransportation_Date','$uCostTrans','$uType_Of_TransportationIDTrans')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_CampaignI'])){
		
		
		    $CampaignExplanation = $_POST['CampaignExplanation'];
			$stid=oci_parse($c,"CALL InsertType_Of_Campaign ('$CampaignExplanation')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['Type_Of_CampaignU'])){
			$uType_Of_CampaignID = $_POST['uType_Of_CampaignID'];
			$uCampaignExplanation = $_POST['uCampaignExplanation'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Campaign('$uType_Of_CampaignID','$uCampaignExplanation')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['CampaignI'])){
		
			$Type_Of_CampaignIDCampaign =$_POST['Type_Of_CampaignIDCampaign'];
			$Campaign_Name = $_POST['Campaign_Name'];
			$Campaign_Date = $_POST['Campaign_Date'];
			$stid=oci_parse($c,"CALL InsertCampaign ('$Type_Of_CampaignIDCampaign','$Campaign_Name','$Campaign_Date')");
			oci_execute($stid);
			header("location:table.php");
			exit;
		}
		else if(isset($_POST['CampaignU'])){
			
			$uCampaignID =$_POST['uCampaignID'];
			$uType_Of_CampaignIDCampaign =$_POST['uType_Of_CampaignIDCampaign'];
			$uCampaign_Name = $_POST['uCampaign_Name'];
			$uCampaign_Date = $_POST['uCampaign_Date'];
			$stid=oci_parse($c,"CALL UpdateCampaign ('$uCampaignID','$uType_Of_CampaignIDCampaign','$uCampaign_Name','$uCampaign_Date')");
			oci_execute($stid);	
			
			header("location:table.php");
			exit;
			
		}
		
		}
}
?>

</php>