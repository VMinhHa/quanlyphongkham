<?php
    if(!isset($_SESSION['username']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="login.php";
            </script>';
	}
?>
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
                        <th style="width:5%">STT</th>
						<th style="width:15%">họ và tên bệnh nhân</th>
						<th style="width:12.5%">Ngày hẹn</th>
						<th style="width:12.5%">Giờ hẹn</th>
                        <th style="width:25%">Chuẩn đoán</th>
                        <th style="width:10%">Kê thuốc</th>
						<th style="width:10%">Trạng thái</th>
                        <th style="width:10%">Xử lý</th>
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
                        <!-- Chuẩn đoán -->
                        <td>   
                            <?php if($item['Trangthai']=='Đã khám') {?>
                            <textarea rows="5" cols="58" name="chuandoan">

                            </textarea>
                            <?php 
                                }
                            ?>
                        </td>
                        <!-- THuoc -->
                        <td>
                            <?php if($item['Trangthai']=='Đã khám') {?>
                                <button  class="btn btn-dark text-center" value="<?php echo $item['id_Lichhen']?>"
                                style="width:135px;height:40px;font-size:12px;"  name="kethuoc">Kê thuốc</button>
                            <?php 
                                }
                            ?>
                        </td>
                                        
                            <!-- 0----- -->
                        <td><?php echo $item['Trangthai'] ?></td>
                        <td >
                            <form action="Controll/xulylich.php"  method="POST"> 
                                <div class="form-group">
                                    <select name="trangthai" class="form-control">
                                        
                                        <option value="Xác nhận">Xác nhận</option>
                                        <option value="Hủy">Hủy</option>
                                        <option value="Đang chờ">Đang chờ</option>
                                        <option value="Đã khám">Đã khám</option>
                                    </select>
                                </div>
                                <button  class="btn-primary btn text-center" value="<?php echo $item['id_Lichhen']?>" style="width:135px;height:40px;font-size:12px;" name="xacnhan">Xác nhận</button>
                            </form>
						</td>		
					</tr>
                <?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>