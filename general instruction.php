<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>General Instruction</title>

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
	width: 700px;
	left: 50%;
	top: 40px;
	transform: translateX(-50%);
	background: rgba(255,255,255,0.95);
	padding: 35px 30px;
	border-radius: 10px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.3);
	animation: slideFade 0.9s ease-out;
}

/* TITLE */
.style2 {
	font-size: 26px;
	font-weight: bold;
	color: #002147;
	text-align: center;
	margin-bottom: 20px;
}

/* INSTRUCTION TEXT */
.style1 {
	font-size: 17px;
	line-height: 1.7;
	color: #333;
	margin-bottom: 12px;
}

.style1 p {
	margin-left: 15px;
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

/* RESPONSIVE */
@media screen and (max-width: 768px) {
	#Layer1 {
		width: 90%;
		top: 30px;
		padding: 25px 20px;
	}
}
</style>
</head>

<body>

<div id="Layer2">
  <a href="login success.php">&lt; BACK</a>
</div>

<div id="Layer1">
  <div class="style2">GENERAL INSTRUCTION</div>

  <div class="style1">
    <p>1. The Log Book is to be used by the student to keep a daily record of the training activities while on attachment.</p>
  </div>

  <div class="style1">
    <p>2. Each day, the time of arrival at and departure from work must be recorded.</p>
  </div>

  <div class="style1">
    <p>3. The daily work carried out should be recorded clearly with sketches and diagrams where applicable.</p>
  </div>

  <div class="style1">
    <p>4. The student should clearly show in the log book the department and section where the training is carried out.</p>
  </div>

  <div class="style1">
    <p>5. The institution-based supervisor will check the log book at regular intervals to ensure proper training is being received and will record comments accordingly.</p>
  </div>

  <div class="style1">
    <p>6. The ITF may use the last page of the log book for its official purpose.</p>
  </div>
</div>

</body>
</html>
