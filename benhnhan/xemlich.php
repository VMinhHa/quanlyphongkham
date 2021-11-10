<?php 
	include 'plugins/phpqrcode/qrlib.php';
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
						<th style="width:15%">Mã QR</th>
						<th style="width:5%">Xóa</th>

					</tr>
					</thead>
					<?php 
                    include './db/connect.php';
                    $s = new data();
                    $sql='select * from bacsi b join lichhen l on b.ID_Bacsi=l.ID_Bacsi  join benhnhan n 
                    on n.ID_Benhnhan=l.ID_Benhnhan JOIN taikhoan t on t.id=n.id
                    where Tendangnhap="'.$_SESSION['username'].'" and l.Trangthai!="Đã khám"';
                    $Lich = $s->executeLesult($sql);
                    $dem=1;
                    foreach ($Lich as $item) {
						if($item['Trangthai']!='Hủy'){
							?>
						<tr>
							<td ><?php echo $dem++ ?></td>
							<td>
								<?php echo $item['Hoten'] ?>
							</td>
							<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
							<td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
							<td><?php echo $item['Trangthai'] ?></td>
							<?php 
								// $last_id = $item['id_Lichhen'];
								// $file="./images/qrcode/".$last_id.".png";
								// $url = 'http://localhost:8080/quanlyphongkham/qrcode.php?idlich='.$last_id.'';
							?>
							<td><?php //QRcode::png($url, $file, QR_ECLEVEL_L, 4);

								//echo "<img src='".$file."'>"; 
								?>
							</td>

							<!-- bỏ -->
							<!-- <td>
								<a href="./qrcode.php?idlich=<?//php echo $item['id_Lichhen']?>">Xem QRCode</a>
							</td> -->
						
							<td>
								<?php 
									if($item['Trangthai']=='Đang chờ'){
								?>
								<form action="Controll/xulydatlich.php" method="POST">
									<button  class="btn btn-danger btn-sm delete_lichhen" 
									type="submit" onclick="return confirm('Bạn có thực sự muốn xóa');" value="<?php echo $item['id_Lichhen'] ?>" name="Xoa_lich">Hủy</button>
								</form>
								<?php
									}
								?>
							</td>
							
						</tr>
                		<?php 
						//Hiện đỏ 
						}else{
							?>
						<tr style="background-color:red; color:white">
							<td ><?php echo $dem++ ?></td>
							<td>
								<?php echo $item['Hoten'] ?>
							</td>
							<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
							<td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
							<td><?php echo $item['Trangthai'] ?></td>
							<?php 
								// $last_id = $item['id_Lichhen'];
								// $file="./images/qrcode/".$last_id.".png";
								// $url = 'http://localhost:8080/quanlyphongkham/qrcode.php?idlich='.$last_id.'';
							?>
							<td><?php //QRcode::png($url, $file, QR_ECLEVEL_L, 4);

								//echo "<img src='".$file."'>"; 
								?>
							</td>

							<!-- bỏ -->
							<!-- <td>
								<a href="./qrcode.php?idlich=<?//php echo $item['id_Lichhen']?>">Xem QRCode</a>
							</td> -->
						
							<td>
								<?php 
									if($item['Trangthai']=='Đang chờ'){
								?>
								<form action="Controll/xulydatlich.php" method="POST">
									<button  class="btn btn-danger btn-sm delete_lichhen" 
									type="submit" onclick="return confirm('Bạn có thực sự muốn xóa');" value="<?php echo $item['id_Lichhen'] ?>" name="Xoa_lich">Hủy</button>
								</form>
								<?php
									}
								?>
							</td>
							
						</tr>
                		<?php 
						}
					} 
					?>
					<?php
?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- XÓa ko hiện được nút-->

<!-- <script>
$('.delete_lichhen').click(function(){
		_conf("Bạn có chắc là muốn xóa lịch hẹn này ko này ko?","delete_lichhen",[$(this).attr('data-id')])
	})
	function delete_lichhen($id){
		start_load()
		$.ajax({
			url:'../admin/ajax.php?action=delete_lichhen',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Xóa thành công",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script> -->
