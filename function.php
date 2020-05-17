<?php
function bysearch()
{ob_start();
	?>
	<form action="" method="post" class="form-horizontal"  role="form" >
		<div class="form-group" >
<div class="col-sm-4"><input type="text" name="memberid"  placeholder="enter memberID" class="form-control" id="search" />
</div> 
<label class="control-label col-sm-3" for="search">Search By MemberID</label>
</form><br/>
 


	 <?php 
echo ob_get_clean();
//echo"< br/>";

include'connection.php';
$john=$_POST['memberid'];
$qe=mysqli_query($GOO,"select MemberID, Amount from   save  where MemberID='$john'");

$total=0;
for($i=0;$i< mysqli_num_rows($qe);$i++)
{$r=mysqli_fetch_array ($qe); 
$total=$total+$r['Amount'];}
$wer=mysqli_query("select Total from   save  where MemberID='$john'");
$r=mysqli_fetch_array ($wer);
$tat=$r['Total'];
	$we=$john;
	$bal= $total;

echo'<br>Total Savings:  '.$bal.''.'&nbsp;&nbsp; On Account :' .$tat.'<br>';
echo'MemberID:   '.$we.'&nbsp;&nbsp;<br>';

$cus=mysqli_query($GOO,"select * from `save-history` where MemberID='$john'");
echo"<table class=\"table table-hover table-bordered table stripped\" > <tr><th>Number</th><th>Date</th><th>Amount</th><th>saved-by</th>  <th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($cus))
{

echo "<tr>";
echo "<td>".$row['HistoryID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Amount']."</td>";
echo "<td>".$row['saved-by']."</td>";
echo "<td>".$row['Recieved-By']."</td>";
echo"<tr>";
	
}

echo"</tr>";
echo"</table>";
	}

function byloan()
{
ob_start();
	?>
	<form action="" method="post" class="form-horizontal"  role="form" >
		<div class="form-group" >
<div class="col-sm-4"><input type="text" name="memberid"  placeholder="enter memberID" class="form-control" id="search" />
</div> 
<label class="control-label col-sm-3" for="search">Search By MemberID</label>
</form><br/>
 


	 <?php 
echo ob_get_clean();
//echo"< br/>";

include'connection.php';
$john=$_POST['memberid'];
$ccus=mysqli_query($GOO,"select * from get where MemberID='$john'");
if(!$ccus)echo die(mysql_error());
echo'MemberID:   '.$john;
echo"<table class=\"table table-bordered table-hover table stripped\">
<tr class='info'>
<th>loanID</th><th>Type of loan</th><th>Mode of payment</th><th>Month</th><th>Amount</th>
<th>Interest Rate</th><th>Total Amount</th><th>Releas Date</th><th>Start Date</th><th>Maturity Date</th><th>Status</th></tr>";



while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['loanID']."</td>";
echo "<td>".$row['tol']."</td>";
echo "<td>".$row['mop']."</td>";
echo "<td>".$row['moth']."</td>";
echo "<td>".$row['ea']."</td>";
echo "<td>".$row['ir']."</td>";
echo "<td>".$row['ta']."</td>";
echo "<td>".$row['rd']."</td>";
echo "<td>".$row['sd']."</td>";
echo "<td>".$row['md']."</td>";
echo "<td>".$row['Status']."</td>";
echo"</tr>";
}echo"</tr></table>";

}

function ViewWithdraw()
{
include'connection.php';
$john=$_SESSION["sess-memberid"];
//$GOO=mysql_connect("localhost","root","john");
//$saa=mysql_select_db("senk",$GOO);
$que=mysqli_query($GOO,"select MemberID, withdrew from withdraw where MemberID='$john'");
if(!$que)echo die(mysql_error());
$total=0;
for($i=0;$i< mysqli_num_rows($que);$i++)
{$r=mysqli_fetch_array ($que); 
$total=$total+$r['withdrew'];}
$wer=mysqli_query($GOO,"select Total from   save  where MemberID='$john'");
$r=mysqli_fetch_array ($wer);
$tat=$r['Total'];

echo'MemberID:  '.$john.'<br>';
echo'Total withdraw:  '.$total.'&nbsp;&nbsp;'.' Balance on Account: '.$tat;
$contri=mysqli_query($GOO,"select * from withdraw where MemberID='$john'");
echo"<table class=\"table table-hover table-bordered table stripped\" style='padding-left:20%'  >
 <tr class='info'><th>Withdraw Number</th><th>Date</th><th>withdraw</th></tr>";
while($row=mysqli_fetch_array($contri))
{
echo "<tr>";
echo "<td>".$row['WithdrawID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['withdrew']."</td>";
echo"</tr>";

}

echo"</tr></table>";

}

function ViewLonaprepay()
{include'connection.php';	//echo'<hr> <br> Instalment Made';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysqli_connect("localhost","root","");
$saa=mysql_select_db($GOO,"senk"); */
$ccus=mysqli_query($GOO,"select * from `instale-history` where MemberID='$john'");
$q=mysqli_query($GOO,"select MemberID, Total from `save` where MemberID='$john'");
$total=0;
for($i=0;$i< mysqli_num_rows($q);$i++)
{$r=mysqli_fetch_array ($q); 
$total=$total+$r['Total'];}

echo'MemberID:   '.$john.'<br>';
echo'Current Balance:  '.$total.'<br>'.'<br>';
echo"<table class=\"table table-hover table-bordered table stripped\" > 
<tr class='info'><th>Payment Number</th><th>Date of Payment</th><th>Amount Paid</th><th>Paid by</th><th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['PayID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Installement']."</td>";
echo "<td>".$row['Paid_By']."</td>";
echo "<td>".$row['Aproved_by']."</td>";
echo"<tr>";
	
}
echo"</tr>";
echo"</table>";
	}

function ViewContribution()
{include'connection.php';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysqli_connect("localhost","root","") or die();
$saa=mysqli_select_db($GOO,"senk") or die(); */
$contri=mysqli_query($GOO,"select * from `controbution`  where MemberID='$john'");
$que=mysqli_query($GOO,"select * from `controbution`  where MemberID='$john'");
if(!$que){echo'iii'.die(mysql_error());}
$total=0;
for($i=0;$i< mysqli_num_rows($que);$i++)
{$r=mysqli_fetch_array ($que); 
$total=$total+$r['Amount'];}

echo'MemberID:'.$john.'<br>';
echo'Total Contribution:  '.$total.'<br>'.'<br>';
echo"<table class=\"table table-hover table-bordered table stripped\"  ><tr><th>MemberID</th><th>Amount</th>";
while($row=mysqli_fetch_array($contri))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['Amount']."</td>";

echo"</tr>";

}
echo"</tr></table>&nbsp;";

}
function ViewLoanAproved()
{include'connection.php';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysqli_connect("localhost","root","");
$saa=mysqli_select_db($GOO,"senk"); */
$ccus=mysqli_query($GOO,"select * from get where MemberID='$john'");
if(!$ccus)echo die(mysql_error());
echo'MemberID:   '.$john;
echo"<table class=\"table table-bordered table-hover table stripped col-lg-3\" ><tr class='info'> 
<th>loanID</th><th>Type of loan</th><th>Mode of payment</th><th>Month</th><th>Amount</th>
<th>Interest Rate</th><th>Total Amount</th><th>Releas Date</th><th>Start Date</th><th>Maturity Date</th><th>Status</th></tr>";



while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['loanID']."</td>";
echo "<td>".$row['tol']."</td>";
echo "<td>".$row['mop']."</td>";
echo "<td>".$row['moth']."</td>";
echo "<td>".$row['ea']."</td>";
echo "<td>".$row['ir']."</td>";
echo "<td>".$row['ta']."</td>";
echo "<td>".$row['rd']."</td>";
echo "<td>".$row['sd']."</td>";
echo "<td>".$row['md']."</td>";
echo "<td>".$row['Status']."</td>";
echo"</tr>";
}echo"</tr></table>";

}
function ViewSavings()
{
$john=$_SESSION["sess-memberid"];
//$GOO=mysql_connect("localhost","root","	");
//$saa=mysql_select_db("senk",$GOO);
include'connection.php';
$qe=mysqli_query($GOO,"select MemberID, Total from   save  where MemberID='$john'");
$total=0;
for($i=0;$i< mysqli_num_rows($qe);$i++)
{$r=mysqli_fetch_array ($qe); 
$total=$total+$r['Total'];}
$wer=mysqli_query($GOO,"select Total from   save  where MemberID='$john'");
$r=mysqli_fetch_array ($wer);
$tat=$r['Total'];
	$we=$john;
	$bal= $total;


echo'MemberID:   '.$we.'&nbsp;&nbsp;<br>';
echo'Total Savings:  '.$bal.''.'&nbsp;&nbsp; On Account :' .$tat;
$cus=mysqli_query($GOO,"select * from `save-history` where MemberID='$john'");
echo"<table class=\"table table-hover table-bordered table stripped\" >
 <tr class='info'><th>Number</th><th>Date</th><th>Amount</th><th>saved-by</th>  <th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($cus))
{

echo "<tr>";
echo "<td>".$row['HistoryID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Amount']."</td>";
echo "<td>".$row['saved-by']."</td>";
echo "<td>".$row['Recieved-By']."</td>";
echo"<tr>";
	
}

echo"</tr>";
echo"</table>";

}
function ViewPersonal()
{
echo'My Personal Data';	
$john=$_SESSION["sess-memberid"];
include'connection.php';
$ccus=mysqli_query($GOO,"select * from  staff where staffID = '$john'");
if(!$ccus){echo'i donot '.die(mysql_error());}
echo"<table class=\"table table-hover table-bordered table stripped\" style='width:101%;' >
<tr class='info'><th>StaffID</th><th>FName</th><th>LName</th><th>Date of Birth</th><th>Address</th><th>Designation</th></tr>";


while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['StaffID']."</td>";
echo "<td>".$row['FName']."</td>";
echo "<td>".$row['LName']."</td>";
echo "<td>".$row['DOB']."</td>";
echo "<td>".$row['Address']."</td>";

echo "<td>".$row['Designation']."</td>";

echo"</tr>";

}
echo"</tr></table> &nbsp;&nbsp;";



}

function ViewMember()
{
echo'My Personal Data';	
$john=$_SESSION["sess-memberid"];
include'connection.php';
//$GOO=mysql_connect("localhost","root","john");
//$saa=mysql_select_db("senk",$GOO);
$ccus=mysqli_query($GOO,"select * from members where MemberID = '$john'");
if(!$ccus){echo'i donot '.die(mysql_error());}
echo"<table class=\"table table-hover table-bordered table stripped col-sm-4\">
<tr class='info'> <th>MemberID</th><th>FName</th><th>LName</th><th>Date of Birth</th><th>Address</th></tr>";


while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['FName']."</td>";
echo "<td>".$row['LName']."</td>";
echo "<td>".$row['DOB']."</td>";
echo "<td>".$row['Address']."</td>";
echo"</tr>";
}
echo"</tr></table> &nbsp;&nbsp;";
}



function biulds(){
	ob_start();
	?>

    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly="readonly" value="New buliding" name="controbution" class="form-control" id="controbution" />
</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getUsercontri.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4">
<input type="number" required="required" name="member" class="form-control" id="contmember" /> </div>
<span id="sms" class="form-control"></span> </div>

 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label>
<div class="col-sm-4">
<input type="text" required="required" name="contAmount" class="form-control" id="contAmount" onblur="errorsms()" onkeyup="subtractContribution()" />
</div><span id="sms"></span>
</div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<!----textarea name="desc" readonly="readonly" class="form-control" style="height:50px; width:250px;" id="desc"></textarea------->
<div class="col-sm-4">
<input type="text" readonly="readonly" size="50%" value="Construction of new building" name="desc" class="form-control" id="desc" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
     <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div></div>
	</form>
     <?php 
echo ob_get_clean();
	
}


function Lands(){
	ob_start();
	?>
    
    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly name="controbution"name="Land"  value="Land"class="form-control" id="controbution" />
</div>
</div><script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member" class="form-control" id="contmember" onblur="getvalues()" /> </div><span id="sms"></span> </div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label>
<div class="col-sm-4"><input type="text" required="required" onblur="errorsms()" onkeyup="subtractContribution()" name="contAmount" class="form-control" id="contAmount" /></div><span id="sms"></span></div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<div class="col-sm-4">
<input name="desc" type="text" class="form-control" size="50%" id="desc" value="Land for other purposes like agriculture" style="height:50px; width:250px;" value="" readonly="readonly">
<!----div class="col-sm-4"><input type="text" required="required" name="desc" class="form-control" id="desc" /----->
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
       <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function Schools(){
	ob_start();
	?>
    <script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
 
    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4">
<input type="text" readonly="readonly" name="controbution" value="Construction of School" class="form-control" id="controbution" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member" class="form-control" id="contmember" onblur="getvalues()" /> </div> 
<span id="sms"></span></div>

 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label><div class="col-sm-4">
<input type="number" required="required" name="contAmount" class="form-control" id="contAmount" onblur="errorsms()"  onkeyup="subtractContribution()" /></div><span id="sms"></span> </div>

 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<div class="col-sm-4">
<input name="desc" type="text" class="form-control"size="60%" id="desc" readonly value="Ophanage school" readonly="readonly">
<!----div class="col-sm-4"><input type="text" required="required" name="desc" class="form-control" id="desc" /----->
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
       <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function Accounts(){
	ob_start();
	?>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly="readonly" value="Corperative Account" name="controbution" class="form-control" id="controbution" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member" class="form-control" id="contmember" onblur="getvalues()" /> </div><span id="sms"></span> </div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="totalsaves" class="form-control"  /></div></div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label>
<div class="col-sm-4">
<input ttype="number" required="required" name="contAmount" class="form-control" onblur="errorsms()" id="contAmount" onkeyup="subtractContribution()" /> </div><span id="sms"></span> </div>
<div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>
<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<!--textarea name="desc" readonly="readonly" class="form-control" style="height:50px; width:250px;" id="desc"></textarea--->
<div class="col-sm-4"><input type="text" readonly="readonly"size="50%" value="Account for the SENK SACCO" name="desc" class="form-control" id="desc" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
       <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function Handovers(){
	ob_start();
	?>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
    <form action="" method="post" class="form-horizontal"  role="form" \>
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly="readonly" value="HAndover Ceremony" name="controbution" class="form-control" id="controbution" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label>
<div class="col-sm-4">
<input type="number" required="required" name="member" class="form-control" id="contmember"  onblur="getvalues()" /> </div> <span id="sms"></span></div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label><div class="col-sm-4">
<input type="number" required="required" name="contAmount" onblur="errorsms()"  class="form-control" id="contAmount" onkeyup="subtractContribution()" />
</div><span id="sms"></span>
</div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<!--textarea name="desc" readonly="readonly" class="form-control" style="height:50px; width:250px;" id="desc"></textarea-->
<div class="col-sm-4">
<input type="text" readonly="readonly"size="50%" value="Money for the handover party" name="desc" class="form-control" id="desc" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
      <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full">  <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function teller()
{
echo'You are welcome Teller StaffID: '.'&nbsp;'.$_SESSION["sess-memberid"];
 ob_start()  ?>
<img src="loans.jpg" height="380" width="800" />
<?php echo  ob_get_clean();
}

function admin()
{
echo'You are welcome Admin  StaffID '.$_SESSION["sess-memberid"];
 ob_start()  ?>
<img src="go.jpg" height="380" width="800" />

<?php echo  ob_get_clean();
}


function image()
{
echo'You are welcome Mr Chairman SENK Sacco StaffID '.$_SESSION["sess-memberid"].'<br>';
 ob_start()  ?>
<img src="graph.jpg" height="380" width="800" />

<?php echo  ob_get_clean();
}
function withdraw()
{
	ob_start()
	?>
<?php $john=$_SESSION["sess-memberid"]; ?>

    <div class=" col-sm-12 container">
<!----div class="col-sm-3" style="padding-left:13%">
</div--->
<div class="col-sm-11" style="padding-right:12%">
<form action="" method="post" class="form-horizontal" role="form">

  <div class="form-group" >
<label class="control-label col-sm-5" for="ID Code">Member ID </label>
<div class="col-sm-7"><input type="number" id="memberid" name="memberid"  required="required" class="form-control"/></div>
<span id="sms"</span></div>

  <!--div class="form-group" >
<label class="control-label col-sm-5" for="DOS">Date</label>
<div class="col-sm-7"><input type="text" required="required" class="form-control" name="withdrawdate" /></div></div-->
 <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Total Savings</label>
<div class="col-sm-7"><input type="text" name="totalsaves" readonly="readonly" id="totalsaves" class="form-control"  /></div></div>

  <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Withdraw Ammount  </label>
<div class="col-sm-7">
<input type="number" name="withdraw" id="withAmount1" required="required" class="form-control"  />
</div><span id="sms"></span></div>

 <script type="text/javascript">
 $(document).ready(function () {
  //called when key is pressed in textbox
  $("#memberid").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#withAmount1").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

 $(function(){
	 var withdrawing = function(){
		 
		$('#withAmount1').on('keyup',function(){
			
		var savings=$('#totalsaves').val();
		if(isNaN(parseFloat(savings))){ savings=0;  }
		
		var withdraw=$(this).val();
		 
		if($(this).val()!=''){
			
		$('#withBalance').val(parseFloat(savings) -  parseFloat(withdraw));
		}
		})
	 }
	 withdrawing();
	
		
	});</script>
 <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Balance on Account</label>
<div class="col-sm-7">
<input type="text" name="balanceafter" readonly="readonly" id="withBalance" class="form-control"  /></div></div>

 <div class="form-group" >
<label class="control-label col-sm-5" for="rby">Recieved By:</label>
<div class="col-sm-7"><input type="text" readonly="readonly" name="sels" value="<?php echo $_SESSION["sess-memberid"]; ?>" class="form-control"/></div></div>
<div style="padding-left:27%">
      <div class="col-sm-4">
 <button type="submit" class="btn btn-success" name="Withdraw"> Withdraw </button> 
 </div>
  <div class="col-sm-4">
        <button type="submit" class="btn btn-info" name="reset">Reset</button>
      </div>
   </div>

</form>


<script src="script.js"></script>


 
 </td></tr>
</table>
</form>
  </div>
    
    <?php echo ob_get_clean();
}
function make_contribution()
{  ob_start()
?>
<div class="col-sm-5">
<ul class="nav nav-tabs-justified nav-stacked">
 <li class="soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=cont">Land </a></li>
<li class=" soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=school ">Construction of school</a></li>
<li class="soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=A/C">Cooperative Account</a></li>
<li class="soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=Hand">Ceremony of Hand-over</a></li>
<li class="soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=New">Construction of New Buliding</a></li>
  </ul>
   <form action="" method="post" class="form-horizontal"  role="form" >
  <div class="container">
    <div class="col-sm-4" style="padding-left:20%">
     <a style="text-decoration:none" href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <label class="control-label col-sm-3" for="desc">Back</label>
</a>
     
      </div></div>
	</form>
<?php
echo ob_get_clean();	
}

function mahad()
{  ob_start()
?>
<div class="col-sm-3">
<ul class="nav nav-tabs-justified nav-stacked">
<li  class="soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=contribu"> View Controbution</a></li>

  </ul>
 <form action="" method="post" class="form-horizontal"  role="form" >
  <div class="container">
  <div class="col-sm-4" style="padding-left:20%">
     <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">
     Back </button></a>
     
      </div></div>
	</form>
<?php
echo ob_get_clean();	
}
function contribute(){
	ob_start()
	?>
	<div class=" container col-sm-12">
<div class="col-sm-5">
  <ul class="nav nav-tabs-justified nav-stacked" >
 <li class="soo active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=MAKe123"><span class="glyphicon glyphicon-gift"></span> Make Contributions </a></li>
<li class="soo  active"><a href="<?php $_SERVER['PHP_SELF'] ?>?action=contribu "><span class="glyphicon glyphicon-eye-open"></span> View Contribution</a></li>
  </ul><!---/li>
</ul--->
</div>


<?php
echo ob_get_clean();	
	
}


function biuld(){
	ob_start();
	?>
    <script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
	$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getUsercontri.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
	$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});

</script>
 <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly="readonly" value="New buliding" name="controbution" class="form-control" id="controbution" />
</div><span id="sms"></span>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number"  required="required" name="member" class="form-control"  id="contmember" /> </div> </div>

 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label><div class="col-sm-4">
<input type="number" required="required" name="contAmount" class="form-control" onkeyup="subtractContribution()" id="contAmount" onblur="errornotes()"/>
</div><span id="sms"></span>
</div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<div class="col-sm-4">
<input type="text" readonly="readonly" size="50%" value="Construction of new building" name="desc" class="form-control" id="desc" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
     <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div></div>
	</form>
     <?php 
echo ob_get_clean();
	
}


function Land(){
	ob_start();
	?>
   <script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly name="controbution"name="Land"  value="Land"class="form-control" id="controbution" />
</div><span id="sms"></span>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member"  class="form-control" id="contmember" /> </div> </div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label>
<div class="col-sm-4"><input type="text" required="required" name="contAmount" onkeyup="subtractContribution()" onblur="errornotes()" class="form-control" id="contAmount" /></div><span id="sms"></span></div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<div class="col-sm-4">
<input name="desc" type="text" class="form-control" size="50%" id="desc" value="Land for other purposes like agriculture" style="height:50px; width:250px;" value="" readonly="readonly">
<!----div class="col-sm-4"><input type="text" required="required" name="desc" class="form-control" id="desc" /----->
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
       <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function School(){
	ob_start();
	?>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});

</script>
    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4">
<input type="text" readonly="readonly" name="controbution" value="Construction of School" class="form-control" id="controbution" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member" class="form-control" id="contmember" /> </div> <span id="sms"</span></div>

 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label>
<div class="col-sm-4">
<input type="number" required="required" name="contAmount" class="form-control" id="contAmount"  onkeyup="subtractContribution()"  onblur="errornotes()" /></div><span id="sms"></span> </div>

 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<div class="col-sm-4">
<input name="desc" type="text" class="form-control"size="60%" id="desc" readonly value="Ophanage school" readonly="readonly">
<!----div class="col-sm-4"><input type="text" required="required" name="desc" class="form-control" id="desc" /----->
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
       <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function Account(){
	ob_start();
	?>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
    <form action="" method="post" class="form-horizontal"  role="form" >
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly="readonly" value="Corperative Account" name="controbution" class="form-control" id="controbution" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member" class="form-control" id="contmember"  /> </div><span id="sms"></span> </div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="totalsaves" class="form-control"  /></div></div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label>
<div class="col-sm-4"><input type="number" required="required" name="contAmount" onkeyup="subtractContribution()"  onblur="errornotes()"  class="form-control" id="contAmount" /> </div><span id="sms"></span> </div>
<div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>
<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<!--textarea name="desc" readonly="readonly" class="form-control" style="height:50px; width:250px;" id="desc"></textarea--->
<div class="col-sm-4"><input type="text" readonly="readonly"size="50%" value="Account for the SENK SACCO" name="desc" class="form-control" id="desc" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
       <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full"> <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}

function Handover(){
	ob_start();
	?>
<script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contmember").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#contAmount").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});

$(function(){
	$('[name="member"]').on('blur',function(){
				var contribute = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getContribution.php",
				data:{contribute:contribute},
				success: function(data){
					$('#contsaves').val(data);
					}
					})
			})
	});
</script>
    <form action="" method="post" class="form-horizontal"  role="form" \>
<div class="form-group" >
<label class="control-label col-sm-3" for="Controbution">Controbution Name</label>
<div class="col-sm-4"><input type="text" readonly="readonly" value="HAndover Ceremony" name="controbution" class="form-control" id="controbution" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">MemberID</label><div class="col-sm-4"><input type="number" required="required" name="member" class="form-control" id="contmember" /> </div><span id="sms"></span>
 </div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Total Savings</label>
<div class="col-sm-4"><input type="text" name="contsaves" readonly="readonly" id="contsaves" class="form-control"  /></div></div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Amount">Amount</label><div class="col-sm-4"><input type="number" required="required" name="contAmount" class="form-control" id="contAmount" onkeyup="subtractContribution()"  onblur="errorsms()"/>
</div><span id="sms"></span>
</div>
 <div class="form-group" >
<label class="control-label col-sm-3" for="ats">Balance on Account</label>
<div class="col-sm-4">
<input type="text" name="contBalance" readonly="readonly" id="contBalance" class="form-control"  /></div></div>

<div class="form-group" >
<label class="control-label col-sm-3" for="desc">Description</label>
<!--textarea name="desc" readonly="readonly" class="form-control" style="height:50px; width:250px;" id="desc"></textarea-->
<div class="col-sm-4">
<input type="text" readonly="readonly"size="50%" value="Money for the handover party" name="desc" class="form-control" id="desc" />
</div>
</div>
<div class="form-group" >
<div class="col-sm-4" style="padding-left:20%">
        <button type="submit" class="btn btn-success" name="Forward">Forward </button>
     
      </div>
      <div class="col-sm-4" style="padding-left:20%">
      <a href="<?php $_SERVER['PHP_SELF'] ?>?action=full">  <button type="submit" class="btn btn-success" name="Back">Back </button></a>
     
      </div>
      </div>
	</form>
     <?php 
echo ob_get_clean();
	
}
function events()
{
ob_start();
	?>
   
       <div class="container">
   <font color="#FF0000" size="+2"> <h5>Create Events </h5></font>
<form action="" method="post" class="form-horizontal"  role="form">
<div class="form-group" ><label class="control-label col-sm-3" for="tit">Title</label>
<div class="col-sm-3"><input type="text" placeholder="Title Of the Event" required="required" name="title" class="form-control" id="title" />
</div>  </div>
<hr/>
<!---script type="text/javascript">
$('#date').datepicker({dateFormat: 'yy-mm-dd'});
</script---->
<div class="form-group" >
<label class="control-label col-sm-3" for="date">Date</label>
<div class="col-sm-4"><input type="text" required="required"  name="date" class="date form-control" id="date" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Venue">Venue</label><div class="col-sm-4"><input type="text" required="required" name="Venue" class="form-control" id="nam" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Time">Start Time</label><div class="col-sm-4"><input type="text" required="required" name="Time" class="form-control" id="start_time" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="End">End Time</label><div class="col-sm-4"><input type="text" required="required" name="End" class="form-control" id="end_time" />
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="purp">Purpose</label><div class="col-sm-4">
<textarea  required="required"name="purp" class="form-control" id="purp"></textarea>
</div>
</div>
<div class="form-group" >
<label class="control-label col-sm-3" for="Issued">Issued By</label><div class="col-sm-4"><input type="text" required="required" name="Issued" readonly="readonly" value="<?php echo $_SESSION["sess-memberid"]; ?>" class="form-control" id="nam" />
</div>
</div>
     <div class="col-sm-4">
        <button type="submit" class="btn btn-success" name="save_event">Create </button>
     
      </div>
      </form>
      <br/><br/>
</div>    
<script src="script.js"></script>
   <?php 
echo ob_get_clean();			
	
}  
   function totalwithdraw()
   {include'connection.php';
/* $GOO=mysql_connect("localhost","root","");
$saa=mysql_select_db("senk",$GOO); */
$contri=mysqli_query($GOO,"select * from withdraw ");
echo"<table class=\"table table-hover table-bordered table stripped\" style='padding-left:20%'  >
 <th>Withdraw Number</th><th>Date</th><th>MemberID</th><th>withdraw</th><th>Balance</th>";
while($row=mysqli_fetch_array($contri))
{
echo "<tr>";
echo "<td>".$row['WithdrawID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['withdrew']."</td>";
echo "<td>".$row['Recieved']."</td>";
echo"</tr>";

}
echo"</tr></table>&nbsp;&nbsp;";
   
   }
   
   
function viewreg(){
	include'connection.php';
$getid =@$_GET['1'];
/* $con=mysql_connect("localhost","root","");
$sel=mysql_select_db("senk",$con); */
$ccus=mysqli_query($GOO,"select * from members");
if(!$ccus)echo die(mysql_error());
echo"<table class=\"table table-hover table-bordered table stripped\" > <th>MemberID</th><th>FName</th><th>LName</th><th>Address</th><th>Phone</th> <th>DOB</th><th>National-ID</th><th>Gender</th>";


while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['FName']."</td>";
echo "<td>".$row['LName']."</td>";
echo "<td>".$row['Address']."</td>";
echo "<td>".$row['Phone']."</td>";
echo "<td>".$row['DOB']."</td>";
echo "<td>".$row['National-ID']."</td>";
echo "<td>".$row['Gender']."</td>";
echo"</tr>";
}
echo"</tr></table>";
	}
	function staff()
	{include'connection.php';
$john=$_SESSION["sess-memberid"];
/* $con=mysql_connect("localhost","root","");
$sel=mysql_select_db("Loan",$con); */
$ccus=mysqli_query($GOO,"select * from staff  ");
if(!$ccus)die.(mysql_error());
echo"<table class=\"table table-hover table-bordered table stripped\" > <th>StaffID</th><th>FName</th><th>LName</th><th>Address</th><th>DOB</th><th>Status</th>";
while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['StaffID']."</td>";
echo "<td>".$row['FName']."</td>";
echo "<td>".$row['LName']."</td>";
echo "<td>".$row['DOB']."</td>";
echo "<td>".$row['Address']."</td>";
echo "<td>".$row['Designation']."</td>";
echo"</tr>";
}
echo"</tr></table>";
		
	}
function viewPayment(){
	include'connection.php';
/* $con=mysql_connect("localhost","root","");

$sea=mysql_select_db("senk",$con); */
$cus=mysqli_query($GOO,"select Installement from `instale-history` limit 15");
$total=0;
for($i=0;$i<mysqli_num_rows($cus);$i++)
{$r=mysqli_fetch_array($cus);
	$total=$total+$r['Installement'];}
echo'Total Payments:  '.$total;

$ccus=mysqli_query($GOO,"select * from  `instale-history` limit 15");
echo"<table class=\"table table-hover table-bordered table stripped\" > <tr><th>SENKID</th><th>Amount Paid</th><th>Date Of Payment</th><th>Paid by</th><th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($ccus))
{

echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['Installement']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Paid_By']."</td>";
echo "<td>".$row['Aproved_by']."</td>";
echo"<tr>";
	
}

echo"</tr>";
echo"</table>";
	
	}	

function View_events()
{
$getid = $_GET['Event-ID'];
/* $con=mysql_connect("localhost","root","");

$sea=mysql_select_db("senk",$con); */
include'connection.php';
$ccus=mysqli_query($GOO,"select * from event limit 15");
echo"<table class=\"table table-hover table-bordered table stripped\" > <tr><th>Title</th><th>Date</th><th>Venue</th><th>Start-tym</th><th>End-tym</th><th>Description by</th><th>Created-by</th></tr>";
while($row=mysqli_fetch_array($ccus))
{

echo "<tr>";
echo "<td>".$row['Title']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Venue']."</td>";
echo "<td>".$row['Start-tym']."</td>";
echo "<td>".$row['End-tym']."</td>";
echo "<td>".$row['Description']."</td>";
echo "<td>".$row['Created-by']."</td>";
echo"<tr>";
	
}

echo"</tr>";
echo"</table>";
}



	
function Save()
{
$getid = $_GET['ID'];
include'connection.php';
/* $con=mysql_connect("localhost","root","");

$sea=mysql_select_db("senk",$con); */
$cus=mysqli_query($GOO,"select * from `save-history` limit 15");
if(!$cus)echo'dede'.die(mysql_error());
echo"<table class=\"table table-hover table-bordered table stripped\" > <tr><th>MemberID</th><th>Date</th><th>Amount</th><th>saved-by</th>  <th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($cus))
{

echo "<tr>";
echo "<td>".$row['MemberID']."</td> &nbsp;";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Amount']."</td>";
echo "<td>".$row['saved-by']."</td>";
echo "<td>".$row['Recieved-By']."</td>";
echo"<tr>";
	
}

echo"</tr>";
$cus=mysqli_query($GOO,"select * from `save-history` limit 15");
$total=0;
for($i=0;$i<mysql_num_rows($cus);$i++)
{$r=mysql_fetch_array($cus);
	$total=$total+$r['Amount'];}
echo"<tr><td colspan='2'>Total</td><td colspan='2'>$total</td>";
echo"</table>";
}

function view_contribution()
{
include'connection.php';
$contri=mysqli_query($GOO,"select * from  controbution limit 15"); if($contri) echo die(mysql_error());
echo"<table class=\"table table-hover table-bordered table stripped\"  > <th>MemberID</th><th>Amount</th>";
while($row=mysqli_fetch_array($contri))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['Amount']."</td>";

echo"</tr>";

}
echo"</tr></table>&nbsp;&nbsp;";
ob_start()
?>
<form action="" method="post" class="form-horizontal"  role="form">
<div class="form-group">
      <div class="col-sm-4"><a href="<?php  $_SERVER['PHP_SELF'] ?>?action=full">
      Back </a>
       </div></div>
</form>
<?php
echo ob_get_clean();
}
function chairmanAproves()
{

include'connection.php';
/* $con=mysql_connect("localhost","root","");
$sea=mysql_select_db("Loan",$con); */
$ccus=mysqli_query($GOO,"select * from get limit 15 ");
echo"<table class=\"table table-bordered table-hover table stripped\" > <th>MemberID</th><th>Type of loan</th><th>Mode of payment</th><th>Month</th><th>Ammount</th><th>Interesr Rate</th><th>Total Loan</th><th>Releas Date</th><th>Start Date</th><th>Maturity Date</th><th>Status</th></tr>";


while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['tol']."</td>";
echo "<td>".$row['mop']."</td>";
echo "<td>".$row['moth']."</td>";
echo "<td>".$row['ea']."</td>";
echo "<td>".$row['ir']."</td>";
echo "<td>".$row['ta']."</td>";
echo "<td>".$row['rd']."</td>";
echo "<td>".$row['sd']."</td>";
echo "<td>".$row['md']."</td>";
echo "<td>".$row['Status']."</td>";
echo '<td><a href="aprove.php'.$_SERVER['PHP_SELF'].'?action=loan&id='.$row['loanID'].'"><span class="glyphicon glyphicon-Filter"  style="color:#0C0;"></span> Actions </a></td>';
echo"</tr>";

}
echo"</tr></table>";	
	
}
	
function loan()
{
include'connection.php';
    $john=$_SESSION["sess-memberid"];
/* $con=mysql_connect("localhost","root","john");
$sea=mysql_select_db("Loan",$con); */
$ccus=mysqli_query($GOO,"select * from get where  where MemberID='$john'");
echo"<table class=\"table table-bordered table-hover table stripped\" > 
      <th>MemberID</th>
	  <th>Type of Loan</th>
	  <th>Mode of Payment</th>
	  <th>Month</th>
	  <th>Amount</th>
	  <th>Interest Rate</th>
	  <th>Total Loan</th>
	  <th>Release Date</th>
	  <th>Start Date</th>
	  <th>Maturity Date</th>
	  <th>Status</th></tr>";


while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['tol']."</td>";
echo "<td>".$row['mop']."</td>";
echo "<td>".$row['moth']."</td>";
echo "<td>".$row['ea']."</td>";
echo "<td>".$row['ir']."</td>";
echo "<td>".$row['ta']."</td>";
echo "<td>".$row['rd']."</td>";
echo "<td>".$row['sd']."</td>";
echo "<td>".$row['md']."</td>";
echo "<td>".$row['Status']."</td>";
echo"</tr>";

}
echo"</tr></table>";
}
function bussave()
{
	ob_start();
	?>
    <script type="text/javascript">
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#member").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});


</script>
	<div class="contianer" style="padding-left:10%">

<form action="save_edit.php" style="padding-right:26%" method="post" class="form-horizontal" role="form">

  <div class="form-group" >
<label class="control-label col-sm-5" for="ID Code">Member ID </label>
<div class="col-sm-7"><input type="text" name="member"  required="required" class="form-control"/></div><span id="sms"></span>
</div>

  <!---div class="form-group" >
<label class="control-label col-sm-5" for="DOS">Date</label>
<div class="col-sm-7" ><input type="text"  required="required" id="dateformat()"  class="date form-control" name="daos" />
<script language="javascript" type="text/javascript"> document.write(TODAY); </script>
</div--> 


 <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Initial Save</label>
<div class="col-sm-7"><input type="text" name="is" readonly="readonly" id="initialSave" class="form-control"  /></div></div>

  <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Amount </label>
<div class="col-sm-7">
<input type="text" name="aos" id="totalAmount" required="required" class="form-control" onkeyup="TotalSave()" />
</div></div>

 
 <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Total Save</label>
<div class="col-sm-7"><input type="text" name="ts" readonly="readonly" id="totalSave" class="form-control"  /></div></div>

 <div class="form-group" >
<label class="control-label col-sm-5" for="ats">Saved By:</label>
<div class="col-sm-7"><input type="text" required="required" name="sb"  class="form-control"/></div></div>

 <div class="form-group" >
<label class="control-label col-sm-5" for="rby">Recieved By:</label>
<div class="col-sm-7"><input type="text" name="sel" placeholder="staffID" id="staff" value="<?php echo $_SESSION["sess-memberid"]; ?>" readonly="readonly" class="form-control"/></div></div>

<div class="form-group col-sm-10">        
      <div class=" text-right col-sm-6">
        <button type="submit" class="btn btn-success" name="save">Save</button>
       
      </div>
            
      <div class="col-sm-4">
        <button type="submit" class="btn btn-info" name="reset">Reset</button>
      </div>
   
  </div>

</form>


<script src="script.js"></script>
<?php 
echo ob_get_clean();	
}


function payment()
{  ob_start();
	?>
	<form action="" style="padding-right:10%" method="post" class="form-horizontal" role="form">
<div class="form-group" >
<label class="control-label col-sm-5" for="Ibal">Member ID:</label>
<div class="col-sm-7"><input type="number" name="memid" required="required" class="form-control" /></div></div>
   
  <div class="form-group" >
<label class="control-label col-sm-5" for="inte">Balance</label>
<div class="col-sm-7">
<input type="number" name="Int" id="Int" readonly="readonly" class="form-control"/></div></div>

    <div class="form-group" >
<label class="control-label col-sm-5" for="ampaid">Installment</label>
<div class="col-sm-7"><input type="number" name="ap" class="form-control" id="instal" onchange="em()" /></div></div>

    <div class="form-group" >
<label class="control-label col-sm-5" for="bal">Current Balance</label>
    <div class="col-sm-7"><input type="text"readonly="readonly" name="be" id="be" class="form-control"/></div></div>
  
  
  <div class="form-group" >
<label class="control-label col-sm-5" for="dofpa">Date of Payment</label>
    <div class="col-sm-7"><input type="text" name="dop"  class="date form-control"/></div></div>
   
   
   <div class="form-group" >
<label class="control-label col-sm-5" for="paidby">Paid By:</label>
<div class="col-sm-7"><input type="text" name="pby" class="form-control" /></div></div>
    
    
    <div class="form-group" >
<label class="control-label col-sm-5" for="aproby">Recieved by:</label>
    <div class="col-sm-7"><input type="text" name="sev" placeholder="staffID" readonly="readonly" value="<?php echo $_SESSION["sess-memberid"]; ?>" id="sev" class="form-control" /></div></div>
  
 
 <div class="form-group col-sm-17">        
      <div class="col-sm-5" style="padding-left:20%">
        <button type="submit" class=" form-control btn btn-success" name="pay" onclick="">Payment</button>
       
      </div>
            
      <div class="col-sm-5" style="padding-left:20%">
        <button type="submit" class=" form-control btn btn-info" name="reset">Reset</button>
      </div>
    </div>
    
    
 
</form>

</center>
<script src="script.js"></script>
	<?php
	echo ob_get_clean();
}
	function ViewWithdrawe()
{include'connection.php';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysql_connect("localhost","root","john");
$saa=mysql_select_db("senk",$GOO); */
$que=mysqli_query($GOO,"select MemberID, withdrew from withdraw where MemberID='$john'");
if(!$que)echo die(mysql_error());
$total=0;
for($i=0;$i< mysqli_num_rows($que);$i++)
{$r=mysqli_fetch_array ($que); 
$total=$total+$r['withdrew'];}
$wer=mysqli_query($GOO,"select Total from   save  where MemberID='$john'");
$r=mysqli_fetch_array ($wer);
$tat=$r['Total'];
echo'MemberID:  '.$john.'<br>';
echo'Total withdraw:  '.$total.'&nbsp; Balance On Account: '.$tat; 
$contri=mysqli_query($GOO,"select * from withdraw where MemberID='$john'");
echo"<table class=\"table table-hover table-bordered table stripped\" style='padding-left:20%'  >
 <th>Withdraw Number</th><th>Date</th><th>withdraw</th>";
while($row=mysqli_fetch_array($contri))
{
echo "<tr>";
echo "<td>".$row['WithdrawID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['withdrew']."</td>";
echo"</tr>";

}

echo"</tr></table>&nbsp;&nbsp;";

}

function ViewLonaprepaye()
{	//echo'<hr> <br> Instalment Made';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysql_connect("localhost","root","");
$saa=mysql_select_db("senk",$GOO); */
include'connection.php';
$ccus=mysqli_query($GOO,"select * from `instale-history` where MemberID='$john'");
$q=mysqli_query($GOO,"select MemberID, Installement from `instale-history` where MemberID='$john'");
$total=0;
for($i=0;$i< mysqli_num_rows($q);$i++)
{$r=mysqli_fetch_array ($q); 
$total=$total+$r['Current_Balance'];}

echo'MemberID:   '.$john.'<br>';
echo'Current Balance:  '.$total.'<br>'.'<br>';
echo"<table class=\"table table-hover table-bordered table stripped\" > <tr><th>Payment Number</th><th>Date of Payment</th><th>Amount Paid</th><th>Paid by</th><th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['InstallmentID']."</td>";
echo "<td>".$row['DOP']."</td>";
echo "<td>".$row['Amount']."</td>";
echo "<td>".$row['PaidBy']."</td>";
echo "<td>".$row['StaffID']."</td>";
echo"<tr>";
	
}
echo"</tr>";
echo"</table>";
	}

function ViewContributione()
{include'connection.php';
echo'<hr>';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysql_connect("localhost","root","");
$saa=mysql_select_db("senk",$GOO); */
$contri=mysqli_query($GOO,"select * from controbution  where MemberID='$john'");
$que=mysqli_query($GOO,"select MemberID, Amount from controbution  where MemberID='$john'");
if(!$que){echo'iii'.die(mysql_error());}
$total=0;
for($i=0;$i< mysqli_num_rows($que);$i++)
{$r=mysqli_fetch_array ($que); 
$total=$total+$r['Amount'];}

echo'MemberID:'.$john.'<br>';
echo'Total Contribution:  '.$total.'<br>'.'<br>';
echo"<table class=\"table table-hover table-bordered table stripped\"  ><tr><th>MemberID</th><th>Amount</th>";
while($row=mysqli_fetch_array($contri))
{
echo "<tr>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['Amount']."</td>";

echo"</tr>";

}
echo"</tr></table>&nbsp;";

}
function ViewLoanAprovede()
{include'connection.php';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysql_connect("localhost","root","");
$saa=mysql_select_db("senk",$GOO); */
$ccus=mysqli_query($GOO,"select * from get where MemberID='$john'");
if(!$ccus)echo die(mysql_error());
echo'MemberID:   '.$john;
echo"<table class=\"table table-bordered table-hover table stripped\" > <th>loanID</th><th>Type of loan</th><th>Mode of payment</th><th>Month</th><th>Ammount</th><th>Interesr Rate</th><th>Releas Date</th><th>Start Date</th><th>Maturity Date</th><th>Status</th></tr>";



while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['loanID']."</td>";
echo "<td>".$row['tol']."</td>";
echo "<td>".$row['mop']."</td>";
echo "<td>".$row['moth']."</td>";
echo "<td>".$row['ea']."</td>";
echo "<td>".$row['ir']."</td>";
echo "<td>".$row['ta']."</td>";
echo "<td>".$row['rd']."</td>";
echo "<td>".$row['sd']."</td>";
echo "<td>".$row['md']."</td>";
echo "<td>".$row['Status']."</td>";
echo"</tr>";
}echo"</tr></table>";

}
function ViewSavingse()
{include'connection.php';
$john=$_SESSION["sess-memberid"];
/* $GOO=mysql_connect("localhost","root","");
$saa=mysql_select_db("senk",$GOO); */
$qe=mysqli_query($GOO,"select MemberID, Amount from   save  where MemberID='$john'");

$total=0;
for($i=0;$i< mysqli_num_rows($qe);$i++)
{$r=mysqli_fetch_array ($qe); 
$total=$total+$r['Amount'];}
$wer=mysqli_query($GOO,"select Total from   save  where MemberID='$john'");
$r=mysqli_fetch_array ($wer);
$tat=$r['Total'];
	$we=$john;
	$bal= $total;


echo'MemberID:   '.$we.'&nbsp;&nbsp;<br>';
echo'Total Savings:  '.$bal.''.'&nbsp;&nbsp; On Account :' .$tat;
$cus=mysqli_query($GOO,"select * from `save-history` where MemberID='$john'");
echo"<table class=\"table table-hover table-bordered table stripped\" > <tr><th>Number</th><th>Date</th><th>Amount</th><th>saved-by</th>  <th>Recieved by</th></tr>";
while($row=mysqli_fetch_array($cus))
{

echo "<tr>";
echo "<td>".$row['HistoryID']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Amount']."</td>";
echo "<td>".$row['saved-by']."</td>";
echo "<td>".$row['Recieved-By']."</td>";
echo"<tr>";
	
}

echo"</tr>";
echo"</table>";

}
function ViewPersonale()
{include'connection.php';
echo'My Personal Data';	
$john=$_SESSION["sess-memberid"];
/* $GOO=mysql_connect("localhost","root","");
$saa=mysql_select_db("senk",$GOO); */
$ccus=mysqli_query($GOO,"select * from  staff where staffID = '$john' ");
if(!$ccus){echo'i donot '.die(mysql_error());}
echo"<table class=\"table table-hover table-bordered table stripped\" > <th>StaffID</th><th>FName</th><th>LName</th><th>Date of Birth</th><th>Address</th><th>Designation</th>";


while($row=mysqli_fetch_array($ccus))
{
echo "<tr>";
echo "<td>".$row['StaffID']."</td>";
echo "<td>".$row['FName']."</td>";
echo "<td>".$row['LName']."</td>";
echo "<td>".$row['DOB']."</td>";
echo "<td>".$row['Address']."</td>";

echo "<td>".$row['Designation']."</td>";

echo"</tr>";

}
echo"</tr></table> &nbsp;&nbsp;";



}


?>
