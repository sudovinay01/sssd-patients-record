<!DOCTYPE html>
<html>
<head>
	<title>RECORDS</title>	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="w3.css">
	<link rel="icon" type="image/ico" href="icon.jpg"/>
</head>
<body>
	<div class="w3-card-4 w3-blue  w3-container w3-padding-large w3-margin">
	<a href="index.php"  class="w3-btn w3-red w3-margin-top w3-margin-left">&lt;Back</a>
    <a href="cancelrecords.php"class="w3-btn w3-yellow w3-right w3-margin-top w3-margin-right">Cancelled Records</a>
	<h1 class="w3-container w3-green w3-margin w3-card-4 w3-center w3-padding-large w3-wide">RECORDS</h1>
  	<form method="post" action="" class="w3-card-4 w3-white  w3-container w3-padding-large w3-margin w3-center">
		<lable class=" w3-left-align">Select a date : </lable>
			<input type="date" name="date"required class="w3-input w3-border w3-border-green w3-hover-light-blue " />
    	<input type="submit" name="submit" value="submit" class="w3-btn w3-blue w3-margin-top">
   	</form>
	<table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
  	<?php
    	if (isset($_POST['submit']))
    	{	
    		$dates=$_POST['date'];
    		$datesx=strtotime($dates);
    		$year=date("Y",$datesx);
    		$linkd=mysqli_connect('localhost','root','');
    		$quee="SELECT schema_name from information_schema.schemata where schema_name=".$year;
    		$dataa=mysqli_query($linkd,$quee);
    		$datest=date("d-m-Y",strtotime($dates));
        	echo '<h1 class="w3-card-4 w3-white w3-center w3-wide w3-container w3-padding-large w3-margin">'.$datest.'</h1>';
    		if (mysqli_num_rows($dataa)==0)
      		{
      			#echo "$quee";
      			echo '<h1 class=" w3-wide w3-card-4 w3-margin w3-yellow w3-padding-large">There is no data of patients on this day!!!!!</h1>';
      		}
      		else
      		{	
      			if($dates > date("Y-m-d"))
      			{	
      			        		echo '<h1 class="w3-jumbo w3-wide w3-card-4 w3-margin w3-yellow w3-padding-large">This is not a time machine!!!!!</h1>';
      			}
      			else
      			{
        			$month=date("m",$datesx);
        			#echo "<br/>$dates<br/>$year<br/>";
        			$do=0;
        			$connect = mysqli_connect("localhost", "root", "", "$year");
        			if (!$connect)
        			{
         				echo " not connected to data base";
        			}
        			else
        			{
         				#   echo " connected to data base";
     		        	$sql = "SELECT * FROM `".$month."` where date(datetime)='$dates'";
        				$result1 = mysqli_query($connect, $sql);
        				if (!$result1 OR mysqli_num_rows($result1)==0)
       					{
          					 echo '<h1 class=" w3-wide w3-card-4 w3-margin w3-yellow w3-padding-large">There is no data of patients on this day!!!!!</h1>';
       					}
        				else
        				{
     						while($row = mysqli_fetch_array($result1))
     						{
     							if ($row>0&&$do==0)
     							{
      								echo ' <tr class="w3-green">
           					               		<th>S.No.</th>
              							   		<th>Time</th>
               									<th>Patient Name</th>
              									<th>Age</th>
               									<th>Gender</th>
               									<th>Doctor Name</th>
               									<th>Total Amount</th>
               									<th>Amount Paid</th>
               									<th>Amount Due</th>
               									<th>Tests</th>
            							   </tr>';
            						$do=1;
     							}
      							$id=$row["datetime"];
     							$pay=(int)$row["amo"]-(int)$row["amop"];
     							echo ' <td>'.$row["id"].'</td>
        							   <td>'.date("h:i A",strtotime($row["datetime"])).'</td>
        							   <td>'.$row["pname"].'</td>
       								   <td>' .$row["age"].'</td>
        							   <td>' .$row["gender"].'</td>
        							   <td>'.$row["dname"].'</td>
        							   <td>' .$row["amo"].'</td>
        							   <td>' .$row["amop"].'</td>
        							   <td>' .$pay.'</td>
        							   <td><ol>';
         						$tes=$row['tests'];
								$ne=unserialize($tes);
								$tno=count($ne);
								for($i=0;$i<$tno;$i++)
 								{
 												$connectx=mysqli_connect("localhost", "root", "", "extra");
 												$sq = "SELECT tnames FROM test where tid='$ne[$i]'";
  												$ter = mysqli_query($connectx, $sq);
 												$r = mysqli_fetch_array($ter);
												echo '<li>' .$r["tnames"].'</li>';
 								}
 								echo '</ol> </td>';
       							echo'</tr>';
							}
							$sum = "SELECT sum(`amo`),sum(`amop`) FROM `".$month."` where date(datetime)='$dates'";
  							$sumr=mysqli_query($connect, $sum);
    						$sumto = mysqli_fetch_array($sumr);
    						$rem=(int)$sumto["sum(`amo`)"]-(int)$sumto["sum(`amop`)"];
    						echo "<tr class='w3-light-green'><td colspan='6'></td><td >Total Amount : ".$sumto["sum(`amo`)"]."</td><td>Amount Paid : ".$sumto["sum(`amop`)"]."</td><td>Amount Due :".$rem."</td><td></td></tr>";
 						}
 					}
  				}  
			}
		}
	?>
        </table>
</div>
</body>
</html>