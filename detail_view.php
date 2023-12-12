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
	
			$teamno = $_GET['teamno'];
			
			$sql = "select * from `team` where team_no = $teamno";                 
			$dbquery = mysql_query($sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		
			$result = mysql_fetch_array($dbquery);
			$team_no = $result["team_no"];
			$team_name = $result["team_name"];
			$stadium = $result["stadium"];
			$rtype = $result["rtype"];
			$co_name = $result["co_name"];
			$co_email = $result["co_email"];
			$co_mobile = $result["co_mobile"];
			$co_lineid = $result["co_lineid"];
			$team_slip = $result["team_slip"];
?>

<body>

  	<main id="main">
    <section id="pricing" class="pricing sections-bg">
    	<div class="container" data-aos="fade-up">
    		<div class="row " style="margin-top:150px; margin-bottom:50px">
	          	<div class="col-lg-9 offset-lg-2">
	            	<div class="pricing-item featured">
	            		<h3>ข้อมูลผู้สมัครเข้าร่วมการแข่งขันบาสเกตบอล</h3>
	            		<br><br>
						<p><span style="color:#2e3192; font-size:16px; font-weight:medium">สนามแข่งขัน : </span><span style="font-size:16px; font-weight:medium"><?php echo $stadium?></span></p>
						<p><span style="color:#2e3192; font-size:16px; font-weight:medium">ประเภทการแข่งขัน : </span><span style="font-size:16px; font-weight:medium"><?php echo $rtype?></span></p>
						<p><span style="color:#2e3192; font-size:16px; font-weight:medium">ชื่อทีม : </span><span style="font-size:16px; font-weight:medium"><?php echo $team_name?></span></p>
						<p>
							<span style="color:#2e3192; font-size:16px; font-weight:medium">ผู้ควบคุมทีม : </span><span style="font-size:16px; font-weight:medium"><?php echo $co_name?></span><br>									
							<span style="color:#2e3192; font-size:16px; font-weight:medium">เบอร์ติดต่อ : </span><span style="font-size:16px; font-weight:medium"><?php echo $co_mobile?></span>&nbsp;&nbsp;
							<span style="color:#2e3192; font-size:16px; font-weight:medium">e-mail : </span><span style="font-size:16px; font-weight:medium"><?php echo $co_email?></span>&nbsp;&nbsp;
							<span style="color:#2e3192; font-size:16px; font-weight:medium">LINE ID. : </span><span style="font-size:16px; font-weight:medium"><?php echo $co_lineid?></span>
						</p>
						<p><span style="color:#2e3192; font-size:16px; font-weight:medium">หลักฐานการชำระเงินค่าสมัคร :
						   	<a style="font-size:14px; font-weight:700; color:#009999" href="slip_file/<?php echo $team_slip?>" target="_blank"> 
						   	<span class="glyphicon glyphicon-folder-open"></span>ดูไฟล์แนบ</a></span>
						</p>						
						<p><span style="color:#2e3192; font-size:16px; font-weight:medium">ข้อมูลผู้สมัครแข่งขัน</span></p>
						
						<?php if ($result_user[3] == '1') { ?>							
						<table class="table">
							<thead>
							<tr class="table-secondary">
								<td style="color:#2e3192; font-size:14px">ลำดับที่ </td>
								<td style="color:#2e3192; font-size:14px">ชื่อ-สกุล </td>
								<td style="color:#2e3192; font-size:14px">วัน เดือน ปี เกิด </td>							
								<td style="color:#2e3192; font-size:14px">User FIBA3x3 </td>																												
							</tr>
							</thead>							
						<?php 
							$sql_stu = "select * from `student` where team_no = $team_no order by stu_no";                 
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
						?>
											
							<tbody>
							<tr>
								<td style="font-size:14px">
									<?php echo $row1+1?>.
								</td>					
								<td style="font-size:14px">
									<?php echo $stu_name?>&nbsp;&nbsp;<?php echo $stu_lastname?>
								</td>
								<td style="font-size:14px">
									<?php echo $stu_birthdate?>-<?php echo $stu_birthmonth?>-<?php echo $stu_birthyear?>
								</td>
								<td style="font-size:14px">
									<?php echo $stu_fibaid?>
								</td>																											
							</tr>
							</tbody>
						<?php 
						
							$row1++;
							} 	
						?>
						</table>
						<?php } else { ?>
						<table class="table">
							<thead>
							<tr class="table-secondary">
								<td style="color:#2e3192; font-size:14px">ลำดับที่ </td>
								<td style="color:#2e3192; font-size:14px">ชื่อ-สกุล </td>
								<td style="color:#2e3192; font-size:14px">โรงเรียน </td>	
								<td style="color:#2e3192; font-size:14px">วัน เดือน ปี เกิด </td>							
								<td style="color:#2e3192; font-size:14px">User FIBA3x3 </td>
								<td style="color:#2e3192; font-size:14px">เบอร์ติดต่อ </td>																													
							</tr>
							</thead>							
						<?php 
							$sql_stu = "select * from `student` where team_no = $team_no order by stu_no";                 
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

						?>
											
							<tbody>
							<tr>
								<td style="font-size:14px">
									<?php echo $row1+1?>.
								</td>					
								<td style="font-size:14px">
									<?php echo $stu_name?>&nbsp;&nbsp;<?php echo $stu_lastname?>
								</td>
								<td style="font-size:14px">
									<?php echo $stu_school?>
								</td>
								<td style="font-size:14px">
									<?php echo $stu_birthdate?>-<?php echo $stu_birthmonth?>-<?php echo $stu_birthyear?>
								</td>
								<td style="font-size:14px">
									<?php echo $stu_fibaid?>
								</td>																			
								<td style="font-size:14px">
									<?php echo $stu_mobile?>
								</td>								
							</tr>
							</tbody>
						<?php 
						
							$row1++;
							} 	
						?>
						</table>						
						<?php } ?>						  							  								  
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
						      	<button type="submit" class="btn btn-info btn-sm" onclick="javascript:window.close();">&nbsp;&nbsp;ปิด&nbsp;&nbsp;</button>
						    </div>
						</div>					
        			</div><!-- End Pricing Item -->
        		</div>
        	</div>
      	</div>
    </section>
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
  	

  	<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  	<div id="preloader"></div>
  	  	
  	<!-- End Footer -->	<!-- Vendor JS Files -->
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