<?php
session_start();
 
if(!isset($_SESSION["sess-memberid"])){
	header("Location:index.php");}
?>
<?php
include('connection.php');
	$message = '';
	if(isset($_POST['Withdraw'])){
	
	        $member=$_POST['memberid'];
			$date= date("Y-m-d");
			$withdraw=$_POST['withdraw'];
			$balance=$_POST['balanceafter'];
			$aprove=$_POST['sels'];
		
		/* $sol=mysqli_query($GOO,"SELECT * FROM logs WHERE number='$member'") or die(mysql_error());
		if(mysqli_num_rows($sol) == 0 ){
			//ther is no user	
			$message = "there is no user with this ".$member;
		}else{ */
		$john = "INSERT INTO withdraw(WithdrawID,MemberID,Date,withdrew,Balance,Recieved) 
			values('','$member','$date','$withdraw',$balance,'$aprove')"; //echo$john;
			$witdr=mysqli_query($GOO,"INSERT INTO withdraw(WithdrawID,MemberID,Date,withdrew,Recieved) 
			values('','$member','$date','$withdraw','$aprove')");
			//echo $witdr;
			if(!$witdr){
				//failed to insert into get table
				$sas = "failed to insert into withdraw table";
			}else{
				$deo=mysqli_query($GOO,"update save set Total=$balance where MemberID=$member");
				//echo $deo;
				if(!$deo){
					//failed to insert into installment table
					$sas = "failed to insert into installment table";
				}else{
					$message = "Thanks for trasacting with us";
				}
			}
		
		/* } */
	}
	
?>

<!--?php
$Code=$_POST['code'];
$aos=$_POST['aos'];
$ts=$_POST['ats'];
$con=mysql_connect("localhost","root","");
$saa=mysql_select_db("Loan",$con);

$ret=mysql_query("select * from save WHERE `ID Code`='$Code'");
while($row=mysql_fetch_array($ret))
{
$value=$row['ts'];
}
$formal=$value+$aos;

?-->
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
    
 <script type="text/javascript">
<!--------returns total saves to the withdraw page--------------below---------------------------->
	$(function(){
	$('[name="memberid"]').on('focusout',function(){
				var withdraw = $(this).val();
				$.ajax({type:"post",
				dataType:"json",
				url:"getWithdraw.php",
				data:{withdraw:withdraw},
				success: function(data){
					$('#totalsaves').val(data);
					
				}
				
				})
		
	})
	});
	
	<!------date picker--------------below---->
	        $(document).ready(function(){
			$("#date").datetimepicker({
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

<div class="col-lg-9">

<div class="container">
			<?php if(!empty($message)): ?>
			<div class="alert alert-success">
				<?php echo $message; ?>
			</div>
			<?php endif; ?>

			<?php if(!empty($$sas )): ?>
			<div class="alert alert-success">
				<?php echo $$sas ; ?>
			</div>
			<?php endif; ?></div>
    
	<div class="contianer" style="padding-left:10%">

		<div class="panel panel-info">
                          <div class="panel-heading" style="text-align:center">
                          <strong>  MAKE YOUR WITHDRAW  </strong>    
                            </div>
                        <div class="panel-body">
					<form action="" method="post" class="form-horizontal" role="form">

					  <div class="form-group" >
					<label class="control-label col-sm-2" for="ID Code">Member ID </label>
					<div class="col-lg-9"><input type="text" id="memberid" name="memberid"  required="required" class="form-control"/></div>
					<span id="sms"</span></div>

					 <div class="form-group" >
					<label class="control-label col-sm-2" for="DOS">Date</label>
					<div class="col-lg-9"><input type="text" required="required" class="form-control" id="date" name="date" /></div></div>
					 <div class="form-group" >
					<label class="control-label col-sm-2" for="ats">Total Savings</label>
					<div class="col-lg-9"><input type="text" name="totalsaves" readonly="readonly" id="totalsaves" class="form-control"  /></div></div>

					  <div class="form-group" >
					<label class="control-label col-sm-2" for="ats">Withdraw Ammount  </label>
					<div class="col-lg-9">
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
					<label class="control-label col-sm-2" for="ats">Balance on Account</label>
					<div class="col-lg-9">
					<input type="text" name="balanceafter" readonly="readonly" id="withBalance" class="form-control"  /></div></div>

					 <div class="form-group" >
					<label class="control-label col-sm-2" for="rby">Recieved By:</label>
					<div class="col-lg-9"><input type="text" readonly="readonly" name="sels" value="<?php echo $_SESSION["sess-memberid"]; ?>" class="form-control"/></div></div>
					<div style="padding-left:27%" col-md-12>
						  <div class="col-sm-5">
					 <button type="submit" class="btn btn-success" name="Withdraw">Make Withdraw </button> 
					 </div>
					  <div class="col-sm-5">
							<button type="submit" class="btn btn-info " name="reset">Reset Withdraw</button>
						  </div>
					   </div>

					</form>
					</div></div>
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
