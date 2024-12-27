<?php

include("../Assets/Connection/Connection.php");
session_start();

include('Head.php');
ob_start();



if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	

$updQry = "update tbl_seller set seller_name = '".$name."',seller_contact = '".$contact."',seller_email = '".$email."',seller_password = '".$password."' where seller_id = '".$_SESSION["sid"]."'";

if($con -> query($updQry))
{
	echo"<script>
	  alert('updated');
	  window.location = 'EditProfile.php';
	  </script>";
	  
}


}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }
    h1 {
        color: #4CAF50;
    }
    table {
        width: 60%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
    }
    td, th {
        padding: 12px;
        text-align: left;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tr:hover {
        background-color: #e0e0e0;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }
    input[type="reset"] {
        background-color: #f44336;
    }
</style>
</head>

<body>
<h1 align="center">Edit Profile</h1>
<form id="form1" name="form1" method="post" action="">
<?php
$sel = "select * from tbl_seller s inner join tbl_place p on s.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where  seller_id = '".$_SESSION["sid"]."'";

$result = $con -> query($sel);
if($data = $result -> fetch_assoc())
{
  ?>
    <table align="center" border="1">
      <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data["seller_name"] ?>"/></td>
    </tr>
      <tr>
      <td>Contact</td>
      <td>
      <label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["seller_contact"] ?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data["seller_email"] ?>"/></td>
    </tr>
    <tr>
     <td>Password</td>
   <td><label for="txt_password"></label>
  <input type="text" name="txt_password" id="txt_password" value="<?php echo $data["seller_password"] ?>"/></td>
    </tr>
   <tr>
  <td colspan="2" align="center">
  <label for="btn_submit"></label>
  <input type="submit" name="btn_submit" id="btn_submit" value="Edit"/>
  <label for="btn_cancel"></label>
  <input type="reset" name="btn_cancel" id="btn_cancel" value="reset"/>
  </td>
  </tr>
</table>
<?php } ?>
</form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>