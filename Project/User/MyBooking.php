<?php
ob_start();
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');


$selqry="select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id inner join tbl_product p on p.product_id=c.product_id inner join tbl_seller s on s.seller_id = p.seller_id where  user_id ='".$_SESSION["uid"]."' and booking_status>0 and cart_status>0";
$result=$con ->query($selqry);		
?>

<?php 
    if (isset($_GET['cid'])) {
    
        // Update the booking status to 'Canceled' (assuming 2 means canceled)
        $query = "UPDATE tbl_cart SET cart_status = 5 WHERE cart_id = ".$_GET['cid'];
       $con->query($query);
       ?>
       <script>
           alert('Your order has been cancelled.The refund will be processed within 3 business days.Thank You.');
           window.location="ViewBooking.php";
       </script>
    
    <?php
       
       
    }    

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galerie DArt::My Booking</title>
<style>
  /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

#tab {
    background-color: #fff;
    margin: 20px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 1200px;
}

h1 {
    color: #2c3e50;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #3498db;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #e0e0e0;
}

img {
    border-radius: 8px;
}

</style>
</head>

<body>
<div id="tab" align="center">
<h1>My Booking</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="1">
    <tr align="center">
      <td>SlNO</td>
      <td>Name</td>
      <td>Photo</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Total amount</td>
      <td>Shop Name</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
     <?php
	 $i=0;
	while($row = $result -> fetch_assoc())
	{
		
		$qty=$row["cart_qty"];
	$price=$row["product_price"];
	$totalamt=$qty*$price;
		 $i++;
  ?>
  <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $row["product_name"];?></td>
          <td><img src="../Assets/File/Seller/<?php echo $row["product_photo"];?>" width="100" height="100" /></td>
          <td><?php echo $row["cart_qty"];?></td>
          <td><?php echo $row["product_price"];?></td>
          <td><?php echo $totalamt;?></td>
          <td><?php echo $row["seller_name"];?></td>
          <td>
          <?php
                
                    if ($row["booking_status"] == 1) { 
                        ?>
                        Payement Pending
                       
                        <?php 
                    }

					
                    
                    else if($row["booking_status"]==2 ) 
					{
                        echo "Payment Successfull";  
                        
					}
                    else if($row["booking_status"]==3 && $row["cart_status"] == 2   ) 
					{
                        echo "Product Packed";  
                        
					}
                    else if($row["booking_status"]==4 && $row["cart_status"] == 2   ) 
					{
                        echo "Product Delivered";  
                        
					}
                    if ($row["cart_status"] == 5 && $row["booking_status"]>2) { 
                        ?>
                      Canceled
                       
                        <?php 
                    }

				
				
				?>
          </td>

          <td>
          <?php
                
                if ($row["booking_status"] == 1) { 
                    ?>
                    <a href='Payment.php'>Pay</a>
                   <a href='Requirement.php?rid=<?php echo $row["booking_id"] ?>'>Add Delivery Address</a> 

                    <?php 
                }

                
                
                else if($row["booking_status"]==2 && $row["cart_status"]==2 ) 
                {
                    ?>

                    <a href='MyBooking.php?cid=<?php echo $row["cart_id"]; ?>'>Cancel</a>
                    <a href='ProductRating.php?pid=<?php echo $row["product_id"]; ?>'>Review</a>
                    <?php
                    
                }
                else if($row["booking_status"]==4 && $row["cart_status"]==2 ) 
                {
                   echo "Product Delivered";
                   ?>
                     <a href='ProductRating.php?pid=<?php echo $row["product_id"]; ?>'>Review</a>

                   <?php
                    
                }
                else if($row["cart_status"]==5  ) 
                {
                    ?>

                  You canceled
                    <?php
                    
                }
             
            
            ?>
        </td>
  </tr>
  <?php
	}
	?>
  </table>
</form>
</div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>