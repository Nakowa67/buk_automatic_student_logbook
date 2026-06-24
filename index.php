<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SIWES Logbook</title>

<style type="text/css">
/* RESET */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* BODY */
body {
	font-family: "Times New Roman", serif;
	background: url('image/background.jpg') no-repeat center center fixed;
	background-size: cover;
	background-color: #99CCCC;
}

/* ================= NAVBAR ================= */
nav {
    background: #6699CC; /* BUK dark blue gradient */
    box-shadow: 0 6px 15px rgba(0,0,0,0.35);
    position: sticky;
    top: 0;
    z-index: 100;
}

.nav-container {
    max-width: 1200px;
    margin: auto;
    height: 110px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 25px; /* spacing between links */
}

.nav-container a {
    color: #0000CC;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    padding: 14px 28px;
    border-radius: 12px;
    transition: all 0.3s ease;
    position: relative;
}

/* Underline animation */
.nav-container a::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 3px;
    background: #40E0D0; /* Turquoise underline */
    left: 0;
    bottom: 0;
    transition: 0.3s ease;
}

.nav-container a:hover::after {
    width: 100%;
}

.nav-container a:hover {
    background-color: rgba(255,255,255,0.15);
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

/* Active link */
.nav-container a.active {
    background-color: #40E0D0; /* Turquoise highlight for current page */
    color: #002147;
}

/* ================= MAIN CONTAINER ================= */
.container {
    width: 85%;
    max-width: 900px;
    margin: 50px auto;
    background: rgba(173, 216, 230, 0.9); /* Light semi-transparent blue */
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 12px 25px rgba(0,0,0,0.35);
    position: relative;
    z-index: 1;
}

/* HEADER */
.header {
    text-align: center;
}

.header img.logo {
    width: 160px;
    margin-bottom: 15px;
}

.university-name {
    font-size: 34px;
    font-weight: bold;
    color: #0000CC;
}

.office {
    font-size: 20px;
    color: #0033FF;
}

.unit {
    font-size: 24px;
    color: #0033FF;
}

/* IMAGE */
.campus-image {
    text-align: center;
    margin: 25px 0;
}

.campus-image img {
    width: 70%;
    max-width: 450px;
    border: 2px solid #000;
}

/* TITLE */
.scheme {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #0000FF;
    margin: 20px 0;
}

/* SIWES BOX */
.siwes-box {
    background-color: #Turquoise Blue;
    color: #0033FF;
    text-align: center;
    padding: 25px 10px;
    margin-top: 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}

.siwes-box h2 {
    font-size: 36px;
    margin: 0;
}

.siwes-box h3 {
    font-size: 28px;
    margin-top: 10px;
    letter-spacing: 2px;
}

/* FOOTER */
footer {
    margin-top: 50px;
    background-color: #6699CC;
    color: #FFFFFF;
    text-align: center;
    padding: 15px;
    font-size: 16px;
    box-shadow: 0 -4px 10px rgba(0,0,0,0.2);
}
</style>
</head>

<body>

<!-- NAVIGATION -->
<nav>
    <div class="nav-container">
        <a href="index.php" class="active">HOME</a>
        <a href="student.php" class="active">STUDENT</a>
        <a href="contact us.php" class="active">CONTACT US</a>
    </div>
</nav>

<!-- CONTENT -->
<div class="container">

    <div class="header">
        <img src="image/buk logo.png" class="logo" alt="BUK Logo" />

        <div class="university-name">BAYERO UNIVERSITY KANO</div>
        <div class="office">Office of the Vice-Chancellor</div>
        <div class="unit">Directorate of Academic Planning</div>
        <div class="unit">SIWES UNIT</div>
    </div>

    <div class="campus-image">
        <img src="image/gate.jpg" alt="BUK Main Gate" />
    </div>

    <div class="scheme">
        STUDENT INDUSTRIAL WORK EXPERIENCE SCHEME
    </div>

    <div class="siwes-box">
        <h2>(SIWES)</h2>
        <h3>TRAINING LOG BOOK</h3>
    </div>

</div>

<p>
  <!-- FOOTER -->
  <footer>
<div align="center"><strong>&copy; 2026 Bayero University Kano | All Rights Reserved</strong></div>
  </footer>
</p>
<p align="center"><a href="admin login.php">Admin Login</a></p>

</body>
</html>
