<?php
ob_start();
session_start();
include('Head.php');



include("../Assets/Connection/Connection.php");
if(isset($_GET["stockid"]))
{
	$_SESSION["stockid"] = $_GET["stockid"];
}

if(isset($_POST["btnsave"]))
{
	$qty = $_POST["txtqty"];
	
			
				$insqry="insert into tbl_stock(stock_qty, stock_date, product_id)values('".$qty."',curdate(),'".$_SESSION["stockid"]."')";
				if($con -> query($insqry))
				{		
					header("Location:Stock.php");
				}
				
			
		
		
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Stock</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    #tab {
        background-color: #fff;
        border-radius: 8px;
        margin: 20px auto;
        padding: 20px;
        width: 80%;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #f4f4f4;
    }
    input[type="text"] {
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        width: 100%;
    }
    input[type="submit"] {
        background-color: #5cb85c;
        border: none;
        color: #fff;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #4cae4c;
    }
    .container {
        width: 90%;
        margin: 0 auto;
        padding: 20px;
    }
</style>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr align="center">
      <td>Quantity</td>
      <td><label for="txtqty"></label>
      <input type="text" name="txtqty" id="txtqty" required="required" autocomplete="off" /></td>
    </tr>
    <tr align="center">
      <td colspan="2">
        <input type="submit" name="btnsave" id="btnsub" value="Save" />
      </td>
    </tr>
  </table>
  </form>
  <br /><br/>
  <table align="center" cellpadding="5">
    <tr align="center">
      <td>Si.no</td>
       <td>Date</td>
      <td>Quantity</td>
      
    </tr>
   
    
<?php
$i=0;

$selqry = "select * from tbl_stock s inner join tbl_product p on s.product_id = p.product_id where p.product_id='".$_SESSION["stockid"]."'";
$result = $con -> query($selqry);
while($row = $result -> fetch_assoc())
{
	$i++;
?>
		<tr align="center">
        	<td>
            <?php echo $i;?>
            </td>
            <td>
            <?php echo $row["stock_date"];?>
            </td>   
            <td>
            <?php echo $row["stock_qty"];?>
            </td>           
       		</tr>
        <?php
}

?>    

   
  </table>
  
</div>
</body>
<?php
include('Foot.php');
?>
<?php
ob_end_flush();
?>
</html>