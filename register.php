<?php
session_start();
 
if(!isset($_SESSION["sess-memberid"])){
	header("Location:index.php");}
?>
<?php
$message='';
$newsatff='';
$newpass ='';

include'connection.php';


//$GOO=mysql_connect("localhost","root","");
//echo $GOO;
//$saa=mysql_select_db("senk ",$GOO);
//$member='MemberID';

$kame= mysqli_insert_id($GOO);
$massage = $kame;
if(isset($_POST['submit'])){
	
$soul=mysqli_query($GOO,"SELECT * FROM `members` where MemberID='$kame' ");
if(!$soul){
echo mysql_error($GOO);	
}
$numrows=mysqli_num_rows($soul);
if($numrows == 0)
{
$user =mysqli_fetch_array($soul);
$fname=$_POST['fn'];
$lname=$_POST['ln'];
//$age=$_POST['age'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$password=$_POST['password'];
$nash=$_POST['nash'];
$google=$user['MemberID'];
$daa="INSERT INTO `members` (FName,LName	,DOB,Address,Phone,Password,Gender,`National-ID`) 
	Values('$fname','$lname','$dob','$address','$phone','$password','$gender','$nash')";
$retval = mysqli_query($GOO,$daa) or die(mysql_query());

//insert into save table 
$fname= $_POST['fn'];
$contri=mysqli_query($GOO,"select * from members where FName='$fname' limit 1 ");
if(!$contri){
echo'hey'.die(mysql_error());

}
while($row=mysqli_fetch_array($contri))
{
$come=$row['MemberID'];
}
$save="INSERT INTO `save` (MemberID)  	Values('$come')";
$enter = mysqli_query($GOO,$save) or die(mysql_query());

///inserts into loaner de memberid only
$save="INSERT INTO `loaner` (MemberID)  	Values('$come')";
$enter = mysqli_query($GOO,$save) or die(mysql_query());
// insert into logs table
	$ac="INSERT INTO  logs(senkid,number)
				Values('$fname','$come')";
				$ass=mysqli_query($GOO,$ac);
$_SESSION['FAST']=$fname['FName'];
 $message= "Please sign out and Login to make transactions with SENK SACCO";
//return memberid and password
$fname=$_POST['fn'];
				$contri=mysqli_query($GOO,"select * from members where FName='$fname' limit 1 ");
				if(!$contri){
				echo'hey'.die(mysql_error());

				}
				while($row=mysqli_fetch_array($contri))
				{
				$newsatff=$row['MemberID'];
				$newpass =$row['Password'];
				}
				
mysqli_close($GOO);	
	
}
else{
 if($numrows == 1)
{

$message= "Already Exit Try Again";

//header("Location:bus.php?action=199<0");

mysql_close($GOO);
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
                                <li><a href="savings.php">Make Monthly Payments</a></li>
                                <li><a href="sav.php">View Monthly Payments</a></li>
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
        	<script type="text/javascript">
 
	
	$(document).ready(function(e) {
	var now = window.location.href
	var niw = now.replace('http://localhost/Local/','')
	//alert(niw)
    $('[href="'+niw+'"]').css('background-color','#3CF');
	if(niw ==''){
		$('[href="non.php"]').css('background-color','#3CF');
		}});
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('conpassword');
    //Store the Confimation Message Object ...
 
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
       
	    //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
		   alert('Passwords Do Not Match!');
		 document.getElementById('password').value="";
		  document.getElementById('conpassword').value="";		  
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
	 // (error);
    } 
	
	function checkDate(field)
  {
    var allowBlank = true;
    var minYear = ( (new Date()).getFullYear()-50);
    var maxYear =( (new Date()).getFullYear()-18);

    var errorMsg = "";

    // regular expression to match required date format
    re = /^(\d{4})\/(\d{1,2})\/(\d{1,2})$/;
//re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
    if(field.value != '') {
      if(regs = field.value.match(re)) {
        if(regs[3] < 1 || regs[3] > 31) {
          errorMsg = "Invalid value for day: " + regs[1];
        } 
		else if(regs[2] < 1 || regs[2] > 12) {
          errorMsg = "Invalid value for month: " + regs[2];
        } 
		else if(regs[1] < minYear) {
          errorMsg = "You are over age: ";// + regs[3] + " - must be between " + minYear + " and " + maxYear; 
		}
		else if(regs[1] > maxYear) {
          errorMsg = "You are under age! you must be 18 and above." ;
        }
		
      } else {
        errorMsg = "Invalid date format: " + field.value;
      }
    } else if(!allowBlank) {
      errorMsg = "Empty date not allowed!";
    }
	

    if(errorMsg != "") {
     // alert(errorMsg);
	  $('.error-msg').html(errorMsg).css('color','#F33');
	  field.value='';
      field.focus();
      return false;
    }

    return true;
  }
  
}
//http://www.the-art-of-web.com/javascript/validate-password/

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#phone").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
	       $("#sms").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});




  function IsValid(e){
	if(/^[0-9]+$/.test(e.value)){
		console.log(e.value)
		
		}
	else{
		$('#pin.error-msg').html('Invalid value! Value must be numeric').css('color','#F03')
		}  
  }
</script>
				<div class="col-lg-10">

				<div class="row" >
			
				<?php if(isset($message)): ?>
				<div class="alert alert-success">
				<?php echo $message.'<br>MemberID: '.$newsatff.'<br>Password: '.$newpass; ?>
				</div>
				<?php endif; ?>
			</div>
	<div class="contianer" style="padding-left:0%">
						<div class="panel panel-info">
                          <div class="panel-heading" style="text-align:center">
                          <strong> REGISTER NEW MEMBER OF THE SENK SACCO </strong>    
                            </div>
                        <div class="panel-body">

						<form action=" " method="post" class="form-horizontal" role="form">
						 
						<div class="form-group" >
						 <label class="control-label col-sm-2" for="FName">FName:</label>
						 <div class="col-sm-10"><input type="text" required="required" class="form-control" id="fn" name="fn" />
						 </div></div>
						 
						 <div class="form-group" >
						 <label class="control-label col-sm-2" for="LName">LName:</label>
						 <div class="col-sm-10"><input type="text" required="required" class="form-control" id="ln" name="ln" />
						 </div></div>
						 
						 <div class="form-group" >
						 <label class="control-label col-sm-2" for="dob">DOB</label>
						 <div class="col-sm-10">
						 <input type="text" required="required" placeholder="yyyy/mm/dd" onblur="checkDate(this)"  class="form-control"  name="dob" /><span class="error-msg"></span>
						 </div></div>
						 <script>
						 $(document).ready(function(){
									$("#goo").datetimepicker({
										timepicker:false,
										showtime:false,
										format:'d/m/y'				
									}); });
						 
						 </script> 
						<div class="form-group" >
						 <label class="control-label col-sm-2" for="Address">Address:</label>
						 <div class="col-sm-10"><!----input type="text" required="required" class="form-control" id="address" name="address" /---->
						 <select required="required" class="form-control" id="address" name="address"><option>Select your village</option><option>Buziga Upper</option><option>Buziga Lowwer</option><option>Buziga Salama</option><option>Buziga Kirundu</option></select>
						 </div></div>
						 
						 <div class="form-group" >
						 <label class="control-label col-sm-2" for="Phone">Phone:</label>
						 <div class="col-sm-10"><input type="text" required="required" class="form-control" id="phone" maxlength="15" name="phone" />
						 </div>
						 <span id="sms"></span>
						 </div>
						 
						 <div class="form-group" >
						 <label class="control-label col-sm-2" for="Password">Password:</label>
						 <div class="col-sm-10"><input type="password" required="required" class="form-control" id="password" name="password" />
						 </div></div>
						  <div class="form-group" >
						 <label class="control-label col-sm-2" for="Password">Confirm Password:</label>
						 <div class="col-sm-10">
						 <input type="password" onblur=" checkPass()" required="required" class="form-control" id="conpassword" name="password" />
						 </div></div>
						 
						 <div class="form-group" >
						 <label class="control-label col-sm-2" for="Password">Nation ID:</label>
						 <div class="col-sm-10">
						 <input type="text" required="required" class="form-control"  placeholder="enter only 9 dights" 
						 onblur="IsValid(this)" maxlength="9" id="nash" name="nash" /><label class="control-label col-sm-2" id="sms"></label>
						 <span class="error-msg" id="pin"></span>
						 </div></div>
						 
						 <div class="form-group" >
						 <label class="control-label col-sm-2" for="Confirm Password">Gender:</label>
						 <div class="col-sm-10"><select class="form-control" required="required" id="gender" name="gender"><option>Select</option><option>Male</option><option>Female</option></select>
						 </div></div>


						<div class="form-group col-sm-10">        
							  <div class=" text-right col-sm-5">
								   <button type="submit" class="btn btn-success" id="submit" name="submit">Add Member</button>
								</div>
									
							  <div class="col-sm-5">
								<button type="Reset" class="btn btn-info" name="reset">Reset Member</button>
							  </div>
						   
							</div>
						</form>
						 </div> </div>
</div>

</div></div>
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
