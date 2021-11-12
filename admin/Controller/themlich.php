<?php
include '../../db/connect.php';
$s=new data();
if(isset($_POST['load'])){
	if (isset($_POST['tenbacsi'])) {
		$tenbacsi = $_POST['tenbacsi'];	
	}
	if (isset($_POST['tenphong'])) {
		$tenphong = $_POST['tenphong'];
	}
	if (isset($_POST['Ngay'])) {
		$Ngay = $_POST['Ngay'];
	}
	if (isset($_POST['time1'])) {
		$time1 = $_POST['time1'];
	}
	if (isset($_POST['time'])) {
		$time = $_POST['time'];
	}
	if (isset($_POST['status'])) {
		$status = $_POST['status'];
	}
	if($time1<$time){
		$sql="INSERT INTO lichlamviec (ID_Phongkham, 
		ID_Bacsi, Ngay, Giobatdau, Gioketthuc, Tinhtrang)
		VALUES ('$tenphong','$tenbacsi', '$Ngay', '$time1', '$time', '$status')";
		$s->execute($sql);
        echo '<script>
                alert("Thêm thành công");
                window.location.href="../index.php?page=appointments";
                </script>';
	}
	else{
		echo '<script>
                alert("Ngày bắt đầu phải nhỏ hơn giờ kết thúc");
                window.location.href="../index.php?page=appointments";
                </script>';
	}
}
?>