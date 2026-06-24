<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
$query_Recordset1 = "SELECT * FROM daily_log";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $con_buk_automated_student_logbook) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="iso-8859-1" />
<title>View / Comment Student</title>

<style>
*{
	margin:0;
	padding:0;
	box-sizing:border-box;
	font-family:"Times New Roman", serif;
}

body{
	background:#99CCCC;
	padding:40px;
}

/* BACK BUTTON */
.back-btn{
	position:fixed;
	top:20px;
	left:20px;
	z-index:100;
}
.back-btn a{
	background:#ffffff;
	color:#002147;
	padding:8px 16px;
	border-radius:10px;
	text-decoration:none;
	font-weight:bold;
	box-shadow:0 5px 15px rgba(0,0,0,0.3);
	transition:0.3s ease;
}
.back-btn a:hover{
	background:#002147;
	color:#ffffff;
	transform:translateX(-4px);
}

/* MAIN CARD */
#Layer1{
	background:#ffffff;
	padding:25px;
	border-radius:10px;
	box-shadow:0 10px 25px rgba(0,0,0,0.25);
	animation:fadeSlide 0.8s ease;
	overflow-x:auto;
}

/* TITLE */
.page-title{
	text-align:center;
	font-size:26px;
	font-weight:bold;
	color:#002147;
	margin-bottom:20px;
}

/* TABLE */
table{
	width:100%;
	border-collapse:collapse;
	font-size:14px;
}

table th{
	background:#002147;
	color:#ffffff;
	padding:10px;
	border:1px solid #333;
	text-align:center;
}

table td{
	padding:8px;
	border:1px solid #999;
	text-align:center;
}

table tr:hover{
	background:#f1f7f7;
}

/* ACTION BUTTON */
.action-link{
	background:#002147;
	color:#ffffff;
	padding:6px 12px;
	border-radius:6px;
	text-decoration:none;
	font-weight:bold;
	display:inline-block;
	transition:0.3s;
}

.action-link:hover{
	background:#004080;
	transform:translateY(-2px);
}

/* ANIMATION */
@keyframes fadeSlide{
	from{
		opacity:0;
		transform:translateY(30px);
	}
	to{
		opacity:1;
		transform:translateY(0);
	}
}

@media screen and (max-width:768px){
	body{
		padding:15px;
	}
}
</style>
</head>

<body>

<!-- BACK LINK -->
<div class="back-btn">
	<a href="admin.php">&lt; BACK</a>
</div>

<div id="Layer1">
  <div class="page-title">VIEW / COMMENT ON STUDENT DAILY LOG</div>

  <table>
    <tr>
	 <th>NO OF WEEKS</th>
      <th>REG NO</th>
      <th>DAY</th>
      <th>DATE</th>
      <th>TIME IN</th>
      <th>WORK DONE</th>
      <th>TIME OUT</th>
      <th>SIWES COMMENT</th>
      <th>UNIVERSITY COMMENT</th>
      <th colspan="2">OPERATION</th>
    </tr>

    <?php do { ?>
    <tr>
	  <td><?php echo $row_Recordset1['week_no']; ?></td>
      <td><?php echo $row_Recordset1['reg_no']; ?></td>
      <td><?php echo $row_Recordset1['day']; ?></td>
      <td><?php echo $row_Recordset1['date']; ?></td>
      <td><?php echo $row_Recordset1['time_in']; ?></td>
      <td><?php echo $row_Recordset1['workdone']; ?></td>
      <td><?php echo $row_Recordset1['time_out']; ?></td>
      <td><?php echo $row_Recordset1['siwes_comment']; ?></td>
      <td><?php echo $row_Recordset1['uni_comment']; ?></td>
      <td>
        <a class="action-link" href="delete record.php?reg_no=<?php echo $row_Recordset1['reg_no']; ?>">DELETE</a>
      </td>
      <td>
        <a class="action-link" href="update record.php?reg_no=<?php echo $row_Recordset1['reg_no']; ?>"update_record.php?reg_no=<?php echo $row['reg_no']; ?>&week_no=<?php echo $row['week_no']; ?>">COMMENT</a>      </td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
  </table>
</div>

</body>
</html>

<?php mysql_free_result($Recordset1); ?>
