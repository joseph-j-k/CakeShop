<?php include("Head.php") ?>
<?php  
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
	$subcategory = $_POST["txt_subcategory"];
	$category = $_POST["selCategory"];
	
	
	
	$insQry = "Insert into  tbl_subcategory(subcategory_name,category_id)values('".$subcategory ."','".$category."')";
	
	if($con -> query($insQry))
	{
		echo "<script>
		       alert('Inserted');
			   window.location = 'Subcategory.php';
			   </script>";
	}
}




	
	if(isset($_GET["did"]))
{
		 $del= "delete from tbl_subcategory where subcategory_id='".$_GET["did"]."'";
           if($con -> query($del))
       {
		echo "<script>
		       alert('Deleted');
			   window.location ='Subcategory.php';
			   </script>";
	}
	
	}
	
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subcategory</title>
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
      <td>Category</td>
      <td>
      <select name="selCategory" id="selCategory">
      <option>----select----</option>
      <?php 
	$sel = "select * from    tbl_category";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  ?>
       <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"]?></option>
       <?php } ?>
      </select>
      
      </td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="txt_subcategory"></label>
      <input type="text" name="txt_subcategory" id="txt_subcategory" Required placeholder="Enter SubCategory" /></td>
    </tr>
      <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Add" />
      <input type="reset" name="btn_reset" id="btn_cancel" value="Cancel" />
       </td>
    </tr>
    </table>
   <p>&nbsp;</p>
   <table  border="1" align="center"vstyle="margin-top:500px">
    <tr>
      <td>SLNO</td>
      <td>Category</td>
      <td>Subcategory</td>
      <td colspan="2" align="center">Action</td>
    </tr>
    <?php 
	$i=0;
	$sel = "select * from  tbl_subcategory s inner join tbl_category c on s.category_id   =  c .category_id";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
		?>
	     <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["category_name"]?></td>
      <td><?php echo $data["subcategory_name"]?></td>
      <td>
      <a href="Subcategory.php?did=<?php echo $data['subcategory_id'] ?>">Delete</a>
      </td>
    </tr>
	<?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php") ?>