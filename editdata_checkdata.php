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
		          
		$sql_user = "select * from `tbl_user` where u_username ='$emp_user' and u_level='2'";
		$dbquery_user = mysql_query($sql_user) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_user = mysql_fetch_array($dbquery_user);
		
		if(empty($result_user)){
			//die("Invalid user name and password");
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalEdit\"> ";		   
		} else {

			$Upload_Dir = "slip_file"; //กำหนดว่าจะให้ copy ไฟล์ที่มาจากเครื่องผู้ใช้ไปที่ใด ระบุที่นี่ได้ครับ	
			
			$stadium_edit = $_POST['stadium'];
			$rtype_edit = $_POST['rtype'];
			$team_name_edit = $_POST['team_name'];	
			$co_name_edit = $_POST['co_name'];
			$co_email_edit = $_POST['co_email'];
			$co_mobile_edit = $_POST['co_mobile'];
			$co_lineid_edit = $_POST['co_lineid'];
			$date_t = date("d/m/Y");	
			
			$sql = "select * from team where team_no = '".$_POST["teamno"]."' ";	               
			$dbquery = mysql_query($sql) or die("Query failed");
			
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
	
			if(!empty($_FILES["uploadfile"]["name"])) {
				$file_name=$_FILES["uploadfile"]["name"];
				$filename = $file_name;		
				
				//ทำการ copy ไฟล์มาที่ Server 
				if(!move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$Upload_Dir."/$filename")) // Upload/Copy
				{
					echo "Upload ไฟล์ผลงาน มีปัญหา";
				}	
			
			} else {
				$filename = $team_slip;
			}	
	
			if (($stadium == $stadium_edit) and ($rtype == $rtype_edit)) {
			
				$query_update_team = "UPDATE `team` SET `team_name`='$team_name_edit',`co_name`='$co_name_edit',`co_email`='$co_email_edit',`co_mobile`='$co_mobile_edit',
											 `co_lineid`='$co_lineid_edit',`team_slip`='$filename',`date_update`='$date_t'
									  WHERE team_no = '$team_no'";		
				
				$query_update_student = "UPDATE `student` set `team_name`='$team_name_edit' WHERE team_no = '$team_no'";	
				
				
				if((!mysql_query($query_update_team)) or (!mysql_query($query_update_student))) {
					echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง1";
				}else{
					echo "<meta http-equiv=\"refresh\" content=\"0; url=editdata_register.php?teamno=$team_no\"> ";
				}

			} else {
		
				$sql = "select count(team_no) as countofno from team where rtype = '$rtype_edit' and stadium = '$stadium_edit' ";	               
				$dbquery = mysql_query($sql) or die("Query failed");
				
				$result = mysql_fetch_array($dbquery);
				$countofno = $result["countofno"];
				
				$chk_rtype = substr($rtype,2,1);
				
				if ($chk_rtype == 'M') { $count_rtype = 24; }
				if ($chk_rtype == 'W') { $count_rtype = 12; }
				
				if ($countofno < $count_rtype) {
		
					$query_update_team = "UPDATE `team` SET `team_name`='$team_name_edit',`stadium`='$stadium_edit',`rtype`='$rtype_edit',`co_name`='$co_name_edit',
												 `co_email`='$co_email_edit',`co_mobile`='$co_mobile_edit',`co_lineid`='$co_lineid_edit',`team_slip`='$filename',`date_update`='$date_t'
										  WHERE team_no = '$team_no'";		
										  
					$query_update_student = "UPDATE `student` set `team_name`='$team_name_edit',`stadium`='$stadium_edit',`rtype`='$rtype_edit' WHERE team_no = '$team_no'";					  
		
					if((!mysql_query($query_update_team)) or (!mysql_query($query_update_student))) {
						echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง1";
					}else{		
						echo "<meta http-equiv=\"refresh\" content=\"0; url=editdata_register.php?teamno=$team_no\"> ";
					}	
				} else {
?>
<body>

  	<main id="main">

    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up"  style="padding-top: 90px;">

        	<div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">

	          	<div class="col-lg-6 offset-lg-3">
	            	<div class="pricing-item featured">
	            		<h3>ลงทะเบียนเข้าร่วมการแข่งขันบาสเกตบอล</h3>
	            		<h4>3x3 UTCC Championship 2023</h4>
	            		<br><br>
						<h5>ประเภทการแข่งขันที่ท่านเลือก มีทีมผู้สมัครครบแล้ว</h5>
						<br><br>
						<p align="center">
						<button type="submit" class="btn btn-info btn-sm" onclick="history.back()">&nbsp;&nbsp;แก้ไขข้อมูล&nbsp;&nbsp;</button>
						</p>
					</div>
        		</div><!-- End Pricing Item -->

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
	
	<script>
		function goBack() {
		    window.history.back();
		}
	</script>	
</body>	
<?php	
				}
			}
		}
	}
	
?>
</html>