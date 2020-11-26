<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <title>User Login</title>
</head>
<body>
    <header>
		Blood Bank Management System
  </header>
  <form action="" method="post">
    <h2><u>User Login</u></h2>
    Username : <input type="text" name="Username" required><br><br>
    Password : <input type="password" name="Password" required><br><br>
    <input type="submit" name="Submit" value="Login">
    <br><br>
    New User? <a href="usersignup.html">Join Now</a><br><br>
    
           <a href="index.php" style="text-align:center">Home</h2></a>
</form>

<?php
if(isset($_POST["Submit"]))
{

    $Username=$_POST['Username'];
    $Password=$_POST['Password'];

    mysql_connect('localhost','root','');
    mysql_select_db('bbms');

    $Count="(select user_id from user where user_id='$Username' and password='$Password')";
    $Execute=mysql_query($Count);

    $Result=mysql_fetch_assoc($Execute);

    if($Result)
    {
        echo "login success";
        header("location: choice.php");
    }
    else
    {
        $error = "Your Login Name or Password is invalid";
        echo $error;
    }
}
?>

</body>
</html>