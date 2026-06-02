<?php
include "connect.php";

class login extends connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if($this->db_found==true)
        {        
            $sql="select * from login";
            $f=0;
            $r=mysqli_query($this->db_found, $sql);

            while($db_field=mysqli_fetch_assoc($r))
            { 
                if($db_field['id']==$_POST['t1'])
                {
                    if($db_field['pwd']==$_POST['t2'])
                    {
                        $f=1;
                        break;
                    }
                }
            }

            if($f==1)
                echo "<script>window.open('menu.html')</script>";
            else
                echo "<script>alert('Wrong ID or Password')</script>";
        }
        else
            echo "Database Not Found";
    }
}

$ob=new login();
if(isset($_REQUEST["b1"]))
{
    $ob->login();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>

<style>
body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #e9ecef;
    margin: 0;
}

/* Header */
.header {
    background: #34495e;
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    letter-spacing: 1px;
}

/* Center container */
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 85vh;
}

/* Login box */
.login-box {
    width: 320px;
    padding: 25px;
    background: #ffffff;
    border-radius: 6px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* Title */
.login-box h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 20px;
}

/* Inputs */
input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #bbb;
    border-radius: 4px;
    outline: none;
}

input[type="text"]:focus,
input[type="password"]:focus {
    border-color: #2980b9;
    box-shadow: 0 0 5px rgba(41,128,185,0.5);
}

/* Login button */
input[type="submit"] {
    width: 100%;
    padding: 10px;
    background: #2980b9;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

input[type="submit"]:hover {
    background: #1f6391;
}

/* Cancel button (matching style) */
.cancel-btn {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background: transparent;
    color: #2980b9;
    border: 2px solid #2980b9;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

.cancel-btn:hover {
    background: #2980b9;
    color: white;
}
</style>
</head>

<body>

<div class="header">
    School Management System
</div>

<div class="container">
    <form method="post" action="login.php">
        <div class="login-box">
            <h2 style="text-align:center;">Login</h2>

            <input type="text" name="t1" placeholder="Enter Login ID" required>
            <input type="password" name="t2" placeholder="Enter Password" required>

            <input type="submit" value="Login" name="b1">
            <input type="button" value="Cancel" class="cancel-btn">
        </div>
    </form>
</div>

</body>
</html>