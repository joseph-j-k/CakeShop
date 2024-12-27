<?php include("Head.php") ?>
<?php
include("../Assets/Connection/Connection.php");

if(isset($_GET["reject"]))
{
	$update = "update tbl_seller set seller_status = '2' where seller_id = '".$_GET["reject"]."'";
		
	 if($con ->query($update))
		{
			echo"<script>
			alert('Rejected');
			window.location='AcceptSeller.php';
			</script>";
		}
		
	
	
	
      }
	  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Accept Seller</title>
<style>

    .header {
        text-align: center;
        color: #333;
    }

    .seller-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .seller-table th, .seller-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .seller-table th {
        background-color: #4CAF50;
        color: white;
    }

    .seller-table tr:hover {
        background-color: #f1f1f1;
    }

    .action-link {
        text-decoration: none;
        color: #fff;
        background-color: #4CAF50;
        padding: 8px 12px;
        border-radius: 4px;
        transition: background-color 0.3s;
    }

    .action-link:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Accept Seller</h1>
  <table border="1" align="center" class="seller-table">
    <tr>
      <td>Slno</td>
      <td>Name</td>
      <td>Photo</td>
      <td>District</td>
      <td>Place</td>
      <td>Address</td>
      <td>Contact</td>
      <td>Email</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php 
	$i = 0;
	$sel = "select * from tbl_seller s inner join tbl_place p on p.place_id = s.place_id inner join tbl_district d on d.district_id = p.district_id where seller_status = '1'";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
  ?>
  
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["seller_name"]?></td>
      <td><img src="../Assets/File/Seller/<?php echo $data["seller_photo"]?>"height="50" width="25" /></td>
      <td><?php echo $data["district_name"]?></td>
      <td><?php echo $data["place_name"]?></td>
      <td><?php echo $data["seller_contact"]?></td>
      <td><?php echo $data["seller_address"]?></td>
      <td><?php echo $data["seller_email"]?></td>
      <td><img src="../Assets/File/Seller/<?php echo $data["seller_proof"]?>"height="50" width="25" /></td>
      <td colspan="2" align="center">
      <a href="ViewSeller.php?reject=<?php echo $data ["seller_id"]?>">Reject</a></td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php") ?>