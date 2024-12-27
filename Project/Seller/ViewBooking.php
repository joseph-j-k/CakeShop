<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
if (isset($_GET['rid'])) {
    
    // Update the booking status to 'Canceled' (assuming 2 means canceled)
    $query = "UPDATE tbl_booking SET booking_status = 3 WHERE booking_id = ".$_GET['rid'];
   $con->query($query);
   ?>
   <script>
       alert('Packed Completed');
       window.location="ViewBooking.php";
   </script>

<?php
   
   
}   
if (isset($_GET['did'])) {
    
    // Update the booking status to 'Canceled' (assuming 2 means canceled)
    $query = "UPDATE tbl_booking SET booking_status = 4 WHERE booking_id = ".$_GET['did'];
   $con->query($query);
   ?>
   <script>
       alert('Delivered Completed');
       window.location="ViewBooking.php";
   </script>

<?php
   
   
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="booking-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Bill No</th>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Delivery Contact</th>
                        <th>Delivery Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                $sel = "SELECT * FROM tbl_booking b 
                        INNER JOIN tbl_user u ON u.User_id = b.user_id  ";
                $result = $con->query($sel);
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["booking_id"]; ?></td>
                        <td><?php echo $data["booking_date"]; ?></td>
                        <td><?php echo $data["User_name"]; ?></td>
                        <td><?php echo $data["User_contact"]; ?></td>
                        <td><?php echo $data["User_address"]; ?></td>
                        <td>

                        <?php
                
                if ($data["booking_status"] == 1) { 
                    ?>
                    payement Pending
                   
                    <?php 
                }

                
                
                else if($data["booking_status"]==2 ) 
                {
                    echo "Payment Successfull";  
                    ?>
                     <a href='ViewBooking.php?rid=<?php echo $data["booking_id"]; ?>'>Product Packed</a>


                    <?php
                    
                }
                else if($data["booking_status"]==3 ) 
                {
                    echo "Product Packed";  
                    ?>
\                    <a href='ViewBooking.php?did=<?php echo $data["booking_id"]; ?>'>Product Delivered</a>


                   <?php
                    
                }
                else if($data["booking_status"]==4 ) 
                {
                    echo "Product Delivered";  
                    
                }
                if ($data["booking_status"] == 5) { 
                    ?>
                  Canceled
                   
                    <?php 
                }

            
            
            ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
</body>
</html>
<?php
include("Foot.php");
?>