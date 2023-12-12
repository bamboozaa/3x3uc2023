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

<body>
	<header id="header" class="header d-flex align-items-center">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-between">
	      	<a href="checkname.php" class="logo d-flex align-items-center">
	        	<!-- Uncomment the line below if you also wish to use an image logo -->
	        	<img src="assets/img/logo.png" alt="">
	        	<!-- <h1>Impact<span>.</span></h1> -->
	      	</a>
	      	<nav id="navbar" class="navbar">
	      	</nav><!-- .navbar -->
	
			<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
			<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
		</div>
  	</header><!-- End Header -->
	<!-- End Header -->	
	
	<!-- start product -->
	<div class="jumbotron">
		<div class="container">
    		<div class="row" style="margin-top:100px; margin-bottom:100px">
        		<div class="col-md-4 col-sm-3" align="center"></div>
        		<div class="col-md-3 col-sm-6" align="center">
	            <!--login form-->
					<form data-toggle="validator" role="form" name="loginForm" action="checkpws.php" Method="Post">
		        		<span style="color:#003366; font-size:18px; font-weight:700">3X3 UTCC Championship 2023</span><br><br>
	            	<!--login form-->
                	<div class="form-group">
	                    <div class="input-group">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
	                        <input type="text" name="username" id="username" class="form-control" autocomplete="off"  placeholder="USERNAME" style="font-size:12pt" required>
	                    </div>
                	</div>
	                <div class="form-group">
	                    <div class="input-group ">
	                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
	                        <input type="password" name="password" id = "password" class="form-control" autocomplete="off" placeholder="PASSWORD" style="font-size:12pt" required>
	                    </div>
	                </div>            
	                <div class="form-group" style="margin-top:10px">
	                    <input type="submit" value="เข้าสู่ระบบ" name="login_button" class="btn btn-primary btn-block login-button" id="login_button" style="font-size:12pt">
	                </div>
	        		</form>		                
         	</div>
         	<div class="col-md-4 col-sm-3" align="center"></div>   	      	
	    </div> <!-- /container -->    
	</div>
	<!-- /container -->   	
  	
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

	<div id="modalSignout" class="modal fade" role="dialog">
		<div class="modal-dialog">
    	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body  " >
					<p><strong>Username หรือ Password ไม่ถูกต้อง กรุณาติดต่อ email : naruemol_suw@utcc.ac.th เบอร์ภายใน 6288.</strong> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
    	</div>
	</div>	
	
	<div id="modalEdit" class="modal fade" role="dialog">
		<div class="modal-dialog">
    	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body  " >
					<p><strong>User ของท่านไม่สามารถเข้าแก้ไขข้อมูลได้</strong> 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
				</div>
			</div>
    	</div>
	</div>	 	
	<!-- end product -->
	
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
	$(document).ready(function(e) {
	   var h = $('nav').height() + 90;
	   $('body').animate({ paddingTop: h });
	});		
	</script>  
	
    <script type="text/javascript">
		$(document).ready(function() {
		
		  if(window.location.href.indexOf('#modalSignout') != -1) {
		    $('#modalSignout').modal('show');
		  }
		
		});		
    </script>	
    
    <script type="text/javascript">
		$(document).ready(function() {
		
		  if(window.location.href.indexOf('#modalEdit') != -1) {
		    $('#modalEdit').modal('show');
		  }
		
		});		
    </script>	
</body>
</html>	    