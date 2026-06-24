<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>

<?php
$error = "";
$showWeekForm = false;
$showResult = false;

$reg_no = "";
$week_no = "";
$row = null;

/* =========================
   STEP 1: CHECK REG NUMBER
   ========================= */
if (isset($_POST['check_reg'])) {

    $reg_no = mysql_real_escape_string(trim($_POST['reg_no']));

    mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);

    $checkQuery = "SELECT reg_no FROM daily_log WHERE reg_no = '$reg_no' LIMIT 1";
    $checkResult = mysql_query($checkQuery) or die(mysql_error());

    if (mysql_num_rows($checkResult) > 0) {
        $showWeekForm = true;
    } else {
        $error = "? Incorrect Registration Number";
    }
}

/* =========================
   STEP 2: CHECK WEEK & SHOW COMMENT
   ========================= */
if (isset($_POST['check_week'])) {

    $reg_no = mysql_real_escape_string(trim($_POST['reg_no']));

    // VERY IMPORTANT: week_no IS VARCHAR IN DB
    $selectedWeek = mysql_real_escape_string($_POST['week_no']);
    $week_no = "Week " . $selectedWeek;

    mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);

    $query = "
        SELECT 
            siwes_comment,
            uni_comment
        FROM daily_log
        WHERE reg_no = '$reg_no'
        AND week_no = '$week_no'
        LIMIT 1
    ";

    $result = mysql_query($query) or die(mysql_error());

    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_assoc($result);

        if (
            ($row['siwes_comment'] != '' && $row['siwes_comment'] != NULL) ||
            ($row['uni_comment'] != '' && $row['uni_comment'] != NULL)
        ) {
            $showResult = true;
        } else {
            $error = "? No supervisor comment found for this week";
            $showWeekForm = true;
        }
    } else {
        $error = "? No record found for this week";
        $showWeekForm = true;
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="iso-8859-1" />
<title>View Supervisor Comment</title>

<style>
*{
    box-sizing:border-box;
    font-family:"Times New Roman", serif;
}
body{
    background:#99CCCC;
}
.container{
    width:650px;
    margin:50px auto;
    background:#ffffff;
    padding:35px;
    border-radius:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.3);
}
h2{
    text-align:center;
    color:#002147;
    margin-bottom:20px;
}
label{
    font-weight:bold;
    display:block;
    margin-bottom:6px;
}
input, select{
    width:100%;
    padding:10px;
    margin-bottom:15px;
    font-size:15px;
}
button{
    background:#002147;
    color:#ffffff;
    border:none;
    padding:10px 30px;
    font-weight:bold;
    cursor:pointer;
    border-radius:5px;
}
button:hover{
    background:#004080;
}
.error{
    color:red;
    text-align:center;
    font-weight:bold;
    margin-bottom:15px;
}
.result{
    margin-top:25px;
}
.result p{
    margin-bottom:15px;
    font-size:16px;
}
.back{
    margin-bottom:15px;
}
.back a{
    text-decoration:none;
    font-weight:bold;
    color:#002147;
}
.back a:hover{
    text-decoration:underline;
}
</style>
</head>

<body>

<div class="container">

<div class="back">
    <a href="login success.php">&lt; BACK</a>
</div>

<h2>VIEW SUPERVISOR COMMENTS</h2>

<?php if ($error != "") { ?>
    <div class="error"><?php echo $error; ?></div>
<?php } ?>

<!-- =====================
     REG NO FORM
     ===================== -->
<?php if (!$showWeekForm && !$showResult) { ?>
<form method="post">
    <label>Registration Number</label>
    <input type="text" name="reg_no" required placeholder="e.g CST/20/SWE/00000" />
    <button type="submit" name="check_reg">SEARCH</button>
</form>
<?php } ?>

<!-- =====================
     WEEK FORM
     ===================== -->
<?php if ($showWeekForm) { ?>
<form method="post">
    <input type="hidden" name="reg_no" value="<?php echo $reg_no; ?>" />

    <label>Select Week</label>
    <select name="week_no" required>
        <option value="">-- Select Week --</option>
        <?php for ($i = 1; $i <= 24; $i++) { ?>
            <option value="<?php echo $i; ?>">Week <?php echo $i; ?></option>
        <?php } ?>
    </select>

    <button type="submit" name="check_week">VIEW COMMENT</button>
</form>
<?php } ?>

<!-- =====================
     RESULT DISPLAY
     ===================== -->
<?php if ($showResult) { ?>
<div class="result">

    <p><strong>SIWES Coordinator Comment:</strong><br/>
    <?php echo ($row['siwes_comment']) ? $row['siwes_comment'] : "No comment"; ?></p>

    <p><strong>University Supervisor Comment:</strong><br/>
    <?php echo ($row['uni_comment']) ? $row['uni_comment'] : "No comment"; ?></p>


</div>
<?php } ?>

</div>

</body>
</html>
