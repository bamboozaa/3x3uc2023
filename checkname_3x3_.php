<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<?php
	require_once("index_top.php");
	
	$_SESSION['user'];
	
	if (empty($_SESSION['user'])) {
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php\">";
	} else {	
	
		require "dbconnect.php";
		$emp_user = $_SESSION['user'];
		          
		$sql_user = "select * from `tbl_user` where u_username ='$emp_user'";
		$dbquery_user = mysql_query($sql_user) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_user = mysql_fetch_array($dbquery_user);
		
		if(empty($result_user)){
			//die("Invalid user name and password");
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalSignout\"> ";		   
		} else {
?>	
	
	<!-- start product -->
	<main id="main">
	<div class="container">
		<div class="row" style="margin-top:150px; margin-bottom:50px">
		<span style="font-size:16px; font-weight:bold">ข้อมูลผู้สมัคร 3X3 UTCC Championship 2023</span>
		
		<form data-toggle="validator" role="form" id="registerForm" name="registerForm" action="checkname_3x3_.php" Method="Post" enctype="multipart/form-data">
		<div class="row" style="padding-top: 10px">
			<div class="col-lg-3">
				<div class="form-group">
					<?php 
						$sql = "SELECT * FROM stadium";
						$dbquery = mysql_query($sql) or die(mysql_error());
						$num_rows = mysql_num_rows($dbquery);
					?>							
					<select class="form-control" name="stadium" id="stadium" style="font-size:14px">
						<option value="" selected>เลือกสนามแข่งขัน</option>
						<?php  
							while($result = mysql_fetch_array($dbquery)){
						?>	
						<option value='<?php echo $result[1];?>' ><?php echo $result[2];?></option>
						<?php }?>																																						
					</select>
				</div>	
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<select class="form-control" name="rtype" id="rtype" style="font-size:14px">
						<option value="" selected>เลือกประเภทการแข่งขัน</option>
						<option value="18M">รุ่นอายุไม่เกิน 18 ปีชาย</option>
						<option value="18W">รุ่นอายุไม่เกิน 18 ปีหญิง</option>
						<option value="16M">รุ่นอายุไม่เกิน 16 ปีชาย</option>
						<option value="16W">รุ่นอายุไม่เกิน 16 ปีหญิง</option>
						<option value="14M">รุ่นอายุไม่เกิน 14 ปีชาย</option>
						<option value="14W">รุ่นอายุไม่เกิน 14 ปีหญิง</option>
					</select>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
			      	<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;ค้นหา&nbsp;&nbsp;</button>
			      	<input type="hidden" name="off_status" value="1">
				</div>
			</div>		
		</div>
		</form>		
		<table class="table table-bordered table-striped" style="margin-top:20px">
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
	$stadium = $_POST['stadium'];
	$rtype = $_POST['rtype'];	
	
	if ($stadium) { $checkname = "where stadium = '$stadium'"; }
	if ($rtype) { $checkname = "where rtype = '$rtype'"; }
	if (($stadium) and ($rtype)) { $checkname = "where stadium = '$stadium' and rtype = '$rtype'"; }
				
	$sql = "select * from `team` $checkname order by `team_name`,`rtype`  ";                      
	$dbquery = mysql_query($sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");

    $num_rows = mysql_num_rows($dbquery);
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
				<td width="25%" align="center">
					<a href="detail_view.php?teamno=<?php echo $no?>" target="_blank"><img border="0" src="assets/img/pmag.gif" width="16" height="16" alt="ดูข้อมูล"></a>&nbsp;&nbsp;
					<a href="editdata_register.php?teamno=<?php echo $no?>" target="_blank"><img border="0" src="assets/img/ico-02.gif" width="16" height="16" alt="แก้ไขข้อมูล"></a>
				</td>
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
	}
?>