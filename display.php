

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 60%;
  margin:auto;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;
}

#customers td{
    text-align:center;
}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
  text-align:center;
}
.button {
        text-align: center;
        font-size: 1.0em;
        font-weight: bold;
        line-height: 200%;
        width: 100%;
  background-color:black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration:none;
    }


</style>
</head>
<body>
<?php
  include 'navbar.php';
?>
<table id="customers">
  <tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Amount</th>
    <th>Operations</th>
  </tr>
  <?php

include 'connection.php';

$selectquery = "select * from viewcustomer";
$query = mysqli_query($con,$selectquery);


while($res = mysqli_fetch_array($query)){

    ?>
    <tr>
    <td><?php echo $res['id']; ?></td>
    <td><?php echo $res['first_name']; ?></td>
    <td><?php echo $res['last_name']; ?></td>
    <td><?php echo $res['email']; ?></td>
    <td><?php echo $res['amount']; ?></td>
    <td><a href="selectuserdetail.php?first_name=<?php echo $res['first_name'] ;?>"> <button type="button" class="button">Transaction</button></a></td> 
    
    </tr>
    <?php
}

?>
   
</table>

</body>
</html>
