<?php
include './../db/connect.php';
$s=new data();
if(isset($_POST['submit4'])){
	if (isset($_POST['tenthuoc'])) {
		$tenthuoc = $_POST['tenthuoc'];	
	}
	if (isset($_POST['loaithuoc'])) {
		$loaithuoc = $_POST['loaithuoc'];
	}
	if (isset($_POST['thongtinthuoc'])) {
		$thongtinthuoc = $_POST['thongtinthuoc'];
	}
	if (isset($_POST['ngaynhap'])) {
		$ngaynhap = $_POST['ngaynhap'];
	}
		$sql="INSERT INTO thuoc (Tenthuoc, 
		Loaithuoc,Thongtinthuoc,Ngaynhap)
		VALUES ('$tenthuoc','$loaithuoc', '$thongtinthuoc', '$ngaynhap')";
		$s->execute($sql);
		header('location:./index.php?page=thuoc');
}



