<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_save"]))
{
	$date=$_POST["txt_date"];
	$address=$_POST["txt_address"];
	$contact=$_POST["txt_contact"];
	
	$insQry = "insert into tbl_requirement(requirement_date,requirement_address,requirement_contact,booking_id ) values ('".$date."','".$address."','".$contact."','".$_GET["rid"]."')";
	
	if($con -> query($insQry))
	{
		echo "<script>
		alert('Inserted');
		window.location='MyBooking.php';
		</script>";
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Requirement Details</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }
    h1 {
        color: #333;
        text-align: center;
        margin-top: 20px;
    }
    form {
        margin: 0 auto;
        width: 50%;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    td {
        padding: 10px;
        text-align: left;
        vertical-align: top;
    }
    td input, td textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    td input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        padding: 10px 20px;
        font-size: 16px;
    }
    td input[type="submit"]:hover {
        background-color: #45a049;
    }
    td:first-child {
        font-weight: bold;
        color: #555;
    }
    table tr td[colspan="2"] {
        text-align: center;
    }
</style>
</head>

<body>
<h1>Requirement Details</h1>
<form id="form1" name="form1" method="post" action="">
  <table border="0">
    <tr>
      <td>Required Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Delivery Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Delivery Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td colspan="2">
      <input type="submit" name="btn_save" id="btn_save" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
