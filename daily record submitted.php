<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Daily Record Submitted</title>

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
	display: flex;
	align-items: center;
	justify-content: center;
}

/* MAIN CARD */
#Layer1 {
	width: 650px;
	background: rgba(255,255,255,0.95);
	padding: 40px 30px;
	border-radius: 12px;
	box-shadow: 0 12px 30px rgba(0,0,0,0.3);
	text-align: center;
	animation: popFade 0.8s ease;
}

/* TEXT */
.success-title {
	font-size: 26px;
	font-weight: bold;
	color: #002147;
	margin-bottom: 10px;
}

.success-sub {
	font-size: 22px;
	font-weight: bold;
	color: #006666;
	margin-bottom: 30px;
}

/* BUTTON AREA */
.btn-area {
	display: flex;
	justify-content: space-around;
	flex-wrap: wrap;
	gap: 20px;
}

/* BUTTON LINKS */
.btn-area a {
	display: inline-block;
	padding: 12px 30px;
	background: #002147;
	color: #ffffff;
	text-decoration: none;
	font-size: 18px;
	font-weight: bold;
	border-radius: 30px;
	box-shadow: 0 6px 15px rgba(0,0,0,0.25);
	transition: 0.3s ease;
}

/* HOVER EFFECT */
.btn-area a:hover {
	background: #004080;
	transform: translateY(-4px) scale(1.05);
}

/* ANIMATION */
@keyframes popFade {
	from {
		opacity: 0;
		transform: scale(0.9);
	}
	to {
		opacity: 1;
		transform: scale(1);
	}
}

/* RESPONSIVE */
@media screen and (max-width: 768px) {
	#Layer1 {
		width: 90%;
	}
	.btn-area {
		flex-direction: column;
	}
}
</style>
</head>

<body>

<div id="Layer1">
  <div class="success-title">YOUR RECORD HAS BEEN</div>
  <div class="success-sub">SUCCESSFULLY SUBMITTED!</div>

  <div class="btn-area">
    <a href="daily log.php">? ADD NEW RECORD</a>
    <a href="student.php">?? EXIT</a>
  </div>
</div>

</body>
</html>
