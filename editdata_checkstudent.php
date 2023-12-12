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
	
			$stadium_edit = $_POST['stadium'];
			$rtype_edit = $_POST['rtype'];
			$team_name_edit = $_POST['team_name'];	
			$co_name_edit = $_POST['co_name'];
			$co_email_edit = $_POST['co_email'];
			$co_mobile_edit = $_POST['co_mobile'];
			$co_lineid_edit = $_POST['co_lineid'];	
			$date_t = date("d/m/Y");	
			
			$sql_stu = "select * from student where stu_no = '".$_POST["stu_no"]."' and team_no = '".$_POST["teamno"]."' ";               
			$dbquery_stu = mysql_query($sql_stu) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");

			$result_stu = mysql_fetch_array($dbquery_stu);
			$team_no = $result_stu["team_no"];
			$stu_no = $result_stu["stu_no"];
			$stu_name = $result_stu["stu_name"];
			$stu_lastname = $result_stu["stu_lastname"];
			$stu_idcard = $result_stu["stu_idcard"];
			$stu_email = $result_stu["stu_email"];
			$stu_mobile = $result_stu["stu_mobile"];
			$stu_facebook = $result_stu["stu_facebook"];
			$stu_lineid = $result_stu["stu_lineid"];
			$stu_fibaid = $result_stu["stu_fibaid"];
			$stu_school = $result_stu["stu_school"];
			$stu_birthdate = $result_stu["stu_birthdate"];
			$stu_birthmonth = $result_stu["stu_birthmonth"];
			$stu_birthyear = $result_stu["stu_birthyear"];
	
			if ($result_stu) {
			
				for ($i=0; $i < count($stu_no); $i++)
				{
					//echo "Name $i = ".$_POST['idcard'][$i]."<br>";
					
					if ($stu_idcard == $_POST['idcard'][$i]) {
								
					 		$query_edit_student = "UPDATE `student` set `stu_name`='".$_POST['name'][$i]."',`stu_lastname`='".$_POST['lastname'][$i]."',`stu_email`='".$_POST['email'][$i]."',`stu_mobile`='".$_POST['mobile'][$i]."',`stu_facebook`='".$_POST['facebook'][$i]."',
											  			  `stu_lineid`='".$_POST['lineid'][$i]."',`stu_fibaid`='".$_POST['fibaid'][$i]."',`stu_school`='".$_POST['school'][$i]."',`stu_birthdate`='".$_POST['bday'][$i]."',`stu_birthmonth`='".$_POST['bmonth'][$i]."',`stu_birthyear`='".$_POST['byear'][$i]."',`stu_size`='".$_POST['sizeshirt'][$i]."',`stu_update`='$date_t'
											   where stu_no = '".$_POST["stu_no"]."' and team_no = '".$_POST["teamno"]."' ";													  
					
						if(!mysql_query($query_edit_student)){
							echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง2";
						} else {
							echo "<meta http-equiv=\"refresh\" content=\"0; url=editdata_register.php?teamno=$team_no\"> ";
						}
									
					} else {
		
						$sql_cardid = "select stu_idcard from student where stu_idcard = '".$_POST["idcard"][$i]."' ";
						$dbquery_cardid = mysql_query($sql_cardid) or die("Query failed");	
						$num_rows = mysql_num_rows($dbquery_cardid);
						
						if ($num_rows == 3) {
?>

<body>

  	<main id="main">

    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up" style="padding-top: 90px;">

        	<div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">

	          	<div class="col-lg-6 offset-lg-3">
	            	<div class="pricing-item featured">
	            		<h3>ลงทะเบียนเข้าร่วมการแข่งขันบาสเกตบอล</h3>
	            		<h4>3x3 UTCC Championship 2023</h4>
	            		<br><br>
						<h5>มีผู้สมัครแข่งขัน สมัครครบตามจำนวนสนามที่กำหนดแล้ว<br>กรุณาตรวจสอบข้อมูลอีกครั้ง</h5>
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
        Designed by UTCC.
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
		
						} else {
						 		$query_edit_student = "UPDATE `student` set `stu_name`='".$_POST['name'][$i]."',`stu_lastname`='".$_POST['lastname'][$i]."',`stu_idcard`='".$_POST['idcard'][$i]."',`stu_email`='".$_POST['email'][$i]."',`stu_mobile`='".$_POST['mobile'][$i]."',`stu_facebook`='".$_POST['facebook'][$i]."',
												  			  `stu_lineid`='".$_POST['lineid'][$i]."',`stu_fibaid`='".$_POST['fibaid'][$i]."',`stu_school`='".$_POST['school'][$i]."',`stu_birthdate`='".$_POST['bday'][$i]."',`stu_birthmonth`='".$_POST['bmonth'][$i]."',`stu_birthyear`='".$_POST['byear'][$i]."',`stu_size`='".$_POST['sizeshirt'][$i]."',`stu_update`='$date_t'
												   where stu_no = '".$_POST["stu_no"]."' and team_no = '".$_POST["teamno"]."' ";													  
						
							if(!mysql_query($query_edit_student)){
								echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง3";
							} else {
								echo "<meta http-equiv=\"refresh\" content=\"0; url=editdata_register.php?teamno=$team_no\"> ";
							}		
						}
					}
				} 
				
			} else {
	
				for ($j=0; $j < count($_POST['idcard']); $j++)
				{
					//echo "Name $j = ".$_POST['idcard'][$j]."<br>";	
				
					$sql_cardid = "select stu_idcard from student where stu_idcard = '".$_POST["idcard"][$j]."' ";
					$dbquery_cardid = mysql_query($sql_cardid) or die("Query failed");	
					$num_rows = mysql_num_rows($dbquery_cardid);
					
					if ($num_rows == 3) {
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
						<h5>มีผู้สมัครแข่งขัน สมัครครบตามจำนวนสนามที่กำหนดแล้ว<br>กรุณาตรวจสอบข้อมูลอีกครั้ง</h5>
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
        Designed by UTCC.
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
					} else {
													  
							$query_insert_student = "INSERT INTO `student` (`stu_no`,`team_no`,`team_name`,`stadium`,`rtype`,`stu_name`,`stu_lastname`,`stu_idcard`,`stu_email`,`stu_mobile`,`stu_facebook`,`stu_lineid`,`stu_fibaid`,`stu_school`,`stu_birthdate`,`stu_birthmonth`,`stu_birthyear`,`stu_size`,`stu_update`) 
												VALUES (NULL,'".$_POST["teamno"]."','$team_name_edit','$stadium_edit','$rtype_edit','".$_POST['name'][$j]."','".$_POST['lastname'][$j]."','".$_POST['idcard'][$j]."','".$_POST['email'][$j]."','".$_POST['mobile'][$j]."','".$_POST['facebook'][$j]."','".$_POST['lineid'][$j]."','".$_POST['fibaid'][$j]."','".$_POST['school'][$j]."','".$_POST['bday'][$j]."','".$_POST['bmonth'][$j]."','".$_POST['byear'][$j]."','".$_POST['sizeshirt'][$j]."','$date_t')";													  
						
		
						if(!mysql_query($query_insert_student)){
							echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง2";
						}else{						
							echo "<meta http-equiv=\"refresh\" content=\"0; url=editdata_register.php?teamno=".$_POST["teamno"]."\"> ";
						}
					}	
				}	// End for loop j											
			} 
		}
	}
?>
</html>