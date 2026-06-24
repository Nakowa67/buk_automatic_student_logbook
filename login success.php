<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Portal</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Times New Roman", serif;
}

/* PAGE */
body{
    background:#99CCCC;
    min-height:100vh;
}

/* LOGOUT */
#Layer2{
    position:absolute;
    top:20px;
    right:30px;
}
#Layer2 a{
    background:#8B0000;
    color:#fff;
    padding:10px 25px;
    text-decoration:none;
    border-radius:30px;
    font-weight:bold;
    box-shadow:0 4px 10px rgba(0,0,0,.3);
    transition:.3s;
}
#Layer2 a:hover{
    background:#b22222;
}

/* MAIN CARD */
#Layer1{
    width:800px;
    background:#fff;
    margin:80px auto;
    padding:40px;
    border-radius:15px;
    box-shadow:0 15px 30px rgba(0,0,0,.3);
    text-align:center;
    animation:fadeSlide .8s ease;
}

/* TITLE */
.style1{
    color:#002147;
    font-size:28px;
    font-weight:bold;
    margin-bottom:10px;
}
.style2{
    color:#006600;
}

/* GRID MENU */
.menu{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:25px;
    margin-top:40px;
}

/* CARD BUTTONS */
.menu a{
    background:#002147;
    color:#fff;
    text-decoration:none;
    padding:35px 20px;
    border-radius:12px;
    font-size:17px;
    font-weight:bold;
    box-shadow:0 10px 20px rgba(0,0,0,.3);
    transition:.3s ease;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
}
.menu a:hover{
    background:#004080;
    transform:translateY(-5px);
}

/* ANIMATION */
@keyframes fadeSlide{
    from{opacity:0; transform:translateY(40px);}
    to{opacity:1; transform:translateY(0);}
}

/* MOBILE */
@media(max-width:768px){
    #Layer1{
        width:90%;
        padding:30px 20px;
    }
}
.style4 {color: #002147; font-size: 28px; font-weight: bold; margin-bottom: 10px; font-family: "Arial Black"; }
</style>
</head>

<body>

<!-- LOGOUT -->
<div id="Layer2">
    <a href="exit.php">LOGOUT</a>
</div>

<!-- DASHBOARD -->
<div id="Layer1">

    <div class="style1 style2"><span class="style4">STUDENT PORTAL</span></div>
    <div class="style1"></div>

    <div class="menu">
        <a href="general instruction.php">GENERAL INSTRUCTION</a>
        <a href="no of weeks.php">DAILY LOG</a>
        <a href="view daily report.php">VIEW WEEKLY SUPERVISOR COMMENTS</a>
    </div>

</div>

</body>
</html>
