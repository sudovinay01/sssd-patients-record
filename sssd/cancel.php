<!DOCTYPE html>
<html>
<head>
	<title>Test cancellation</title>
	<link rel="icon" type="image/ico" href="icon.jpg"/>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="w3.css">
     <script type="text/javascript">
	   	function checkp()
	   	{var c=document.getElementById("pass").value;
	   		if (c=="7010") {
	   			document.getElementById("pans").style.display="block";
	   		    document.getElementById("mo").style.display="none";
	   		}
	   		else
	   		{
	   			document.getElementById("err").style.display="block";

	   			document.getElementById("err").innerText="wrong password";
	   		    document.getElementById("pans").style.display="none";
	   		}
	   	}
	   </script>
</head>
<body class="w3-light-grey">
	<div  class="w3-card-4  w3-white w3-container w3-padding-large w3-margin">
		<a href="index.php"class="w3-btn w3-blue w3-margin ">&lt; Back</a>
		<header class="w3-teal w3-text w3-center w3-padding-large w3-wide w3-margin"><h3>Test Cancellation</h3></header>
	  
	  <div id="mo"  class="w3-card-4 w3-green w3-padding-large  w3-margin" width="40%">
	  	<h3>Enter password to cancel test </h3>
	   <input type="password" name="pass" id="pass" class="w3-input w3-border w3-border-green w3-hover-light-blue w3-round" required placeholder="Enter Password" />
	   <button type="button" onclick="checkp();"class="w3-btn w3-blue w3-margin" >Check</button>
	   <div id="err" class="w3-pale-red w3-text-red w3-padding"style="display: none;" ></div></div>
	  
         <form id="pans" method="post" action="" style="display: none;">
		<input type="submit" name="confirm" value="confirm" class="w3-btn w3-red w3-margin" onclick='document.getElementById("mo").style.display="none";'/>
    	</form>

		<?php
		require("database.php");
		$id = $_REQUEST['id'];
  		$month=date('m');
  		$sql = "SELECT * FROM `".$month."` where datetime='$id'";
  		//echo "$sql";
		$result1 = mysqli_query($db_patient, $sql);
		$row = mysqli_fetch_array($result1);
		$td=$row["datetime"];
		$pid=$row["id"];
		$pn=$row["pname"];
		$dn=$row["dname"];
		$gender=$row["gender"];
		$age=$row["age"];
		$amo=$row["amo"];
		$amop=$row["amop"];
		$tes=$row['tests'];
		$pay=(int)$row["amo"]-(int)$row["amop"];
		if (isset($_POST['confirm']))
 		{
 		 $today=date('Y-m-d');
 		//echo "$today";
 		$pp="UPDATE `".$month."` SET `id`=id-1 where id>$pid and date(datetime)='$today'";
		
		$q="INSERT INTO cancel(`datetime`,`id`, `pname`,  `age`,`gender`, `dname`,amo,amop,`tests`) VALUES ('$td','$pid','$pn','$age','$gender','$dn','$amo','$amop','$tes')";
  
 				$r="DELETE FROM `".$month."` WHERE datetime='$id'"; 
		 		if(mysqli_query($db_extra,$q))
				{ 
					#echo"<br/>data was shifted";
					if (mysqli_query($db_patient,$r))
					{
					# echo"<br/>data removed";
				 	 if (mysqli_query($db_patient,$pp)) {
				 	 	
				 	# echo"<br/>count set ";
				      $upc="UPDATE `count` SET `count`=count-1";
				       if(mysqli_query($db_extra,$upc))
				       {
					     $mes="<br/>Test Cancled";
					       header("Location: index.php");
                       }
                       else
                       {
                      		$mes="<br/>counter was not reset.contact developer...";
                       }

					
					  }
					  else
					  {
					  	#echo "<br/>$pp<br/>";
					  	$mes="<br/>count was not set.contact developer...";
					  }
				  }
				  else
				  {
				  #	echo "<br/>$r<br/>";
				  	$mes="<br/>data was not removed.contact developer...";
				  }
				}
				else{
					#echo "<br/>$q<br/>";
					$mes="<br/>data was not shifted";
				}

				echo "<p class='w3-panel w3-text-red w3-pale-red w3-leftbar w3-border-red w3-text-large w3-padding-large w3-margin'>$mes</p>";
			}
			echo "<div class='w3-panel w3-pale-red w3-leftbar w3-border-red w3-text-large w3-padding-large w3-margin'>
		<table class='w3-table w3-striped w3-border w3-bordered w3-text-black w3-hoverable w3-margin-bottom w3-margin-top' width='100%'>
					<tr><td colspan='2' class='w3-blue'>Patient Details</td></tr>
		            <tr>
						<td>Id</td>
						<td>  $pid</td>
					</tr>
					<tr>
						<td width='20%'>Patient Name </td>
						<td width='70%''>$pn</td>
					</tr>
					<tr>
						<td>Age</td>
						<td>$age</td>
					</tr>
				    <tr>
						<td>Gender </td>
						<td>$gender</td>
					</tr>
					<tr>
						<td>Date and Time of entry </td>
						<td>$td</td>
					</tr>
					<tr>
						<td>Doctor Name </td>
						<td>$dn</td>
					</tr>
					<tr>
						<td>Total Amount </td>
						<td>$amo</td>
					</tr>
					<tr>
						<td>Amount Paid </td>
						<td>$amop</td>
					</tr>
					<tr>
						<td>Amount Due </td>
						<td>$pay</td>
					</tr>
					<tr>  <td colspan='2'>
            <ol>";
              
              $ne=unserialize($tes);
              $tno=count($ne);
              echo "<u>Test List : </u><br/>";
              for($i=0;$i<$tno;$i++)
              {
                $sq = "SELECT tnames FROM test where tid='$ne[$i]'";
                $ter = mysqli_query($db_extra, $sq);
                $r = mysqli_fetch_array($ter);
                echo '<li>' .$r["tnames"].'</li>';
              }
              echo '
            </ol>
          </td>';
 echo'</tr>';

		
				echo'</table>
		     </div>';
		?>
	

	</div>
</body>
</html>
