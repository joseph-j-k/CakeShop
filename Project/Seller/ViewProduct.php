<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <style>
        
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #2c3e50; /* Dark Blue */
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        /* Table Styling */
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }


        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #ecf0f1; /* Dark Blue */
            color: black;
            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            background-color: #ecf0f1; /* Light Gray */
        }

        .img {
            height: 60px;
            width: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        /* Add alternating row color */
        tr:nth-child(even) {
            background-color: #bdc3c7;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }
            h1 {
                font-size: 28px;
            }
            th, td {
                padding: 10px;
            }
            img {
                height: 50px;
                width: 50px;
            }
        }
    </style>
</head>
<body>
    <h1>View Product</h1>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <th>Sl No</th>
                <th>Photo</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Type</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
            <?php 
            $i=0;
            $sel = "SELECT * FROM tbl_cart c 
                    INNER JOIN tbl_product p ON c.product_id = p.product_id 
                    INNER JOIN tbl_subcategory s ON s.subcategory_id = p.subcategory_id 
                    INNER JOIN tbl_category ca ON ca.category_id = s.category_id 
                    INNER JOIN tbl_type t ON t.type_id = p.type_id 
                    INNER JOIN tbl_booking b ON c.booking_id = b.booking_id 
                    WHERE c.booking_id = ".$_GET['pid']." and c.cart_status = 2 ";
            $result = $con->query($sel);
            while($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><img src="../Assets/File/Seller/<?php echo $data["product_photo"]; ?>" alt="Product Image" class="img"></td>
                <td><?php echo $data["product_name"]; ?></td>
                <td><?php echo $data["product_description"]; ?></td>
                <td><?php echo $data["category_name"]; ?></td>
                <td><?php echo $data["subcategory_name"]; ?></td>
                <td><?php echo $data["type_name"]; ?></td>
                <td><?php echo $data["cart_qty"]; ?></td>
                <td><?php echo $data["booking_amount"]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </form>
</body>
</html>