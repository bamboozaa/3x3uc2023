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
	
	$Upload_Dir = "slip_file"; //กำหนดว่าจะให้ copy ไฟล์ที่มาจากเครื่องผู้ใช้ไปที่ใด ระบุที่นี่ได้ครับ
	
	$stadium = $_POST['stadium'];
	$rtype = $_POST['rtype'];
	$team_name = $_POST['team_name'];	
	$co_name = $_POST['co_name'];
	$co_email = $_POST['co_email'];
	$co_mobile = $_POST['co_mobile'];
	$co_lineid = $_POST['co_lineid'];
	$date_t = date("d/m/Y");	
	
	require "dbconnect.php";
	
	if(!empty($_FILES["uploadfile"]["name"])) {
		$file_name=$_FILES["uploadfile"]["name"];
		$filename = $file_name;		
		
		//ทำการ copy ไฟล์มาที่ Server 
		if(!move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$Upload_Dir."/$filename")) // Upload/Copy
		{
			echo "Upload ไฟล์ผลงาน มีปัญหา";
		}	
	
	}	
	
	$sql = "select count(team_no) as countofno from team where rtype = '$rtype' and stadium = '$stadium' ";	               
	$dbquery = mysql_query($sql) or die("Query failed");
	
	$result = mysql_fetch_array($dbquery);
	$countofno = $result["countofno"];
	
	$chk_rtype = substr($rtype,2,1);
	
	if ($chk_rtype == 'M') { $count_rtype = 24; }
	if ($chk_rtype == 'W') { $count_rtype = 12; }
	
	if ($countofno < $count_rtype) {
				
		for ($i=0; $i < count($_POST['idcard']); $i++)
		{
			//echo "Name $i = ".$_POST['idcard'][$i]."<br>";
			
			$sql_cardid = "select stu_idcard from student where stu_idcard = '".$_POST["idcard"][$i]."' ";
			$dbquery_cardid = mysql_query($sql_cardid) or die("Query failed");	
			$num_rows = mysql_num_rows($dbquery_cardid);
			
			if ($num_rows == 3) {
?>			

<body>

	<!-- ======= Header ======= -->
	<section id="topbar" class="topbar d-flex align-items-center">	
		<div class="container d-flex justify-content-center">
		    <div class="logo d-none d-md-flex align-items-center">
		        <img src="assets/img/2.png" alt="">
		    </div>		
      		<div class="contact-info d-flex align-items-center">
      			การแข่งขันบาสเกตบอล 3 คน ระดับมัธยมศึกษาทั่วประเทศ ชิงถ้วยพระราชทาน<br>
      			สมเด็จพระกนิษฐาธิราชเจ้า กรมสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี<br>
      			พระราชทานถ้วยรางวัลชนะเลิศ จำนวน 6 ถ้วย (6 รุ่นการแข่งขัน)
        <!--	<i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
       	 		<i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>  -->
      		</div>
		    <div class="logo d-none d-md-flex align-items-center">
		        <img src="assets/img/1.png" alt="">
		    </div>
    	</div> 
  	</section><!-- End Top Bar -->

  	<header id="header" class="header d-flex align-items-center">
	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      	<a href="https://www.utcc.ac.th/3x3uc2023/index.html" class="logo d-flex align-items-center">
        	<!-- Uncomment the line below if you also wish to use an image logo -->
        	<img src="assets/img/Logo-Main.png" alt="">
        	<!-- <h1>Impact<span>.</span></h1> -->
      	</a>
      	<nav id="navbar" class="navbar">
        <ul>
			<li><a href="https://www.utcc.ac.th/3x3uc2023/index.html#hero">หน้าแรก</a></li>
			<li><a href="register.php">สมัครแข่งขัน</a></li>
			<li><a href="https://www.utcc.ac.th/3x3uc2023/index.html#rules">กติกาการสมัคร</a></li>
			<li><a href="https://www.utcc.ac.th/3x3uc2023/index.html#types">ประเภทการแข่งขัน</a></li>			
			<li><a href="https://www.utcc.ac.th/3x3uc2023/index.html#schedule">ตารางการแข่งขัน</a></li>
        </ul>
      	</nav><!-- .navbar -->

		<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
		<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
	</div>
  	</header><!-- End Header -->
	<!-- End Header -->

  	<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
    	<div class="page-header d-flex align-items-center" style="background-image: url('');">
        	<div class="container position-relative">
          		<div class="row d-flex justify-content-center">
            		<div class="col-lg-6 text-center">
              			<img src="assets/img/logo3x3.png" class="img-fluid" width="250" height="252">
            		</div>
          		</div>
        	</div>
      	</div>
      	<nav>
        <div class="container">
          	<ol>
            <li><a href="https://www.utcc.ac.th/3x3uc2023/index.html#hero">Home</a></li>
            <li>สมัครเข้าร่วมแข่งขัน</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up">

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
				break;
			} 
		
		
		
		//echo $i."<br>";	
			
		if ($i == '3') {
			$query_insert_team = "INSERT INTO `team` (`team_no`,`team_name`,`stadium`,`rtype`,`co_name`,`co_email`,`co_mobile`,`co_lineid`,`team_slip`,`date_regis`,`date_update`) 
							  	VALUES (NULL,'$team_name','$stadium','$rtype','$co_name','$co_email','$co_mobile','$co_lineid','$filename','$date_t','')";	

			if(!mysql_query($query_insert_team)){
				echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง1";
			}else{	
				$last_id = mysql_insert_id($my_connect);			
				for ($j=0; $j < count($_POST['idcard']); $j++)
				{	
					//echo "ไม่ซ้ำ $j = ".$_POST['idcard'][$j]."<br>";
															  
						$query_insert_student = "INSERT INTO `student` (`stu_no`,`team_no`,`team_name`,`stadium`,`rtype`,`stu_name`,`stu_lastname`,`stu_idcard`,`stu_email`,`stu_mobile`,`stu_facebook`,`stu_lineid`,`stu_fibaid`,`stu_school`,`stu_birthdate`,`stu_birthmonth`,`stu_birthyear`,`stu_size`,`stu_update`) 
											VALUES (NULL,'$last_id','$team_name','$stadium','$rtype','".$_POST['name'][$j]."','".$_POST['lastname'][$j]."','".$_POST['idcard'][$j]."','".$_POST['email'][$j]."','".$_POST['mobile'][$j]."','".$_POST['facebook'][$j]."','".$_POST['lineid'][$j]."','".$_POST['fibaid'][$j]."','".$_POST['school'][$j]."','".$_POST['bday'][$j]."','".$_POST['bmonth'][$j]."','".$_POST['byear'][$j]."','".$_POST['sizeshirt'][$j]."','$date_t')";													  
					

					if(!mysql_query($query_insert_student)){
						echo "ไม่สามารถบันทึกข้อมูลได้  กรุณาตรวจสอบข้อมูลอีกครั้ง2";
					}else{						
						echo "<meta http-equiv=\"refresh\" content=\"0; url=confirmdata.php?teamno=$last_id\"> ";
					}	
				}	// End for loop j											
			}
		}	
		
		}	// End for loop i 
	} else {

?>

<body>

	<!-- ======= Header ======= -->
	<section id="topbar" class="topbar d-flex align-items-center">	
		<div class="container d-flex justify-content-center">
		    <div class="logo d-none d-md-flex align-items-center">
		        <img src="assets/img/2.png" alt="">
		    </div>		
      		<div class="contact-info d-flex align-items-center">
      			การแข่งขันบาสเกตบอล 3 คน ระดับมัธยมศึกษาทั่วประเทศ ชิงถ้วยพระราชทาน<br>
      			สมเด็จพระกนิษฐาธิราชเจ้า กรมสมเด็จพระเทพรัตนราชสุดาฯ สยามบรมราชกุมารี<br>
      			พระราชทานถ้วยรางวัลชนะเลิศ จำนวน 6 ถ้วย (6 รุ่นการแข่งขัน)
        <!--	<i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
       	 		<i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>  -->
      		</div>
		    <div class="logo d-none d-md-flex align-items-center">
		        <img src="assets/img/1.png" alt="">
		    </div>
    	</div> 
  	</section><!-- End Top Bar -->

  	<header id="header" class="header d-flex align-items-center">
	<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      	<a href="index.html" class="logo d-flex align-items-center">
        	<!-- Uncomment the line below if you also wish to use an image logo -->
        	<img src="assets/img/logo.png" alt="">
        	<!-- <h1>Impact<span>.</span></h1> -->
      	</a>
      	<nav id="navbar" class="navbar">
        <ul>
			<li><a href="index.html#hero">หน้าแรก</a></li>
			<li><a href="register.php">สมัครแข่งขัน</a></li>
			<li><a href="index.html#pricing">กติกาการสมัคร</a></li>
			<li><a href="index.html#services">ประเภทการแข่งขัน</a></li>			
			<li><a href="#">ตารางการแข่งขัน</a></li>
        </ul>
      	</nav><!-- .navbar -->

		<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
		<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
	</div>
  	</header><!-- End Header -->
	<!-- End Header -->

  	<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
    	<div class="page-header d-flex align-items-center" style="background-image: url('');">
        	<div class="container position-relative">
          		<div class="row d-flex justify-content-center">
            		<div class="col-lg-6 text-center">
              			<img src="assets/img/logo3x3.png" class="img-fluid" width="250" height="252">
            		</div>
          		</div>
        	</div>
      	</div>
      	<nav>
        <div class="container">
          	<ol>
            <li><a href="index.html#hero">Home</a></li>
            <li>สมัครเข้าร่วมแข่งขัน</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up">

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
?>
</html>