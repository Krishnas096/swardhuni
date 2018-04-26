<html>
<head>
<style type="text/css">

.style1 {
	font-size: 14px;
	font-weight: bold;
	color: red;
	
}

</style>
</head>
<body>

 

</html>

<!-------------------------------------------------------------------------------
php code starts now.. HTML code ends here ------------->


<?php
//Include Authentication file
require_once('auth.php');

//Display username of the user logged...

echo '<p align="center" class="style1">Logged in successfully </p>';
echo("Logged in as:- ");
echo("<b>".$_SESSION['SESS_FIRST_NAME']."</b>");
echo '<p align="left"><a href="index.php">logout</a></p>';

//Inititate connection variables..

$servername = "localhost";
$username = "root";
$password = "krishna";
$dbname = "temp_database";


// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//Select table from the database

$sql = "SELECT * FROM tempLog";
$result = $conn->query($sql);





//Fetch the results from the database

if ($result->num_rows > 0) {
    echo "<table border=1 align=center cellpadding=2 cellspacing=2 ><tr><th align=center width=300>Date</th><th align=center width=150>Temperature</th></tr>";


// Output data of each row in the form of a table

    while($row = $result->fetch_assoc()) {
        echo "<tr><td align=center>".$row["datetime"]."</td><td align=center >".$row["temperature"]." </td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}



//Refresh the page every n seconds before closing the databse connection.

header("Refresh: 30");

$conn->close();
?>





