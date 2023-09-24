<!DOCTYPE html>
<html>
<head>
	<title>Test Cancelled</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="w3.css">
	<link rel="icon" type="image/ico" href="icon.jpg"/>
</head>
<body class="w3-container">
	<h1 class="w3-wide w3-center w3-yellow w3-card-4">CANCELLED TESTS</h1>
<?php
	$connect=mysqli_connect("localhost", "root", "", "extra");
    $sql = "SELECT * FROM cancel ";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)==0) 
    {
    	 			echo '<h1 class=" w3-wide w3-card-4 w3-blue w3-padding-large">There is no data of cancelled patients !!!!!</h1>';
    }
    else{
    echo '<table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">
          <tr class="w3-green">
               <th>Date of Cancellation</th>
               <th>Time of Cancellation</th>
               <th>Id</th>
               <th>Patient Name</th>
               <th>Age</th>
               <th>Gender</th>
               <th>Doctor Name</th>
               <th>Total Amount</th>
               <th>Amount Paid</th>
               <th>Amount Due</th>
               <th>Tests</th>
               <th>Date of Entry</th>
               <th>Time of Entry</th>
            </tr>';
    while($row = mysqli_fetch_array($result))
    {	
        $pay=(int)$row["amo"]-(int)$row["amop"];
    	$cdate=date("d-m-Y",strtotime($row["timecancel"]));
    	$ctime=date("h:i A",strtotime($row["timecancel"]));
    	$edate=date("d-m-Y",strtotime($row["datetime"]));
    	$etime=date("h:i A",strtotime($row["datetime"]));
    	echo '<tr>
    	<td>'.$cdate.'</td>
    	<td>'.$ctime.'</td>
    	<td>'.$row["id"].'</td>
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
         echo '</ol> </td>
        <td>'.$edate.'</td>
    	<td>'.$etime.'</td>
    	</tr>';
      }
      echo "</table>";
  }

?>
<a class="w3-btn w3-red w3-margin-top"  href="index.php">&lt; BACK</a>

</body>
</html>