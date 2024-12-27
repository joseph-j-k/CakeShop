<?php include("Head.php") ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
<style>
    .main_content {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .white_box {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
    }

    .box_header {
        margin-bottom: 20px;
    }

    .btn-dark {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-dark:hover {
        background-color: #0056b3;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #74CBF9;
    }

    .status_btn {
        color: red;
        text-decoration: none;
        font-weight: bold;
    }

    .status_btn:hover {
        text-decoration: underline;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }
</style>

</head>
<?php
ob_start();
include('../Assets/Connection/Connection.php');


$did = "";
$dname = "";

	if(isset($_POST['btn_save']))
	{
		
		$complainttype = $_POST['txt_complainttype'];
		
		
			$ins = "insert into tbl_complainttype(complainttype_name) values('".$complainttype."')";
		
			if($con->query($ins))
			{
				header("Location:complainttype.php");
			}
		
		
		
		
	}
	
	if(isset($_GET['id']))
	{
		$del = "delete from tbl_complainttype where complainttype_id = '".$_GET['id']."'";
		if($con->query($del))
		{
			header("Location:complainttype.php");
		}
	}
	
	

?>
<body>
        <section class="main_content dashboard_part">
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table complainttype</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_complainttype">complainttype Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_complainttype" name="txt_complainttype">
                                                </div>
                                                <div class="form-group" align="center">
<input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">complainttype</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_complainttype";
                                                $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["complainttype_name"];?></td>
                                                <td align="center"><a href="complainttype.php?id=<?php echo $data["complainttype_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
</td>                                            </tr>
                                            <?php                    
                                              }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
		 ob_end_flush();
		?>
</body>
</html>

<?php include("Foot.php") ?>