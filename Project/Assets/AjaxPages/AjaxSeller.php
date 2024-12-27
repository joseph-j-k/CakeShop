<?php include("../Connection/Connection.php"); ?>
<?php
if(isset($_GET["sid"]))
{
  $place = $_GET["sid"];
  ?>
   <style>
    table {
      width: 100%;
      margin: 20px auto;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 12px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
      color: #333;
    }
    td img {
      border-radius: 8px;
    }
    td a {
      text-decoration: none;
      color: white;
      background-color: #007bff;
      padding: 8px 16px;
      border-radius: 4px;
      margin-right: 5px;
      transition: background-color 0.3s ease;
    }
    td a:hover {
      background-color: #0056b3;
    }
    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
    .btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    font-size: 14px;
    font-family: Arial, sans-serif;
    color: #fff;
    background-color: #28a745; /* Green background */
    border: none;
    border-radius: 5px; /* Rounded corners */
    text-decoration: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  .btn:hover {
    background-color: #218838; /* Darker green on hover */
    transform: translateY(-2px); /* Lift effect on hover */
  }

  .btn-secondary {
    background-color: #007bff; /* Blue background */
  }

  .btn-secondary:hover {
    background-color: #0056b3; /* Darker blue on hover */
  }
  </style>
  <br /><br />
  <table align="center" border="1">
    <tr>
      <td>Sl No</td>
      <td>Name</td>
        <td>Email</td>
      <td>Address</td>
        <td>Contact</td>
        <td>District</td>
        <td>Place</td>
      <td>Photo</td>
        <td colspan="2" align="center">Action</td>
      </tr>
      <?php
  $i=0;
    $sel = "select * from tbl_seller s inner join tbl_place p on p.place_id  = s.place_id inner join tbl_district d on d.district_id = p.district_id where seller_status = '1' and S.place_id = '".$place."'";
    $result = $con -> query($sel);
    while($data = $result -> fetch_assoc())
    {
     $i++;
     ?>
    
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["seller_name"] ?></td>
      <td><?php echo $data["seller_email"] ?></td>
        <td><?php echo $data["seller_address"] ?></td>
        <td><?php echo $data["seller_contact"] ?></td>    
      <td><?php echo $data["district_name"] ?></td>
         <td><?php echo $data["place_name"] ?></td>
      <td><img src="../Assets/File/Seller/<?php echo $data["seller_photo"]?>"height="60" width="60"/></td>
        <td>
        <a href="Customization.php?sid=<?php echo $data["seller_id"] ?>" class="btn">Customization</a>
        <a href="SearchProduct.php?sid=<?php echo $data["seller_id"] ?>" class="btn">Search&nbsp;Product</a>
        </td>
      </tr>
      <?php } ?>
</table>
  <?php } ?>