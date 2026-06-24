<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>
<?php
mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
$query_Recordset1 = "SELECT * FROM create_account";
$Recordset1 = mysql_query($query_Recordset1, $con_buk_automated_student_logbook) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Manage Student Account</title>

<style>
/* RESET */
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: "Times New Roman", serif;
}

/* BODY */
body {
	background-color: #99CCCC;
	min-height: 100vh;
	padding: 20px;
}

/* BACK BUTTON */
.back-btn {
	position: fixed;
	top: 20px;
	left: 20px;
	z-index: 10;
}

.back-btn a {
	background: #ffffff;
	color: #002147;
	padding: 8px 16px;
	border-radius: 10px;
	text-decoration: none;
	font-size: 16px;
	font-weight: bold;
	box-shadow: 0 5px 15px rgba(0,0,0,0.25);
	transition: 0.3s ease;
}

.back-btn a:hover {
	background: #002147;
	color: #ffffff;
	transform: translateX(-4px);
}

/* MAIN CONTAINER */
.container {
	max-width: 1200px;
	margin: 80px auto;
	background: #ffffff;
	padding: 30px;
	border-radius: 14px;
	box-shadow: 0 12px 30px rgba(0,0,0,0.3);
	animation: fadeSlide 0.8s ease;
}

/* TITLE */
.title {
	text-align: center;
	font-size: 26px;
	font-weight: bold;
	color: #002147;
	margin-bottom: 25px;
}

/* TABLE */
table {
	width: 100%;
	border-collapse: collapse;
}

table th,
table td {
	border: 1px solid #ccc;
	padding: 10px;
	text-align: center;
	font-size: 15px;
}

table th {
	background: #002147;
	color: #ffffff;
}

table tr:nth-child(even) {
	background: #f2f2f2;
}

/* ACTION LINKS */
.action a {
	text-decoration: none;
	padding: 5px 10px;
	border-radius: 6px;
	font-weight: bold;
	color: #ffffff;
	transition: 0.3s ease;
}

.delete {
	background: #cc0000;
}

.update {
	background: #0066cc;
}

.action a:hover {
	opacity: 0.8;
}

/* ANIMATION */
@keyframes fadeSlide {
	from {
		opacity: 0;
		transform: translateY(30px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}

/* RESPONSIVE */
@media screen and (max-width: 768px) {
	table {
		font-size: 13px;
	}
}
</style>
</head>

<body>

<!-- BACK BUTTON -->
<div class="back-btn">
	<a href="university_supervisor.php">&lt; BACK</a>
</div>

<!-- MAIN CONTENT -->
<div class="container">
	<div class="title">MANAGE STUDENT ACCOUNT</div>

	<table>
		<tr>
			<th>NAME</th>
			<th>REG NO</th>
			<th>EMAIL</th>
			<th>USERNAME</th>
			<th>PASSWORD</th>
			<th colspan="2">OPERATION</th>
		</tr>

		<?php do { ?>
		<tr>
			<td><?php echo $row_Recordset1['name']; ?></td>
			<td><?php echo $row_Recordset1['reg_no']; ?></td>
			<td><?php echo $row_Recordset1['email']; ?></td>
			<td><?php echo $row_Recordset1['username']; ?></td>
			<td><?php echo $row_Recordset1['password']; ?></td>
			<td class="action">
				<a class="delete" href="delete.php?reg_no=<?php echo $row_Recordset1['reg_no']; ?>">DELETE</a>
			</td>
			<td class="action">
				<a class="update" href="update.php?reg_no=<?php echo $row_Recordset1['reg_no']; ?>">UPDATE</a>
			</td>
		</tr>
		<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
	</table>
</div>

</body>
</html>

<?php mysql_free_result($Recordset1); ?>
