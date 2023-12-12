<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<?php
	require_once("index_topedit.php");
	require "dbconnect.php";
	
	$emp_user = $_POST['username'];
	$emp_pass = $_POST['password'];
	
	$sql = "select * from `team` where co_email = '$emp_user' and co_mobile ='$emp_pass'";
	$dbquery = mysql_query($sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
	$num_rows = mysql_num_rows($dbquery);
		
	if(empty($num_rows)){
		//die("Invalid user name and password");
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkregister.php#modalSignout\"> ";		   
	} else {	
	
	$_SESSION['user'] = $emp_user;
	$_SESSION['pass'] = $emp_pass;
?>	
	
	<!-- start product -->
	<main id="main">
	<div class="container">
		<div class="row" style="margin-top:150px; margin-bottom:50px">
		<span style="font-size:16px; font-weight:bold">ข้อมูลผู้สมัคร 3X3 UTCC Championship 2023</span>
		<table class="table table-bordered">
			<tr class="active">
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ลำดับที่</span></td>
				<td width="30%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				ชื่อทีม</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				รุ่น</span></td>
				<td width="25%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				สนาม</span></td>				
				<td width="25%"  align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				รายละเอียดผู้สมัคร</span></td>
			</tr>		  	

<?php 

	$row = 0;
	
	while ($row < $num_rows){
		$result = mysql_fetch_array($dbquery);
		$no = $result["team_no"];
		$team_name = $result["team_name"];
		$stadium = $result["stadium"];		
		$rtype = $result["rtype"];			
?>					
			<tr>
				<td width="10%" align="center">&nbsp;<?php echo $row+1?>.</span></td>
				<td width="30%">&nbsp;<?php echo $team_name?></td>
				<td width="10%">&nbsp;<?php echo $rtype?></td>
				<td width="25%">&nbsp;<?php echo $stadium?></td>
				<td width="25%" align="center"><a href="editdata_checkregister_edit.php?teamno=<?php echo $no ?>" target="_blank">รายละเอียด</a></td>
			</tr>
				
<?php
	$row++;
	} 
?>				
		</table>
		</div>		        	
	</div> <!-- /container --> 
	
  	</main><!-- End #main -->
  	
  	<!-- ======= Footer ======= -->
  	<footer id="footer" class="footer">

    <div class="container mt-4">
      <div class="copyright">
        © Copyright <strong><span>2023</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by UTCC.<br>
		<a href="https://www.facebook.com/utcc3x3basketball" target="_blank"><img src="assets/img/social_1.png"></a>
		<a href="https://lin.ee/2E4q6qT" target="_blank"><img src="assets/img/social_3.png"></a>				
	  </div>
    </div>

  	</footer><!-- End Footer -->
  	<!-- End Footer -->
	
  	<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  	<div id="preloader"></div>  

	<!-- Vendor JS Files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	
	<!-- Template Main JS File -->
	<script src="assets/js/main.js"></script> 
	<script src="assets/js/jquery-3.1.1.min.js"></script>
	
</body>
</html>
<?php
	}
?>