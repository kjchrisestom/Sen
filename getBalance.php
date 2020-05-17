<?php
include'connection.php';

if($_POST){
$member=$_POST['id'];
//$member='100002';


$soul=mysqli_query($GOO,"SELECT `MemberID`, sum(Total) FROM save WHERE `MemberID`='$member'");
$user = mysqli_fetch_array($soul);
	$balance = $user['sum(Total)'];
echo json_encode($balance);	


}
?>