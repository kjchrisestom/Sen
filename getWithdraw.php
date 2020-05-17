<?php

include'connection.php';

if($_POST){
$member=$_POST['withdraw'];
//$member='100004';


$sul=mysqli_query($GOO,"SELECT `MemberID`,Total FROM save WHERE `MemberID`='$member'");
$user = mysqli_fetch_array($sul);
	$Total = $user['Total'];
echo json_encode($Total);	


}
?>