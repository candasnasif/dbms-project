<?php
// Create connection to Oracle
$conn = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS =(PROTOCOL=TCP)(HOST = dbs.cs.hacettepe.edu.tr)(PORT = 1521)))(CONNECT_DATA = (SID=dbs)))";
	if($c = OCILogon("C##b21328232","21328232",$conn)){
		
  
		$stid = oci_parse($c, 'SELECT Tour_Date,Tour_Name,Cost FROM Tour WHERE Cost>500 and Cost<1000 and Type_Of_TourID=2');
		oci_execute($stid);
		echo "<table border='1'>\n";
	while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
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