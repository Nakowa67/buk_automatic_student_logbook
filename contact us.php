<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO contact_us (name, email, reg_no, message) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['regno'], "text"),
                       GetSQLValueString($_POST['message'], "text"));

  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  $Result1 = mysql_query($insertSQL, $con_buk_automated_student_logbook) or die(mysql_error());

  $insertGoTo = "contact us.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Contact Us | BUK SIWES</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:"Times New Roman", serif;}

body{background:#99CCCC;}

/* NAVBAR */
nav{background:#6699CC;box-shadow:0 6px 15px rgba(0,0,0,0.3);}
.nav-container{
    height:90px;display:flex;justify-content:center;align-items:center;gap:30px;
}
.nav-container a{
    color:#0000CC;text-decoration:none;font-size:20px;font-weight:bold;
    padding:12px 25px;border-radius:10px;transition:0.3s;
}
.nav-container a:hover,.nav-container a.active{
    background:#40E0D0;color:#002147;
}

/* MAIN */
.container{
    width:90%;max-width:1000px;margin:40px auto;
    background:#fff;padding:40px;border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.35);
}

/* HEADER */
.header{text-align:center;margin-bottom:30px;}
.header img{width:130px;}
.university-name{font-size:32px;font-weight:bold;color:#002147;}
.office,.unit{color:#003399;font-size:18px;}

.section-title{
    font-size:26px;
    color:#002147;
    text-align:center;
    margin:30px 0;
    border-bottom:3px solid #40E0D0;
    padding-bottom:10px;
}

/* CONTACT FORM */
.form-box{
    background:#e6f2ff;padding:25px;border-radius:10px;
}
.form-box input,.form-box textarea{
    width:100%;
    padding:12px;
    margin:10px 0;
    border-radius:6px;
    border:1px solid #aaa;
    font-size:16px;
}
.form-box button{
    background:#002147;color:white;
    border:none;padding:12px 25px;
    font-size:18px;border-radius:8px;
    cursor:pointer;transition:0.3s;
}
.form-box button:hover{background:#40E0D0;color:#002147;}

/* MAP */
.map-box iframe{
    width:100%;
    height:300px;
    border-radius:10px;
    border:2px solid #002147;
}

/* FAQ */
.faq{
    background:#f2f9ff;
    padding:25px;
    border-radius:10px;
}
.faq h4{
    color:#002147;
    margin-top:15px;
}
.faq p{
    font-size:16px;
    line-height:1.6;
}

/* FOOTER */
footer{
    background:#6699CC;
    color:white;
    text-align:center;
    padding:15px;
    margin-top:40px;
}
</style>
</head>

<body>

<!-- NAV -->
<nav>
    <div class="nav-container">
        <a href="index.php">HOME</a>
        <a href="student.php">STUDENT</a>
        <a href="contact us.php" class="active">CONTACT US</a>
    </div>
</nav>

<div class="container">

<!-- HEADER -->
<div class="header">
    <img src="image/buk logo.png" />
    <div class="university-name">BAYERO UNIVERSITY KANO</div>
    <div class="office">Directorate of Academic Planning</div>
    <div class="unit">SIWES Unit</div>
</div>

<!-- CONTACT FORM -->
<div class="section-title">Send Us a Message</div>
<div class="form-box">
<form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
    <input type="text" name="name" placeholder="Your Full Name" required />
    <input type="email" name="email" placeholder="Your Email Address" required />
    <input type="text" name="regno" placeholder="Registration Number" required />
    <textarea name="message" rows="5" placeholder="Type your message here..." required></textarea>
    <button type="submit">Send Message</button>
    <input type="hidden" name="MM_insert" value="form1">
</form>
</div>

<!-- MAP -->
<div class="section-title">Our Location</div>
<div class="map-box">
<iframe src="https://www.google.com/maps?q=Bayero%20University%20Kano&output=embed"></iframe>
</div>

<!-- FAQ -->
<div class="section-title">Help Desk / FAQ</div>
<div class="faq">
    <h4>How do I submit my weekly logbook?</h4>
    <p>Login to the SIWES portal, go to Logbook section and submit your weekly activities.</p>

    <h4>What if my supervisor has not graded me?</h4>
    <p>Please contact the SIWES Unit through this page or visit the office physically.</p>

    <h4>I entered wrong course or week number, what should I do?</h4>
    <p>You can request correction from the SIWES Unit using this contact form.</p>

    <h4>When is the deadline for SIWES submission?</h4>
    <p>Deadlines are communicated by the SIWES Unit via your department.</p>
</div>

</div>

<footer>
&copy; 2026 Bayero University Kano | SIWES Portal
</footer>

</body>
</html>
