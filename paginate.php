

<!DOCTYPE html>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>PHP Pagination</title>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


 </head>
 <body>
  <br /><br />
  <div class="container-fluid">
  	<div class="row">
  		<div class="container">
  			<div class="panel panel-default">
          <div class="panel-heading">Swardhuni- A Real Time & Automated Water Quality Monitoring and Flow Diverting Mechanism </div>
  				<div class="panel-body">
            <center><?php include('modal/mainModal.php'); ?></center>
          </div>
  					

  				</div>
			</div>
  		</div>

  	<div class="row">
    	
    	<div class="col-lg-12" >
 
  				<div class="container">
   <!--<h3 align="center">Paginated table with Next Previous First Last page Link</h3><br />-->
   
  
                  <?php include('working.php'); ?>  						
		       					
	   							</div>
					    <br /><br />
					   </div>
  				</div>
        </div>  		
 </body>
</html>
