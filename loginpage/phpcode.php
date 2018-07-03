<?php

echo "<head><meta name='viewport' content='width=device-width, initial-scale=1, minimum-scale=1'>";
/*echo "<script> 
$('#nav a').click(function(){
    
$('html, body').animate({
                scrollTop: $('#table1').offset().top
            }, 2000);

 });</script></head>";*/
 ?>

<script type="text/javascript">


function myfn1(){             //Gives out x coordinates of the table
var a=document.getElementById('table1');
var rec= a.getBoundingClientRect();
var x=rec.x;
console.log(x);
return x;

/*var d=rec.y;
console.log(c,d);
//alert(c,d);
var e= c+','+d;
alert(e);
console.log(e);
return e;*/
}

function myfn2(){               //Gives out y coordinates of table
var b=document.getElementById('table1');
var rec1= b.getBoundingClientRect();
var y=rec1.y;
console.log(y-110)
return (y-110);
}
</script>

 <?php

$record_per_page = 10;
$page = '';
if (isset($_GET["page"]))
{
    $page = $_GET["page"];
}
else
{
    $page = 1;
}

$start_from = ($page - 1) * $record_per_page;

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
    echo "<center><h6>Connected</h6></center>";
}
//Get the query


$datequery1 = isset($_GET['datequery1']) ? $_GET['datequery1'] : '';// $_GET['datequery1']; //Gets date & time and stores in dateQuery
$datequery2 = isset($_GET['datequery2']) ? $_GET['datequery2'] : '';//$_GET['datequery2']; //Gets date & time and stores in dateQuery
$datequery3 = isset($_GET['datequery3']) ? $_GET['datequery3'] : '';//$_GET['datequery3']; //Gets date & time and stores in dateQuery
$tempQuery = isset($_GET['tempQuery']) ? $_GET['tempQuery'] : '';//$_GET['tempQuery']; //Gets temperature and stores it in tempQuery1
$phQuery = isset($_GET['phQuery']) ? $_GET['phQuery'] : '';//$_GET['phQuery']; //Gets temperature and stores it in tempQuery1
$turbQuery = isset($_GET['turbQuery']) ? $_GET['turbQuery'] : '';//$_GET['turbQuery'];
//$statement=isset(($_GET['turbQuery']) || $_GET['phQuery'] || $_GET['dateQuery1'] || $_GET['dateQuery2'] || $_GET['datequery3']) ? 'You searched for:': '';



$flag = false;





//This code is for pagination


//$query = "SELECT * FROM tempLog order by datetime DESC LIMIT $start_from, $record_per_page";


function sqlFunc($sqlStmt)
{
    global $conn; //Fetch Global Variable conn
    global $record_per_page, $page, $start_from;
    global $datequery1,$datequery2,$datequery3,$tempQuery,$phQuery,$turbQuery;
    $no_of_lines=0;
    $statement1=''; //Initialize 6 statements contaings names of variables with empty or null string
    $statement2='';
    $statement3='';
    $statement4='';
    $statement5='';
    $statement6='';
    if($datequery1!=NULL)
    {
        $statement1="Date : ";
    }
    if($datequery2!=NULL)
    {
        $statement2="Date : ";
    }
    if($datequery3!=NULL)
    {
        $statement3="Date : ";
    }
    if($tempQuery!=NULL)
    {
        $statement4="Temperature : ";
    }
    if($phQuery!=NULL)
    {
        $statement5="pH : ";
    }
    if($turbQuery!=NULL)
    {
        $statement6="Turbidity : ";
    }
    

    //$_SESSION['sqlStmt']=$sqlStmt;
    $sql = $sqlStmt . " DESC LIMIT $start_from, $record_per_page";
    //echo "$sql";
    //$result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    echo "<center>You searched for :</center>";
    echo "<center><h6>$statement1 $datequery1</h6></center>";
    echo "<center><h6>$statement2 $datequery2</h6></center>";
    echo "<center><h6>$statement3 $datequery2</h6></center>";
    echo "<center><h6>$statement4 $tempQuery</h6></center>";
    echo "<center><h6>$statement5 $phQuery</h6></center>";
    echo "<center><h6>$statement6 $turbQuery</h6></center>";
    echo "<div class='container'>
   
   <div class='table-responsive'>";
    if ($result->num_rows > 0)
    {
        
        echo "<center>Results fetched</center>";
        echo "<table class='table isSearch' id='table1' cellspacing='0'><thead><tr><th align=center width=230>Date</th><th align=center width=150>Temperature</th><th align=center width=100>pH</th><th align=center width=135>Turbidity</th></tr></thead>";

        // Output data of each row in the form of a table
        while ($row = $result->fetch_assoc())
        {
            $no_of_lines++;
            echo "<tr>";
            echo "<td align=center>" . $row["datetime"] . "</td>";
            //Display temp values
            if ($row["temperature"] >= 30) echo "<td style='background-color: #fc4946;' align=center>" . $row['temperature'] . "</td>";
            else if ($row["temperature"] <= 10) echo "<td style='background-color: #6da5ff;' align=center>" . $row['temperature'] . "</td>";
            else echo "<td style='background-color: #23db5a;' align=center>" . $row['temperature'] . "</td>";
            //Display pH values
            if ($row["pH"] > 8.5) echo "<td style='background-color:#fc4946;' align=center>" . $row['pH'] . "</td>";
            else if ($row["pH"] <= 6.5) echo "<td style='background-color: #6da5ff;' align=center>" . $row['pH'] . "</td>";
            else echo "<td style='background-color: #23db5a;' align=center>" . $row['pH'] . "</td>";
            //Display Turbidity values
            if ($row["Turbidity"] > 100) echo "<td style='background-color: #fc4946;' align=center>" . $row['Turbidity'] . "</td>";
            else if ($row["Turbidity"] <= 50) echo "<td style='background-color: #6da5ff;' align=center>" . $row['Turbidity'] . "</td>";
            else echo "<td style='background-color: #23db5a;' align=center>" . $row['Turbidity'] . "</td>";

            echo "</tr>";

        }

        echo "</table>";
    }
    else
    {
        echo "<center><h1>Voila!</h1></center>
        <center><h3>You are searching something which doesn't exist.... yet</h3></center>";
        return;

    }
    echo "<iframe style='display:none' onLoad='window.scrollTo(myfn1(),myfn2())' ></iframe><p id='demo'></p>";
    echo "<div align='center'>
    <br />
    <br />";

    $page_query = $sqlStmt . " DESC";

    $page_result = mysqli_query($conn, $page_query);
    $total_records = mysqli_num_rows($page_result);

    $total_pages = ceil($total_records / $record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    //$tableAddress="#table1";
    if ($difference <= 5 && $total_records <= 10)
    {
        $start_loop = $total_pages - $page;
        echo "<br /><br /><p style='color:Black;'>Total records = $total_records</p>";
        return;
    }

    if ($difference <= 5 && $total_pages > 1)  //If the number of pafges are more
    {
        $start_loop = $total_pages - 5;
        $end_loop = $start_loop + 4;

        if($start_loop<=0)                      //if the second page contains less than 10 entries
        {
            $start_loop=1;
            $end_loop=$total_pages;
        }

    }
    if ($difference >= 5)  //If the difference of totalpages-records is more than 5 then display the links + 4
    {
        $start_loop = $total_pages - $difference;
        $end_loop = $start_loop + 4;
    }
    
    $QS = http_build_query(array_merge($_GET, array(
        "page" => ""
    ))); //Build the querystring so that it retains the GET variables on next page
    $NS = http_build_query(array_replace($_GET, array(
        "page" => 0
    )));
    $FP = trim($NS, 'page=0');

    echo "<div id='nav'>";

    if ($page > 1)
    {

        echo "<a class='one' id='anchor' href='" . htmlspecialchars("$_SERVER[PHP_SELF]?$FP") . "'>First</a>"; //Changed a href to (a class="one"), so that it doesnt affect the parents page
        echo "<a class='one' href='" . htmlspecialchars("$_SERVER[PHP_SELF]?$QS") . ($page - 1) . "'><<</a>";
    }
    for ($i = $start_loop;$i <= $end_loop;$i++)
    {
        echo "<a class='one' href='" . htmlspecialchars("$_SERVER[PHP_SELF]?$QS") . $i . "'>" . $i . "</a>";
    }
    if ($page <= $end_loop) //Initially it was "if ($page <= $end_loop)"" resulting in showing an extra empty page at last arrow
    {
        echo "<a class='one' href='" . htmlspecialchars("$_SERVER[PHP_SELF]?$QS") . ($page + 1) . "'>>></a>";
        echo "<a class='one' href='" . htmlspecialchars("$_SERVER[PHP_SELF]?$QS") . ($total_pages) ."'>Last</a>";
    }
    ;
    

    echo "</div>";
    echo "<br /><br /><p>Total records found = $total_records</p>";
    //echo "<br /><p style='color:black;'>Showing $no_of_lines records out of $total_records records</p>";
    echo "</div>                       
    <br /><br />
   </div>
  </div>";				//The 3 divs are being closed here

}

//-----------------------------------------------------------Truth Table goes here----------------------------------
//This is the first group
if ($datequery1 != NULL && $tempQuery != NULL && $datequery2 == NULL && $phQuery == NULL && $datequery3 == NULL && $turbQuery == NULL) //When date & temp

{
    $sqlStmt = "SELECT * FROM tempLog WHERE datetime LIKE '%" . $datequery1 . "%' and temperature LIKE '$tempQuery%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

else if ($datequery1 != NULL && $tempQuery == NULL && $datequery2 == NULL && $phQuery == NULL && $datequery3 == NULL && $turbQuery == NULL) //when only date

{
    $sqlStmt = "SELECT * FROM tempLog WHERE datetime LIKE '$datequery1%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

else if ($datequery1 == NULL && $tempQuery != NULL && $datequery2 == NULL && $phQuery == NULL && $datequery3 == NULL && $turbQuery == NULL) //when only temp

{
    $sqlStmt = "SELECT * FROM tempLog WHERE temperature LIKE '$tempQuery%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

//This is the second group
else if ($datequery1 == NULL && $tempQuery == NULL && $datequery2 != NULL && $phQuery != NULL && $datequery3 == NULL && $turbQuery == NULL) // when date2 & ph

{
    $sqlStmt = "SELECT * FROM tempLog WHERE datetime LIKE '%" . $datequery2 . "%' and pH LIKE '$phQuery%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

else if ($datequery1 == NULL && $tempQuery == NULL && $datequery2 == NULL && $phQuery != NULL && $datequery3 == NULL && $turbQuery == NULL) // when only ph

{
    $sqlStmt = "SELECT * FROM tempLog WHERE pH LIKE '$phQuery%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

else if ($datequery1 == NULL && $tempQuery == NULL && $datequery2 != NULL && $phQuery == NULL && $datequery3 == NULL && $turbQuery == NULL) // when only date2

{
    $sqlStmt = "SELECT * FROM tempLog WHERE datetime LIKE '%" . $datequery2 . "%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

//This is the third group
else if ($datequery1 == NULL && $tempQuery == NULL && $datequery2 == NULL && $phQuery == NULL && $datequery3 != NULL && $turbQuery != NULL) // when date3 & turb

{
    $sqlStmt = "SELECT * FROM tempLog WHERE datetime LIKE '%" . $datequery3 . "%' and Turbidity LIKE '$turbQuery' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

else if ($datequery1 == NULL && $tempQuery == NULL && $datequery2 == NULL && $phQuery == NULL && $datequery3 == NULL && $turbQuery != NULL) // when only turb

{
    $sqlStmt = "SELECT * FROM tempLog WHERE Turbidity LIKE '$turbQuery' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}

else if ($datequery1 == NULL && $tempQuery == NULL && $datequery2 == NULL && $phQuery == NULL && $datequery3 != NULL && $turbQuery == NULL) // when only date3

{
    $sqlStmt = "SELECT * FROM tempLog WHERE datetime LIKE '%" . $datequery3 . "%' order by datetime";
    sqlFunc($sqlStmt);
    $flag = true;
}
else
{   //echo "<center><h3>You are not even searching :( </h3></center>";
    return;
}

//--------------------------------------------------------Truth Table Ends Here------------------------------------------


mysqli_close($conn);
?>




