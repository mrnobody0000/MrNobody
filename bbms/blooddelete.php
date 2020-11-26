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
    <title>Blood Bank Details Delete</title>
</head>
<body>
    <header>
		Blood Bank Management System
  </header>
    <form action="" method="post">
        <h2><u>Blood Bank Details</u></h2>
        Bank Id : <input name="Bid" type="number" required><br><br>
        <input type="submit" name="Submit" value="Delete">
        <input type="reset" value="Reset">
        <br><br>
        <a href="adminchoice.php" style="text-align:center"><h2>Back</a>&ensp;
           <a href="index.php" style="text-align:center">Logout</h2></a>
    </form>

    <?php
        $query="(select * from blood_bank)";
        $result=mysql_query($query);

    ?>
    <table class="x"  align="center"; border="2px"  ; width="500px" ;>
        <tr>
            <td colspan="5">Blood Banks Available</td>
            <tr>
                <td>Bid</td>
                <td>Name</td>
                <td>State</td>
                <tr>

    <?php

        while($rows=mysql_fetch_assoc($result))
        {
    ?>    
    <tr>

    <td><?php echo $rows['Bid']; ?></td>
    <td><?php echo $rows['name']; ?></td>
    <td><?php echo $rows['state']; ?></td>
    </tr>
        <?php
        } 
    ?>
<?php
if(isset($_POST["Submit"]))
{   
    $Bid=$_POST['Bid'];

$Connection=mysql_connect('localhost','root','');
$Selected= mysql_select_db('bbms',$Connection);

	$Query="DELETE FROM blood_bank where Bid='$Bid'";
			
$Execute=mysql_query($Query);

if($Execute){
    echo "<h2>Data Deleted Successfully ! </h2>";
    header('location: blooddelete.php');
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