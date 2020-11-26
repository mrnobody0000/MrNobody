<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <title>Blood Bank Details Insert</title>
</head>
<body>
    <header>
		Blood Bank Management System
  </header>
    <form action="" method="post">
        <h2><u>Blood Bank Details</u></h2>
        Bank Name : <input name="Name" type="text" required><br><br>
        State : 
        <select name="State">
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="West Bengal">West Bengal</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Orissa">Orissa</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttarakhand">Uttarakhand</option>
        </select><br><br>
        <input type="submit" name="Submit" value="Save">
        <input type="reset" value="Reset">
        <br><br>
        <a href="adminchoice.php" style="text-align:center"><h2>Back</a>&ensp;
           <a href="index.php" style="text-align:center">Logout</h2></a>
    </form>

<?php 
if(isset($_POST["Submit"]))
{   
    $Name=$_POST['Name'];
    $State=$_POST['State'];

$Connection=mysql_connect('localhost','root','');
$Selected= mysql_select_db('bbms',$Connection);

	$Query="INSERT INTO blood_bank (name,state)
    VALUES('$Name','$State')" ;
			
$Execute=mysql_query($Query);

if($Execute){
    echo "<h2>Data Saved Successfully ! </h2>";
    header('location: bloodinsert.php');
}
else
{
  echo "<h2>Error Encountered ! </h2>";
}
}
 ?>

</body>
</html>