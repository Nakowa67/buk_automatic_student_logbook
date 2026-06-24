<?php require_once('Connections/con_buk_automated_student_logbook.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "email";
  $MM_redirectLoginSuccess = "login success.php";
  $MM_redirectLoginFailed = "login fail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_con_buk_automated_student_logbook, $con_buk_automated_student_logbook);
  	
  $LoginRS__query=sprintf("SELECT username, password, email FROM create_account WHERE username='%s' AND password='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $con_buk_automated_student_logbook) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'email');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Login</title>
<style>
/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color: #99CCCC; /* Page background color */
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: hidden;
    position: relative;
}

/* Floating shapes */
.shape {
    position: absolute;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    animation: float 12s linear infinite;
}

@keyframes float {
    0% { transform: translateY(0) translateX(0); opacity: 1; }
    50% { transform: translateY(-200px) translateX(50px); opacity: 0.5; }
    100% { transform: translateY(0) translateX(0); opacity: 1; }
}

/* Pulsing gradient login card */
#Layer1 {
    background: linear-gradient(135deg, #ffffff, #cce6e6);
    color: #002147;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    padding: 50px 30px;
    width: 100%;
    max-width: 400px;
    text-align: center;
    position: relative;
    z-index: 10;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: pulse 6s ease-in-out infinite alternate;
}

@keyframes pulse {
    0% { background: linear-gradient(135deg, #ffffff, #cce6e6); }
    50% { background: linear-gradient(135deg, #e6f7f7, #b3d9d9); }
    100% { background: linear-gradient(135deg, #ffffff, #cce6e6); }
}

#Layer1:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.4);
}

h1 {
    font-size: 26px;
    margin-bottom: 15px;
    color: #002147;
    text-transform: uppercase;
    letter-spacing: 1px;
}

p {
    margin-bottom: 20px;
    font-size: 16px;
}

input[type="text"], input[type="password"], input[type="username"] {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 16px;
    transition: 0.3s;
}

input[type="text"]:focus, input[type="password"]:focus, input[type="username"]:focus {
    border-color: #002147;
    outline: none;
    box-shadow: 0 0 8px #002147;
}

input[type="submit"] {
    background-color: #002147;
    color: #ffffff;
    padding: 12px 25px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    transition: 0.3s;
    margin-top: 10px;
}

input[type="submit"]:hover {
    background-color: #004080;
}

a {
    text-decoration: none;
    color: #002147;
    font-weight: bold;
    transition: 0.3s;
}

a:hover {
    color: #004080;
}

.footer-text {
    margin-top: 20px;
    font-size: 14px;
}

/* Back link */
#Layer2 {
	position: absolute;
	top: 20px;
	left: 20px;
	font-size: 16px;
	z-index: 10;
	height: 1px;
}

#Layer2 a {
    background: #ffffff;
    color: #002147;
    padding: 8px 12px;
    border-radius: 10px;
    text-decoration: none;
    transition: 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

#Layer2 a:hover {
    background: #002147;
    color: #ffffff;
}

/* Responsive */
@media screen and (max-width: 480px) {
    #Layer1 {
        padding: 30px 20px;
    }
}
</style>
</head>
<body>

<!-- Floating shapes -->
<div class="shape" style="top:80%; left:15%; width:30px; height:30px;"></div>
<div class="shape" style="top:40%; left:75%; width:60px; height:60px;"></div>
<div class="shape" style="top:60%; left:50%; width:40px; height:40px;"></div>
<div class="shape" style="top:20%; left:80%; width:35px; height:35px;"></div>

<div id="Layer1">
    <h1>Do You Have An Account?</h1>
    <p>Login to continue</p>

    <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
      <input name="username" type="text" id="username" placeholder="USERNAME" required />
      <input name="password" type="password" id="password" placeholder="PASSWORD" required />
      <input type="submit" name="Submit" value="LOGIN" id="Submit" />
  </form>

    <div class="footer-text">
        <p>Don't Have An Account? <a href="create account.php">Create</a></p>
    </div>
</div>

<div id="Layer2">
    <a href="index.php">&lt; BACK</a></div>

</body>
</html>
