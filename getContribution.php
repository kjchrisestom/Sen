<?php

include'connection.php';

if($_POST){
$member=$_POST['contribute'];
//$member='100026';


$sul=mysqli_query($GOO,"SELECT `MemberID`,sum(Total)  FROM loan WHERE `MemberID`='$member'");
$user = mysqli_fetch_array($sul);
	$Total = $user['sum(Total)'];
echo json_encode($Total);	


}
?>