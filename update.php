<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf(
    "UPDATE create_account SET name=%s, email=%s, username=%s, password=%s WHERE reg_no=%s",
    GetSQLValueString($_POST['name'], "text"),
    GetSQLValueString($_POST['email'], "text"),
    GetSQLValueString($_POST['username'], "text"),
    GetSQLValueString($_POST['password'], "text"),
    GetSQLValueString($_POST['reg_no'], "text")
  );

  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  mysql_query($updateSQL, $con_buk_automated_student_logbook) or die(mysql_error());

  header("Location: manage student account.php");
}

$colname_Recordset1 = "-1";
if (isset($_GET['reg_no'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['reg_no'] : addslashes($_GET['reg_no']);
}
mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
$query_Recordset1 = sprintf("SELECT * FROM create_account WHERE reg_no='%s'", $colname_Recordset1);
$Recordset1 = mysql_query($query_Recordset1, $con_buk_automated_student_logbook) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Account</title>

<style>
*{
	margin:0;
	padding:0;
	box-sizing:border-box;
	font-family:"Times New Roman", serif;
}

body{
	background:#99CCCC;
	min-height:100vh;
}

/* BACK BUTTON */
.back-btn{
	position:fixed;
	top:20px;
	left:20px;
	z-index:10;
}
.back-btn a{
	background:#fff;
	color:#002147;
	padding:8px 16px;
	border-radius:10px;
	text-decoration:none;
	font-weight:bold;
	box-shadow:0 5px 15px rgba(0,0,0,0.3);
	transition:0.3s;
}
.back-btn a:hover{
	background:#002147;
	color:#fff;
	transform:translateX(-4px);
}

/* FORM CARD */
.card{
	width:420px;
	margin:100px auto;
	background:#fff;
	padding:30px;
	border-radius:14px;
	box-shadow:0 15px 35px rgba(0,0,0,0.35);
	animation:slideFade 0.8s ease;
}

.card h2{
	text-align:center;
	color:#002147;
	margin-bottom:25px;
}

/* FORM */
table{
	width:100%;
}

td{
	padding:8px;
	font-size:15px;
}

input[type=text]{
	width:100%;
	padding:8px;
	border:1px solid #ccc;
	border-radius:6px;
}

input[type=submit]{
	width:100%;
	padding:10px;
	border:none;
	background:#002147;
	color:#fff;
	font-weight:bold;
	border-radius:8px;
	cursor:pointer;
	transition:0.3s;
}

input[type=submit]:hover{
	background:#004080;
}

/* ANIMATION */
@keyframes slideFade{
	from{
		opacity:0;
		transform:translateY(30px);
	}
	to{
		opacity:1;
		transform:translateY(0);
	}
}
</style>
</head>

<body>

<div class="back-btn">
	<a href="manage student account.php">&lt; BACK</a>
</div>

<div class="card">
	<h2>UPDATE ACCOUNT</h2>

	<form method="post" name="form2" action="<?php echo $editFormAction; ?>">
	<table>
		<tr>
			<td align="right">Name:</td>
			<td><input type="text" name="name" value="<?php echo $row_Recordset1['name']; ?>"></td>
		</tr>
		<tr>
			<td align="right">Reg No:</td>
			<td><strong><?php echo $row_Recordset1['reg_no']; ?></strong></td>
		</tr>
		<tr>
			<td align="right">Email:</td>
			<td><input type="text" name="email" value="<?php echo $row_Recordset1['email']; ?>"></td>
		</tr>
		<tr>
			<td align="right">Username:</td>
			<td><input type="text" name="username" value="<?php echo $row_Recordset1['username']; ?>"></td>
		</tr>
		<tr>
			<td align="right">Password:</td>
			<td><input type="text" name="password" value="<?php echo $row_Recordset1['password']; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Update Account"></td>
		</tr>
	</table>

	<input type="hidden" name="MM_update" value="form2">
	<input type="hidden" name="reg_no" value="<?php echo $row_Recordset1['reg_no']; ?>">
	</form>
</div>

</body>
</html>

<?php mysql_free_result($Recordset1); ?>
