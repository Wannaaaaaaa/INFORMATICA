<html>
<head>
<title>LOGOUT</title>
</head>
<body>
<?php
function controlloUser($usr) {
        $usr = trim($usr);
        $usr = stripslashes($usr);
        $usr = htmlspecialchars($usr);
        if(!preg_match("/^[a-zA-Z0-9-_.]{1,16}+$/" , $usr)) {
          $usr = "Inserire un username valido.";
        } else {
          $usr = "";
        }
    }
function controlloPass($pwd) 
{
    $pwd = trim($pwd);
    $pwd = stripslashes($pwd);
    $pwd = htmlspecialchars($pwd);
    if (!preg_match("/^[a-zA-Z0-9._-]{8,20}$/", $pwd)) 
	{
        $pwd = "Inserire una password valida.";
    } 
	else 
	{
        $pwd = "";
    }
}
?>
</body>
</html>
