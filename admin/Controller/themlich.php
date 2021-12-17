<?php
include '../../db/connect.php';
$s=new data();
if(isset($_POST['load'])){
	if (isset($_POST['tenbacsi'])) {
		$tenbacsi = $_POST['tenbacsi'];
		$$tenbacsi = str_replace('"', '\\"', $tenbacsi);	
	}
	if (isset($_POST['tenphong'])) {
		$tenphong = $_POST['tenphong'];
		$tenphong = str_replace('"', '\\"', $tenphong);
	}
	if (isset($_POST['Ngay'])) {
		$Ngay = $_POST['Ngay'];
		$Ngay = str_replace('"', '\\"',$Ngay);
	}
	if (isset($_POST['time1'])) {
		$time1 = $_POST['time1'];
		$time1 = str_replace('"', '\\"', $time1);
	}
	if (isset($_POST['time'])) {
		$time = $_POST['time'];
		$time = str_replace('"', '\\"', $time);
	}
	$resu='';
	$status='Xác nhận';
	if($Ngay>=date("Y-m-d")){
		if($time1<$time){
			$sql2 = 'SELECT * from lichlamviec l join phongkham pk on l.ID_Phongkham=pk.ID_Phongkham';
			$phongkham = $s->executeLesult($sql2);
			foreach ($phongkham as $item) {
				if($Ngay==$item['Ngay']){
					if($tenphong==$item['ID_Phongkham'] && date("h:i A",strtotime($time1))<date("h:i A",strtotime($item['Gioketthuc'])) 
					){
						$resu=0;
						echo '<script>
						alert("Hiện tại lịch này đã tồn tại");
						window.location.href="../index.php?page=appointments";
						</script>';
						exit();
					}else{
						$resu=1;
					}
				}else{
					$resu=2;
				}
			}
		}
		else{
			echo '<script>
					alert("Giờ bắt đầu phải nhỏ hơn giờ kết thúc");
					window.location.href="../index.php?page=appointments";
					</script>';
		}
	}
	else{
		echo '<script>
				alert("Phải lớn hơn ngày hiện hành");
				window.location.href="../index.php?page=appointments";
				</script>';
	}
	if($resu==1 || $resu==2){
		$sql="INSERT INTO lichlamviec (ID_Phongkham, 
		ID_Bacsi, Ngay, Giobatdau, Gioketthuc, Tinhtrang)
		VALUES ('$tenphong','$tenbacsi', '$Ngay', '$time1', '$time', '$status')";
		$s->execute($sql);
			echo '<script>
			alert("Thêm thành công ");
			window.location.href="../index.php?page=appointments";
			</script>';
	}
}
?>