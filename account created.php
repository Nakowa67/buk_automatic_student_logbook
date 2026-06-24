<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>account created</title>

<style type="text/css">
/* RESET */
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: "Times New Roman", serif;
}

/* BODY – SAME AS CREATE ACCOUNT */
body {
	background-color: #99CCCC;
	min-height: 100vh;
}

/* MAIN BOX – SAME CARD STYLE + ANIMATION */
#Layer1 {
	position: absolute;
	width: 547px;
	z-index: 1;
	left: 50%;
	top: 100px;
	transform: translateX(-50%);
	background: rgba(255, 255, 255, 0.9);
	padding: 40px 20px;
	border-radius: 10px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.3);
	text-align: center;

	/* SAME ANIMATION */
	animation: slideFade 0.9s ease-out;
}

/* TEXT STYLE */
#Layer1 strong {
	font-size: 22px;
	color: #002147;
}

/* LOGIN LINK – SAME BUTTON STYLE */
#Layer1 a {
	display: inline-block;
	margin-top: 25px;
	padding: 10px 30px;
	background-color: #002147;
	color: #ffffff;
	text-decoration: none;
	font-weight: bold;
	border-radius: 5px;
	transition: 0.3s ease;
	box-shadow: 0 4px 10px rgba(0,0,0,0.3);
}

#Layer1 a:hover {
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
	}
}
</style>
</head>

<body>

<div id="Layer1">
  <p><strong>YOUR ACCOUNT HAS BEEN CREATED</strong></p>
  <p><strong>SUCCESSFULLY</strong></p>

  <p>
    <strong><a href="student.php">LOGIN HERE</a></strong>
  </p>
</div>

</body>
</html>
