window.onload = function() {

    document.getElementById("hidden_temperature").style.display = "none";
    document.getElementById("hidden_ph").style.display = "none";
    document.getElementById("hidden_turbidity").style.display = "none";
    //document.getElementById("query").style.display="none";
}

var flag1 = true; //Flag for Temperature search box
var flag2 = true; //Flag for pH search Box
var flag3 = true; //Flag for Turbid search box
function findClicked(buttonType) {


    switch (buttonType) {
        case 'temp':
            {
                if ((flag1 == true || flag2 == false) || (flag1 == true || flag3 == false)) {
                    document.getElementById('hidden_ph').style.display = "none";

                    document.getElementById('hidden_turbidity').style.display = "none";
                    document.getElementById('hidden_temperature').style.display = "block";

                    document.getElementById('date2').value = "";
                    document.getElementById('ph').value = "";
                    document.getElementById('date3').value = "";
                    document.getElementById('turb').value = "";
                    flag1 = false;
                } else {
                    document.getElementById('hidden_temperature').style.display = "none";
                    flag1 = true;
                }

                break;
            }
        case 'ph':
            {


                //	console.log(buttonCounter2)
                if ((flag2 == true || flag1 == false) || (flag2 == true || flag3 == false))

                {

                    document.getElementById('hidden_temperature').style.display = "none";
                    document.getElementById('hidden_turbidity').style.display = "none";
                    document.getElementById('hidden_ph').style.display = "block";


                    document.getElementById('date1').value = "";
                    document.getElementById('temp').value = "";
                    document.getElementById('date3').value = "";
                    document.getElementById('turb').value = "";
                    flag2 = false;
                } else {
                    document.getElementById('hidden_ph').style.display = "none";
                    flag2 = true;
                }

                break;
            }

        case 'turbidity':
            {


                //console.log(buttonCounter2)
                if ((flag3 == true || flag1 == false) || (flag3 == true || flag2 == false))

                {

                    document.getElementById('hidden_temperature').style.display = "none";
                    document.getElementById('hidden_ph').style.display = "none";
                    document.getElementById('hidden_turbidity').style.display = "block";

                    document.getElementById('date2').value = "";
                    document.getElementById('ph').value = "";
                    document.getElementById('date2').value = "";
                    document.getElementById('ph').value = "";
                    flag3 = false;
                } else {
                    document.getElementById('hidden_turbidity').style.display = "none";
                    flag3 = true;
                }

                break;
            }

        case 'hidden':
            {


                document.getElementById('hidden_temperature').style.display = "none";
                document.getElementById('hidden_ph').style.display = "none";
                document.getElementById('hidden_turbidity').style.display = "none";
                break;
            }
    }
}