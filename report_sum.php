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
		<table class="table table-bordered">
			<tr class="active">
				<td width="30%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				สนาม</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				18M</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				18W</span></td>	
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				16M</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				16W</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				14M</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				14W</span></td>
				<td width="10%" align="center"><span style="color:#000066; font-size:16px; font-weight:bold">
				รวม</span></td>													
			</tr>		  	

<?php 
	
	$sql = "SELECT * FROM stadium order by `sta_no` ";
	$dbquery = mysql_query($sql) or die(mysql_error());
	$num_rows = mysql_num_rows($dbquery);	
	
	while ($row < $num_rows){
		$result = mysql_fetch_array($dbquery);
		
		$sql_18M = "select count(team_no) AS 18M from `team` where rtype='18M' and stadium='$result[1]'";                      
		$dbquery_18M = mysql_query($sql_18M) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_18M = mysql_fetch_array($dbquery_18M);
		
		$sql_18W = "select count(team_no) AS 18W from `team` where rtype='18W' and stadium='$result[1]'";                      
		$dbquery_18W = mysql_query($sql_18W) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_18W = mysql_fetch_array($dbquery_18W);	
		
		$sql_16M = "select count(team_no) AS 16M from `team` where rtype='16M' and stadium='$result[1]'";                      
		$dbquery_16M = mysql_query($sql_16M) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_16M = mysql_fetch_array($dbquery_16M);	
		
		$sql_16W = "select count(team_no) AS 16W from `team` where rtype='16W' and stadium='$result[1]'";                      
		$dbquery_16W = mysql_query($sql_16W) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_16W = mysql_fetch_array($dbquery_16W);	
		
		$sql_14M = "select count(team_no) AS 14M from `team` where rtype='14M' and stadium='$result[1]'";                      
		$dbquery_14M = mysql_query($sql_14M) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_14M = mysql_fetch_array($dbquery_14M);	
		
		$sql_14W = "select count(team_no) AS 14W from `team` where rtype='14W' and stadium='$result[1]'";                      
		$dbquery_14W = mysql_query($sql_14W) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_14W = mysql_fetch_array($dbquery_14W);	
		
		$sum_stadium = $result_18M[0]+$result_18W[0]+$result_16M[0]+$result_16W[0]+$result_14M[0]+$result_14W[0];		
?>					
			<tr>
				<td width="30%"><?php echo $row+1?>.&nbsp;<?php echo $result[1]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_18M[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_18W[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_16M[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_16W[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_14M[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $result_14W[0]?></td>
				<td width="10%" align="center">&nbsp;<?php echo $sum_stadium?></td>
			</tr>
				
<?php
		$sum_team = $sum_team+$sum_stadium;

	$row++;
	} 
?>	
			<tr>
				<td width="90%" colspan="7" align="right"><span style="color:#CC0000; font-size:16px; font-weight:bold">รวมทีมสมัครทั้งหมด</span></td>
				<td width="10%" align="center"><span style="color:#CC0000; font-size:16px; font-weight:bold">&nbsp;<u><?php echo $sum_team?></u>&nbsp;ทีม</span></td>
			</tr>			
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