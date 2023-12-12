<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=export_3x3.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<body>

<table width="2163" border="1">
	<tr>
		<th width="60"><div align="center"><strong>ลำดับที่</strong></div></th>
		<th width="200"><div align="center"><strong>ชื่อทีม</strong></div></th>
		<th width="100"><div align="center"><strong>รุ่น</strong></div></th>
		<th width="160"><div align="center"><strong>สนาม</strong></div></th>
		<th width="120"><div align="center"><strong>การชำระเงิน</strong></div></th>
		<th width="250"><div align="center"><strong>ผู้จัดการทีม</strong></div></th>
		<th width="400"><div align="center"><strong>นักกีฬา 1</strong></div></th>
		<th width="250"><div align="center"><strong>โรงเรียน</strong></div></th>
		<th width="400"><div align="center"><strong>นักกีฬา 2</strong></div></th>
		<th width="250"><div align="center"><strong>โรงเรียน</strong></div></th>
		<th width="400"><div align="center"><strong>นักกีฬา 3</strong></div></th>
		<th width="250"><div align="center"><strong>โรงเรียน</strong></div></th>
		<th width="400"><div align="center"><strong>นักกีฬา 4</strong></div></th>
		<th width="250"><div align="center"><strong>โรงเรียน</strong></div></th>
	</tr>

	<?php 
		require "dbconnect.php";	
	
		$stadium = $_POST['stadium'];
		$rtype = $_POST['rtype'];	
		
		if ($stadium) { $checkname = "where stadium = '$stadium'"; }
		if ($rtype) { $checkname = "where rtype = '$rtype'"; }
		if (($stadium) and ($rtype)) { $checkname = "where stadium = '$stadium' and rtype = '$rtype'"; }
					
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
			
			if ($team_slip) { $slip = "ชำระแล้ว"; } else { $slip = "ยังไม่ได้ชำระ"; }
	?>	
	<tr>
		<td valign="top"><div align="center"><?php echo $row+1?>.</div></td>
		<td valign="top"><?php echo $team_name?></td>
		<td valign="top"><div align="center"><?php echo $rtype?></div></td>
		<td valign="top"><?php echo $stadium?></td>
		<td valign="top"><div align="center"><?php echo $slip?></div></td>
		<td valign="top"><?php echo $co_name?><br>เบอร์โทร: <?php echo $co_mobile?><br>email: <?php echo $co_email?></td>
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
		<td valign="top"><?php echo $stu_name?>&nbsp;&nbsp;<?php echo $stu_lastname?><br>
						เสื้อ: <?php echo $stu_size?>&nbsp;&nbsp;<?php echo $stu_color?><br>
						FIBA: <?php echo $stu_fibaid?>
		</td>
		<td valign="top"><?php echo $stu_school?></td>
		<?php 
			$row1++;
			} 				
		?>		
	</tr>
<?php
	$row++;
	} 
?>	
</table>

</body>
</html>