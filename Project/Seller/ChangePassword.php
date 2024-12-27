<?php 
include("../Assets/Connection/Connection.php");
session_start();

include('Head.php');
ob_start();

if(isset($_POST["btn_submit"]))
{
	$oldpassword = $_POST["txt_oldpassword"];
	$_newpassword = $_POST["txt_newpassword"];
	$_confirmpass = $_POST["txt_confirmpass"];



$sel  = "select * from  tbl_seller where seller_id ='".$_SESSION["sid"]."'";
$result = $con -> query($sel);
$data = $result -> fetch_assoc();
$DbPassword = $data["seller_password"];



if($DbPassword == $oldpassword)
{
	if($_newpassword == $_confirmpass)
	{
		$update = "update tbl_seller set seller_password = '".$_newpassword."' where seller_id = '".$_SESSION["sid"]."'";

if($con -> query($update))
{
	echo "<script>
	    alert('updated');
		window.location = 'ChangePassword.php';
		</script>";


       }


}
	else
	{
		echo "<script>
		      alert('Password Missmatch');
			  window.location ='ChangePassword.php';
		</script>"; 
	}
	
}

else
{
	
	echo "<script>
		      alert('Password incorrect');
			  window.location ='ChangePassword.php';
		</script>"; 
	}
	
}
	




?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }
    h1 {
        color: #4CAF50;
        margin-top: 50px;
        text-align: center;
    }
    table {
        width: 50%;
        margin: 0 auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    td {
        padding: 10px;
        text-align: left;
    }
    input[type="text"] {
        width: 100%;
        padding: 8px;
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
        margin: 10px 2px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover{
        background-color: #45a049;
    }
</style>
</head>

<body>
<h1 align="center">Change Password</h1>
<form id="form1" name="form1" method="post" action="">
  <table  align="center">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_oldpassword"></label>
      <input type="text" name="txt_oldpassword" id="txt_oldpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpass"></label>
      <input type="text" name="txt_confirmpass" id="txt_confirmpass" /></td>
    </tr>
    <tr>
    <td colspan="2" align="center">
    <input type="Submit" name="btn_submit" id="btn_submit" value="Change"/>
    </td>
    </tr>
  </table>
</form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>