<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "admin.php";
  $MM_redirectLoginFailed = "admin fail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  
  $LoginRS__query=sprintf("SELECT username, password FROM admin_login WHERE username='%s' AND password='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $con_buk_automated_student_logbook) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Login</title>

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

/* LOGIN CARD */
#Layer1 {
	position: absolute;
	width: 480px;
	left: 50%;
	top: 120px;
	transform: translateX(-50%);
	background: rgba(255,255,255,0.95);
	padding: 35px 30px;
	border-radius: 12px;
	box-shadow: 0 12px 30px rgba(0,0,0,0.3);
	animation: slideFade 0.8s ease-out;
}

/* TITLE */
.style1 {
	font-size: 26px;
	font-weight: bold;
	color: #002147;
	text-align: center;
	margin-bottom: 20px;
}

/* INPUTS */
input[type="text"],
input[type="password"] {
	width: 90%;
	padding: 12px;
	margin-bottom: 18px;
	border: 1px solid #666;
	border-radius: 6px;
	font-size: 16px;
	text-align: center;
}

/* BUTTON */
input[type="submit"] {
	width: 80%;
	padding: 12px;
	background-color: #002147;
	color: #ffffff;
	border: none;
	border-radius: 30px;
	font-size: 16px;
	font-weight: bold;
	cursor: pointer;
	transition: 0.3s ease;
	box-shadow: 0 6px 15px rgba(0,0,0,0.25);
}

input[type="submit"]:hover {
	background-color: #004080;
	transform: translateY(-3px);
}

/* BACK BUTTON */
#Layer2 {
	position: absolute;
	top: 20px;
	left: 20px;
	z-index: 10;
}

#Layer2 a {
	background: #ffffff;
	color: #002147;
	padding: 8px 14px;
	border-radius: 10px;
	text-decoration: none;
	font-size: 16px;
	font-weight: bold;
	box-shadow: 0 5px 15px rgba(0,0,0,0.2);
	transition: 0.3s ease;
}

#Layer2 a:hover {
	background: #002147;
	color: #ffffff;
	transform: translateX(-3px);
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
		top: 80px;
	}
}
.style2 {
	font-size: 24px;
	font-family: "Bahnschrift Light SemiCondensed";
	color: #000000;
}
.style4 {
	color: #002147;
	text-align: center;
	margin-bottom: 20px;
	font-size: 36px;
	font-weight: bold;
	font-family: "Arial Black";
}
</style>
</head>

<body>

<div id="Layer2">
  <a href="index.php">&lt; BACK</a>
</div>

<div id="Layer1">
<div class="dashboard-title">
  <div align="center"><img src="image/ChatGPT Image Feb 24, 2026, 12_32_48 PM.png" width="82" height="82" /><br />
  </div>
  <div class="style4">ADMIN LOGIN</div>
<p class="style1 style2">buk logbook </p>
  <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
    <div align="center">
      <input name="username" type="text" id="username" placeholder="USERNAME" required />
    </div>

    <div align="center">
      <input name="password" type="password" id="password" placeholder="PASSWORD" required />
    </div>

    <div align="center">
      <input type="submit" name="Submit" value="SIGN IN TO ADMIN PANEL" id="Submit" />
    </div>
  </form>
</div>

</body>
</html>
