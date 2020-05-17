<?php
session_start();
 
if(!isset($_SESSION["sess-memberid"])){
	header("Location:index.php");}
?>

<?php
	$message='';
	include'connection.php';
//	$GOO=mysql_connect("localhost","root","");
//	//echo $GOO;
//	if(!$GOO){echo "could not connect";}
//	$saa=mysql_select_db("senk");
//	if(!$saa){echo "could not select database";}
	if(isset($_POST['Apply'])){
	
		$member=$_POST['member'];
		$type=$_POST['select'];
		$mode=$_POST['mop'];
		$month=$_POST['moo'];
		$Amount=$_POST['mon5'];
		$rate=$_POST['rate'];
		$total=$_POST['toamo'];
		$release= date("Y-m-d");
		$start= $_POST['sad'];
		$mature=$_POST['mad'];
		
		$sol=mysqli_query($GOO,"SELECT * FROM logs WHERE number='$member'") or die(mysql_error());
		if(mysqli_num_rows($sol) == 0 ){
			//ther is no user	
			$message = "there is no user with this ".$member;
		}else{
			$insert_get = mysqli_query($GOO,"INSERT INTO `get`( MemberID,tol ,mop, moth, ea, ir , ta, rd, sd, md) 
			Values('$member','$type','$mode','$month','$Amount','$rate','$total','$release','$start','$mature')") or die(mysql_error());
			if(!$insert_get){
				//failed to insert into get table
				$message = "failed to insert into get table";
			}else{
				$insert_inst = mysqli_query($GOO,"INSERT INTO  loan( MemberID,Total) Values('$member','$total')") or die(mysql_error());
				if(!$insert_inst){
					//failed to insert into installment table
					$message = "failed to insert into loan table";
				}else{
					$message = "Loan processed successfully, Terms & Conditon Apply <br/>Please wait After 1 Week for Aproval";
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
                    <li><a href="logout.php">Logout</a></li>
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
                        <li class="nav-header">SENK SACCO</li>
                        <li><a class="ajax-link" href="home.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                                               </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-globe"></i><span> Get Loan</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="loan.php">Make Loan</a></li>
                                <li><a href="ViewLoan.php">View Loans</a></li>
                            </ul>
                        </li>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-file"></i><span> Monthly Payments</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="savings.php">Make Monthly Pay</a></li>
                                <li><a href="sav.php">View Monthly Pay</a></li>
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
                                <li><a href="loan_payment.php">Make  Loan Payments</a></li>
                                <li><a href="ViewLoanPay.php">View Loan Payments</a></li>
                            </ul>
                        </li>
						<li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Add Individuals</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="register.php">Add Members</a></li>
                                <li><a href="staffs.php">Add Staff</a></li>
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
        	<script type="text/javascript">
		$(document).ready(function(){
			$("#date").datetimepicker({
				timepicker:false,
				showtime:false,
				format:'Y-m-d'				
			}); });
            $(document).ready(function(){
			$("#codate").datetimepicker({
				timepicker:false,
				showtime:false,
				format:'Y-m-d'				
			}); });
		            $(document).ready(function(){
			$("#kadate").datetimepicker({
				timepicker:false,
				showtime:false,
				format:'Y-m-d'				
			}); });
	</script>
        		<script type="text/javascript" >
			function setTotalAmount()
			{
				
				var month = document.getElementById('mak').value;
				var amount = document.getElementById('eamt').value;
				var interestvalue  = document.getElementById('fir').value ;
				if (amount>=3000 && amount<=10000)
				{interest =0.15;}
				else if (amount>=10001 && amount<=50000)
				{interest =0.13;}
				else if (amount>=50001 &&amount<=100000)
				{interest =0.11;}
				else if (amount>=100001 && amount<=500000)
				{interest =0.10;}
				else if (amount>=500001 && amount<=1000000)
				{interest =0.09;}
				else if (amount>=1000001 && amount<=5000000)
				{interest =0.08;}
				//else(amount>=5000000){document.grtElementById('fir').value=1;}
				if(isNaN(parseFloat(interest))){
					
					}else{ 
					$('#fir').val(interest);
					document.getElementById('tam').value = parseFloat(amount) + 
					(parseFloat(interest)* parseFloat(amount) * parseFloat(month));  
				}
				
			}
			<!--checks in case de month is changed so that the total ammount change also--->
			$(document).ready(function(e) {
				$('#mak').on('change',function(){
					setTotalAmount()
				})
			});
			
		</script>
<div class="col-lg-9">

<div class="container">
			<?php if(!empty($message)): ?>
			<div class="alert alert-success">
				<?php echo $message; ?>
			</div>
			<?php endif; ?></div>

	<div class="contianer" style="padding-left:5%">
<div class="panel panel-info">
                          <div class="panel-heading" style="text-align:center">
                          <strong>  APPLY FOR ALOAN FROM SENK SACCO </strong>    
                            </div>
                        <div class="panel-body">
	 <form action="" method="post" class="form-horizontal"  role="form">
				
				<div class="form-group" >
					<label class="control-label col-sm-3" for="eat">MemberID</label>
                    <div class="col-lg-9">
    <input type="text" readonly name="member" class="form-control" id="nam" value="<?php echo $_SESSION["sess-memberid"];?>" />
					</div></div>
					
					<div class="form-group" >
						<label class="control-label col-sm-3" for="tyoloan">
							Type of Loan</label> <div class="col-lg-9">
							<select required="required" class="form-control" name="select" >
								<option>Select please</option>
								<option></option>
								<option>School Loan</option>
								<option>Land Loan</option>
								<option>Medical Loan</option>
								<option>Salary Loan</option>
								<option>House Loan</option>
								<option>Agriculture Loan</option>
							</select> </div></div>
							
							<div class="form-group" >
								<label class="control-label col-sm-3" for="mop">
								Mode Of Payment:</label><div class="col-lg-9"> <select class="form-control" name="mop" required="required"><option>select yours</option><option>Monthly</option></select></div></div>
								
								<div class="form-group" >
									<label class="control-label col-sm-3" for="tyoloan">
										Months:</label> <div class="col-lg-9">
										<select required="required" class="form-control" id="mak" name="moo"  >
											<option>Select please</option>
											<option>0.5</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select> </div></div>
										
										<div class="form-group" >
										<label class="control-label col-sm-3" for="eat">Enter Ammount</label><div class="col-lg-9">
										<input type="text"  required="required"name="mon5" class="form-control" id="eamt" onkeyup="setTotalAmount()"/></div></div>
										
										
										<div class="form-group" >
											<label class="control-label col-sm-3"  for="interset">Interest Rate:</label>
											<div class="col-lg-9"><input type="text" readonly class="form-control" id="fir" name="rate" />
											</div></div>
											
											<div class="form-group" >
												<label class="control-label col-sm-3" auto-complete="false" for="interset">Total Ammount:</label>
												<div class="col-lg-9"><input type="number" name="toamo" required readonly id="tam" class="form-control" />
												</div></div>
	<div class="form-group" >	<label class="control-label col-sm-3" for="rd">Release Date</label>
	<div class="col-sm-9"><input type="text" name="rad" class="form-control"  id="date"    placeholder="Year/Month/Day"  required="required"/></div></div>
												
												<div class="form-group" >
			<label class="control-label col-sm-3" for="sd">Starting Date</label>
	<div class="col-sm-9"><input type="text" required name="sad"  id="codate"  placeholder="Year/Month/Day" class="form-control" /></div></div>
												
												<div class="form-group" >
					<label class="control-label col-sm-3" for="md"> Maturatity Date</label>
	<div class="col-lg-9"><input type="text" placeholder="Year/Month/Day" id="kadate"  required class="form-control" name="mad" /></div></div>
												
												
												<div class="form-group col-sm-10">        
													<div class=" text-right col-sm-5">
														<button type="submit" class="btn btn-info" name="Apply">Apply For Loan</button>
														
													</div>
													
													<div class="col-sm-5">
														<button type="submit" class="btn btn-danger" name="reset">Reset Loan</button>
													</div>
													
												</div>
												
			</form></div></div>
        
</div></div></div>
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
