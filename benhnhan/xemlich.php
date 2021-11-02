<?php 
	include './plugins/phpqrcode/qrlib.php';
	if(!isset($_SESSION['username']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="../login.php";
            </script>';
	}
?>
<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem Lịch Khám</h1>
    </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                        <th>STT</th>
						<th style="width:30%">họ và tên Bác sĩ</th>
						<th style="width:20%">Ngày hẹn</th>
						<th style="width:20%">Giờ hẹn</th>
						<th style="width:10%">Trạng thái</th>
						<th style="width:20%">Mã QR</th>
					</tr>
					</thead>
					<?php 
                    include './db/connect.php';
                    $s = new data();
                    $sql='select * from bacsi b join lichhen l on b.ID_Bacsi=l.ID_Bacsi  join benhnhan n 
                    on n.ID_Benhnhan=l.ID_Benhnhan JOIN taikhoan t on t.id=n.id
                    where Tendangnhap="'.$_SESSION['username'].'"';
                    $Lich = $s->executeLesult($sql);
                    $dem=1;
					// $last_id = mysqli_insert_id($conn);
					// $patch = './images/qrcode/';
					// $file="./images/qrcode/".uniqid().".png";
					// $url ='http://localhost:8080/quanlyphongkham/thongtinbenhnhan.php?pagetrang=xemlich';
                    foreach ($Lich as $item) {
					?>
						<tr>
							<td ><?php echo $dem++ ?></td>
							<td>
								<?php echo $item['Hoten'] ?>
							</td>
							<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
							<td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
							<td><?php echo $item['Trangthai'] ?></td>
							<!-- <td><?php ///QRcode::png($item['Hoten'], $file, QR_ECLEVEL_L, 4);

								//echo "<img src='".$file."'>"; ?> -->
							<td>
								<a href="./qrcode.php?idlich=<?php echo $item['id_Lichhen']?>">Xem QRCode</a></td>
						</tr>
                		<?php 
					} 
					?>
					<?php
?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- QR coe -->
