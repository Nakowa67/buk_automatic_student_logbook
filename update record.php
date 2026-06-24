<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>

<?php
function GetSQLValueString($theValue, $theType) 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      return ($theValue != "") ? "'" . $theValue . "'" : "NULL";
    case "date":
      return ($theValue != "") ? "'" . $theValue . "'" : "NULL";
  }
  return "NULL";
}

/* ===============================
   UPDATE RECORD (WORKING)
   =============================== */
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {

  $updateSQL = sprintf(
    "UPDATE daily_log SET 
      day=%s,
      date=%s,
      time_in=%s,
      workdone=%s,
      time_out=%s,
      siwes_comment=%s,
      uni_comment=%s
     WHERE reg_no=%s AND week_no=%s",

    GetSQLValueString($_POST['day'], "text"),
    GetSQLValueString($_POST['date'], "date"),
    GetSQLValueString($_POST['time_in'], "text"),
    GetSQLValueString($_POST['workdone'], "text"),
    GetSQLValueString($_POST['time_out'], "text"),
    GetSQLValueString($_POST['siwes_comment'], "text"),
    GetSQLValueString($_POST['uni_comment'], "text"),
    GetSQLValueString($_POST['reg_no'], "text"),
    GetSQLValueString($_POST['week_no'], "text")
  );

  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  mysql_query($updateSQL, $con_buk_automated_student_logbook) or die(mysql_error());

  header("Location: view or commenting student.php");
  exit;
}

/* ===============================
   FETCH RECORD (SAFE)
   =============================== */
$colname_Recordset1 = "-1";
if (isset($_GET['reg_no'])) {
  $colname_Recordset1 = addslashes($_GET['reg_no']);
}

mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
$query_Recordset1 = sprintf(
  "SELECT * FROM daily_log WHERE reg_no='%s' LIMIT 1",
  $colname_Recordset1
);

$Recordset1 = mysql_query($query_Recordset1, $con_buk_automated_student_logbook) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="iso-8859-1" />
<title>Update Student Daily Record</title>

<style>
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:"Times New Roman", serif;
}

body{
  background:#99CCCC;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

/* CARD */
.card{
  width:700px;
  background:#fff;
  padding:30px;
  border-radius:12px;
  box-shadow:0 10px 30px rgba(0,0,0,0.3);
  animation:fadeIn 0.8s ease;
}

.card h2{
  text-align:center;
  color:#002147;
  margin-bottom:25px;
}

/* TABLE */
table{
  width:100%;
}

td{
  padding:10px;
  font-size:15px;
  vertical-align:middle;
}

/* INPUT */
input[type="text"]{
  width:100%;
  padding:8px 10px;
  border:1px solid #777;
  border-radius:5px;
}

/* BUTTON */
input[type="submit"]{
  background:#002147;
  color:#fff;
  border:none;
  padding:12px 35px;
  font-size:16px;
  border-radius:6px;
  cursor:pointer;
  transition:0.3s;
}

input[type="submit"]:hover{
  background:#004080;
  transform:translateY(-2px);
}

/* ANIMATION */
@keyframes fadeIn{
  from{
    opacity:0;
    transform:translateY(40px);
  }
  to{
    opacity:1;
    transform:translateY(0);
  }
}
</style>
</head>

<body>

<div class="card">
<h2>UPDATE STUDENT DAILY RECORD</h2>

<form method="post" name="form2">

<table>
<tr>
  <td><strong>NO OF WEEK:</strong></td>
  <td><input type="text" name="week_no" value="<?php echo $row_Recordset1['week_no']; ?>"></td>
</tr>

<tr>
  <td><strong>REG NO:</strong></td>
  <td><?php echo $row_Recordset1['reg_no']; ?></td>
</tr>

<tr>
  <td>DAY:</td>
  <td><input type="text" name="day" value="<?php echo $row_Recordset1['day']; ?>"></td>
</tr>

<tr>
  <td>DATE:</td>
  <td><input type="text" name="date" value="<?php echo $row_Recordset1['date']; ?>"></td>
</tr>

<tr>
  <td>TIME IN:</td>
  <td><input type="text" name="time_in" value="<?php echo $row_Recordset1['time_in']; ?>"></td>
</tr>

<tr>
  <td>WORK DONE:</td>
  <td><input type="text" name="workdone" value="<?php echo $row_Recordset1['workdone']; ?>"></td>
</tr>

<tr>
  <td>TIME OUT:</td>
  <td><input type="text" name="time_out" value="<?php echo $row_Recordset1['time_out']; ?>"></td>
</tr>

<tr>
  <td>SIWES COORDINATOR COMMENT:</td>
  <td><input type="text" name="siwes_comment" value="<?php echo $row_Recordset1['siwes_comment']; ?>"></td>
</tr>

<tr>
  <td>UNIVERSITY SUPERVISOR COMMENT:</td>
  <td><input type="text" name="uni_comment" value="<?php echo $row_Recordset1['uni_comment']; ?>"></td>
</tr>

<tr>
  <td></td>
  <td><input type="submit" value="UPDATE RECORD"></td>
</tr>
</table>

<input type="hidden" name="MM_update" value="form2">
<input type="hidden" name="reg_no" value="<?php echo $row_Recordset1['reg_no']; ?>">

</form>
</div>

</body>
</html>

<?php mysql_free_result($Recordset1); ?>
