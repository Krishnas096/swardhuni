<!DOCTYPE html>
<html>
<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="blinkAnimate.css">
<meta charset=utf-8 />
<title>Motor LED</title>
<style>
  #a1 {
    width: 40px;
    height: 40px;
    
    display: inline-block;
    visibility: hidden;
    border-radius: 50%
  }
  #a2 {
    width: 40px;
    height: 40px;

    display: inline-block;
    visibility: hidden;
    border-radius: 50%
  }
</style>
<script type="text/javascript">
  $( function() {
  var $winHeight = $( window ).height()
  $( '.container' ).height( $winHeight );
});
</script>
</head>
<body>
	<br />
	<div style="font-family: Arial;">Motor Status :<b> Working </b><br> Valve turned at <b><span id= "msgVal1"></span></b><br> Flow Direction<B> <span id= "msgVal2"></span></B> </div>
	<br>&nbsp;&nbsp;
    <!--<div id='a1'>
	</div>
    <div id='a2'>
	</div> <br>
	<br>--> 
    <div class="led-green" id='a1'></div>
      </div>
    <div class="led-red" id='a2'></div>
      </div>
</body>





<?php
$servername = "ec2-13-232-13-99.ap-south-1.compute.amazonaws.com:3306";
$username = "krishna";
$password = "Krishna@8081";
$dbname = "temp_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
    //echo "<center><h6>Connected</h6></center>";
}
$sql = "SELECT * FROM alerttable WHERE datetime In (SELECT MAX(datetime) FROM alerttable) GROUP BY motorStatus";
$result = $conn->query($sql);
//print_r($result);
$noTotalRows=mysqli_num_rows($result);
if ($result->num_rows > 0)
    {
       while ($row = $result->fetch_assoc())
        {
        
                //echo "<br/>" . $row["motorStatus"] . "<br/>";
       		 	$date=$row["datetime"];
                $status=$row["motorStatus"];  //Get the value of motorStatus
                
        }    
    }
    else
    {
        echo "Error";
    }

//echo "$date<br/>";
//echo "$status";
$status1=(string) $status;
//echo "$status";
$match = "CCW";
$a = strcmp($status1, $match);
//echo "$a";
//if($status == $match)

if($a == 2)
{
	echo "<script>
	document.getElementById('a2').style.visibility = 'visible';
	document.getElementById('a1').style.visibility = 'hidden';
	$('#msgVal2').text(': WasteWater');
	$('#msgVal1').text(': $date');/*
	alert('Valve is Open')*/
	</script>";
	
}
else
{
	echo "<script>/*alert('Valve is Closed')*/
	document.getElementById('a1').style.visibility = 'visible';
	document.getElementById('a2').style.visibility = 'hidden';
	$('#msgVal2').text(': FreshWater');
	$('#msgVal1').text(': $date');
	</script>";
}
//echo "<br /><br/>$noTotalRows";
header("Refresh: 5	;");
?>
</html>