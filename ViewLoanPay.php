<?php
session_start();
 
if(!isset($_SESSION["sess-memberid"])){
	header("Location:index.php");}
?>
<?php
include'connection.php';
?>
<?php
	$message='';
	include'connection.php';
	/* $GOO=mysqli_connect("localhost","root",""); */
	//echo $GOO;
	/* if(!$GOO){echo "could not connect";}
	$saa=mysqli_select_db($GOO,"senk");
	if(!$saa){echo "could not select database";} */
	if(isset($_POST['pay'])){
	
$member=$_POST['memid'];
$rate=$user['Balance'];
$instal=$_POST['ap'];
$current=$_POST['be'];
$paid=$_POST['pby'];
$aprove=$_POST['sev'];
$date=date("Y-m-d");
		
		$sol=mysqli_query($GOO,"SELECT * FROM logs WHERE number = '$member'") or die(mysql_error());
		if(mysqli_num_rows($sol) == 0 ){
			//ther is no user	
			$message = "there is no user with this ID ";
		}else{
			$insert_get = mysqli_query($GOO,"INSERT INTO`instale-history`(MemberID,Balance,Installement,`Current_Balance`,Date,`Paid_By`,`Aproved_by`) Values('$member','$rate','$instal','$current',$date,'$paid','$aprove')") or die(mysql_error());
			if(!$insert_get){
				//failed to insert into get table
				$message = "failed to insert into get table";
			}else{
				$insert_inst = mysqli_query($GOO,"UPDATE  instalement SET Balance='$current',
`Instalement`='$instal',
 `Balance`='$current',
`Paid_by`='$paid',
 `Aproved_by`='$aprove' WHERE MemberID =$member") or die(mysql_error());
				if(!$insert_inst){
					//failed to insert into installment table
					$error_message = "failed to insert into installment table";
				}else{
					$message = "Thanks for Paying Back";
				}
			}
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>SENK SACCO</title>
    <link rel="shortcut icon" href="Images/go.jpg" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-----DATE PICKER---->
<script src="datetimepicker-master/jquery.datetimepicker.js"></script>
<link href="datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" type=" text/css"/>
    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    
    <!---DATE PICKER------>
    <script src="datetimepicker-master/jquery.datetimepicker.js"></script>
<link href="datetimepicker-master/jquery.datetimepicker.css" rel="stylesheet" type=" text/css"/>
     <script type="text/javascript">
<!--calculating de payments made-----as shown below--------------------------------------------->
 function em()
 {
var balance=document.getElementById('Int').value;
var Payment=document.getElementById('instal').value;
var calc= parseFloat(balance)-parseFloat(Payment);
document.getElementById('be').value= calc;

 }
         

$(function(){
	$('[name="memberid"]').on('blur',
			function(){
				var id = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getBalance.php",
				data:{id:id},
				success: function(data){
					
					$('#Int').val(data);
					
				}
				
				});
		
	});
	});
    
    $(document).ready(function(){
			$("#dop").datetimepicker({
				timepicker:false,
				showtime:false,
				format:'Y-m-d'				
			}); });

</script>
</head>

<body><?php 
    $john=$_SESSION["sess-memberid"];    
    ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><span>SENK SACCO</span><img alt="" src="" class="hidden-xs"/>
               </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo $john;  ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="profile.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="login1.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
<!--
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
-->
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                                                          <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="home.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-globe"></i><span> Get Loan</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="loan.php">Make Loan</a></li>
                                <li><a href="#">View Loans</a></li>
                            </ul>
                        </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-file"></i><span> Monthly Payments</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="savings.php">Make Monthly Pay</a></li>
                                <li><a href="#">View Monthly Pay</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-book"></i><span> Withdraw</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="withdraw.php">Make  Withdraw</a></li>
                                <li><a href="ViewWithdraw.php">View  Withdraw</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-edit"></i><span> Loan Payments</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="loan_payment.php">Make Loan Payments</a></li>
                                <li><a href="ViewLoanPay.php">View Loan Payments</a></li>
                            </ul>
                        </li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Add Individuals</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="register.php">Add Members</a></li>
                                <li><a href="#">Add Staff</a></li>
                            </ul>
                        </li>
						<li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-close"></i><span> Manage Users</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="ViewReg.php">View Members</a></li>
                                <li><a href="ViewStaff.php">View Staff</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

<div class="col-lg-10">
<div class="container">
			<?php if(!empty($message)): ?>
			<div class="alert alert-success">
				<?php echo $message; ?>
			</div>
			<?php endif; ?></div>

    
	<div class="contianer" style="padding-left:0%">

	<?php
//$getid = $_GET['PayID'];
/* $con=mysql_connect("localhost","root","");

$sea=mysql_select_db("senk",$con); */

$ccus=mysqli_query($GOO,"select * from `instale-history` ");
echo"<table class=\"table table stripped\" > <tr class='info'><th>#</th><th>MemberID</th><th>Instalement</th><th>Date</th><th>Paidby</th><th>Aprovedby</th><th>Edit</th></tr>";
while($row=mysqli_fetch_array($ccus))
{

echo "<tr>";
echo "<td>".$row['PayID']."</td>";
echo "<td>".$row['MemberID']."</td>";
echo "<td>".$row['Installement']."</td>";
echo "<td>".$row['Date']."</td>";
echo "<td>".$row['Paid_By']."</td>";
echo "<td>".$row['Aproved_by']."</td>";

echo '<td><a href="editpayment.php?id='.$row['PayID'].'"><span class="glyphicon glyphicon-filter"></span> Action</a></td>';
echo"<tr>";
	
}

echo"</tr>";
echo"</table>";
?>
        
</div><br/></div></div>
    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - 2015</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
