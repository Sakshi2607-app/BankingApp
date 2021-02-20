<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
        background-image : url("https://raw.githubusercontent.com/Ayush-1211/Banking-System/main/img/bank.png");
        background-repeat: no-repeat;
         background-attachment: fixed;  
        background-size: cover;

        }

        h1{
            text-align: center;
            margin-top: 200px;
            
        }

        ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: black;
  
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-weight: bold;
}

li a:hover:not(.active) {
  background-color: pink;
}

.active {
  background-color: #4CAF50;
}

.head{
    float: left;
    display: block;
   color: white;
   padding: 14px 16px;
   font-weight: bold;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
}
    </style>
</head>
<body>
    <nav class="navigation">
        <ul> 
           <li class="head">The Sparks Bank</li>
           <li><a class="active" href="#home">Home</a></li>
            <li><a href="display.php">View Customer</a></li>
            <li><a href="transactionhistory.php">Transaction Details</a></li>
            <li><a href="insert.php">Add Customer</a></li>
          </ul>
    </nav>
    <h1>Welcome! To the Spark Bank.</h1>
    <div class="footer">
        <p>&copy 2021. Made by <b>SAKSHI BHALLA</b></p>
      </div>
</body>
</html>

<?php 
include 'connection.php';
?>