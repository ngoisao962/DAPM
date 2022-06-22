<?php
try
{
    $pdo = new PDO('mysql:dbname=qlbenxe;host=localhost;charset=utf8', 'root', '');
}
catch(PDOException $e)
{
    die('ERROR: không thể kết nối: ' . $e->getMessage());
}
?>