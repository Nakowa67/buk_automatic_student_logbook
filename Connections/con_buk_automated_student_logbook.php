<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_con_buk_automated_student_logbook = "localhost";
$database_con_buk_automated_student_logbook = "buk_automatic_student_logbook";
$username_con_buk_automated_student_logbook = "root";
$password_con_buk_automated_student_logbook = "";
$con_buk_automated_student_logbook = mysql_pconnect($hostname_con_buk_automated_student_logbook, $username_con_buk_automated_student_logbook, $password_con_buk_automated_student_logbook) or trigger_error(mysql_error(),E_USER_ERROR); 
?>