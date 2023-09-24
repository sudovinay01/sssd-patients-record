    
<?php
  date_default_timezone_set('Asia/kolkata');
  require("database.php");
  $do=0;
  $month=date('m');
  $dates=date('Y-m-d');  
  //echo "$month";
  //SELECT * FROM `06` WHERE date(datetime)='2019-06-25'
  $sql = "SELECT * FROM `".$month."` WHERE date(datetime)='".$dates."'";
  $result = mysqli_query($db_patient, $sql);
  if (!$result)
  {
   # echo "<br/>fail $sql";
  }
  else
  {
    #echo "<br/> pass $sql";
  
  echo '<div class="w3-responsive w3-card-4 w3-round-xlarge w3-border">
      <table class="w3-table-all w3-border w3-border-green w3-topbar w3-bottombar w3-text-black w3-card-4 w3-hoverable">';
  while($row = mysqli_fetch_array($result))
  {
    if ($do==0)
    {
       echo'
       <tr class="w3-green">
               <th></th>
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
    echo '
        <tr>
          <td><a href="cancel.php?id='.$id.'" class="w3-tooltip">&times;<span class="w3-text w3-tag" style="position:absolute;left:0;bottom:18px;">Cancel testing</span></a></td>
          <td>'.$row["id"].'</td>
          <td>'.date("h:i A",strtotime($row["datetime"])).'</td>
          <td>'.$row["pname"].'</td>
          <td>' .$row["age"].'</td>
          <td>' .$row["gender"].'</td>
          <td>'.$row["dname"].'</td>
          <td>' .$row["amo"].'</td>
          <td>' .$row["amop"].'</td>
          <td style="padding:;">' .$pay.'</td>
          <td>
            <ol>';
              $tes=$row['tests'];
              $ne=unserialize($tes);
              $tno=count($ne);
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
  }
  }
  echo "
      </table>
    </div>";
?>