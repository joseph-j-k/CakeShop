<?php include("Head.php") ?>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_save']))
{
	$hid = $_POST["txt_hidden"];
	$district = $_POST["txt_districtname"];
	
	
	
	if($hid!= "")
	{
		$update = "update  tbl_district set district_name = '".$district."' where district_id = '".$hid."'";
		
		if($con -> query($update))
	{
		echo "<script>
		       alert('Updated');
			   window.location = 'District.php';
			   </script>";
	}
	}
	else
	{
	
	$insQry="insert into tbl_district(district_name) values('".$district."')";
	
	if($con -> query($insQry))
	{
		echo "<script>
		       alert('Inserted');
			   window.location = 'District.php';
			   </script>";
	}
}
	
}

if(isset($_GET["did"]))
  {
	$del = "delete from tbl_district where district_id = '".$_GET["did"]."'";
	
	if($con -> query($del))
	{
		echo "<script>
		       alert('Deleted');
			   window.location = 'District.php';
			   </script>";
	}
	
	
	}
	
	

$eid ="";
	$ename = "";
		  if(isset($_GET["eid"]))
	  {
		  
		  $sel = "select * from tbl_district where district_id  = '".$_GET["eid"]."'";
		  $result = $con -> query( $sel);
		  if($row = $result -> fetch_assoc())
		  {
			  
		  	$eid = $row["district_id"];
			$ename = $row["district_name"];
		  }
	  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<style>

        h1 {
            text-align: center;
            color: #4CAF50; /* Green color for the title */
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            background-color: #fff; /* White background for tables */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50; /* Green background for header */
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1; /* Light gray on hover */
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #218cbb; /* Green button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: rgba(33,140,187,255); /* Darker green on hover */
        }

        a {
            color: #f44336; /* Red color for delete links */
            text-decoration: none;
        }
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align="center">
    <tr>
      <td>District&nbsp;Name</td>
      <td><label for="txt_districtname"></label>
       <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $eid ?>"/>
      <input type="text" name="txt_districtname" id="txt_districtname" value="<?php echo $ename ?>" Required placeholder="Enter District"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Submit" />
    <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table> 
  <br /><br />
  <table border="1" align="center">
    <tr>
      <td>SLNO</td>
      <td>District</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	$i=0;
	$sel = "select * from tbl_district";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['district_name'] ?></td>
     <td>
   	<a href="District.php?eid=<?php echo $data['district_id'] ?>">Edit</a>
  	<a href="District.php?did=<?php echo $data['district_id'] ?>">Delete</a>
  </td>
    </tr>
    <?php } ?>
  </table>
  
</form>
</body>
</html>

<?php include("Foot.php") ?>