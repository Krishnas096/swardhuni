<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
  <style>
          .button {
            border-radius: 4px;
            background-color: #6600cc;//#f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 18px;
            padding: 10px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 15px;

          }

          .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
          }

          .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
          }

          .button:hover span {
            padding-right: 15px;
          }

          .button:hover span:after {
            opacity: 1;
            right: 0;
          }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="modal/eModal.js"></script>
<script>
  /*window.onload = function(){
var btn1 = document.getElementById('btn1');
alert(btn1);*/
     function click(value,heading)
      {
        //alert(value);
        var head="<center><h2>"+heading+"</h2></center>" //I am concatenating this with the centre and h2 tah so that i can append it in eModal Funntion
        //alert(head);
        eModal.iframe(value, head);
        //return false
      }
      /*
btn1.onclick=alert("hello");
}*/
$(document).ready(function(){
  $("#btn1,#btn2,#btn3").click(function(){
    if((this.id)=="btn1")
    {
      click('modal/k/tempChart.php','Temperature Record');
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

<body>
  
    <button class="button" id="btn1"><span>Temperature Chart </span></button>
    <button class="button" id="btn2"><span>pH Chart </span></button>
    <button class="button" id="btn3"><span>Turbidity Chart </span></button>
</body>

</html>