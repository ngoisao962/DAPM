<?php include('../connect/connect.php'); ?>


<?php
session_start();

if(!empty($_POST['hoTen']) ||  !empty($_POST['gioiTinh']) || !empty($_POST['cmnd']) 
    || !empty($_POST['SDT']) ||!empty($_POST['email']) ||!empty($_POST['diaChi'])){
        $hoTen = $_POST['hoTen'];
        $gioiTinh = $_POST['gioiTinh'];
        $CMND = $_POST['cmnd'];
        $sdt = $_POST['SDT'];
        $email = $_POST['email'];
        $diaChi = $_POST['diaChi'];
        
        $sql = $pdo->prepare("UPDATE tblNguoiDung set hoTen = ?, gioiTinh = ?, cmnd = ?, SDT = ?, email = ?, diaChi = ? where maND = ?");
        $sql->execute(array($hoTen,$gioiTinh,$CMND,$sdt,$email,$diaChi, $_SESSION['nguoidung']['maND']));

        $title = "";
        $_SESSION['title'] = true;

        header("Location:/DAPM/taixe/tx_thongtincanhan.php");
    }else{

       
        $_SESSION['title'] = false;

        header("Location:/DAPM/taixe/tx_thongtincanhan.php");
    }
?>