<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>3X3 UTCC Championship 2023</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="assets/img/UTCC.png" rel="icon">
<link href="assets/img/UTCC.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/main.css" rel="stylesheet">

<!-- =======================================================
* Template Name: Impact - v1.2.0
* Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<?php

	require "dbconnect.php"; 
	
	$teamno = $_GET['teamno'];
	
	$sql = "select * from `team` where team_no = $teamno";                 
	$dbquery = mysql_query($sql) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");

    $num_rows = mysql_num_rows($dbquery);
	$row = 0;
	
	while ($row < $num_rows){
		$result = mysql_fetch_array($dbquery);
		$team_no = $result["team_no"];
		$team_name = $result["team_name"];
		$stadium = $result["stadium"];
		$rtype = $result["rtype"];
		$co_name = $result["co_name"];
		$co_email = $result["co_email"];
		$co_mobile = $result["co_mobile"];
		$co_lineid = $result["co_lineid"];
?>

<body>

  	<main id="main">
    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up">

        	<div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">
				<?php 
					$sql_sta = "SELECT * FROM stadium WHERE sta_name = '$stadium'";
					$dbquery_sta = mysql_query($sql_sta) or die(mysql_error());
					$result_sta = mysql_fetch_array($dbquery_sta);
				?>
	          	<div class="col-lg-9 offset-lg-2">
	            	<div class="pricing-item featured">
	            		<p align="center"><img src="assets/img/logo3x3.png" class="img-fluid" width="102" height="114"></p>
	            		<h3>ใบสมัครเข้าร่วมการแข่งขันบาสเกตบอล</h3>
	            		<h4>3x3 UTCC Championship 2023</h4>
	            		<br><br>
							<p><span style="color:#2e3192; font-size:18px; font-weight:medium">สนามแข่งขัน : </span><span style="font-size:18px; font-weight:medium"><?php echo $result_sta[2]?></span></p>
							<p><span style="color:#2e3192; font-size:18px; font-weight:medium">ประเภทการแข่งขัน : </span><span style="font-size:18px; font-weight:medium"><?php echo $rtype?></span></p>
							<p><span style="color:#2e3192; font-size:18px; font-weight:medium">ชื่อทีม : </span><span style="font-size:18px; font-weight:medium"><?php echo $team_name?></span></p>
						<p>
							<span style="color:#2e3192; font-size:18px; font-weight:medium">ผู้ควบคุมทีม :</span>
							<span style="font-size:18px; font-weight:medium"><?php echo $co_name?></span>
						</p>									
						
						<p><span style="color:#2e3192; font-size:18px; font-weight:medium">ข้อมูลผู้สมัครแข่งขัน</span></p>
						<p>
						<?php 

							$sql_stu = "select * from `student` where team_no = $team_no";                 
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
											
								&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#2e3192; font-size:18px; font-weight:medium">ผู้สมัครคนที่ <?php echo $row1+1; ?> :</span>
								&nbsp;<?php echo $stu_name?>&nbsp;&nbsp;<?php echo $stu_lastname?>
								&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#2e3192; font-size:18px; font-weight:medium">โรงเรียน :</span>								
								&nbsp;<?php echo $stu_school?><br>
						<?php 
						
							$row1++;
							} 	
						?>
						</p>				
						

						<div class="form-group" style="margin-top: 20px; margin-bottom: 20px">		
						 	<div class="col-lg-12">
						    		<span style="color:#2e3192; font-size:14px; font-weight:medium">มหาวิทยาลัยหอการค้าไทย เก็บรวบรวมข้อมูลส่วนบุคคลของท่านเพื่อประชาสัมพันธ์กิจกรรมการแข่งขันบาสเกตบอล 3x3 UTCC Championship 
						    		ซึ่งจะมีการนำภาพการแข่งขันเผยแพร่ผ่านสื่อประชาสัมพันธ์ รวมทั้งการให้บริการการศึกษา และบริหารจัดการด้านการเรียนการสอนเพื่อประโยชน์กับตัวท่าน ซึ่งท่านสามารถศึกษานโยบายการคุ้มครองข้อมูลส่วนบุคคลของมหาวิทยาลัยฯ 
						    	ได้ที่ <a target="_blank" href="http://www.utcc.ac.th/privacy-policy">www.utcc.ac.th/privacy-policy</a></span>
						  	</div>
						</div>														  							  								  
						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
						      	<button type="submit" class="btn btn-info btn-sm" onclick="location.href='http://www.utcc.ac.th/3x3uc2023';">&nbsp;&nbsp;ปิด&nbsp;&nbsp;</button>
						    </div>
						</div>
					</div>
        		</div><!-- End Pricing Item -->

        	</div>

      </div>
    </section>

  	</main><!-- End #main -->		
<?php
	$row++;
	} 
?>

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
  	
    <!-- modal -->	     
    <div id="Modal_Register" class="modal fade">
	  	<div class="modal-dialog modal-lg">
    		<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
		      	</div>    			
      			<div class="modal-body">
					<blockquote>
						<div align="center">
					  	<br><br><span style="font-size:18px; font-weight:bold">เราได้ข้อมูลการสมัครของท่านแล้ว<br> 
						จะมีการตรวจสอบข้อมูลเพื่อเตรียมจัดการแข่งขันต่อไป<br>อาจมีการติดต่อกลับหากพบว่าข้อมูลไม่ครบถ้วน
						<br><br>หากท่านต้องการแก้ไขข้อมูล<br>กรุณาติดต่อผู้จัดการแข่งขันทาง Inbox หรือ Line OA ได้ทันที<br><br>
						</div></span>
					</blockquote>				
	  			</div>	 
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
		     	</div>	  		  			 		
			</div>
	  	</div>
	</div>      	

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
	
	<script type="text/javascript">
	    $(window).on('load',function(){
	        $('#Modal_Register').modal('show');
	    });
	</script>		
</body>
</html>