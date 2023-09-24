<?php
 $pass= $_POST["password"];
 $db=mysqli_connect("localhost", "root", "", "extra");
 $cpass="SELECT pass FROM pass";
   $check=mysqli_query($db, $cpass);
 $a = mysqli_fetch_array($check);
 if ($pass==$a["pass"]) {
   header("Location: records.php");
 }
 else
 {
 	echo "<h1>Error 404<br/>Wrong password</h1>
 	<br/><a href='index.php'><button>BACK</button></a>";
 }
 ?>