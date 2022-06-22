<?php include('../connect/connect.php'); ?>


<?php
session_start();

if (isset($_POST['submit_dn'])) {
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $cust_email = $_POST['email'];
    $cust_password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM tblNguoiDung WHERE taiKhoan = ? ");
    $statement->execute(array($cust_email));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
      $row_password = $row['matKhau'];
      $row_chucvu = $row['chucVu'];
    }
    if ($cust_password = $row_password) {
      if ($row_chucvu == 5) {
        $_SESSION['nguoidung'] = $row;
        header("Location: /DAPM/taixe/tx_index.html");
      }else{
        header("Location: /DAPM/khachhhang/index.html");
      }
    }
  }else{
    echo '<script>alert("Đăng nhập không thành công!! 
    Vui lòng kiểm tra lại thông tin đã nhập.")</script>';
  }
}
?>
