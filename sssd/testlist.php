<?php
  require("database.php");
  $testsql="SELECT * FROM test";
  $testresult=mysqli_query($db_extra,$testsql);
  if ($testresult){
    //echo "sucess";
  }
  else{
   // echo "fail";
  }
  $count=0;
  while($trow = mysqli_fetch_array($testresult))
  { 
    if ($count==4)
    {
      echo "<tr>";
    }
    switch ($trow['tid']) {
    	case 1:
    			echo "<td colspan='4' class='w3-green'><u>HEMATOLOGY</u></td></tr><tr>";	
    			$count=0;
    		break;
    	case 10:
    			echo "<tr><td colspan='4' class='w3-green'><u>CLINICAL PATHOLOGY</u></td></tr><tr>";	
    			$count=0;
    			break;
    	
        case 16:
        		echo "<tr><td colspan='4'class='w3-green'><u>CULTURE/SENETIVITY</u></td></tr><tr>
        			  <td colspan='4'class='w3-green'><u>HISTOPATHOLOGY & CYTOLOGY</u></td></tr><tr>
        			  <td colspan='4'class='w3-green'><u>HORMONES</u></td></tr><tr>
        			  <td colspan='4'class='w3-green'><u>BIO CHEMISTRY</u></td></tr><tr>
        			  ";
    	        $count=0;
    	        break;
    	case 29:
    			 echo "<tr><td colspan='4'class='w3-green'><u>MICRO BIOLOGY & SEROLOGY</u></td></tr><tr>";
    	        $count=0;
    		    break;

    }
    echo "<td width='25%'> <input type='checkbox' name='tarr[]' class='w3-check' value='".$trow['tid']."'/> ".$trow['tid'].")".$trow['tnames']."</td>";
    $count++;
    if ($trow['tid']==9  OR $trow['tid']==28) {
    	echo "<td colspan='3'></td>";
    }
    if ($trow['tid']==15) {
    	echo "<td colspan='2'></td>";
    }
   	
    if($count==4)
    {
      echo "</tr>";
      $count=0;
    }

  }                             
?>