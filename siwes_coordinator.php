<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SIWES Coordinator</title>

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
	width: 600px;
	left: 50%;
	top: 100px;
	transform: translateX(-50%);
	background: rgba(255,255,255,0.95);
	padding: 40px 30px;
	border-radius: 12px;
	box-shadow: 0 12px 30px rgba(0,0,0,0.3);
	animation: slideFade 0.8s ease-out;
	text-align: center;
}

/* TITLE */
.page-title {
	font-size: 28px;
	font-weight: bold;
	color: #002147;
	margin-bottom: 30px;
}

/* ACTION CARD */
.action-card {
	background: #ffffff;
	padding: 30px 20px;
	border-radius: 12px;
	box-shadow: 0 8px 20px rgba(0,0,0,0.2);
	transition: 0.3s ease;
}

.action-card:hover {
	background: #002147;
	transform: translateY(-6px);
}

/* LINK */
.action-card a {
	text-decoration: none;
	font-size: 20px;
	font-weight: bold;
	color: #002147;
	display: block;
	transition: 0.3s;
}

.action-card:hover a {
	color: #ffffff;
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
@media screen and (max-width: 768px) {
	#Layer1 {
		width: 90%;
		top: 80px;
	}
}
.style1 {font-size: 28px; font-weight: bold; color: #002147; margin-bottom: 30px; font-family: "Arial Black"; }
</style>
</head>

<body>

<div id="Layer2">
  <a href="admin.php">&lt; BACK</a>
</div>

<div id="Layer1">
  <div class="style1">SIWES COORDINATOR</div>

  <div class="action-card">
    <a href="view or commenting student.php">
      VIEW / COMMENT ON STUDENTS RECORD
    </a>
  </div>
</div>

</body>
</html>
