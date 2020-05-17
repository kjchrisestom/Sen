<?php

include'connection.php';
/* $GOO=mysqli_connect("localhost","root","");
//echo $GOO;
$saa=mysqli_select_db($GOO,"senk"); */
if($_POST){
$member=$_POST['member'];
/* $member='100033'; */


$sul=mysqli_query($GOO,"SELECT `MemberID`,Total FROM save WHERE `MemberID`='$member'");
$user = mysqli_fetch_array($sul);
	$total = $user['Total'];
	echo json_encode($total);	


}
?>