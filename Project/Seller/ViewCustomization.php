<?php 
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #f44336;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            border-radius: 5px;
        }

        form {
            margin: 20px;
        }

        /* Add any additional styling here */
    </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table   align="center" border="1">
    <tr>
      <td>Slno</td>
      <td>User Name</td>
      <td>Product</td>
      <td>Date of customization</td>
      <td>Required date</td>
      <td>Delivery address</td>
      <td>Delivery contact</td>
      <td>Photo</td>
      <td>Details</td>
      <td>Quatity</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	$i = 0;
	$sel = "select * from tbl_customization c inner join tbl_product p on p.product_id = c.product_id inner join tbl_user u on u.user_id = c.user_id";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["User_name"]?></td>
      <td><?php echo $data["product_name"]?></td>
      <td><?php echo $data["customization_date"]?></td>
      <td><?php echo $data["customization_todate"]?></td>
      <td><?php echo $data["customization_address"]?></td>
      <td><?php echo $data["customization_contact"]?></td>
      <td><img src="../Assets/File/User/<?php echo $data["customization_photo"] ?>" height="50" width="50" /></td>
      <td><?php echo $data["customization_details"]?></td>
      <td><?php echo $data["customization_quantity"]?></td>
      <td colspan="2" align="center">
     <a href="Customization.php?did=<?php echo $data["customization_id"]?>">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
    </form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>