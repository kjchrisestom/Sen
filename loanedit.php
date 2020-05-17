<?php
session_start();
 
if(!isset($_SESSION["sess-memberid"])){
	header("Location:index.php");}
?>
<?php
include'connection.php';
?>
<?php 
if (isset($_POST['update']))
{
$id=$_GET['id'];
$code=$_POST['member'];
$moth=$_POST['moth'];
$tol =$_POST['tol'];
$mop =$_POST['mop'];
$ea=$_POST['ea'];
$ir=$_POST['ir'];
$ta=$_POST['ta'];
$rd=$_POST['rd'];
$sd=$_POST['sd'];
$md=$_POST['md'];
$stat=$_POST['stat'];
// Edit the data

$que="UPDATE `get` SET 
`MemberID` ='$code',
 `tol`='$tol',
 `mop`='$mop', 
 `moth`='$moth',
`ea`='$ea', 
`ir`='$ir',
`ta`='$ta',
`rd`='$rd',
`sd`='$sd',
`md`='$md',
Status='$stat' WHERE `MemberID` ='$code'";
  $updatequery = mysqli_query($GOO,$que);
 
  if(!$updatequery)  {
	  	$message="Not updated".die(mysql_error());
	}
	else 
	{
		//$message = $code.' '.$tol.' '.$mop;
		$message = 'The data has updated successfully.';
		
	}	
}
?>
<?php
if (isset($_POST['delete']))
{
	$id=$_GET['id'];
	$code=$_POST['member'];
$que="DELETE from `get`  WHERE `MemberID` ='$code'";
  $updatequery = mysqli_query($GOO,$que);
  //echo $que;
  if(!$updatequery)  {
	  echo("Error updating database");
  }else{
		$message =  'The data has been deleted  successfully.';
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
                                <li><a href="#">View  Withdraw</a></li>
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
     
<div class="col-lg-10">
<div class="row" style="width:101%; padding-left:1%;">
			<?php if(!empty($message)): ?>
			<div class="alert alert-success">
				<?php echo $message; ?>
			</div>
			<?php endif; ?></div>

	<div class="contianer" style="padding-left:0%">
<div class="panel panel-info">
                          <div class="panel-heading" style="text-align:center">
                          <strong>  Edit YOUR LOAN APPLIED FOR BY MEMBER  </strong>    
                            </div>
                        <div class="panel-body">

<?php

 if(isset($_GET['id']))
 {
	 
	 $id=$_GET['id'];
	 //$john=mysql_query("SELECT * FROM allab WHERE id='$id'", $con);
	 
	 $sam=mysqli_query( $GOO,"SELECT * FROM `get` WHERE loanID ='$id'");
	 		 if(!$sam)
	 {
	 die("Query Failed: ". mysql_error());
	 }else{
		 echo'<div class="container"><form method="post" action="" class="form-horizontal" role="form">';
		/* Fetching data from the field "Email" */
	 while($row=mysqli_fetch_array($sam))
	 { 		
	 		echo'<div class="form-group" >
 <label class="control-label col-sm-2" for="MemberID">MemberID:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="fn" readonly="readonly"  name="member"  value="'.$row['MemberID'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="Type of Loan">Type of Loan:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="DOB"  name="tol"  value="'.$row['tol'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="Mop">Mode of Payment:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="ammount" name="mop"  value="'.$row['mop'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="Month">Month:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="tatol"  name="moth" value="'.$row['moth'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="Amount">Amount:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="saved" name="ea" value="'.$row['ea'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="InterestRate">Interest Rate:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="recievedby" name="ir" value="'.$row['ir'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="TAmount">Total Amount:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="fn"  name="ta"  value="'.$row['ta'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="rdate">Released Date:</label>
 <div class="col-sm-8"><input type="text" class=" date form-control" id="DOB"  name="rd"  value="'.$row['rd'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="SDtae">Starte Date:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="ammount" name="sd"  value="'.$row['sd'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="MDate">Maturity Date:</label>
 <div class="col-sm-8"><input type="text" class="form-control" id="tatol"  name="md" value="'.$row['md'].'" />
 </div></div>
 
 <div class="form-group" >
 <label class="control-label col-sm-2" for="MDate">Status:</label>
 <div class="col-sm-8">
 <input type="text" class="form-control" id="tatol"  name="stat" value="'.$row['Status'].'" />
 </div></div>
 
 <div class="form-group col-sm-10">        
      <div class=" text-right col-sm-4">
        <button type="submit" class="btn btn-success" name="update">Update Loan</button>
       
      </div>
            
      <div class="col-sm-5">
        <button type="submit" class="btn btn-info" name="delete">Delete Loan</button>
      </div>
   
    </div>';
	 }
	 echo'</form></div>';
	 }
 }

 ?></div></div>
 
        
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
