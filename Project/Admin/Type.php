<?php include("Head.php") ?>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_type"];
	
	$inQry = "insert into tbl_type(type_name) values('".$name."')";
	
	if($con -> query($inQry))
	
	{
		echo"<script>
		alert('Inserted');
		window.location = 'Type.php';
		</script>";
	}
}



	if(isset($_GET["did"]))
{
    $del= "delete from tbl_type where type_id ='".$_GET["did"]."'";
           if($con -> query($del))
       {
         
    echo "<script>
    alert('Deleted');
    window.location = 'Type.php';
    </script>";
       }
}


	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Type</title>
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
  <table width="200" border="1" align="center">
    <tr>
      <td>Type</td>
      <td><label for="txt_type"></label>
      <input type="text" name="txt_type" id="txt_type" Required placeholder="Enter Type" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Save" />
     <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table border="1" align="center">
    <tr>
      <td>Slno</td>
      <td>Type</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php
	$i = 0;
	$sel = "select * from  tbl_type";
	 $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
  {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['type_name'] ?></td>
      <td>
       <a href="Type.php?did=<?php echo $data['type_id'] ?>">Delete</td>
    </tr>
    <?php } ?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php include("Foot.php") ?>