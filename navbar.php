<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
     <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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



.head{
    float: left;
    display: block;
   color: black;
   padding: 14px 16px;
   font-weight: bold;
}
    </style>
</head>
<body>
<nav class="navigation">
        <ul> 
           <li class="head">The Sparks Bank</li>
           <li><a href="#home">Home</a></li>
            <li><a href="display.php">View Customer</a></li>
            <li><a href="transactionhistory.php">Transaction Details</a></li>
            <li><a href="insert.php">Add Customer</a></li>
          </ul>
    </nav>
</body>
</html>