<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem Lịch</h1>
    </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                        <th>STT</th>
						<th style="width:30%">họ và tên bệnh nhân</th>
						<th style="width:20%">Ngày hẹn</th>
						<th style="width:20%">Giờ hẹn</th>
						<th style="width:10%">Trạng thái</th>
                        <th style="width:20%">Xử lý</th>
					</tr>
					</thead>
					<?php 
                    include './db/connect.php';
                    $s = new data();
                    $sql='select * from taikhoan t JOIN bacsi b on t.id=b.id JOIN lichhen 
                    l on b.ID_Bacsi=l.ID_Bacsi join benhnhan n on n.ID_Benhnhan=l.ID_Benhnhan
                    where Tendangnhap="'.$_SESSION['username'].'"';
                    $Lich = $s->executeLesult($sql);
                    $dem=1;
                    foreach ($Lich as $item) {
					?>
					<tr>
                        <td ><?php echo $dem++ ?></td>
						<td>
							<?php echo $item['Hotenbn'] ?>
						</td>
						<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
                        <td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
                        <td><?php echo $item['Trangthai'] ?></td>
                        <td >
                            <form action="./xulylich.php"  method="POST"> 
                                <div class="form-group">
                                    <select name="trangthai" class="form-control">
                                        
                                        <option value="Xác nhận">Xác nhận</option>
                                        <option value="hủy">hủy</option>
                                        <option value="Đang chờ">Đang chờ</option>
                                        <option value="Đã khám">Đã khám</option>
                                    </select>
                                </div>
                                <button  class="btn-primary btn text-center" value="<?php echo $item['id_Lichhen']?>" style="width:130px;height:40px;font-size:12px;" name="xacnhan">Xác nhận</button>
                            </form>
						</td>		
					</tr>
                <?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>