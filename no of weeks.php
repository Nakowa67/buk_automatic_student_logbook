<?php
// optional: get reg_no if needed later
$reg_no = isset($_GET['reg_no']) ? $_GET['reg_no'] : "";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Number of Weeks</title>

<style>
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: "Times New Roman", serif;
}

body {
	background-color: #99CCCC;
	min-height: 100vh;
}

/* BACK BUTTON */
#back {
	position: absolute;
	top: 20px;
	left: 20px;
}

#back a {
	background: #ffffff;
	color: #002147;
	padding: 8px 14px;
	border-radius: 10px;
	text-decoration: none;
	font-weight: bold;
	box-shadow: 0 5px 15px rgba(0,0,0,0.2);
	transition: 0.3s;
}

#back a:hover {
	background: #002147;
	color: #ffffff;
}

/* CONTAINER */
#container {
	width: 500px;
	margin: 90px auto;
	background: #ffffff;
	padding: 30px;
	border-radius: 10px;
	box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

/* TITLE */
.title {
	text-align: center;
	font-size: 24px;
	font-weight: bold;
	color: #002147;
	margin-bottom: 20px;
}

/* WEEK LINKS */
.week-list a {
	display: block;
	padding: 10px 15px;
	margin-bottom: 7px;
	background: #f2f2f2;
	color: #002147;
	text-decoration: none;
	font-weight: bold;
	border-radius: 6px;
	transition: 0.3s ease;
}

.week-list a:hover {
	background: #002147;
	color: #ffffff;
	transform: translateX(5px);
}
</style>
</head>

<body>

<div id="back">
  <a href="login success.php">&lt; BACK</a>
</div>

<div id="container">
  <div class="title">NUMBER OF WEEKS</div>

  <div class="week-list">
    <?php for ($week = 1; $week <= 24; $week++) { ?>
      <a href="daily log.php?week=<?php echo $week; ?>">
        WEEK <?php echo $week; ?>
      </a>
    <?php } ?>
  </div>
</div>

</body>
</html>
