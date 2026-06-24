<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Dashboard</title>

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
}

/* TOP BAR */
.top-bar {
	width: 100%;
	padding: 15px 30px;
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

/* LOGOUT BUTTON */
.logout a {
	background: #ffffff;
	color: #002147;
	padding: 8px 18px;
	border-radius: 10px;
	text-decoration: none;
	font-size: 16px;
	font-weight: bold;
	box-shadow: 0 5px 15px rgba(0,0,0,0.2);
	transition: 0.3s ease;
}

.logout a:hover {
	background: #002147;
	color: #ffffff;
}

/* MAIN CONTAINER */
#Layer1 {
	width: 800px;
	margin: 60px auto;
	background: rgba(255,255,255,0.95);
	padding: 40px 30px;
	border-radius: 12px;
	box-shadow: 0 12px 30px rgba(0,0,0,0.3);
	animation: slideFade 0.8s ease-out;
}

/* TITLE */
.dashboard-title {
	font-size: 28px;
	font-weight: bold;
	color: #002147;
	text-align: center;
	margin-bottom: 35px;
}

/* CARD WRAPPER */
.cards {
	display: flex;
	justify-content: space-between;
	gap: 20px;
	flex-wrap: wrap;
}

/* CARD */
.card {
	flex: 1;
	min-width: 220px;
	background: #ffffff;
	border-radius: 12px;
	padding: 35px 20px;
	text-align: center;
	box-shadow: 0 8px 20px rgba(0,0,0,0.2);
	transition: 0.3s ease;
	cursor: pointer;
}

.card:hover {
	transform: translateY(-6px);
	background: #002147;
}

/* CARD LINK */
.card a {
	text-decoration: none;
	color: #002147;
	font-size: 20px;
	font-weight: bold;
	display: block;
	transition: 0.3s;
}

.card:hover a {
	color: #ffffff;
}

/* ANIMATION */
@keyframes slideFade {
	from {
		opacity: 0;
		transform: translateY(40px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}

/* RESPONSIVE */
@media screen and (max-width: 768px) {
	#Layer1 {
		width: 90%;
	}
	.cards {
		flex-direction: column;
	}
}
.style1 {
	font-size: 18px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #000000;
}
.style2 {
	font-size: 32px;
	font-family: "Arial Black";
}
</style>
</head>

<body>

<!-- TOP RIGHT LOGOUT -->
<div class="top-bar">
  <div class="logout">
    <a href="admin exit.php">LOGOUT</a>
  </div>
</div>

<!-- MAIN DASHBOARD -->
<div id="Layer1">
  <div class="dashboard-title">
    <p class="style2">ADMIN PANEL</p>
    <p class="style1">&nbsp;</p>
  </div>

  <div class="cards">
    <div class="card">
      <a href="siwes_coordinator.php">SIWES COORDINATOR</a>
    </div>

    <div class="card">
      <a href="university_supervisor.php">UNIVERSITY SUPERVISOR</a>
    </div>

  </div>
</div>

</body>
</html>
