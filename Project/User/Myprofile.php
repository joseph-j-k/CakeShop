<?php 

include("../Assets/Connection/Connection.php");
session_start();
include('Head.php');
ob_start();


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff;
        color: #333;
    }

    h1 {
        font-size: 36px;
        color: #4CAF50;
    }

    table {
        width: 50%;
        border-collapse: collapse;
        margin: 50px auto;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table, td, th {
        border: 1px solid #ddd;
        padding: 15px;
    }

    td {
        text-align: left;
        padding: 10px;
    }

    th {
        background-color: #f2f2f2;
    }

    .img {
        border-radius: 50%;
        border: 5px solid #ddd;
    }

    .a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        margin: 10px;
        display: inline-block;
    }

    .a:hover {
        background-color: #45a049;
    }

    td[colspan="2"] {
        text-align: center;
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
  <td colspan="2" align="center"><img src="../Assets/File/User/<?php echo $data["User_photo"] ?>" height="300" width="300" class="img"/></td>
  
  <tr>
  <td>Name</td>
  <td><?php echo $data["User_name"] ?></td>
  </tr>
  <tr>
  <td>Gender</td>
  <td><?php echo $data["User_gender"] ?></td>
  </tr>
  <tr>
  <td>DOB</td>
  <td><?php echo $data["User_dob"] ?></td>
  </tr>
  <tr>
  <td>Address</td>
  <td><?php echo $data["User_address"] ?></td>
 </tr>
  <tr>
  <td>Contact</td>
  <td><?php echo $data["User_contact"] ?></td>
  </tr>
  <tr>
  <td>Email</td>
  <td><?php echo $data["User_email"] ?></td>
  </tr>
  <tr>
  <td>District</td>
  <td><?php echo $data["district_name"] ?></td>
  </tr>
  <tr>
  <td>Place</td>
  <td><?php echo $data["place_name"] ?></td>
  </tr>
  <tr>
  <td colspan="2" align="center">
  <a href="EditProfile.php" class="a">Edit Profile</a>
  <a href="ChangePassword.php" class="a">Change Password</a>
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