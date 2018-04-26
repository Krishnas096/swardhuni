<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Search page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<link rel="stylesheet" href="Cascading.css" />
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>

		<form class="form-inline" action="" method="GET">
			<center>
				<div class="form-group">
					

				<div id="hidden_temperature">
					<input type="text" class="form-control" name="datequery1" id="date1" size="33" placeholder="Enter datetime in YYYY-MM-DD HH:MM" pattern="[1-2][0-9]{3}[-]([0][1-9]|[1][0-2])[-]([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])|[1-2][0-9]{3}[-]([0][1-9]|[1][0-2])[-]([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])[ ](([0-1][0-9]|[2][0-4])|([0-1][0-9]|[2][0-4])[:]([0-5][0-9]|[6][0]))" title="YYYY-MM-DD HH:MM" /> &ensp;
					<input type="text" class="form-control" name="tempQuery" id="temp" size="33" placeholder="Enter temperature in 'dd' or 'dd.dd' form" pattern="[0-9]{2}|[0-9]{2}[.][0-9]{2}" title="dd.dd" /> &ensp;
					<button type="submit" class="btn btn-info">
      					<span class="glyphicon glyphicon-search"></span> Search
    				</button>
    
					<br />
					<br />
				</div>
				<div id="hidden_ph">
					<input type="text" class="form-control" name="datequery2" id="date2" size="33" placeholder="Enter datetime in YYYY-MM-DD HH:MM" pattern="[1-2][0-9]{3}[-]([0][1-9]|[1][0-2])[-]([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])|[1-2][0-9]{3}[-]([0][1-9]|[1][0-2])[-]([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])[ ](([0-1][0-9]|[2][0-4])|([0-1][0-9]|[2][0-4])[:]([0-5][0-9]|[6][0]))" title="YYYY-MM-DD HH:MM" /> &ensp;
		
					
					
					<input type="text" class="form-control" name="phQuery" id="ph" size="33" placeholder="Enter ph value between 0-14" pattern="[0-9]|[1][0-4]|[0-9]|[0-9][.][0-9]{2}|[0-9][.][0-9]{1}|[1][0-4]|[1][0-4][.][0-9]{2}" title="float(0-14)" /> &ensp;
					<button type="submit" class="btn btn-info">
      					<span class="glyphicon glyphicon-search"></span> Search
    				</button>


    
					<br />
					<br />
				</div>
				<div id="hidden_turbidity">
					<input type="text" class="form-control" name="datequery3" id="date3" size="33" placeholder="Enter datetime in YYYY-MM-DD HH:MM" pattern="[1-2][0-9]{3}[-]([0][1-9]|[1][0-2])[-]([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])|[1-2][0-9]{3}[-]([0][1-9]|[1][0-2])[-]([0][1-9]|[1][0-9]|[2][0-9]|[3][0-1])[ ](([0-1][0-9]|[2][0-4])|([0-1][0-9]|[2][0-4])[:]([0-5][0-9]|[6][0]))" title="YYYY-MM-DD HH:MM" /> &ensp;
		
					
					<input type="text" class="form-control" name="turbQuery" id="turb" size="33" placeholder="Enter turbid value" pattern="\d{1,3}" title="fl0oat(0-1000)" /> &ensp;
					<button type="submit" class="btn btn-info">
      					<span class="glyphicon glyphicon-search"></span> Search
    				</button>  
 
					<br />
					<br />
				</div>
				<input type="button" class="btn btn-primary" id="temp" value="Search by temperature" onclick="findClicked('temp')"/>
				<input type="button" class="btn btn-primary" id="ph" value="Search by pH" onclick="findClicked('ph')"/>
				<input type="button" class="btn btn-primary" id="turbidity" value="Search by turbidity" onclick="findClicked('turbidity')"/>
				<input type="button" class="btn btn-warning" id="hide" value="Hide all" onclick="findClicked('hidden')"/>
			</center>
		
	</div>
		</form>
	</body>
</html>
<!---PHP------------------>
<?php
include ('phpcode.php'); ?>