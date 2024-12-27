<?php
ob_start();
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btnsubmit"]))
{
		$content=$_POST["txtcontent"];
		$complainttypeid=$_POST["txttype"];
		$insQry="insert into tbl_complaint(complaint_date,complaint_content,user_id,complainttype_id,booking_id)values(curdate(),'".$content."','".$_SESSION["uid"]."','".$complainttypeid."','".$_GET['cid']."')";
		echo $insQry;
			if($con->query($insQry))
			{	?>
            	<script>
				alert('Inserted');
				location.href='Complaint.php';
				</script>
              <?php
				
			}
			else
			{   
			?>
            	<script>
				alert('Failed');
				location.href='Complaint.php';
				</script>
                <?Php
             }
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    #tab {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2c3e50;
        text-align: center;
        font-size: 28px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #dcdcdc;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    select, textarea, input[type="submit"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 8px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #abdbe3;
        color: white;
        cursor: pointer;
        border: none;
    }

    input[type="submit"]:hover {
        background-color: #76b5c5;
    }

    textarea {
        resize: none;
    }

    select {
        appearance: none;
        background-color: #ffffff;
        width: 500%; 
        padding: 50px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 8px;
        font-size: 16px;
    }

    option {
        padding: 8px;
    }

    td {
        font-size: 14px;
    }

    .center {
        text-align: center;
    }

</style>

<form id="form1" name="form1" method="post" action="">
  <br><br><br><br>
  <div id="tab">
 <h1 align="center">Complaint</h1>
 
    <table  align="center" width="449" border="1">
      <tr>
        <td width="60">Type</td>
        <td width="373"><label for="txttype"></label>
        <select name="txttype" id="txttype"/>
         <option value="">---select---</option>
        <?php
		$selQry="select * from tbl_complainttype";
		$re=$con->query($selQry);
		while($row=$re->fetch_assoc())
		{
			?>
            <option value="<?php echo $row["complainttype_id"] ?>"><?php echo $row["complainttype_name"]?></option>
        		<?php
		}
		?>		
        </select></td>
    </tr>
       
      <tr>
        <td>Content</td>
        <td><label for="txtcontent"></label>
        <textarea name="txtcontent" id="txtcontent" cols="45" rows="5"></textarea></td>
      </tr>
      <tr>
        <td align="center"colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
      </tr>
    </table>
<p>&nbsp;</p>
  <?php
  $selQry="select * from tbl_complaint c inner join tbl_complainttype d on d.complainttype_id=c.complainttype_id";
  $rel=$con->query($selQry);
  if($rel->num_rows>0)
  {
?>
  <table align="center" border="1">
    <tr>
      <td>Sl.No</td>
      <td>Type</td>
      <td>Date</td>
       <td>Content</td>
      <td>Replay</td>
    </tr>
    <?php
	$i=0;
	
	while($row=$rel->fetch_assoc())
	{
		$i++;
?>
<tr>
	<td><?php echo $i?></td> 
    <td><?php echo $row["complainttype_name"]?></td> 
    <td><?php echo $row["complaint_date"]?></td> 
     <td><?php echo $row["complaint_content"]?></td> 
    <td><?php echo $row["complaint_reply"]?></td> 


</tr>
<?php
	}
   }
   else
   {
	   echo "<h1 align='center'>No Data Found<h1>";
   }

?>   
  </table>
  <p>&nbsp;</p>
</form>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>