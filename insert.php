<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}



div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:30%;
  margin:auto;
  margin-top:10%;
  
}

.main{
  width:50%;
  
}

.button{
  width: 50%;
  background-color: black;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration:none;
}

</style>
<body>



<div>
  <form class="main" action="" method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="First Name">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Last Name">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Email"> 

    <label for="amount">Amount</label>
    <input type="text" id="email" name="amount" placeholder="Amount">
  
    <input type="submit" name="submit" value="Add">
    <a href="home.php" class="button">Home</a>
  </form>
</div>

</body>
</html>

<?php
include 'connection.php';
if(isset($_POST['submit'])){
  $name1 = $_POST['firstname'];
  $name2 = $_POST['lastname'];
  $email = $_POST['email'];
  $amount = $_POST['amount'];

  $insertquery = "insert into viewcustomer(first_name,last_name, email, amount) values('$name1','$name2','$email','$amount')";

  $res =  mysqli_query($con, $insertquery);

  if($res){
      ?>
     <script> 
     alert("data inserted");
     </script>
      <?php
  } else{
      ?>
    <script> 
    alert("data inserted");
    </script>
      <?php
  }
}
?>
