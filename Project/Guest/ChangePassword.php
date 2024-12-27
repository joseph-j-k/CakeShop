<?php 


include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
ob_start();

if(isset($_POST["btn_submit"]))
{
	$_newpassword = $_POST["txt_newpassword"];
	$_confirmpass = $_POST["txt_confirmpass"];



$sel  = "select * from tbl_user where User_id = '".$_SESSION["uid"]."'";
$result = $con -> query($sel);
$data = $result -> fetch_assoc();


	if($_newpassword == $_confirmpass)
	{
		$update = "update tbl_user set User_password = '".$_newpassword."' where User_id = '".$_GET["cid"]."'";

if($con -> query($update))
{
	echo "<script>
	    alert('updated');
		window.location = 'Login.php';
		</script>";


}
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
  <table border="1" align="center">
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