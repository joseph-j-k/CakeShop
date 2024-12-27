<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	$hid = $_POST["txt_hidden"];
	
	
	if($hid!= "")
	{
		
		$update ="update  tbl_admin set admin_name = '".$name."',admin_email = '".$email."',admin_password = '".$password."'";
		
		
		if($con -> query($update))
		
		
		{
			echo "<script>
		       alert('Updated');
			   window.location = 'AdminRegistration.php';
			   </script>";
	}
}
		
	
	else
	
	{
			
		
		
		
		
	$insQry ="insert into tbl_admin(admin_name,admin_email,admin_password) values('".$name."','".$email."','".$password."')";
	
	if($con -> query($insQry))
	
	{
		echo"<script>
		alert('Inserted');
		window.location = 'AdminRegistration.php';
		</script>";
	}
}

}


if(isset($_GET["did"]))
  {
	$del = "delete from tbl_admin where admin_id = '".$_GET["did"]."'";
		if($con -> query($del))
	{
		echo "<script>
		       alert('Deleted');
			   window.location = 'AdminRegistration.php';
			   </script>";
	}
	
	
	}
	
	
	$eid ="";
	$ename = "";
	$email = "";
	$epassword = "";
	  
	  if(isset($_GET["eid"]))
	  {
		  
		  $sel = "select * from  tbl_admin where admin_id = '".$_GET["eid"]."'";
		  $result = $con -> query( $sel);
		  if($row = $result -> fetch_assoc())
		  {
			  
		  	$eid = $row["admin_id"];
			$ename = $row["admin_name"];
			$email = $row["admin_email"];
			$epassword = $row["admin_password"];
		  }
	  }
			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Registration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Admin Registration</h1>
  <table width="200" border="1" align="center">
    <tr>
      <td>Admin Name</td>
      <td>
      <label for="txt_name"></label>
      <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $eid ?>"/>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $ename ?>"/></td>
    </tr>
    <tr>
      <td>Admin Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $email ?>"/></td>
    </tr>
    <tr>
      <td>Admin Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password"  value="<?php echo $epassword ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      
      </td>
     
    </tr>
  </table>
  <p>&nbsp;</p>
  <table align="center" border="1">
    <tr>
      <td>Slno</td>
      <td>Name</td>
      <td>Email</td>
      <td>Action</td>
    </tr>
    <?php
	$i = 0;
	$selQry = "select * from  tbl_admin";
	$result = $con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++;
	 ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['admin_name'] ?></td>
      <td><?php echo $data['admin_email'] ?></td>
      <td><?php echo $data['admin_password'] ?></td>
      <td>
      <a href="AdminRegistration.php?eid=<?php echo $data['admin_id'] ?>">Edit</a>
       <a href="AdminRegistration.php?did=<?php echo $data['admin_id'] ?>">Delete</a>
    </tr>
    <?php
	}
	?>
  </table>
  </form>
</body>
</html>