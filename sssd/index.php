<?php require("database.php");?>
<!DOCTYPE html>
<html>
<head>
	<title>SSSD</title>
	<link rel="icon" type="image/ico" href="icon.jpg"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="w3.css">
    <script type="text/javascript" src="button.js"></script>
    <script type="text/javascript" src="check.js"></script>
      <script type="text/javascript">
      
  function checkp()
        {
var y = document.getElementById("test");
    if (y.className.indexOf("w3-show") == -1)
    {
        y.className += " w3-show";
        var x = document.getElementById("newpatient");
        if(x.className.indexOf("w3-show") != -1)
        {
                x.className = x.className.replace(" w3-show", "");
        }
    } 
    else
    {
        y.className = y.className.replace(" w3-show", "");
    }
      x = document.getElementById("symbol").innerText;
    if (x=='+')
    {
        document.getElementById("symbol").innerText='-';
    }
    else
    {
        document.getElementById("symbol").innerText='+';
    }
   
  }


function myFunction()
{
var x = document.getElementById("newpatient");
    if (x.className.indexOf("w3-show") == -1)
    {x.className += " w3-show";
      
        var y = document.getElementById("test");
       if(y.className.indexOf("w3-show") != -1)
        {
                y.className = y.className.replace(" w3-show", "");
        }
    } 
    else
    {
        x.className = x.className.replace(" w3-show", "");
    }
    x = document.getElementById("symbol").innerText;
    if (x=='+')
    {
        document.getElementById("symbol").innerText='-';
    }
    else
    {
        document.getElementById("symbol").innerText='+';
    }
  

}
 
       </script>
</head>
<body>
	<header class="w3-container w3-card-4  w3-wide w3-center w3-animate-top">
		<img class="w3-card-4" src="sssd.jpg" style="width:10%;height: 10%;"/>
		<h1>SRI SHIVA SAI DIAGNOSTICS</h1>
    </header>
    <div class="w3-container w3-card-4 w3-blue">
    	<div class="w3-padding w3-margin">
    	<button onclick="myFunction();" class="w3-btn w3-green ">New Patient <span id="symbol">+</span></button>

<button type="button" onclick="checkp();"class="w3-btn w3-right w3-green " >Records</button>

        <form id="test" class="w3-hide  w3-right w3-card-4 w3-green w3-padding-large w3-margin"  method="POST" action="check.php" style="display: none;"  >
            <h5>Records Login</h5>
         <input type="password" name="password" id="pass" placeholder="Enter password" required/>
         <input type="submit" class="w3-btn w3-blue" value="check" /> 
        </form>




        <a id="button" href="records.php"class="w3-btn w3-green w3-right" style="display: none;" >Records</a></div>
        <!-------------------------FORM START--------------------------------------->
        <form id="newpatient" method="POST" action="addp.php" class="w3-hide w3-card-4 w3-light-grey w3-animate-top w3-padding-large w3-margin-bottom" >
        <table class="w3-table-all w3-text-black w3-hoverable">
        	<tr>
        		<td width="25%"><label class="w3-left-align ">Patient Name</label></td>
                <td colspan="3"><input type="text" name="pname" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" width="75%" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Age</label></td>
                <td colspan="3"><input type="number" name="age" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Gender</label></td>
                  <td colspan="3">
                  	<span class="w3-hover-light-blue w3-padding"><input type="radio" name="gender" class="w3-radio " value="male" required="required"/>
                  		<label class="w3-text-blue w3-left-align">Male</label>
                  	</span>
                    <span class="w3-hover-light-blue w3-padding"><input type="radio" name="gender" class="w3-radio " value="female" required="required"/>
                       <label class="w3-text-blue w3-left-align">Female</label>
                    </span>
                </td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Doctor Name </label></td>
                <td colspan="3"><input type="text" name="dname" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr class="w3-blue">
            	<td colspan="4"><h5>Available test:</h5></td>
            </tr>  
            <?php require("testlist.php"); ?>
            <tr>
             	<td><label class="w3-left-align">Total  Amount</label></td>
                <td colspan="3"><input type="number" name="amo" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td><label class="w3-left-align">Amount Paid</label></td>
                <td colspan="3"> <input type="number" name="amop"class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required="required" autocomplete="off"/></td>
            </tr>
            <tr>
            	<td colspan="4" class="w3-center"><input type="submit" value="submit" class="w3-btn w3-blue w3-margin-top" name="psubmit" /></td>
            </tr>
 		</table>
        </form>
    </div>
    <h2 class="w3-white w3-wide w3-center">REGISTER</h2>
                           <!-----------------------FORM ENDS------TABLE START------------------------------------------------>
    <?php
        $dates=date('Y-m-d');
        $datest=date("d-m-Y",strtotime($dates));
        echo '<h1 class="w3-card-4 w3-white w3-center w3-wide w3-container w3-padding-large w3-margin w3-animate-right">'.$datest.'</h1>';
    ?><div class="w3-animate-left">
    <?php require("register.php");?>
    </div>
</body>
</html>