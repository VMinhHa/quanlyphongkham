<?php
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
                        <th style="width:5%">STT</th>
						<th style="width:10%">họ và tên Bác sĩ</th>
						<th style="width:15%">Ngày khám</th>
						<th style="width:15%">Giờ khám</th>
						<th style="width:30%">Chuẩn đoán</th>
						<th style="width:15%">Loại thuốc</th>
						<th style="width:10%">Trạng thái</th>
					</tr>
					</thead>
					<?php 
                    include './db/connect.php';
                    $s = new data();
                    $sql='select * from bacsi b join lichhen l on b.ID_Bacsi=l.ID_Bacsi  join benhnhan n 
                    on n.ID_Benhnhan=l.ID_Benhnhan JOIN taikhoan t on t.id=n.id
                    where Tendangnhap="'.$_SESSION['username'].'" and Trangthai="Đã khám" or Trangthai="Hủy"';
                    $Lich = $s->executeLesult($sql);
                    $dem=1;
                    foreach ($Lich as $item) {
					?>
					<tr>
                        <td ><?php echo $dem++ ?></td>
						<td>
							<?php echo $item['Hoten'] ?>
						</td>
						<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
                        <td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
						<!-- Chuẩn đoán -->
						<td>
						
						</td>
						<!-- THuoc -->
						<td>
	
						</td>
						<!-- 0----- -->
                        <td><?php echo $item['Trangthai'] ?></td>
					</tr>
                <?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>