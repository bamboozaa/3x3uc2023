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

	<!-- start product -->
  	<main id="main">
    
    <section id="pricing" class="pricing sections-bg">
      <div class="container" data-aos="fade-up" style="margin-top:150px">

        	<div class="row g-4 py-lg-5" data-aos="zoom-out" data-aos-delay="100">

	          	<div class="col-lg-9 offset-lg-2">
	            	<div class="pricing-item featured">
	            		<h3>ลงทะเบียนเข้าร่วมการแข่งขันบาสเกตบอล</h3>
	            		<h4>3x3 UTCC Championship 2023</h4>
						<form data-toggle="validator" role="form" id="registerForm" name="registerForm" action="editdata_checkdata.php" Method="Post" enctype="multipart/form-data">
						<div class="form-group" style="padding-top: 20px">
							<label for="stadium" class="col-lg-12 control-label"><span style="color:#2e3192; font-size:14px; font-weight:medium">สนามแข่งขัน และกลุ่มจังหวัดที่สามารถสมัครแต่ละสนาม</span></label>				
							<div class="col-lg-12">
							<?php 
								require "dbconnect.php";
								
								$sql_sta = "SELECT * FROM stadium";
								$dbquery_sta = mysql_query($sql_sta) or die(mysql_error());
								$num_rows_sta = mysql_num_rows($dbquery_sta);
							?>							
								<select class="form-control" name="stadium" id="stadium" style="font-size:14px" required>
									<option value="" selected>เลือกสนามแข่งขัน และกลุ่มจังหวัดที่สามารถสมัครแต่ละสนาม</option>
									<?php  
										while($result_sta = mysql_fetch_array($dbquery_sta)){
									?>	
									<option <?php if ($result_sta[1] == $stadium) echo 'selected'; ?> value='<?php echo $result_sta[1];?>' ><?php echo $result_sta[2];?></option>
									<?php }?>																																						
								</select>
							</div>
						</div>	
						<div class="form-group" style="padding-top: 10px">
							<label for="rtype" class="col-lg-12 control-label"><span style="color:#2e3192; font-size:14px; font-weight:medium">ประเภทการแข่งขัน</span></label>				
							<div class="col-lg-12">
								<select class="form-control" name="rtype" id="rtype" style="font-size:14px" required>
									<option value="" selected>เลือกประเภทการแข่งขัน</option>
									<option <?php if ($rtype == '18M') echo 'selected'; ?> value="18M">รุ่นอายุไม่เกิน 18 ปีชาย</option>
									<option <?php if ($rtype == '18W') echo 'selected'; ?> value="18W">รุ่นอายุไม่เกิน 18 ปีหญิง</option>
									<option <?php if ($rtype == '16M') echo 'selected'; ?> value="16M">รุ่นอายุไม่เกิน 16 ปีชาย</option>
									<option <?php if ($rtype == '16W') echo 'selected'; ?> value="16W">รุ่นอายุไม่เกิน 16 ปีหญิง</option>
									<option <?php if ($rtype == '14M') echo 'selected'; ?> value="14M">รุ่นอายุไม่เกิน 14 ปีชาย</option>
									<option <?php if ($rtype == '14W') echo 'selected'; ?> value="14W">รุ่นอายุไม่เกิน 14 ปีหญิง</option>
								</select>
							</div>
						</div>						
						<div class="form-group" style="padding-top: 10px">
							<label for="inputteam" class="col-lg-12 control-label"><span style="color:#2e3192; font-size:14px; font-weight:medium">ชื่อทีม : สถาบัน/โรงเรียน/ชมรม/กลุ่ม
							<i>(ห้ามใช้คำหยาบ ห้ามใช้คำที่เข้าข่ายหมิ่นประมาทในการตั้งชื่อทีม)</i></span></label>
							<div class="col-lg-12">
						      	<input type="text" class="form-control" name="team_name" id="team_name" style="font-size: 14px" placeholder="กรุณาระบุชื่อทีม" value="<?php echo $team_name?>" required>
						    </div>
						</div>
						<div class="row" style="padding-top: 10px">
							<label for="rtype" class="col-lg-12 control-label"><span style="color:#2e3192; font-size:14px; font-weight:medium">ผู้ควบคุมทีม</span></label>	
							<div class="col-lg-6"  style="padding-top: 2px;">
								<div class="form-group">
									<input type="text" class="form-control" name="co_name" id="co_name" placeholder="ชื่อ-นามสกุล" value="<?php echo $co_name?>" style="font-size: 14px" required>		    																							
								</div>										
							</div>
							<div class="col-lg-6"  style="padding-top: 2px;">
								<div class="form-group">
									<input type="text" class="form-control" name="co_email" id="co_email" placeholder="email ที่ติดต่อได้" value="<?php echo $co_email?>" style="font-size: 14px" required>																						
								</div>										
							</div>										
						</div>	
						<div class="row">	
							<div class="col-lg-6"  style="padding-top: 2px;">
								<div class="form-group">
									<input type="text" class="form-control" name="co_mobile" id="co_mobile" placeholder="เบอร์โทรศัพท์มือถือ" value="<?php echo $co_mobile?>" style="font-size: 14px" required>		    																							
								</div>										
							</div>
							<div class="col-lg-6"  style="padding-top: 2px;">
								<div class="form-group">
									<input type="text" class="form-control" name="co_lineid" id="co_lineid" placeholder="Line ID." value="<?php echo $co_lineid?>" style="font-size: 14px">																						
								</div>										
							</div>										
						</div>
						<div class="row" style="padding-top: 10px">
							<label for="rtype" class="col-lg-12 control-label"><span style="color:#2e3192; font-size:14px; font-weight:medium">หลักฐานการชำระเงินค่าสมัคร</span></label>	
							<div class="col-lg-6"  style="padding-top: 2px;">
								<div class="form-group">
								    <input type="text" class="form-control" name="team_slip" value="<?php echo $team_slip?>" style="font-size:14px" readonly>	
								</div>
								<a style="font-size:14px; font-weight:700; color:#009999" href="slip_file/<?php echo $team_slip?>" target="_blank"> <span class="glyphicon glyphicon-folder-open"></span>&nbsp;ดูไฟล์แนบ</a>				    						    				    
							</div>						
							<div class="col-lg-6"  style="padding-top: 2px;">
								<div class="form-group">
						    		<input type="file" class="form-control" id="uploadfile" name="uploadfile" value="<?php echo $team_slip?>" style="font-size: 14px">
						    	</div>
						    </div>								    				    
						</div>						
						<div class="row" style="padding-top: 10px;">
							<div class="col-lg-offset-2 col-lg-10">
						      	<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;บันทึก&nbsp;&nbsp;</button>
						      	<input type="hidden" name="teamno" value="<?php echo $team_no;?>">
						    </div>
						</div>
						</form>
						
									
						<div class="accordion" id="faqlist" data-aos="fade-up" data-aos-delay="100" style="padding-top: 20px">
						<span style="color:#2e3192; font-size:14px; font-weight:medium">ข้อมูลผู้สมัครแข่งขัน <i>(ข้อมูล และช่องทางการติดต่อเฉพาะรายบุคคล ห้ามใช้ซ้ำกัน)</i></span>
						
						<?php 
						
							$sql_stu = "select * from `student` where team_no = $team_no order by stu_no";                 
							$dbquery_stu = mysql_query($sql_stu) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
						
						    $num_rows_stu = mysql_num_rows($dbquery_stu);
							$row1 = 0;
							
							while ($row1 < 4){
								$result_stu = mysql_fetch_array($dbquery_stu);
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
								$stu_size = $result_stu["stu_size"];
								
								$j = $row1+1;
						?>
							<form data-toggle="validator" role="form" id="editForm" name="editForm" action="editdata_checkstudent.php" Method="Post" enctype="multipart/form-data">
							<div class="accordion-item">
								<h3 class="accordion-header">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $j;?>">
										ผู้สมัครคนที่ <?php echo $j; ?>
									</button>
								</h3>
								<div id="faq-content-<?php echo $j;?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
									<div class="accordion-body">
										<div class="row">
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="name[]" id="name[]" value="<?php echo $stu_name?>" placeholder="ชื่อ" style="font-size: 14px" required>		    																							
												</div>										
											</div>
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="lastname[]" id="lastname[]" value="<?php echo $stu_lastname?>" placeholder="นามสกุล" style="font-size: 14px" required>			    																						
												</div>										
											</div>										
										</div>	
										<div class="row">
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
														<input type="text" class="form-control" name="email[]" id="email[]" value="<?php echo $stu_email?>" placeholder="email ที่ติดต่อได้" style="font-size: 14px" required>
												</div>									
											</div>
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="mobile[]" id="mobile[]" value="<?php echo $stu_mobile?>" placeholder="เบอร์โทรศัพท์มือถือ" style="font-size: 14px" required>																						
												</div>										
											</div>										
										</div>																					
										<div class="row">
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="facebook[]" id="facebook[]" value="<?php echo $stu_facebook?>" placeholder="Facebook" style="font-size: 14px">
												</div>									
											</div>
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="lineid[]" id="lineid[]" value="<?php echo $stu_lineid?>" placeholder="Line ID." style="font-size: 14px">																						
												</div>										
											</div>										
										</div>	
										<div class="row">
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
														<input type="text" class="form-control" name="idcard[]" id="idcard[]" value="<?php echo $stu_idcard?>" placeholder="เลขประจำตัวประชาชน / Passport No." style="font-size: 14px" required>
												</div>									
											</div>
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="fibaid[]" id="fibaid[]" value="<?php echo $stu_fibaid?>" placeholder="User FIBA3x3" style="font-size: 14px" required>																						
												</div>										
											</div>																					
										</div>
										<div class="row">
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													<input type="text" class="form-control" name="school[]" id="school[]" value="<?php echo $stu_school?>" placeholder="โรงเรียน/สถาบันการศึกษาที่กำลังศึกษา" style="font-size: 14px" required>																						
												</div>										
											</div>
											<div class="col-lg-4"  style="padding-top: 2px;">
												<div class="form-group">											
													<select class="form-control" name="sizeshirt[]" id="sizeshirt[]" style="font-size:14px" required>
														<option>ขนาดเสื้อ</option>
					   									<option <?php if ($stu_size == '2XS') echo 'selected'; ?> value="2XS">2XS</option>
					   									<option <?php if ($stu_size == 'XS') echo 'selected'; ?> value="XS">XS</option>
					   									<option <?php if ($stu_size == 'S') echo 'selected'; ?> value="S">S</option>
														<option <?php if ($stu_size == 'M') echo 'selected'; ?> value="M">M</option>
														<option <?php if ($stu_size == 'L') echo 'selected'; ?> value="L">L</option>
														<option <?php if ($stu_size == 'XL') echo 'selected'; ?> value="XL">XL</option>
														<option <?php if ($stu_size == '2XL') echo 'selected'; ?> value="2XL">2XL</option>
														<option <?php if ($stu_size == '3XL') echo 'selected'; ?> value="3XL">3XL</option>
														<option <?php if ($stu_size == '4XL') echo 'selected'; ?> value="4XL">4XL</option>
														<option <?php if ($stu_size == '5XL') echo 'selected'; ?> value="5XL">5XL</option>
														<option <?php if ($stu_size == '6XL') echo 'selected'; ?> value="6XL">6XL</option>
													</select>	
												</div>								
											</div>											
										</div>
										<div class="row">									
											<div class="col-lg-2"  style="padding-top: 2px;">
												<div class="form-group">
													<select class="form-control" name="bday[]" id="bday[]" style="font-size:14px" required>
														<option>วันเกิด</option>
														<?php
														   for($d=1;$d<=31;$d++){
														?>
					   									<option <?php if ($d == $stu_birthdate) echo 'selected'; ?> value=<?php echo $d;?>><?php echo $d;?></option>
														<?php
														   } // for
														?>
													</select>
												</div>
											</div>
											<div class="col-lg-2"  style="padding-top: 2px;">
												<div class="form-group">											
													<select class="form-control" name="bmonth[]" id="bmonth[]" style="font-size:14px" required>
														<option>เดือนเกิด</option>
					   									<option <?php if ($stu_birthmonth == '01') echo 'selected'; ?> value="01">มกราคม</option>
					   									<option <?php if ($stu_birthmonth == '02') echo 'selected'; ?> value="02">กุมภาพันธ์</option>
					   									<option <?php if ($stu_birthmonth == '03') echo 'selected'; ?> value="03">มีนาคม</option>
														<option <?php if ($stu_birthmonth == '04') echo 'selected'; ?> value="04">เมษายน</option>
														<option <?php if ($stu_birthmonth == '05') echo 'selected'; ?> value="05">พฤษภาคม</option>
														<option <?php if ($stu_birthmonth == '06') echo 'selected'; ?> value="06">มิถุนายน</option>
														<option <?php if ($stu_birthmonth == '07') echo 'selected'; ?> value="07">กรกฎาคม</option>
														<option <?php if ($stu_birthmonth == '08') echo 'selected'; ?> value="08">สิงหาคม</option>
														<option <?php if ($stu_birthmonth == '09') echo 'selected'; ?> value="09">กันยายน</option>
														<option <?php if ($stu_birthmonth == '10') echo 'selected'; ?> value="10">ตุลาคม</option>
														<option <?php if ($stu_birthmonth == '11') echo 'selected'; ?> value="11">พฤศจิกายน</option>
														<option <?php if ($stu_birthmonth == '12') echo 'selected'; ?> value="12">ธันวาคม</option>
													</select>	
												</div>
											</div>
											<div class="col-lg-2" style="padding-top: 2px;">
												<div class="form-group">															
													<select class="form-control" name="byear[]" id="byear[]" style="font-size:14px" required>
														<option value='0'>ปี พ.ศ.</option>
														<?php
														   	for($i=2555;$i>=2548;$i--){
														?>
					   									<option <?php if ($i == $stu_birthyear) echo 'selected'; ?> value=<?php echo $i;?>><?php echo $i;?></option>
														<?php
														   } // for
														?>
													</select>																			    		    
												</div>
											</div>																				
											<div class="col-lg-6"  style="padding-top: 2px;">
												<div class="form-group">
													&nbsp;																						
												</div>										
											</div>											
											<div class="col-lg-6" id="18<?php echo $j ?>" style="padding-top: 2px;">
												<div class="form-group">															
													<span style="color:#2e3192; font-size:14px; font-weight:medium">*ต้องเกิดตั้งแต่วันที่ 1 มกราคม พ.ศ.2548 เป็นต้นไป</span>																			    		    
												</div>
											</div>	
											<div class="col-lg-6" id="16<?php echo $j ?>" style="padding-top: 2px;">
												<div class="form-group">															
													<span style="color:#2e3192; font-size:14px; font-weight:medium">*ต้องเกิดตั้งแต่วันที่ 1 มกราคม พ.ศ.2550 เป็นต้นไป</span>																			    		    
												</div>
											</div>		
											<div class="col-lg-6" id="14<?php echo $j ?>" style="padding-top: 2px;">
												<div class="form-group">															
													<span style="color:#2e3192; font-size:14px; font-weight:medium">*ต้องเกิดตั้งแต่วันที่ 1 มกราคม พ.ศ.2552 เป็นต้นไป</span>																			    		    
												</div>
											</div>		
											<div class="form-group">
												<div class="col-lg-offset-2 col-lg-10">
											      	<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;บันทึกข้อมูลคนที่ <?php echo $j;?>&nbsp;&nbsp;</button>
											      	<input type="hidden" name="stu_no" value="<?php echo $stu_no;?>">
											      	<input type="hidden" name="teamno" value="<?php echo $team_no;?>">
											      	<input type="hidden" name="team_name" value="<?php echo $team_name;?>">
											      	<input type="hidden" name="stadium" value="<?php echo $stadium;?>">	
											      	<input type="hidden" name="rtype" value="<?php echo $rtype;?>">								      	
											    </div>    
											</div>
																																																									
										</div>																																						
									</div>	
								</div>
							</div><!-- # Faq item-->
							</form>
							<?php 
								$row1++;
								} 
							?>
												
						</div>
						<form data-toggle="validator" role="form" id="deleteForm" name="deleteForm" action="deletedata_checkdata.php" Method="Post" enctype="multipart/form-data">						
						<div class="row" style="padding-top: 10px;">
							<div class="col-lg-offset-2 col-lg-10">
						      	<button type="submit" class="btn btn-info btn-sm">&nbsp;&nbsp;ลบข้อมูล&nbsp;&nbsp;</button>
						      	<input type="hidden" name="teamno" value="<?php echo $team_no;?>">
						    </div>
						</div>
						</form>						
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
	<script src="assets/js/bootstrap-filestyle.js"></script>
	
	<script type="text/javascript">	 
		$('#uploadfile').filestyle({
			input : false,
			buttonName : 'btn-primary btn-sm',
			buttonText : '&nbsp;&nbsp;แนบไฟล์หลักฐานการชำระเงิน&nbsp;&nbsp;',
		})		
		 		
	</script>  	
	
    <script type="text/javascript"> 
		$(document).ready(function () {
		    toggleFields(); // call this first so we start out with the correct visibility depending on the selected form values
		    // this will call our toggleFields function every time the selection value of our other field changes
		    $("#rtype").change(function () {
		        toggleFields();
		    });	
		});
		
		function toggleFields() {
		    if ($("#rtype").val() === "") {
			    $("#181").hide();
			    $("#161").hide();
			    $("#141").hide();
			    $("#182").hide();
			    $("#162").hide();
			    $("#142").hide();
			    $("#183").hide();
			    $("#163").hide();
			    $("#143").hide();
			    $("#184").hide();
			    $("#164").hide();
			    $("#144").hide();
		    }
		    if (($("#rtype").val() === "18M") || ($("#rtype").val() === "18W")) {		    
		        $("#181").show();
		        $("#161").hide();
		        $("#141").hide();
		       	$("#182").show();
		        $("#162").hide();
		        $("#142").hide();
		        $("#183").show();
		        $("#163").hide();
		        $("#143").hide();
		        $("#184").show();
		        $("#164").hide();
		        $("#144").hide();	        
		    }
		    if (($("#rtype").val() === "16M") || ($("#rtype").val() === "16W")) {
		        $("#181").hide();
		        $("#161").show();
		        $("#141").hide();
		        $("#182").hide();
		        $("#162").show();
		        $("#142").hide();
		        $("#183").hide();
		        $("#163").show();
		        $("#143").hide();
		        $("#184").hide();
		        $("#164").show();
		        $("#144").hide();
		    }	
		    if (($("#rtype").val() === "14M") || ($("#rtype").val() === "14W")) {
		        $("#181").hide();
		        $("#161").hide();
		        $("#141").show();
				$("#182").hide();
		        $("#162").hide();
		        $("#142").show();
		        $("#183").hide();
		        $("#163").hide();
		        $("#143").show();
		        $("#184").hide();
		        $("#164").hide();
		        $("#144").show();		        
		    }		    
		    
		}
	</script>	
	
</body>
</html>
<?php
	}
	}
?>