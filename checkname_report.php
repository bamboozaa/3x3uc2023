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
		
		<form data-toggle="validator" role="form" id="registerForm" name="registerForm" action="checkname_report.php" Method="Post" enctype="multipart/form-data">
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
			      	<input type="hidden" name="off_status" id="off_status" value="1">
				</div>
			</div>			
		</div>
		</form>		
		
<?php 
	$off_status = $_POST['off_status'];
	
	if ($off_status) { ?>

		<table class="table table-bordered table-striped" style="margin-top:20px">
			<tr class="active">
				<td width="5%" align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				ลำดับที่</span></td>
				<td width="15%" align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				ชื่อทีม</span></td>
				<td width="5%" align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				รุ่น</span></td>
				<td width="15%" align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				สนาม</span></td>				
				<td width="15%"  align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				การชำระเงิน</span></td>
				<td width="15%"  align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				ผู้จัดการทีม</span></td>	
				<td width="30%"  align="center"><span style="color:#000066; font-size:15px; font-weight:bold">
				นักกีฬา</span></td>				
			</tr>		  	

			<?php 
				$stadium_s = $_POST['stadium'];
				$rtype_s = $_POST['rtype'];	
				
				if ($stadium_s) { $checkname = "where stadium = '$stadium_s'"; }
				if ($rtype_s) { $checkname = "where rtype = '$rtype_s'"; }
				if (($stadium_s) and ($rtype_s)) { $checkname = "where stadium = '$stadium_s' and rtype = '$rtype_s'"; }
							
				$sql = "select * from `team` $checkname order by `team_no`  ";                      
				$dbquery = mysql_query($sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
			
			    $num_rows = mysql_num_rows($dbquery);
				$row = 0;
				
				while ($row < $num_rows){
					$result = mysql_fetch_array($dbquery);
					$no = $result["team_no"];
					$team_name = $result["team_name"];
					$stadium = $result["stadium"];		
					$rtype = $result["rtype"];
					$co_name = $result["co_name"];
					$co_email = $result["co_email"];
					$co_mobile = $result["co_mobile"];
					$team_slip = $result["team_slip"];
					$team_slipdate = $result["team_slipdate"];
					$team_sliptime = $result["team_sliptime"];
			?>					
			<tr>
				<td width="5%" align="center"><span style="font-size:14px">&nbsp;<?php echo $row+1?>.</span></td>
				<td width="15%"><span style="font-size:14px"><?php echo $team_name?></span></td>
				<td width="5%"><span style="font-size:14px">&nbsp;<?php echo $rtype?></span></td>
				<td width="15%"><span style="font-size:14px">&nbsp;<?php echo $stadium?></span></td>
				<?php if ($team_slip) { ?>
				<td width="15%" align="center">
					<img border="0" src="assets/img/check-icon.png" width="18" height="18"><br><br>
					<a style="font-size:14px; font-weight:700; color:#009999" href="slip_file/<?php echo $team_slip?>" target="_blank">
					<img border="0" src="slip_file/<?php echo $team_slip?>" width="80" height="100"></a>
				</td>
				<?php } else { ?>
				<td width="15%" align="center">
					<img border="0" src="assets/img/icon-xmark.png" width="18" height="18">
				</td>
				<?php } ?>
				<td width="15%"><span style="font-size:14px">&nbsp;<?php echo $co_name?><br>&nbsp;เบอร์โทร: <?php echo $co_mobile?><br>&nbsp;email: <?php echo $co_email?></span></td>
				<td width="30%">
				<?php 
					$sql_stu = "select * from `student` where team_no = $no order by stu_no";                 
					$dbquery_stu = mysql_query($sql_stu) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
				
				    $num_rows_stu = mysql_num_rows($dbquery_stu);
					$row1 = 0;
					
					while ($row1 < $num_rows_stu){
						$result_stu = mysql_fetch_array($dbquery_stu);
						$stu_no = $result_stu["stu_no"];
						$stu_name = $result_stu["stu_name"];
						$stu_lastname = $result_stu["stu_lastname"];
						$stu_email = $result_stu["stu_email"];
						$stu_mobile = $result_stu["stu_mobile"];
						$stu_fibaid = $result_stu["stu_fibaid"];
						$stu_school = $result_stu["stu_school"];
						$stu_birthdate = $result_stu["stu_birthdate"];
						$stu_birthmonth = $result_stu["stu_birthmonth"];
						$stu_birthyear = $result_stu["stu_birthyear"];
						$stu_size = $result_stu["stu_size"];
						$stu_color = $result_stu["stu_color"];
				?>				
						<span style="font-size:14px"><?php echo $row1+1?>. <?php echo $stu_name?>&nbsp;&nbsp;<?php echo $stu_lastname?>
						&nbsp;&nbsp;[<?php echo $stu_size?>,<?php echo $stu_color?>]<br>
						FIBA: <a href="<?php echo $stu_fibaid?>" target="_blank"><?php echo $stu_fibaid?></a></span><br>
				<?php 
					$row1++;
					} 				
				?>
				</td>
			</tr>
				
<?php
	$row++;
	} 
?>				
		</table>

<?php } ?>		

		<form data-toggle="validator" role="form" id="exportForm" name="exportForm" action="export_3x3.php" Method="Post" enctype="multipart/form-data">
		<div class="row" style="padding-top: 10px">
			<div class="col-lg-3 offset-lg-11">		
				<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;Export&nbsp;&nbsp;</button>
				<input type="hidden" name="stadium" value="<?php echo $stadium_s?>">
				<input type="hidden" name="rtype" value="<?php echo $rtype_s?>">
			</div>
		</div>
		</form>
		
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