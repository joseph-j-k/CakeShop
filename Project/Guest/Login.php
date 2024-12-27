<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_submit"]))
{
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	
	
	$selUser = "select * from  tbl_user where User_email  = '".$email."' and User_password = '".$password."'";
	$selSeller = "select * from tbl_seller where  seller_email = '".$email."' and seller_password = '".$password."'";
    $seladmin = "select * from tbl_admin where admin_email = '".$email."' and admin_password = '".$password."'";

	$result1 = $con -> query($selUser);
	$result2 = $con -> query($selSeller);
    $result3 = $con -> query($seladmin);

	if($dataUser = $result1 -> fetch_assoc())
	{
		$_SESSION["uid"] = $dataUser["User_id"];
		$_SESSION["uname"] = $dataUser["User_name"];
		header("Location:../User/Homepage.php");
		
		
	}
	else if($dataSeller = $result2 -> fetch_assoc())
	{
        $_SESSION["sid"] = $dataSeller["seller_id"];
        $_SESSION["sname"] = $dataSeller["seller_name"];
        header("Location:../Seller/Homepage.php");
	
	}
    else if($dataAdmin = $result3 -> fetch_assoc())
    {
        $_SESSION["aid"] = $dataAdmin["admin_id"];
        $_SESSION["aname"] = $dataAdmin["admin_name"];
        header("Location:../Admin/Dashboard.php");
    }


}

?>


<?php include("Head.php") ?>
  <!-- Class Section Begin -->
 <section class="class spad" style="margin-top:80px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="class__form">
                        <div class="section-title">
                            <h2>#Made from your <br />own hands, please login</h2>
                        </div>
                        <form action="" method="post">
                          <input type="text" name="txt_email" id="txt_email" placeholder="Email" required autocomplete="off"/>
                          <input type="text" name="txt_password" id="txt_password" placeholder="Password" required autocomplete="off"/>
                            <button type="submit" name="btn_submit" id="btn_submit" value="Login" class="site-btn">Login</button>
                            <br><br>
                        <a href="Forgotpassword.php">forgot password</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="class__video set-bg" data-setbg="../Assets/Templates/User/Main/img/class-video.jpg">
            </div>
        </div>
    </section>
    <!-- Class Section End -->
    <?php include("Foot.php") ?>
