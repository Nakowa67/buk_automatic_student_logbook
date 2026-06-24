<?php
// initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) && ($_GET['doLogout']=="true")){
  // clear session variables
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "student.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>exit</title>

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

/* MAIN CARD */
#Layer1 {
	position: absolute;
	width: 560px;
	z-index: 1;
	left: 50%;
	top: 150px;
	transform: translateX(-50%);
	background: rgba(255,255,255,0.9);
	padding: 40px 20px;
	border-radius: 10px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.3);
	text-align: center;

	animation: slideFade 0.9s ease-out;
}

/* TITLE */
.style1 {
	font-size: 26px;
	font-weight: bold;
	color: #002147;
	margin-bottom: 25px;
}

/* BUTTON LINKS */
.style3 a {
	display: inline-block;
	padding: 10px 28px;
	background-color: #002147;
	color: #ffffff;
	text-decoration: none;
	font-weight: bold;
	border-radius: 5px;
	transition: 0.3s ease;
	box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

/* YES BUTTON (LOGOUT) */
.style3 a:hover {
	background-color: #004080;
	transform: translateY(-2px);
}

/* NO BUTTON (CANCEL) */
.style3 a[href*="login success"] {
	background-color: #8B0000;
}

.style3 a[href*="login success"]:hover {
	background-color: #B22222;
}

/* TABLE */
table {
	width: 100%;
	border-collapse: collapse;
}

table td {
	padding: 15px;
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
}
</style>
</head>

<body>

<div id="Layer1">
  <table>
    <tr>
      <td colspan="2" class="style1">
        ARE YOU SURE YOU WANT TO LOGOUT?
      </td>
    </tr>
    <tr>
      <td class="style3">
        <a href="<?php echo $logoutAction ?>">YES</a>
      </td>
      <td class="style3">
        <a href="login success.php">NO</a>
      </td>
    </tr>
  </table>
</div>

</body>
</html>
