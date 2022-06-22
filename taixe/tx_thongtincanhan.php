<?php include('../connect/connect.php'); ?>

<?php
session_start();

if (!isset($_SESSION['nguoidung'])) {
  header("Location:/khachhang/signin.html");
  exit();
}

$statement = $pdo->prepare("SELECT * FROM tblNguoiDung WHERE taiKhoan = ? ");
$statement->execute(array($_SESSION['nguoidung']['taiKhoan']));
$total = $statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
if ($total > 0) {
  foreach ($result as $row) {
    $hoTen = $row['hoTen'];

    $CMND = $row['cmnd'];
    $sdt = $row['SDT'];
    $email = $row['email'];
    $diaChi = $row['diaChi'];
  }
}

if(isset($_SESSION['title'])){
  if($_SESSION['title'] == true){
    echo '<script>alert("Cập nhật thông tin thành công")</script>';
  }
  else{
    echo '<script>alert("Cập nhật thông tin không thành công!! 
    Vui lòng kiểm tra lại thông tin đã nhập.")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../css/index.css" />
  <script src="https://kit.fontawesome.com/ece145a5a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/thongtincanhan.css" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img src="https://storage.googleapis.com/goyolo-production/logo.png" height="30" alt="MDB Logo" loading="lazy" />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="tx_index.html">TRANG CHỦ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tx_dslichtrinh.html">LỊCH TRÌNH</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tx_lienhe.html">LIÊN HỆ</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->

      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
        </a>

        <!-- Notifications -->
        <div class="dropdown">
          <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="#">Some news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
        </div>
        <!-- Avatar -->
        <div class="dropdown">
          <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="tx_thongtincanhan.html">Thông tin cá nhân</a>
            </li>
            <li>
              <a class="dropdown-item" href="tx_hotro.html">Yêu cầu hỗ trợ</a>
            </li>
            <li>
              <a class="dropdown-item" href="tx_dangkyhangxe.html">Đăng ký hãng xe</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Đăng xuất</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

  <div class="container-fluid"></div>
  <div class="container my-4   p-5" style="border-radius: 10px">
    <h3 class="mb-3">THÔNG TIN CÁ NHÂN</h3>
    <div class="row">
      <div class="col-md-3 mb-3">
        <img src="http://studiochupanhdep.com//Upload/Images/Product/anh-cuc-hoa-mi-2019.png" class="img-fluid h-100 rounded" alt="" />
      </div>
      <div class="col-md-9 ">
        <form action="capnhat_ttcn.php" method="POST">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 col-xs-12 mb-4">
                  <div class="form-outline">
                    <input type="text" name="hoTen" id="form6Example1" value="<?php if (isset($hoTen)) {
                                                                                echo $hoTen;
                                                                              } ?>" class="form-control" />
                    <label class="form-label" for="form6Example1">Họ tên</label>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12 mb-4">
                  <select class="form-control" aria-label="Default select example" name="gioiTinh">
                    <option>Chọn giới tính</option>
                    <?php
                    if ($row['gioiTinh'] == 0) { ?>
                      <option selected = "selected" value="0">Nam</option>
                      <option value="1">Nữ</option>
                    <?php } else { ?>
                      <option value="0">Nam</option>
                      <option selected = "selected" value="1">Nữ</option>
                    <?php }
                    ?>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row ">
                <div class="col-md-6 col-xs-12 mb-4">
                  <div class="form-outline">
                    <input type="text" name="cmnd" id="form6Example1" value="<?php if (isset($CMND)) {
                                                                                echo $CMND;
                                                                              } ?>" class="form-control" />
                    <label class="form-label" for="form6Example1">CMND/CCCD</label>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12 mb-4">
                  <div class="form-outline">
                    <input type="text" name="SDT" id="form6Example2" value="<?php if (isset($sdt)) {
                                                                              echo $sdt;
                                                                            } ?>" class="form-control" />
                    <label class="form-label" for="form6Example2">Số điện thoại</label>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 col-xs-12 mb-4">
                  <div class="form-outline">
                    <input type="email" name="email" id="form6Example1" value="<?php if (isset($email)) {
                                                                                  echo $email;
                                                                                } ?>" class="form-control" />
                    <label class="form-label" for="form6Example1">Email</label>
                  </div>
                </div>
                <div class="col-md-6 col-xs-12 mb-4">
                  <div class="form-outline">
                    <input type="date" id="form6Example2" class="form-control" />
                    <label class="form-label" for="form6Example2">Ngày sinh</label>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="form-outline mb-4">
            <textarea class="form-control" name="diaChi" id="form4Example3" rows="4"><?php if (isset($diaChi)) {
                                                                                        echo $diaChi;
                                                                                      } ?></textarea>
            <label class="form-label" for="form6Example3">Địa chỉ</label>
          </div>

          <div class="row text-center mt-3">
            <div class="col-md-6">
              <button class="btn btn-primary btn-block mb-3" name="submit_update">Cập nhập</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-danger btn-block mb-3">Hủy</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="text-center text-lg-start bg-dark text-muted">
    <!-- Section: Social media -->

    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="mt-4">
      <div class="container text-center text-md-start ">
        <!-- Grid row -->
        <div class="row pt-4 ">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- JavaScript Bundle with Popper -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>