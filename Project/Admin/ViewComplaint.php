<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VIEW COMPLAINT</title>
<style>
    .main_content {
        padding: 20px;
    }

    .white_box {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .box_header {
        margin-bottom: 20px;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
    }

    .btn-dark {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
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
        color: #fff;
    }

    .status_btn {
        text-decoration: none;
        background-color: #28a745;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .status_btn:hover {
        background-color: #218838;
    }
</style>

</head>
    <?php  
	ob_start();
    include("Head.php");
include('../Assets/Connection/Connection.php');

      
    if(isset($_POST["btn_save"])) {

            $upQry = "update tbl_complaint set complaint_reply='".$_POST["txt_reply"]."',complaint_status='1' where complaint_id='".$_POST["hid"]."'";
            $con->query($upQry);
			
           header("Location:ViewComplaint.php");
        }


    ?>
    <body>
        <section class="main_content dashboard_part">

            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <?php                          
								         if (isset($_GET["up"])) {
                                ?>

                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Send Reply</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_district">Reply</label>
                                                    <input required="" type="text" class="form-control" id="txt_reply" name="txt_reply">
                                                    <input type="hidden" name="hid" value="<?php echo $_GET["up"];?>">
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    }


                                ?>
                                <h1>New Complaints</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Complaint</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">User</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$i = 0;
                                                $selQry = "select * from tbl_complaint c inner join tbl_complainttype t on t.complainttype_id=c.complainttype_id inner join tbl_user u on c.User_id = u.User_id inner join tbl_booking b on  b.booking_id = c.booking_id where complaint_status='0'";
                                               $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["complaint_content"] ?></td>
                                                <td align="center"><?php echo $data["complaint_date"] ?></td>
                                                <td align="center"><?php echo $data["User_name"] ?></td>
                                                <td align="center">
                                                    <a href="ViewComplaint.php?up=<?php echo $data["complaint_id"] ?>" class="status_btn">Reply</a> 
                                                    <a class="status_btn" href="ViewProduct.php?pid=<?php echo $data['booking_id']; ?>">View Product</a>
                                            
                                            </td>
                                            </tr>
                                            <?php                     
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <h1>Replyed Complaints</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Complaint</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">User</td>
                                                <td align="center" scope="col">Reply</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
												$i = 0;
                                                $selQry = "select * from tbl_complaint c inner join tbl_complainttype t on t.complainttype_id=c.complainttype_id inner join tbl_user u on c.User_id = u.User_id where complaint_status='1'";
                                               $rs = $con->query($selQry);
                                                while ($data = $rs->fetch_assoc()) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["complaint_content"] ?></td>
                                                <td align="center"><?php echo $data["complaint_date"] ?></td>
                                                <td align="center"><?php echo $data["User_name"] ?></td>
                                                <td align="center"><?php echo $data["complaint_reply"] ?></td>
                                            </tr>
                                            <?php                     }


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
    </body>
     <?php
		 ob_end_flush();
		?>
    </html>

    <?php include("Foot.php") ?>