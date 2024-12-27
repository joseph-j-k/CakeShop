<?php include("Head.php") ?>
<?php  
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$place = $_POST["txt_place"];
	$pincode = $_POST["txt_pin"];
	$district = $_POST["selDistrict"];
	
	
	
	$insQry = "Insert into  tbl_place(place_name,place_pincode,district_id)values('".$place."','".$pincode."','".$district."')";
	
	if($con -> query($insQry))
	{
		echo "<script>
		       alert('Inserted');
			   window.location = 'Place.php';
			   </script>";
	}
}



if(isset($_GET["did"]))
  {
	$del = "delete from tbl_place where place_id  = '".$_GET["did"]."'";
	
	if($con -> query($del))
	{
		echo "<script>
		       alert('Deleted');
			   window.location ='Place.php';
			   </script>";
	}
	
	
  $eid ="";
	$ename = "";
		  if(isset($_GET["eid"]))
	  {
		  
		  $sel = "select * from tbl_place where place_id  = '".$_GET["eid"]."'";
		  $result = $con -> query( $sel);
		  if($row = $result -> fetch_assoc())
		  {
			  
		  	$eid = $row["place_id"];
			$ename = $row["place_name"];
		  }
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
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

        select {
            width: 90%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fff; /* White background for dropdown */
            font-size: 16px; /* Increase font size for better readability */
            color: #333; /* Dark text for contrast */
            appearance: none; /* Remove default arrow */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><polygon points="4,6 8,10 12,6" fill="%234CAF50"/></svg>'); /* Custom dropdown arrow */
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }

        select:focus {
            border-color: #4CAF50; /* Change border color on focus */
            outline: none; /* Remove outline */
        }

    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center">
    <tr>
      <td>District</td>
      <td>
      <select name="selDistrict" id="selDistrict">
      <option>----select----</option>
      <?php 
	$sel = "select * from   tbl_district";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
       <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"]?></option>
       <?php } ?>
      </select>
      
      </td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txt_place"></label>
      <input type="text" name="txt_place" id="txt_place" Required placeholder="Enter Place" /></td>
    </tr>
    <tr>
      <td>Pincode</td>
      <td><label for="txt_pin"></label>
      <input type="text" name="txt_pin" id="txt_pin" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Add" />
      <input type="reset" name="btn_reset" id="btn_cancel" value="cancel" />
       </td>
    </tr>
    </table>
  <p>&nbsp;</p>
  <table  border="1" align="center">
    <tr>
      <td>SLNO</td>
      <td>District</td>
      <td>Place</td>
      <td>Pincode</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	$i=0;
	$sel = "select * from  tbl_place p inner join tbl_district d on d.district_id  = p.district_id";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
		?>
	     <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["district_name"]?></td>
      <td><?php echo $data["place_name"]?></td>
      <td><?php echo $data["place_pincode"]?></td>
      <td>
      <a href="Place.php?eid=<?php echo $data['place_id']?>">Edit</a>
      <a href="Place.php?did=<?php echo $data['place_id']?>">Delete</a>
      </td>
    </tr>
	<?php } ?>
  </table>
</form>
</body>
</html>
<?php include("Foot.php") ?>