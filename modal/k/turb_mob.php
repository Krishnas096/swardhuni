

<?php
/*
Script  : PHP-JSON-MySQLi-GoogleChart
Author  : Enam Hossain
version : 1.0

*/

/*
--------------------------------------------------------------------
Usage:
--------------------------------------------------------------------

Requirements: PHP, Apache and MySQL

Installation:

  --- Create a database by using phpMyAdmin and name it "chart"
  --- Create a table by using phpMyAdmin and name it "googlechart" and make sure table has only two columns as I have used two columns. However, you can use more than 2 columns if you like but you have to change the code a little bit for that
  --- Specify column names as follows: "weekly_task" and "percentage"
  --- Insert some data into the table
  --- For the percentage column only use a number

      ---------------------------------
      example data: Table (googlechart)
      ---------------------------------

      weekly_task     percentage
      -----------     ----------

      Sleep           30
      Watching Movie  10
      job             40
      Exercise        20     


*/

/* Your Database Name */

$DB_NAME = 'temp_database';

/* Database Host */
$DB_HOST = 'localhost';

/* Your Database User Name and Passowrd */
$DB_USER = 'root';
$DB_PASS = '';





  /* Establish the database connection */
  $mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

   /* select all the weekly tasks from the table googlechart */
  $result = $mysqli->query('SELECT datetime,Turbidity FROM tempLog');

  /*
      ---------------------------
      example data: Table (googlechart)
      --------------------------
      Weekly_Task     percentage
      Sleep           30
      Watching Movie  10
      job             40
      Exercise        20       
  */



  $rows = array();
  $table = array();
  $table['cols'] = array(

    // Labels for your chart, these represent the column titles.
    /* 
        note that one column is in "string" format and another one is in "number" format 
        as pie chart only required "numbers" for calculating percentage 
        and string will be used for Slice title
    */

    array('label' => 'Date-Time', 'type' => 'string'),
    array('label' => 'Turbidity', 'type' => 'number')

);
    /* Extract the information from $result */
    foreach($result as $r) {

      $temp = array();

      // The following line will be used to slice the Pie chart

      $temp[] = array('v' => (string) $r['datetime']); 

      // Values of the each slice

      $temp[] = array('v' => (float) $r['Turbidity']); 
      $rows[] = array('c' => $temp);
    }

$table['rows'] = $rows;

// convert data into JSON format
$jsonTable = json_encode($table);
//echo $jsonTable;

header("Refresh: 5");   //Put the seconds after which the page needs to be refreshed

?>


<html>
  <head>
    <!--Load the Ajax API-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    /*$(window).on("throttledresize", function (event) {
    drawChart();
});*/

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
                      title: 'Turbidity Record every 5 Seconds',
                      //is3D: 'true',
                      curveType: 'function',

                      width: "100%",
                      height: 500,
                      //legend: 'top',
                      axisTitlesPosition: 'out',
                       'isStacked': true,
                       //pieSliceText: 'percentage',
                       colors: ['#0598d8', '#f97263'],
                       chartArea: {
                           left: "15%",
                           top: "20%",
                           bottom:"40%",
                           height: "100%",
                           width: "100%"
                       },
	vAxis:{
    title:'Turbidity'
  },
  hAxis: { 
    title:'Date',
    minValue: 0,
     maxValue: 5000 },
	//curveType: 'function',
	pointSize: 3,
	dataOpacity: 0.6

        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      //var chart = new google.visualization.LineChart(document.getElementById('visualization'));
      //chart.draw(data, options);
      function resize() {
    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
  window.onload = resize();
  window.onresize = resize;

}

    

    /*$(window).resize(function() {
        if(this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
        }, 500);
    });

    //redraw graph when window resize is completed  
    $(window).on('resizeEnd', function() {
        drawChart();
    });*/
    </script>
<style type="text/css">
  body {
    width:100%;
    height: 100%;
    margin:5% auto auto auto;
    //background:#e6e6e6;
}
</style>
  </head>

  <body>
    <!--this is the div that will hold the pie chart-->
    <!--<center><h1>Temperature Graph</h1></center>-->
    <div id="visualization_wrap">
    <div id="visualization"></div>
</div>


    <div class = "container" id="chart_div"></div>  <!--Load bootstrap container for responsiveness-->
  </body>
</html>