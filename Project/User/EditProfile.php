<?php 


include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
ob_start();

if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
    $address = $_POST["txt_address"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	

$updQry = "update tbl_user set User_name = '".$name."',User_address = '".$address."',User_contact = '".$contact."',User_email = '".$email."',User_password = '".$password."' where User_id = '".$_SESSION["uid"]."'";

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
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
    }

    table {
        width: 50%;
        margin: 50px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"], .back-link {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin: 10px;
    }

    input[type="submit"]:hover, .back-link:hover {
        background-color: #45a049;
    }

    label {
        margin-right: 10px;
    }

    h1 {
        text-align: center;
        color: #333;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php 
  $sel = "select * from tbl_user u inner join tbl_place p on u.place_id = p.place_id inner join  tbl_district d on d.district_id = p.district_id where User_id = '".$_SESSION["uid"]."'";
 $result = $con -> query($sel);
 if($data = $result -> fetch_assoc())
 {
	 
?> 
  <table border="1" align="center">
  <tr>
  <td>Name</td>
  <td><label for="txt_name"></label>
    <input type="text" name="txt_name" id="txt_name" value="<?php echo $data["User_name"] ?>"/></td>
  </tr>
  <tr>
  <td>Address</td>
  <td><label for="txt_address"></label>
    <input type="text" name="txt_address" id="txt_address" value="<?php echo $data["User_address"] ?>"/></td>
  </tr>
  <tr>
  <td>Contact</td>
  <td><label for="txt_contact"></label>
    <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["User_contact"] ?> "/></td>
  </tr>
  <tr>
  <td>Email</td>
  <td><label for="txt_email"></label>
    <input type="text" name="txt_email" id="txt_email"value="<?php echo $data["User_email"] ?>" /></td>
   </tr>
   <tr>
   <td>Password</td>
   <td><label for="txt_password"></label>
  <input type="text" name="txt_password" id="txt_password" value="<?php echo $data["User_password"] ?>"/></td>
    </tr>
   <tr>
  <td colspan="2" align="center">
  <label for="btn_submit"></label>
  <input type="submit" name="btn_submit" id="btn_submit" value="Edit"/>
  <label for="btn_cancel"></label>
  <a href="Myprofile.php" class="back-link">Back</a>
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