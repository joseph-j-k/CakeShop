<?php 
include("Head.php");
include("../Assets/Connection/Connection.php");

$sel = "select count(*) as seller from tbl_seller  where seller_status = '1'";
	$result = $con -> query($sel);
  $data = $result-> fetch_assoc();
  
$sel1 = "select count(*) as user from tbl_user";
 $result1 = $con -> query($sel1);
 $data1 = $result1 -> fetch_assoc();

 $sel2 = "select count(*) as booking from tbl_booking where booking_status = '1'";
  $result2 = $con -> query($sel2);
  $data2 = $result2 -> fetch_assoc();

  $sel3 = "select sum(booking_amount) as amt from tbl_booking where booking_status = '1'";
  $result3 = $con -> query($sel3);
  $data3 = $result3 -> fetch_assoc();
?>

<body>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon primary">
                <i data-feather="bar-chart-2" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num"><?php echo $data['seller'] ?></p>
                <p class="stat-cards-info__title">Total Sellers</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon warning">
                <i data-feather="file" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num"><?php echo $data1['user'] ?></p>
                <p class="stat-cards-info__title">Total Users</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit success">
                    <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon purple">
                <i data-feather="file" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num"><?php echo $data2['booking'] ?></p>
                <p class="stat-cards-info__title">Total Bookings</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit danger">
                    <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
              <div class="stat-cards-icon success">
                <i data-feather="feather" aria-hidden="true"></i>
              </div>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num"><?php echo $data3['amt'] ?></p>
                <p class="stat-cards-info__title">Total Earnings</p>
                <p class="stat-cards-info__progress">
                  <span class="stat-cards-info__profit warning">
                    <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                  </span>
                  Last month
                </p>
              </div>
            </article>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-lg-9">
            <div class="chart">
              <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
            </div> -->
            <div class="users-table table-wrapper">
              <table class="posts-table">
                <thead>
                  <tr class="users-table-info">
                    <th>
                      <label class="users-table__checkbox ms-20">
                        <input type="checkbox" class="check-all">
                      </label>
                    </th>
                    <th>SLNO</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Email</th>
                    <th>Contact</th>
                  </tr>
                </thead>
                <?php
                $i=0;
                $sel =  "select * from tbl_seller where seller_status='1'"; 
                $result = $con -> query($sel);
                while($data = $result -> fetch_assoc())
                {
                  $i++;
                ?>
                <tbody>
                  <tr>
                    <td>
                      <label class="users-table__checkbox">
                        <input type="checkbox" class="check">
                      </label>
                    </td>
                    <td><?php echo $i ?></td>
                    <td>
                      <?php echo $data["seller_name"] ?>
                    </td>
                    <td>
                    <div class="pages-table-img">
                        <picture>
                           <source srcset="../Assets/File/Seller/<?php echo $data["seller_photo"] ?>" type="image/webp">
                          <img src="../Assets/File/Seller/<?php echo $data["seller_photo"] ?>" alt="<?php echo $data["seller_name"] ?>">
                        </picture>
                    </div>
                    </td>
                    <td><span class="badge-pending"><?php echo $data["seller_email"] ?></span></td>
                    <td><?php echo $data["seller_contact"] ?></td>
                  </tr>
                  <?php } ?>
                </div>
              </div>
            </main> 
<!-- ! Footer
<footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2021 © Elegant Dashboard - <a href="elegant-dashboard.com" target="_blank"
          rel="noopener noreferrer">elegant-dashboard.com</a></p>
    </div>
    <ul class="footer-end">
      <li><a href="##">About</a></li>
      <li><a href="##">Support</a></li>
      <li><a href="##">Puchase</a></li>
    </ul>
  </div>
</footer> -->
  </div>
</div>
<!-- Chart library -->
<script src="../Assets/Templates/Admin/Main/plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="../Assets/Templates/Admin/Main/plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="../Assets/Templates/Admin/Main/js/script.js"></script>
</body>

</html>