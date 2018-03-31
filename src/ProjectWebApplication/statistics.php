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
	<form action="statistics.php" method="post" accept-charset="UTF-8">
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
            
                <li >
                    <a href="table.php">
                        <i class="pe-7s-note2"></i>
                        <p>Table List</p>
                    </a>
                </li>

          
                <li class="active">
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
                                <h4 class="title">Booking Statistics Table</h4>                              
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									$sqlCount = "SELECT COUNT(*) FROM Booking" ;
									$sqlAvg = "SELECT AVG(Cost) FROM Booking" ;
									
									$FirstRez = "SELECT * FROM Booking WHERE ROWNUM = 1";
									$LastRez = "SELECT  * FROM Booking WHERE rowid =(SELECT MAX(rowid) FROM  Booking) ";
									
									
									$sqlMaxBooking = "SELECT * FROM Booking WHERE HotelID = (SELECT HotelID FROM (SELECT HotelID,COUNT(HotelID) FROM Booking GROUP BY HotelID ORDER BY COUNT(HotelID) DESC) WHERE ROWNUM = 1)" ;
									$sqlMinBooking = "SELECT * FROM Booking WHERE HotelID = (SELECT HotelID FROM (SELECT HotelID,COUNT(HotelID) FROM Booking GROUP BY HotelID ORDER BY COUNT(HotelID) ASC) WHERE ROWNUM = 1)" ;
									
									
									
									$sqlMaxCost = " SELECT *  FROM Booking WHERE Cost = (SELECT MAX(Cost) FROM Booking) " ;
									$sqlMinCost = "SELECT *  FROM Booking WHERE Cost = (SELECT MIN(Cost) FROM Booking) " ;
											
									 				
									echo "<table border='1'>\n";
									?><p class="category">Count Table</p><?php	
									$stid=oci_parse($c, $sqlCount);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Count",);
									//$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
								
								
									echo "<table border='1'>\n";
									?><p class="category">Avarage Cost</p><?php	
									$stid=oci_parse($c, $sqlAvg);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Avarage Cost",);
									
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
								
								
								 ?><p class="category">Most Expensive Booking</p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMaxCost);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
									
										 ?><p class="category">Most Cheap Booking</p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMinCost);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
									
										 ?><p class="category">Most Booking Hotel </p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMaxBooking);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
									
									
								?><p class="category">Least Booking Hotel </p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMinBooking);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
									
										?><p class="category">First Rezervation </p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $FirstRez);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
									
										?><p class="category">Last Rezervation </p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $LastRez);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
						
			
						
                    </div>
					
					
						 <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Transportation Statistics Table</h4>
                                
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									
									$sqlCount = "SELECT COUNT(*) FROM Transportation" ;									
									$sqlMaxCost = "SELECT *  FROM Transportation WHERE Cost = (SELECT MAX(Cost) FROM Transportation) " ;
									$sqlMinCost = "SELECT *  FROM Transportation WHERE Cost = (SELECT MIN(Cost) FROM Transportation) " ;
											
									 				
									echo "<table border='1'>\n";
									?><p class="category">Count Table</p><?php	
									$stid=oci_parse($c, $sqlCount);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Count",);
									//$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
								
								
								 ?><p class="category">Most Expensive Transportation</p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMaxCost);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"TransportationID","1"=>"Transportation_Date","2"=>"Cost","3"=>"Type_Of_TransportationID",);
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
									
										 ?><p class="category">Most Cheap Transportation</p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMinCost);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"BookingID","1"=>"Booking_Date","2"=>"Cost","3"=>"HotelID",);
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
									echo "</table>\n";}
									?>					
                               
                                    </tbody>
                                </table>

                            </div>
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
								
						
                    </div>
					
					
						<div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Tour Statistics Table</h4>
                             
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
						
                                    <tbody>
									<?php $conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
									if($c = OCILogon("C##b21328232","21328232",$conn)){ 
								
									
									$sqlCount = "SELECT COUNT(*) FROM Tour" ;									
									$sqlMaxCost = "SELECT *  FROM Tour WHERE Cost = (SELECT MAX(Cost) FROM Tour) " ;
									$sqlMinCost = "SELECT *  FROM Tour WHERE Cost = (SELECT MIN(Cost) FROM Tour) " ;
											
									 				
									echo "<table border='1'>\n";
									?><p class="category">Count Table</p><?php	
									$stid=oci_parse($c, $sqlCount);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"Count",);
									
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
								
								
								 ?><p class="category">Most Expensive Tour</p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMaxCost);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"TourID","1"=>"Type_Of_TourID","2"=>"Tour_Date","3"=>"Tour_Name","4"=>"Cost",);
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
									
										 ?><p class="category">Most Cheap Tour</p><?php
								
								echo "<table border='1'>\n";
									$stid=oci_parse($c, $sqlMinCost);
									oci_execute($stid);
									$i=0;
									$attribute=array("0"=>"TourID","1"=>"Type_Of_TourID","2"=>"Tour_Date","3"=>"Tour_Name","4"=>"Cost",);
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
									echo "</table>\n";}
									?>		
																																										             
                                    </tbody>
                                </table>

                            </div>
                        </div>
														
                    </div>
																																	
			
					

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
			header("location:statistics.php");
			exit;	
			
									
		}
		else if(isset($_POST['BranchU'])){
			
			$uBID = $_POST['uBID'];
			$uBranchName = $_POST['BranchName'];
			$uBranchAddress = $_POST['BranchAddress'];
			$uBranchTelephone_No = $_POST['BranchTelephone_No'];
			$uBranchEmail = $_POST['BranchEmail'];
			$stid=oci_parse($c,"CALL UpdateBranch ('$uBID','$BranchName ','$BranchAddress ','$BranchTelephone_No ','$BranchEmail')");
			oci_execute($stid);
			header("location:statistics.php");
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
			header("location:statistics.php");
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
			header("location:statistics.php");
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
			header("location:statistics.php");
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
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_HotelI'])){
			
			$HotelExplanation = $_POST['HotelExplanation'];
			$stid=oci_parse($c,"CALL InsertType_Of_Hotel ('$HotelExplanation')");
		    oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_HotelU'])){
			
			$uHID = $_POST['uHID'];
			$HotelExplanation = $_POST['HotelExplanation'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Hotel ('$uHID','$HotelExplanation')");
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['HotelI'])){
			
			$Type_Of_HotelID = $_POST['Type_Of_HotelID'];
			$Hotel_Name = $_POST['Hotel_Name'];
			$AddressHotel = $_POST['AddressHotel'];
			$uGLast_Name = $_POST['Telephone_NoHotel'];
			$Properties = $_POST['Properties'];
			
			
			$stid=oci_parse($c,"CALL InsertHotel ('$Type_Of_HotelID','$Hotel_Name ','$AddressHotel ','$Telephone_NoHotel ','$Properties')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['HotelU'])){
			
			$uHotelID = $_POST['uHotelID'];
			$Type_Of_HotelID = $_POST['Type_Of_HotelID'];
			$Hotel_Name = $_POST['Hotel_Name'];
			$AddressHotel = $_POST['AddressHotel'];
			$uGLast_Name = $_POST['Telephone_NoHotel'];
			$Properties = $_POST['Properties'];
				
			$stid=oci_parse($c,"CALL UpdateHotel ('$uHotelID','$Type_Of_HotelID','$Hotel_Name ','$AddressHotel ','$Telephone_NoHotel ','$Properties')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TourI'])){
			
			
			$TourExplanation = $_POST['TourExplanation'];
			$stid=oci_parse($c,"CALL InsertType_Of_Tour ('$TourExplanation')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TourU'])){
			
			$uTourID = $_POST['uTourID'];
			$TourExplanation = $_POST['TourExplanation'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Tour ('$uTourID','$TourExplanation')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['TourI'])){
			
			$Type_Of_TourID =$_POST['Type_Of_TourID'];
			$Tour_Date =$_POST['Tour_Date'];
			$Tour_Name =$_POST['Tour_Name'];
			$Cost  =$_POST['TourCost'];
			$stid=oci_parse($c,"CALL InsertTour ('$Type_Of_TourID','$Tour_Date','$Tour_Name','$Cost')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['TourU'])){
		
			$uTourID = $_POST['uTourID'];
			$uType_Of_TourID =$_POST['uType_Of_TourID'];
			$uTour_Date =$_POST['uTour_Date'];
			$uTour_Name =$_POST['uTour_Name'];
			$uCost  =$_POST['uTourCost'];
			$stid=oci_parse($c,"CALL UpdateTour ('$uTourID','$uType_Of_TourID','$uTour_Date','$uTour_Name','$uCost')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TransportationI'])){
			
			
			$ExplanationTrans = $_POST['ExplanationTrans'];
			$stid=oci_parse($c,"CALL InsertType_Of_Transportation ('$ExplanationTrans')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_TransportationU'])){
			
			$uTRID = $_POST['uTRID'];
			$uExplanationTrans = $_POST['uExplanationTrans'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Transportation ('$uTRID','$uExplanationTrans')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['TransportationI'])){
			
			
			$Transportation_Date =$_POST['Transportation_Date'];
			$CostTrans =$_POST['CostTrans'];
			$Type_Of_TransportationIDTrans =$_POST['Type_Of_TransportationIDTrans'];
			$stid=oci_parse($c,"CALL InsertTransportation ('$Transportation_Date','$CostTrans','$Type_Of_TransportationIDTrans')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
				
			
		}
		else if(isset($_POST['TransportationU'])){
		
			$uTransportationID =$_POST['uTransportationID'];
			$Transportation_Date =$_POST['uTransportation_Date'];
			$CostTrans =$_POST['uCostTrans'];
			$Type_Of_TransportationIDTrans =$_POST['uType_Of_TransportationIDTrans'];
			$stid=oci_parse($c,"CALL UpdateTransportation ('$uTransportationID','$uTransportation_Date','$uCostTrans','$uType_Of_TransportationIDTrans')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_CampaignI'])){
		
		
		    $CampaignExplanation = $_POST['CampaignExplanation'];
			$stid=oci_parse($c,"CALL InsertType_Of_Campaign ('$CampaignExplanation')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['Type_Of_CampaignU'])){
			$uType_Of_CampaignID = $_POST['uType_Of_CampaignID'];
			$uExplanationTrans = $_POST['uExplanationTrans'];
			$stid=oci_parse($c,"CALL UpdateType_Of_Campaign ('$uType_Of_CampaignID','$uExplanationTrans')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['CampaignI'])){
		
			$Type_Of_CampaignID =$_POST['Type_Of_CampaignIDCampaign'];
			$Campaign_Name = $_POST['Campaign_Name'];
			$Campaign_Date = $_POST['Campaign_Date'];
			$stid=oci_parse($c,"CALL InsertCampaign ('$Type_Of_CampaignID','$Campaign_Name','$Campaign_Date')");
			oci_execute($stid);
			header("location:statistics.php");
			exit;
		}
		else if(isset($_POST['CampaignU'])){
			
			$CampaignID =$_POST['CampaignID'];
			$Type_Of_CampaignID =$_POST['Type_Of_CampaignIDCampaign'];
			$Campaign_Name = $_POST['Campaign_Name'];
			$Campaign_Date = $_POST['Campaign_Date'];
			$stid=oci_parse($c,"CALL UpdateCampaign ('$Type_Of_CampaignID','$Campaign_Name','$Campaign_Date')");
			oci_execute($stid);	
			
			header("location:statistics.php");
			exit;
			
		}
		
		}
}
?>

</php>