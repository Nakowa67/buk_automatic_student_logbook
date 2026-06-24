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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO create_account (name, reg_no, email, username, password) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['reg_no'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  $Result1 = mysql_query($insertSQL, $con_buk_automated_student_logbook) or die(mysql_error());

  $insertGoTo = "account created.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>create account</title>

<style type="text/css">
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
}

/* MAIN FORM CARD */
#Layer1 {
	position: absolute;
	width: 547px;
	z-index: 1;
	left: 50%;
	top: 80px;
	transform: translateX(-50%);
	background: rgba(255, 255, 255, 0.9);
	padding: 35px 25px;
	border-radius: 10px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.3);
	text-align: center;

	animation: slideFade 0.9s ease-out;
}

/* TITLE */
#Layer1 h2 {
	font-size: 22px;
	color: #002147;
	margin-bottom: 20px;
}

/* FORM GROUP */
.form-group {
	margin-bottom: 15px;
}

/* INPUTS */
input[type="text"],
input[type="email"],
input[type="password"] {
	width: 85%;
	padding: 10px;
	border: 1px solid #666;
	border-radius: 5px;
	font-size: 15px;
}

/* SUBMIT BUTTON */
input[type="submit"] {
	margin-top: 15px;
	background-color: #002147;
	color: #ffffff;
	padding: 10px 35px;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	font-weight: bold;
	cursor: pointer;
	transition: 0.3s ease;
}

input[type="submit"]:hover {
	background-color: #004080;
	transform: translateY(-2px);
}

/* BACK LINK */
#Layer2 {
	position: absolute;
	top: 20px;
	left: 20px;
	z-index: 10;
}

#Layer2 a {
	background: #ffffff;
	color: #002147;
	padding: 8px 12px;
	border-radius: 10px;
	text-decoration: none;
	font-weight: bold;
	transition: 0.3s;
	box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

#Layer2 a:hover {
	background: #002147;
	color: #ffffff;
}

/* ANIMATION */
@keyframes slideFade {
	from {
		opacity: 0;
		transform: translate(-50%, 40px);
	}
	to {
		opacity: 1;
		transform: translate(-50%, 0);
	}
}

/* RESPONSIVE */
@media screen and (max-width: 600px) {
	#Layer1 {
		width: 90%;
	}
	input[type="text"],
	input[type="email"],
	input[type="password"] {
		width: 95%;
	}
}
</style>
</head>

<body>

<div id="Layer2">
  <a href="student.php">&lt; BACK</a>
</div>

<div id="Layer1">
  <h2>CREATE ACCOUNT</h2>

  <form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    
    <div class="form-group">
      <input type="text" name="name" id="name" placeholder="NAME" required />
    </div>

    <div class="form-group">
      <input type="text" name="reg_no" id="reg_no" placeholder="REG NO" required />
    </div>

    <div class="form-group">
      <input type="email" name="email" id="email" placeholder="EMAIL" required />
    </div>

    <div class="form-group">
      <input type="text" name="username" id="username" placeholder="USERNAME" required />
    </div>

    <div class="form-group">
      <input type="password" name="password" id="password" placeholder="PASSWORD" required />
    </div>

    <input type="submit" name="Submit" value="CREATE" />
    <input type="hidden" name="MM_insert" value="form1">

  </form>
</div>

</body>
</html>
