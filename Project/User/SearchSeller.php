<?php
ob_start(); 

include("../Assets/Connection/Connection.php"); ?>
<?php include('Head.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Seller</title>
<style>
  /* General body styling */
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  /* Centered heading styling */
  h1 {
    text-align: center;
    color: #4CAF50;
    font-size: 28px;
    margin-top: 20px;
  }

  /* Styling for the form container */
  form {
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    width: 50%;
  }

  /* Table styling inside the form */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  table td {
    padding: 10px;
    font-size: 16px;
    vertical-align: middle;
  }

  table td:first-child {
    width: 30%;
    text-align: right;
    font-weight: bold;
    padding-right: 15px;
  }

  /* Dropdown styling */
  select {
    width: 100%;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f9f9f9;
  }

  /* Seller list container, styling only for container */
  #sellerList {
    margin: 20px auto;
    width: 80%;
    min-height: 100px;
  }
  
  /* Seller result table */
  table.seller-result {
    margin: 50px auto;
    border-collapse: collapse;
    width: 80%;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  table.seller-result th, table.seller-result td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
  }

  table.seller-result th {
    background-color: #f2f2f2;
    color: #333;
    font-size: 18px;
  }

  table.seller-result tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  table.seller-result tr:hover {
    background-color: #f1f1f1;
  }

  img {
    object-fit: cover;
  }

  .action-links a {
    margin: 0 10px;
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
  }

  .action-links a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>
</head>

<body>
<h1 align="center">Search Seller</h1>
<form id="form1" name="form1" method="post" action="">
  <table align="center" >
    <tr>
      <td>District</td>
      <td>
    <select name="selDistrict" id="selDistrict" onchange="getPlace(this.value)">
    <option>----District----</option>
    <?php
    $sel="select * from tbl_district";
  $result = $con -> query($sel);
    while ($data = $result -> fetch_assoc())
  {
    ?>

<option value="<?php echo $data["district_id"] ?>">
        <?php echo $data["district_name"] ?>
        </option>
        <?php } ?>
        </select>
  </td>
    </tr>
    <tr>
      <td>Place</td>
       <td>
    <select name="selPlace" id="selPlace" onchange="searchSeller(this.value)">
    <option value="">----Place----</option>
    </select>
    </td>
    </tr>
  </table>
</form>
<br /><br />

<div id="sellerList">
<!-- Seller results will be displayed here -->
</div>


<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (html) {

        $("#selPlace").html(html);
      }
    });
  }

</script>
<script>
function searchSeller(sid)
{
  $.ajax({
    url:"../Assets/AjaxPages/AjaxSeller.php?sid=" + sid,
    success: function(html) {
      $("#sellerList").html(html);
    }
  });
}
</script>
</body>
</html>