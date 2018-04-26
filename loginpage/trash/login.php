<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript" src="/completewebsite/modal/em.js"></script>
<script type="text/javascript">
function click(value,heading)
      {
        //alert(value);
        var head="<center><h2>"+heading+"</h2></center>" //I am concatenating this with the centre and h2 tah so that i can append it in eModal Funntion
        //alert(head);
        var options = {
        url: "index.html",
        title:' ',
        size: eModal.size.xl,
        subtitle: 'smaller text header',
        
        
    };
        eModal.iframe(options);
        //return false
      }
      /*
btn1.onclick=alert("hello");
}*/
$(document).ready(function(){
  $("#btn1,#btn2,#btn3").click(function(){
    if((this.id)=="btn1")
    {
      click('index.html','Temperature Record');
    }
     if((this.id)=="btn2")
    {
      click('modal/k/phChart.php','pH Record');
    }
    if((this.id)=="btn3")
    {
      click('modal/k/turbChart.php','Turbidity Record');
    } 
     /* alert("Hello World");
      click('k/tempChart.php');*/
  });
});
</script>
</head>
<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
?>
<button class="btn btn-default" id="btn1">
  Hello! Login?
</button>



