<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>login failed</title>

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
	width: 430px;
	left: 50%;
	top: 150px;
	transform: translateX(-50%);
	background: rgba(255,255,255,0.95);
	padding: 40px 20px;
	border-radius: 10px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.3);
	text-align: center;

	animation: slideFade 0.9s ease-out;
}

/* ERROR TITLE */
.style1 {
	color: #cc0000;
	font-weight: bold;
	font-size: 26px;
	margin-bottom: 20px;
}

/* MESSAGE */
.style2 {
	font-size: 16px;
	margin-bottom: 25px;
	color: #333;
}

/* LOGIN AGAIN BUTTON */
a.retry {
	display: inline-block;
	background-color: #002147;
	color: #ffffff;
	padding: 10px 30px;
	border-radius: 6px;
	text-decoration: none;
	font-size: 16px;
	font-weight: bold;
	transition: 0.3s ease;
}

a.retry:hover {
	background-color: #004080;
	transform: translateY(-2px);
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
		top: 120px;
	}
}
</style>
</head>

<body>

<div id="Layer1">
  <div class="style1">LOGIN FAILED!</div>

  <div class="style2">
    Invalid username or password.<br />
    Please try again.
  </div>

  <a href="student.php" class="retry">LOGIN AGAIN</a>
</div>

</body>
</html>
