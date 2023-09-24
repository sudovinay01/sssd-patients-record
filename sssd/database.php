<?php
//Establishing link 
$link=mysqli_connect('localhost','root','');
if (!$link) 
{
	die('could not connect :'.mysqli_error());
}
else
{
 	#echo "<br/>link established<br/>";
}
//connecting to patient database
$year=date('Y');
$db_patient=mysqli_select_db($link,$year);
if (!$db_patient) 
{
	//echo "<br/>$year database was not found<br/>";
	$sql="CREATE DATABASE `".$year."`";
	if (mysqli_query($link,$sql))
	{
		//echo "<br/>Database $year is created<br/>";
		if(mysqli_select_db($link,$year))
		{	
			$db_patient=mysqli_connect("localhost", "root", "", "$year");
			#if($db_patient)
				#echo "<br/>$year Database is connected after creating<br/>";
        }

		#else
			#echo "<br/>Database is unable to connect after creating<br/>";
	}
	#else
	//{
		#echo "<br/>Could not create database $year ".mysqli_error()."<br/>";
	//}
}
else
{
	$db_patient=mysqli_connect("localhost", "root", "", "$year");
	#if($db_patient)
		#echo "<br/>$year database connected<br/>";
}
//connecting to extra database
$db_extra=mysqli_select_db($link,'extra');
if ($db_extra)
{
	$db_extra=mysqli_connect("localhost", "root", "", "extra");
	//if($db_extra)
		#echo "<br/>Extra database connected<br/>";
}
else
{
	#echo "<br/>Extra database not connected<br/>";
}
?>