<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <title>Request Blood</title>
</head>
<body>
    <header>
		Blood Bank Management System
  </header>
    <form action="" method="post">
        <h2><u>Request Blood</u></h2>
        Patient Name : <input name="PatName" type="text" required><br><br>
        Hospital Name : <input name="HosName" type="text" required><br><br>
        Username : <input name="Username" type="text" ><br><br>
        Phone : <input name="Phone" type="tel"><br><br>
        Gender : 
        <select name="Gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br><br>
        Age : <input name="Age" type="number" required min="18" placeholder="Atleasr 18 years"><br><br>
        Blood Group :
        <select name="BG">
            <option value="O+">O +</option>
            <option value="O-">O -</option>
            <option value="A+">A +</option>
            <option value="A-">A -</option>
            <option value="B+">B +</option>
            <option value="B-">B -</option>
            <option value="AB+">AB +</option>
            <option value="AB-">AB -</option>
        </select><br><br>
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
        Amount : <input name="Amount" type="number" min="1" placeholder="in MiliLitres"><br><br>
        <input type="submit" name="Submit" value="Request">
        <input type="reset" value="Reset">
        <br><br>
        <a href="userchoice.php" style="text-align:center"><h2>Back</a>&ensp;
           <a href="index.php" style="text-align:center">Home</h2></a>
    </form>

<?php 
if(isset($_POST["Submit"]))
{   
    $PatName=$_POST['PatName'];
    $HosName=$_POST['HosName'];
    $Phone=$_POST['Phone'];
    $Gender=$_POST['Gender'];
    $Age=$_POST['Age'];
    $BG=$_POST['BG'];
    $State=$_POST['State'];
    $Amount=$_POST['Amount'];
    $Username=$_POST['Username'];

$Connection=mysql_connect('localhost','root','');
$Selected= mysql_select_db('bbms',$Connection);

	$Query="INSERT INTO blood_request (patient_name,hospital_name,phone,amount,age,gender,blood_group,state,user_id)
    VALUES('$PatName','$HosName','$Phone','$Amount','$Age','$Gender','$BG','$State','$Username')" ;
			
$Execute=mysql_query($Query);

if($Execute){
	echo "<h2>Requested Successfully ! </h2>";
}
else
{
  echo "<h2>Error Encountered ! </h2>";
}
}
 ?>

</body>
</html>