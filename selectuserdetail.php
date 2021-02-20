<?php
include 'connection.php';

if(isset($_POST['submit']))
{
    $from = $_GET['first_name'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    
    $sql = "SELECT * from viewcustomer where first_name='$from'";
    $query = mysqli_query($con,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.
    

    $sql = "SELECT * from viewcustomer where first_name='$to'";
    $query = mysqli_query($con,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['amount']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['amount'] - $amount;
                $sql = "UPDATE viewcustomer set amount=$newbalance where first_name='$from'";
                mysqli_query($con,$sql);
            
             

                // adding amount to reciever's account
                $newbalance = $sql2['amount'] + $amount;
                $sql = "UPDATE viewcustomer set amount=$newbalance where first_name='$to'";
                mysqli_query($con,$sql);
                
                
                $sender = $sql1['first_name'];
                $receiver = $sql2['first_name'];
                date_default_timezone_set('Asia/Kolkata');
                $date = date('m/d/Y h:i:s a', time());
              
                $sql = "INSERT INTO transaction(`sender`, `receiver`, `amount`, `date-time`) VALUES ('$sender','$receiver','$amount', '$date')";
                $query=mysqli_query($con,$sql);


                if($query){
                     echo "<script> alert('Transaction Successful')
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    

    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}
  
    </style>
</head>

<body style="background-color : #E59866 ;">
 

	<div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transaction</h2>
            <?php
                include 'connection.php';
                $sid= $_GET['first_name'];
                $sql = "SELECT * FROM  viewcustomer where first_name='$sid'";
                
                $result = mysqli_query($con,$sql);
                
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($con);
                }
               
                 $rows=mysqli_fetch_array($result);
                 
                
            
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : black;">
                    <th class="text-center">Id</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Amount</th>
                </tr>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['first_name'] ?></td>
                    <td class="py-2"><?php echo $rows['last_name'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['amount'] ?></td>
                </tr>
                             
                
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'connection.php';
                $sid=$_GET['first_name'];
                $sql = "SELECT * FROM viewcustomer where first_name!='$sid'";
                $result=mysqli_query($con,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['first_name'];?>" >
                
                    <?php echo $rows['first_name'] ;?> (Balance: 
                    <?php echo $rows['amount'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer</button>
            </div>
        </form>
    </div>
    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>