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
            width: 90%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }
        td {
            color: #333;
        }
        img {
            border-radius: 4px;
        }
        a {
            color: #ff0000;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #d10000;
            text-decoration: underline;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<table   align="center" border="1">
    <tr>
      <td align="center">Slno</td>
      <td align="center">Product</td>
      <td align="center">Date of customization</td>
      <td align="center">Required date</td>
      <td align="center">Delivery address</td>
      <td align="center">Delivery contact</td>
      <td>Photo</td>
      <td align="center">Details</td>
      <td align="center">Quatity</td>
      <td align="center">Message</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	$i = 0;
	$sel = "select * from tbl_customization c inner join tbl_product p on p.product_id = c.product_id  where user_id = '".$_SESSION["uid"]."'";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
		?>
    <tr>
      <td align="center"><?php echo $i ?></td>
      <td align="center"><?php echo $data["product_name"]?></td>
      <td align="center"><?php echo $data["customization_date"]?></td>
      <td align="center"><?php echo $data["customization_todate"]?></td>
      <td align="center"><?php echo $data["customization_address"]?></td>
      <td align="center"><?php echo $data["customization_contact"]?></td>
      <td align="center"><img src="../Assets/File/User/<?php echo $data["customization_photo"] ?>" height="50" width="50" /></td>
      <td align="center"><?php echo $data["customization_details"]?></td>
      <td align="center"><?php echo $data["customization_quantity"]?></td>
      <td align="center"><?php echo $data["customization_message"]?></td>
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
