<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?> 
<?php
// Optional: define admin status
$isAdmin = isset($isAdmin) ? $isAdmin : false;

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
  $insertSQL = sprintf("INSERT INTO daily_log (week_no, reg_no, `day`, `date`, time_in, workdone, time_out, siwes_comment, uni_comment) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['week_no'], "text"),
                       GetSQLValueString($_POST['reg_no'], "text"),
                       GetSQLValueString($_POST['day'], "text"),
                       GetSQLValueString($_POST['date'], "date"),
                       GetSQLValueString($_POST['time_in'], "date"),
                       GetSQLValueString($_POST['workdone'], "text"),
                       GetSQLValueString($_POST['time_out'], "date"),
                       GetSQLValueString($_POST['siwes_comment'], "text"),
                       GetSQLValueString($_POST['uni_comment'], "text"));

  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  $Result1 = mysql_query($insertSQL, $con_buk_automated_student_logbook) or die(mysql_error());

  $insertGoTo = "daily record submitted.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf(
    "INSERT INTO daily_log (reg_no, `day`, `date`, time_in, workdone, time_out, siwes_coordinator_comment, university_supervisor_comment, itf_supervisor_comment, week_no) 
     VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
    GetSQLValueString($_POST['reg_no'], "text"),
    GetSQLValueString($_POST['day'], "text"),
    GetSQLValueString($_POST['date'], "date"),
    GetSQLValueString($_POST['time_in'], "text"),
    GetSQLValueString($_POST['workdone'], "text"),
    GetSQLValueString($_POST['time_out'], "text"),
    GetSQLValueString($_POST['siwes_comment'], "text"),
    GetSQLValueString($_POST['uni_comment'], "text"),
    GetSQLValueString($_POST['itf_comment'], "text"),
    GetSQLValueString($_POST['week_no'], "text")
  );

  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  $Result1 = mysql_query($insertSQL, $con_buk_automated_student_logbook) or die(mysql_error());

  $insertGoTo = "daily record submitted.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  exit;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="iso-8859-1" />
<title>Daily Log</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:"Times New Roman",serif;}
body{background:#99CCCC;min-height:100vh;}

#Layer1{
	width:700px;
	margin:60px auto;
	background:#fff;
	padding:35px;
	border-radius:10px;
	box-shadow:0 10px 25px rgba(0,0,0,0.3);
}

.title{
	text-align:center;
	font-size:26px;
	font-weight:bold;
	color:#002147;
	margin-bottom:25px;
}

.form-row{margin-bottom:15px;}
label{font-weight:bold;color:#002147;display:block;margin-bottom:6px;}

input, select, textarea{
	width:100%;
	padding:10px;
	border:1px solid #666;
	border-radius:5px;
	font-size:15px;
}

textarea{min-height:80px;}

input[type=submit]{
	background:#002147;
	color:#fff;
	padding:10px 35px;
	border:none;
	font-size:16px;
	font-weight:bold;
	cursor:pointer;
}

input[type=submit]:hover{background:#004080;}

#back{
	position:absolute;
	top:20px;
	left:20px;
}

#back a{
	background:#fff;
	color:#002147;
	padding:8px 14px;
	border-radius:8px;
	text-decoration:none;
	font-weight:bold;
}
</style>
</head>

<body>

<div id="back">
  <a href="no of weeks.php">&lt; BACK</a>
</div>

<div id="Layer1">
  <div class="title">DAILY RECORD</div>

  <form action="<?php echo $editFormAction; ?>" name="form1" method="POST">

    <!-- WEEK DROPDOWN -->
    <div class="form-row">
      <label>NO OF WEEK:</label>
      <select name="week_no" required>
        <option value="">-- Select Week --</option>
        <?php for($i=1;$i<=24;$i++){ ?>
          <option value="Week <?php echo $i; ?>">Week <?php echo $i; ?></option>
        <?php } ?>
      </select>
    </div>

    <div class="form-row">
      <label>REG NO:</label>
      <input type="text" name="reg_no" required />
    </div>

    <div class="form-row">
      <label>DAY:</label>
      <select name="day" required>
        <option value="">-- Select --</option>
        <option>Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option>Thursday</option>
        <option>Friday</option>
        <option>Saturday</option>
      </select>
    </div>

    <div class="form-row">
      <label>DATE:</label>
      <input type="date" name="date" required />
    </div>

    <div class="form-row">
      <label>TIME IN:</label>
      <input type="time" name="time_in" required />
    </div>

    <div class="form-row">
      <label>DESCRIPTION OF WORK DONE:</label>
      <textarea name="workdone" required></textarea>
    </div>

    <div class="form-row">
      <label>TIME OUT:</label>
      <input type="time" name="time_out" required />
    </div>

    <!-- COMMENTS -->
    <div class="form-row">
      <label>SIWES COORDINATOR COMMENT:</label>
      <select name="siwes_comment" <?php if(!$isAdmin) echo "disabled"; ?>>
        <option value="">COMMENT HERE</option>
        <option>Approved</option>
        <option>Not Approved</option>
        <option>Needs Correction</option>
      </select>
    </div>

    <div class="form-row">
      <label>UNIVERSITY SUPERVISOR COMMENT:</label>
      <select name="uni_comment" <?php if(!$isAdmin) echo "disabled"; ?>>
        <option value="">COMMENT HERE</option>
        <option>Excellent</option>
        <option>Good</option>
        <option>Poor</option>
      </select>
    </div>

    <div align="center">
      <input type="submit" value="SUBMIT" />
    </div>

    <input type="hidden" name="MM_insert" value="form1" />
  </form>
</div>

</body>
</html>
