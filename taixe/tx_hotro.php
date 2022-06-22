<?php include('../connect/connect.php'); ?>

<?php
session_start();

if (!isset($_SESSION['nguoidung'])) {
  header("Location:/DAPM/khachhang/signin.html");
  exit();
}

$sql1 = $pdo->prepare("SELECT * FROM tblChuyenXe");
$sql1->execute();
$result = $sql1->fetchAll(PDO::FETCH_ASSOC);


$sql = $pdo->prepare("SELECT * FROM tblSuCo");
$sql->execute();
$total = $sql->rowCount();
$i = $total + 1;

if (isset($_POST['submit_ycht'])) {

  if (!empty($_POST['maCX']) && (!empty($_POST['tenSC']) or !empty($_POST['tenSC_khac'])) && !empty($_POST['chiTietSC'])) {

    if (empty($_POST['tenSC'])) {
      $tenSC = $_POST['tenSC_khac'];
    } else {
      $tenSC = $_POST['tenSC'];
    }
    $maCX = $_POST['maCX'];
    $chiTietSC = $_POST['chiTietSC'];
    $maND = $_SESSION['nguoidung']['maND'];

    $statement = $pdo->prepare("INSERT into tblSuCo(maSC, maCX, maND, tenSC, chiTietSC) value(?,?,?,?,?)");
    $statement->execute(array($i, $maCX, $maND, $tenSC, $chiTietSC));
    echo '<script>alert("Gửi thông báo hỗ trợ thành công!! ")</script>';
  } else {
    echo '<script>alert("Gửi thông báo không thành công!! 
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="index.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
  <title>Document</title>
  <link rel="stylesheet" href="thongtinlienhe.css">
</head>

<body>
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

  <div class="tong py-3">
    <div class="container mt-5">
      <div class="w-50 m-auto">
        <h3 class="text-center mb-3" style="font-size: 1.2rem;">Báo cáo sự cố</h3>
        <form action="" method="POST">
          <!-- Name input -->
          <div class="row mb-4">
            <div class="col">
              <select class="form-select" aria-label="Default select example" name="maCX">
                <option>Mã chuyến xe</option>
                <?php
                foreach ($result as $row) { ?>
                  <option value="<?php echo $row['maCX'];?>"><?php echo $row['maCX'];?></option>
                <?php }

                ?>
              </select>
            </div>

          </div>
          <div class="row mb-4">
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Xe hỏng" id="form11Example2" name="tenSC" />
                <label class="form-check-label" for="form11Example2"> Xe hỏng </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tắc đường" id="form11Example2" name="tenSC" />
                <label class="form-check-label" for="form11Example2"> Tắc đường </label>
              </div>
            </div>
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Đổi tuyến đường" id="form11Example2" name="tenSC" />
                <label class="form-check-label" for="form11Example2"> Đổi tuyến đường </label>
              </div>
            </div>


          </div>

          <div class="form-outline mb-4">
            <input type="text" id="form6Example3" class="form-control" name="tenSC_khac" />
            <label class="form-label" for="form6Example3">Khác</label>
          </div>
          <div class="form-outline mb-4">
            <textarea class="form-control" id="form4Example3" rows="5" name="chiTietSC"></textarea>
            <label class="form-label" for="form6Example3">Chi tiết sự cố, giải pháp mong muốn</label>
          </div>

          <!-- Email input -->


          <!-- Submit button -->
          <button type="submit" class="btn btn-primary btn-block mb-4" name="submit_ycht">
            Yêu cầu hỗ trợ
          </button>
        </form>
      </div>
    </div>

  </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">


      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Chính sách hủy vé</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="MuiBox-root css-4zgpz7">
            <div class="css-15sbzxb"><span class="MuiTypography-root MuiTypography-contentRegular css-109nhb0">Thời gian hủy vé</span><span class="MuiTypography-root MuiTypography-contentRegular css-109nhb0">Phí hủy</span></div>
            <div class="css-15sbzxb">
              <div class="MuiBox-root css-0"><span class="MuiTypography-root MuiTypography-contentRegular css-109nhb0">Trước <strong>10:00 ngày 20/06/2022</strong></span></div>
              <div class="MuiBox-root css-0"><span class="MuiTypography-root MuiTypography-contentRegular css-1nrgfh">29.000 đ/vé</span></div>
            </div>
            <div class="css-1ec0wjx">
              <div class="MuiBox-root css-0"><span class="MuiTypography-root MuiTypography-contentRegular css-109nhb0">Sau <strong>10:00 ngày 20/06/2022</strong></span></div>
              <div class="MuiBox-root css-0"><span class="MuiTypography-root MuiTypography-contentRegular css-7hydu4">Không được hủy</span></div>
            </div>
            <div class="MuiPaper-root MuiPaper-elevation MuiPaper-rounded MuiPaper-elevation0 MuiAlert-root MuiAlert-standardInfo MuiAlert-standard css-kr0hkf" role="alert">
              <div class="MuiAlert-icon css-1l54tgj">
                <div><img width="13px" height="13px" src="https://goyolo.com/images/glyph.png" alt="glyph"></div>
              </div>
              <div class="MuiAlert-message css-1w0ym84"><span class="MuiTypography-root MuiTypography-contentRegular css-1bw24xf">Phí huỷ ước tính cho 1 vé</span><br><span class="MuiTypography-root MuiTypography-contentRegular css-1bw24xf">Giá trị được hoàn = Giá vé - Phí huỷ</span></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalCenterr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">


      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>An toàn Covid-19</h4>
          <ul>
            <li>Xuất trình Khai báo Y tế trước khi lên xe và tuân thủ quy tắc 5K của Bộ Y tế khi di chuyển</li>
            <li>Cung cấp đầy đủ họ tên, số điện thoại, địa chỉ cư trú khi đặt vé</li>
            <li>Yêu cầu đeo khẩu trang khi lên xe</li>
            <li>Xuất trình giấy xét nghiệm PCR âm tính có hiệu lực trong vòng time <strong> 1</strong> giờ</li>
          </ul>
          <h4>Yêu cầu lên xe</h4>
          <ul>
            <li>Có mặt tại văn phòng/quầy vé/bến xe trước 30 phút để làm thủ tục lên xe</li>
            <li>Xuất trình SMS/Email đặt vé trước khi lên xe</li>
            <li>Không hút thuốc, uống rượu, sử dụng chất kích thích trên xe</li>
            <li>Không mang đồ ăn, thức ăn có mùi lên xe</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
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

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
</body>

</html>