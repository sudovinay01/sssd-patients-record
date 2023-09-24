<?php
  require("database.php");#$db_patient;$db_extra
  $pname=$gender=$dname="";
  $age=$amo=$amop=0;
  $month=date("m");
  //echo "$month";
  $sql="SELECT * FROM $month";
  //echo "$sql";
  $result=mysqli_query($db_patient,$sql);
  if(!$result)
  {
    $sql="CREATE TABLE `$month` (
    `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `id` int(100) NOT NULL,
    `pname` varchar(50) NOT NULL,
    `age` int(11) NOT NULL,
    `gender` varchar(10) NOT NULL,
    `dname` varchar(50) NOT NULL,
    `amo` int(100) NOT NULL,
    `amop` int(100) NOT NULL,
    `tests` varchar(111) NOT NULL,
    PRIMARY KEY (`datetime`))";
    //echo "$sql<br/>";
    if (mysqli_query($db_patient,$sql))
    {
     // echo "<br/>$month table is created <br/>";        
    }
    else
    {
     // echo "<br/>Error creating table :".mysqli_error($db_patient);
    }
  }
  else
  {
    //echo "<br/>Table Exist<br/>";
  }
  if (isset($_POST['psubmit']))
  {
    $pname=$_POST['pname'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $dname=$_POST['dname']; 
    $amo=$_POST['amo'];
    $amop=$_POST['amop'];
    $tes=serialize($_POST['tarr']);
    $co = "SELECT * FROM count";
    $cor = mysqli_query($db_extra, $co);
    $corow = mysqli_fetch_array($cor);
    //echo "<br/>$pname $dname $age $amop $amo $gender".$corow['count'];
    $counts=$corow["count"];
    $ref=$corow["ref"];
    $dates=date('Y-m-d');
    if($dates!=$ref)
    {
      $paid="SELECT count(id) FROM `$month` WHERE date(datetime)='".$dates."'";
      $resultp = mysqli_query($db_patient, $paid);
      if (!$resultp)
      {
      $counts=1;
      }
      else
      {
        $rowp = mysqli_fetch_array($resultp);
        $counts=$rowp["count(id)"]+1;
      }
      $upc="UPDATE `count` SET `count`=$counts,`ref`='$dates'";
     // echo "<br/>$counts,$dates   not equal ";
    }
    else
    {
      $counts++;
      $upc="UPDATE `count` SET `count`=$counts,`ref`='$ref'";
     // echo "<br/>$counts,$ref equal ";
    }
    mysqli_query($db_extra,$upc);
    $sql="INSERT INTO `$month`(`id`, `pname`, `age`, `gender`, `dname`, `amo`, `amop`, `tests`)VALUES ($counts,'$pname',$age,'$gender','$dname',$amo,$amop,'$tes')";
    if(mysqli_query($db_patient,$sql))
    {
     // echo "<br/>sucess";
      header('location: index.php');
    } 
    else
    {
     // echo " <br/>not inserted , $sql";
    }
    
  }
?>