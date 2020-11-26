<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <title>Search</title>
</head>
<body >
    <header>
		Blood Bank Management System
  </header>
  <form action="" method="post">
    <h2><u>Search Database</u></h2>
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
        <input type="submit" name="Submit" value="Search">
        <br><br>
        <a href="userchoice.php" style="text-align:center"><h2>Back</a>&ensp;
           <a href="index.php" style="text-align:center">Home</h2></a>
    </form>

    <?php 
    if(isset($_POST["Submit"]))
    {   
        $BG=$_POST['BG'];
        $State=$_POST['State'];
        $Amount=$_POST['Amount'];
    
    $Connection=mysql_connect('localhost','root','');
    $Selected= mysql_select_db('bbms',$Connection);
    
        $Query="SELECT s.amount FROM blood_storage AS s,blood_bank AS b WHERE (b.state='$State' AND b.Bid=s.Bid AND s.blood_group='$BG' AND s.amount>='$Amount')";

    $Execute=mysql_query($Query);
    $Result=mysql_fetch_assoc($Execute);
    
    if($Result){
        echo "<h2>Amount Available ! </h2>";
    }
    else
    {
      echo "<h2>Amount Not Available ! </h2>";
    }
    }
?>
</body>
</html>