<?php 
ob_start();

include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
     
	 
	  if(isset($_POST["btn_submit"]))
	  {
		$rqdate = $_POST["txt_rqdate"];
		$address = $_POST["txt_address"];
		$contact = $_POST["txt_contact"]; 
		$photo = $_FILES["photo"]["name"];
		$temp = $_FILES["photo"]["tmp_name"];
		move_uploaded_file($temp, '../Assets/File/User/' .$photo);
		$details = $_POST["txt_details"];
		$quantity = $_POST["txt_qty"];
	  $product = $_POST["selProduct"];
       
		    

   $insQry = "insert into tbl_customization(customization_date,customization_todate,customization_address,customization_contact,customization_photo,customization_details,customization_quantity,product_id,user_id) values(curdate(),'".$rqdate."','".$address."','".$contact."','".$photo."','".$details."','".$quantity."','".$product."','".$_SESSION["uid"]."')";
   
   if($con -> query($insQry))
	{
		echo "<script>
		       alert('Inserted');
			   window.location = 'Customization.php';
			   </script>";
	}
}

if(isset($_GET["did"]))
  {
	$del = "delete from tbl_customization where customization_id  = '".$_GET["did"]."'";
	
	if($con -> query($del))
	{
		echo "<script>
		       alert('Deleted');
			   window.location ='Customization.php';
			   </script>";
	}
	
	
	}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customization Product</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-top: 20px;
        font-size: 24px;
    }

    form {
        width: 60%;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td {
        padding: 10px;
        font-size: 16px;
        color: #555;
    }

    table tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    select, input[type="text"], input[type="date"], textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="file"] {
        padding: 8px;
    }

    textarea {
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #218838;
    }

    a {
        text-decoration: none;
        color: #007bff;
        margin-left: 20px;
    }

    a:hover {
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        form {
            width: 90%;
        }
    }
</style>
</head>

<body>
<h1 align="center">Customization Product</h1>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  align="center" border="1">
    <tr>
      <td>Product</td>
      <td>
      <select name="selProduct" id="selProduct">
      <option>----Select----</option>
       <?php 
	$sel = "select * from   tbl_product";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
       <option value="<?php echo $data["product_id"] ?>"><?php echo $data["product_name"]?></option>
       <?php } ?>
      </select>
      </td>
    </tr>
     
    <tr>
      <td>Required date</td>
      <td><label for="txt_rqdate"></label>
      <input type="date" name="txt_rqdate" id="txt_rqdate" /></td>
    </tr>
    <tr>
      <td>Delivery Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" /></td>
    </tr>
    <tr>
      <td>Delivery Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Photo</td>
       <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td>
      <label for="txt_details"></label>
      <textarea name="txt_details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
      <tr>
      <td>Quantity</td>
      <td><label for="txt_qty"></label>
      <input type="text" name="txt_qty" id="txt_qty" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit"/>  
      <a href="Viewcustomization.php">View Customization</a>   
        </tr>
  </table>
</form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>