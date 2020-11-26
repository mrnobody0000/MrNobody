<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <title>User Signup</title>
</head>
<body>
    <header>
		Blood Bank Management System
  </header>
    <form action="" method="post">
        <h2><u>Signup</u></h2>
        Name : <input type="text" name="Name" required><br><br>
        Phone : <input type="int" name="Phone"><br><br>
        Gender : 
        <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        Age : <input type="number" name="Age" required min="18" placeholder="Atleasr 18 years"><br><br>
        Username : <input type="text" required name="Userid"><br><br>
        Password : <input type="password" name="Password" required minlength="8"><br><br>
        Confirm Password : <input type="password" name="c_password" required><br><br>
        <input type="submit" name="Submit" value="SignUp">
        <input type="reset" value="Reset">
        <br><br>
        <a href="userlogin.php" style="text-align:center"><h2>Back</a>&ensp;
           <a href="index.php" style="text-align:center">Home</h2></a>
    </form>

<?php 
if(isset($_POST["Submit"]))
{   
    $Name=$_POST['Name'];
    $Phone=$_POST['Phone'];
    $Password=$_POST['Password'];
    $Gender=$_POST['Gender'];
    $Age=$_POST['Age'];
    $Userid=$_POST['Userid'];
    
$Connection=mysql_connect('localhost','root','');
$Selected= mysql_select_db('bbms',$Connection);

	$Query="INSERT INTO user
    VALUES('$Userid','$Password','$Name','$Age','$Gender','$Phone')" ;
			
$Execute=mysql_query($Query);

if($Execute){
	echo "<h2>Record saved </h2>";
}
else
{
  echo "<h2>wrong </h2>";
}
}
 ?>
</body>
</html>