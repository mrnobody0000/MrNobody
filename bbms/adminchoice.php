<?php
mysql_connect('localhost','root','');
mysql_select_db('tour');

?>

<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <link href="index.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">    
        <link href="https://fonts.googleapis.com/css2?family=Goldman:wght@700&display=swap" rel="stylesheet">
        <title>Customer details</title>
        <style>
         #container1{
             width:100vw;
             height: 10vh;
             background-color:  rgb(18, 2, 61);
             box-sizing: border-box;
             padding: 32px;
             display: flex;
             text-align:center;
             flex-direction:row;
             justify-content: space-between;
             flex-wrap: wrap;
             align-items:stretch ;
             align-content: flex-start;
         }
         #container{
             width:100vw;
             height:100px;
             background-color:  rgb(18, 2, 61);
             box-sizing: border-box;
             padding: 32px;
             display: flex;
             flex-direction:row;
             justify-content: space-between;
             flex-wrap: wrap;
             align-items:stretch ;
             align-content: flex-start;
         }
         .item{
             background-color: lightcoral;
             height:40px;
             margin: 10px;
             padding: 20px;
             font-size: large;
             text-align: center;
             flex-grow: 1;
         }
         .dropbtn {
    background-color: black;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: lightgrey;
    min-width: 200px;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: white;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: grey;}
.x{
    align="center" ;
    border="2px"  ;
    width="500px" ;
    background-color="lightblue"
}

         </style>
    </head>   
    <body>
      <header> Blood Bank Management System </header>
            <main>
             
            <div id="container1">
            <h1 style="text-align:center; color: white;"> Select Option :
             <br><br></h1>
        </div>
        
        <div id="container">
              <div class="item">
              <div class="dropdown">
<button class="dropbtn">Blood Bank</button>
<div class="dropdown-content">

<a href="bloodinsert.php">Insert Blood Bank Details</a>
<a href="blooddelete.php">Delete Blood Bank Details</a>


</div>
</div>
              </div>
              
              <div class="item">
              <div class="dropdown">
<button class="dropbtn">Donor Payment</button>
<div class="dropdown-content">

<a href="donorpay.php">Update Status</a>


</div>
</div>
              </div>
              
                     
</div>

      
    <br><br><br>
    <br><a href="index.php" style="text-align:center; color: white;"><h2>Logout</h2></a>
          </main>
          </body>
</html>
 this is a change on this thread.
