<?php 
include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
 
 if(isset($_POST["btn_submit"]))
 
 {
	 $name = $_POST["txt_name"];
	 $description = $_POST["txt_desc"];
   $price = $_POST["txt_price"];
   $photo = $_FILES["photo"]["name"];
	 $temp = $_FILES["photo"]["tmp_name"];
	 move_uploaded_file($temp,'../Assets/File/Seller/'.$photo);
	 $subcategory = $_POST["selSubcategory"];
	 $type = $_POST["seltype"];
	 
	 
	 
	 
	 
	 $insQry = "insert into tbl_product(product_name, product_description, product_price, product_photo, subcategory_id, type_id, seller_id)values('".$name."', '".$description."', '".$price."','".$photo."','".$subcategory."','".$type."','".$_SESSION["sid"]."')";
	
	
	if($con -> query($insQry))
	{
		echo "<script>
		       alert('Inserted');
			   window.location = 'Product.php';
			   </script>";
	}
}


if(isset($_GET["did"]))
  {
	$del = "delete from tbl_product where product_id  = '".$_GET["did"]."'";
	
	if($con -> query($del))
	{
		echo "<script>
		       alert('Deleted');
			   window.location ='Product.php';
			   </script>";
	}
}

?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
  }

  table th {
    background-color: #007BFF;
    color: #fff;
  }

  table tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  table tr:hover {
    background-color: #f1f1f1;
  }

  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;
    width: 80%;
  }

  form table {
    width: 100%;
    border: none;
  }

  form td {
    padding: 10px;
  }

  input[type="text"], input[type="file"], textarea, select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }

  input[type="submit"], input[type="reset"] {
    background-color:  #5cb85c;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #4cae4c;
  }

  .action-links a {
    margin-right: 10px;
    color: #007BFF;
    text-decoration: none;
  }

  .action-links a:hover {
    text-decoration: underline;
  }

  .img-thumbnail {
    height: 50px;
    width: 50px;
    border-radius: 5px;
    object-fit: cover;
  }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"> 
  <table  align="center">
    <tr>
      <td>photo</td>
      <td><label for="photo"></label>
      <input type="file" name="photo" id="photo" required /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required /></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_desc"></label>
      <textarea name="txt_desc" id="txt_desc" cols="45" rows="5" required></textarea></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><select name="selCategory" id="selCategory" onchange="getcategory(this.value)">
      <option>----select----</option>
      <?php 
	$sel = "select * from tbl_category";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
       <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"]?></option>
   <?php } ?>
      </select>
    </td>
    </tr>

    <tr>
      <td>Subcategroy</td>
      <td>
        <select name="selSubcategory" id="selSubcategory">
      <option>----SubCategory----</option>
      </select>
      </td>
    </tr>

    <tr>
      <td>Type</td>
      <td><select name="seltype" id="seltype">
      <option>----select----</option>
      <?php 
	$sel = "select * from  tbl_type";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
       <option value="<?php echo $data["type_id"] ?>"><?php echo $data["type_name"]?></option>
       <?php } ?>
      </select></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  
  <p>&nbsp;</p>
  <table align="center" >
  <tr>
  <td>Slno</td>
  <td>Photo</td>
  <td>Name</td>
  <td>Description</td>
  <td>Category</td>
  <td>SubCategory</td>
  <td>Type</td>
  <td>Price</td>
  <td colspan="2" align="center">Action</td>
  </tr>
  <?php
  $i=0;
  $sel = "select * from tbl_product p inner join tbl_subcategory s on s.subcategory_id = p.subcategory_id inner join tbl_category c on c.category_id = s.category_id inner join tbl_type t on t.type_id = p.type_id where seller_id = '".$_SESSION["sid"]."'";
  $result = $con -> query($sel);
  while ($data = $result ->fetch_assoc())
  {
	  $i++;
	  ?>
  <tr>
  <td><?php echo $i ?></td>
  <td><img src="../Assets/File/Seller/<?php echo $data["product_photo"]?>"height="50" width="50"/></td>
  <td><?php echo $data["product_name"]?></td>
  <td><?php echo $data["product_description"]?></td>
  <td><?php echo $data["category_name"]?></td>
  <td><?php echo $data["subcategory_name"]?></td>
  <td><?php echo $data["type_name"]?></td>
  <td><?php echo $data["product_price"]?></td>
  <td>
    <a href="Stock.php?stockid=<?php echo $data["product_id"];?>">Stock</a>
    <a href="Product.php?did=<?php echo $data["product_id"]?>">Delete</a>
  </td>
  </tr>
  <?php } ?>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
 function getcategory(did)
{
	$.ajax({
	  url:"../Assets/AjaxPages/AjaxCategory.php?did="+did,
	  success: function(html){
		$("#selSubcategory").html(html);
 	  }
	});
}
  </script>
</body>
</html>

