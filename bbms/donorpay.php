<?php

mysql_connect('localhost','root','');
mysql_select_db('bbms');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
    <style>
            .x{
                background-color:white;
                width="400px"
            }
            </style>
    <title>Update Donor Payment</title>
</head>
<body>
    <header>
		Blood Bank Management System
  </header>
    <form action="" method="post">
        <h2><u>Update Status</u></h2>
        Payment Id : <input name="Pid" type="number" required><br><br>
        <input type="submit" name="Submit" value="Update">
        <input type="reset" value="Reset">
        <br><br>
        <a href="adminchoice.php" style="text-align:center"><h2>Back</a>&ensp;
           <a href="index.php" style="text-align:center">Home</h2></a>
    </form>

    

    <?php
        $query="(select * from donor_pay)";
        $result=mysql_query($query);

    ?>
    <table class="x"  align="center"; border="2px"  ; width="500px" ;>
        <tr>
            <td colspan="5">Payment List</td>
            <tr>
                <td>Pid</td>
                <td>cost</td>
                <td>mode</td>
                <td>status</td>
                <td>Did</td>
                <tr>

    <?php

        while($rows=mysql_fetch_assoc($result))
        {
    ?>    
    <tr>

    <td><?php echo $rows['Pid']; ?></td>
    <td><?php echo $rows['cost']; ?></td>
    <td><?php echo $rows['mode']; ?></td>
    <td><?php echo $rows['status']; ?></td>
    <td><?php echo $rows['Did']; ?></td>
    </tr>
        <?php
        } 
    ?>
<?php
if(isset($_POST["Submit"]))
{   
    $Pid=$_POST['Pid'];

$Connection=mysql_connect('localhost','root','');
$Selected= mysql_select_db('bbms',$Connection);

	$Query="UPDATE donor_pay SET status='Done' where Pid='$Pid'";
			
$Execute=mysql_query($Query);

if($Execute){
    echo "<h2>Data Updated Successfully ! </h2>";
    header('location: donorpay.php');
}
else
{
  echo "<h2>Error Encountered ! </h2>";
}
}
 ?>

    
    <br>
    </table>

</body>
</html>