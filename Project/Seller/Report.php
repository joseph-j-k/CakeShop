<?php
include("../Assets/Connection/Connection.php");
include('Head.php');
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Bookings</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d; /* Changed to grey */
            font-size: 36px;
            font-weight: bold;
            letter-spacing: 1.5px;
        }

        /* Form Styling */
        form {
            width: 580px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Table Styling */
        .table {
            width: 950px; /* Increased table width */
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        th, td {
            padding: 14px; /* Slightly increased padding */
            text-align: left;
        }
        th {
            background-color: #e67e22; /* Orange */
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* Input Fields */
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #1fb89b;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #79d4c3;
        }

        /* Booking Table Styling */
        .booking-table {
            margin: 30px auto;
            max-width: 1000px; /* Increased table container size */
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Action Link */
        .action-link {
            color: #3498db; /* Changed to blue */
            text-decoration: none;
            font-weight: bold;
        }
        .action-link:hover {
            text-decoration: underline;
            color: #2980b9; /* Darker blue for hover */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form, .booking-table {
                padding: 15px;
            }
            h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

    <h1>Check Your Bookings</h1>

    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td><strong>From Date</strong></td>
                <td><input type="date" name="txt_fdate" id="txt_fdate" required></td>
                <td><strong>To Date</strong></td>
                <td><input type="date" name="txt_tdate" id="txt_tdate" required></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST["btn_submit"])) {
        $fromDate = $_POST["txt_fdate"];
        $ToDate = $_POST["txt_tdate"];
    ?>
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
                        INNER JOIN tbl_user u ON u.User_id = b.user_id  
                        WHERE booking_date >= '$fromDate' 
                        AND booking_date <= '$ToDate'";
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
                        <td><a class="action-link" href="ViewProduct.php?pid=<?php echo $data['booking_id']; ?>">View Product</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>

</body>
</html>