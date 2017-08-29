<?php
// This include simply connects to the correct database for cars

// connect to MySQL server (host,user,password)
$db = mysql_connect("localhost","matt","123") or die ("<h1>Error - No connection to MySQL</h1>\n");

// select the correct database
$er = mysql_select_db("localhost_dap_db")or die 
	("<h3 class='error'>Error - No connection to Database \nProbably don't have Privileges</h3>");

?>