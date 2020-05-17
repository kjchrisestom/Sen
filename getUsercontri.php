<?php

include'connection.php';
/* $GOO=mysql_connect("localhost","root","");
//echo $GOO;
$saa=mysql_select_db("senk",$GOO); */

if($_POST){
$member=$_POST['member'];
//$member='100004';
$sul=mysqli_query($GOO,"SELECT MemberID ,Total FROM save WHERE MemberID='$member'");
echo die(mysql_error());
$user = mysqli_fetch_array($sul);
	$Total = (int)$user['Total'];
echo json_encode($Total);	


}
?>
