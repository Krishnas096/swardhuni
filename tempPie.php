<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "temp_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
/*
else
{
    echo "<center><h6>Connected</h6></center>";
}*/
$minTemp=29;
$maxTemp=31;
$minPh=5.5;
$maxPh=7;
$maxTurb=100;




function calc_progress($flag)
{
	
	//Set thresholds
	
	global $minTemp,$maxTemp,$minPh,$maxPh,$maxTurb;	


	$val=0;
	global $conn;

	if($flag==1)
	{
		// queries with Thresholds Temperature <$minTemp OR >$maxTemp
		$PieQueryTotal="SELECT datetime,temperature from tempLog";					
		$PieQueryViol="SELECT datetime,temperature from tempLog where temperature < $minTemp OR temperature >$maxTemp";
	}

	if($flag==2)
	{
		// queries with Thresholds pH <$minPh OR >maxPh
		$PieQueryTotal="SELECT datetime,pH from tempLog";					
		$PieQueryViol="SELECT datetime,pH from tempLog where pH < $minPh OR pH >$maxPh";	
	}
	if($flag==3)
	{
		// queries with Thresholds Turbidity >$maxTurb
		$PieQueryTotal="SELECT datetime,Turbidity from tempLog";					
		$PieQueryViol="SELECT datetime,Turbidity from tempLog where Turbidity >$maxTurb ";
	}
	if($flag==4)
	{
		// queries violating all the Thresholds simultaneously
		$PieQueryTotal="SELECT * from tempLog";					
		$PieQueryViol="SELECT * from tempLog where (temperature < $minTemp OR temperature >$maxTemp) AND (pH < $minPh OR pH >$maxPh) AND (Turbidity >$maxTurb) ";
	}

	//Fetch rows using above queries
	$pieTotal=mysqli_query($conn,$PieQueryTotal);		//Query for Total Rows
	$pieViol=mysqli_query($conn,$PieQueryViol);			//Query for Violating Rows

	//Calculate number of rows
	$noTotalRows=mysqli_num_rows($pieTotal);				//Calculate Total Rows
	$noViolRows=mysqli_num_rows($pieViol);					//Calculate Violating Rows
	//echo "Total= $noTotalRows <br />";
	//echo "Violation= $noViolRows <br />";

	$val=($noViolRows/$noTotalRows)*100;
	$roundedval=ceil($val);
	//echo "Helloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo<br />";
	echo $roundedval;

}

//calc_progress(2);
?>