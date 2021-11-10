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
                        <th style="width:10%">Xử lý</th>
                        <th style="width:10%">Trạng thái</th>
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
                    $sq1='Select * from benhan b join lichhen l
                    on b.id_Lichhen=l.id_Lichhen';
                    
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
                            <?php if($item['Trangthai']=='Đã khám') {
                                $sql2='Select * from benhan where id_Lichhen=
                                '.$item['id_Lichhen'];
                                $chuandoan=$s->executeSingLesult($sql2);?>
                            <form action="Controll/xulybenhan.php"  method="POST"> 
                                <div class="form-group">
                                    <!-- ko di hchuyen -->
<textarea rows="5" cols="58" name="noidung" class="form-control"  required>
<?php 
    if($chuandoan!=null){
echo trim($chuandoan['Chuandoan']);
    }

?>
</textarea> 
<!-- 2222222222222 -->
                                </div>
                                <button  class="btn-primary btn text-center" 
                                value="<?php echo $item['id_Lichhen']?>" 
                                style="width:135px;height:40px;" name="chuandoan">Thêm</button>
                            </form>
                            <?php 
                                }
                            ?>
                        </td>
                        <!-- THuoc -->
                        <td>
                            <?php if($item['Trangthai']=='Đã khám') {?>
                                <button  class="btn btn-dark text-center" value="<?php echo $item['id_Lichhen']?>" data-toggle="modal" data-target="#myModal"
                                style="width:135px;height:40px;font-size:12px;"  name="kethuoc">Kê thuốc</button>
                            <?php 
                                }
                            ?>
                        </td>
                                        
                            <!-- 0----- -->
                        <td >
                            <form action="Controll/xulylich.php"  method="POST"> 
                                <div class="form-group">
                                    <select name="trangthai" class="form-control">
                                        <?php 
                                            if($item['Trangthai']=='Hủy'){
                                                echo '<option value="Hủy">Hủy</option>';
                                            }
                                            else{
                                                if($item['Trangthai']=='Đã khám'){

                                                 echo '<option value="Đã khám">Đã khám</option>';
                                                }else{
                                                    if($item['Trangthai']=='Xác nhận')
                                                    {
                                                       echo '<option value="Hủy">Hủy</option>
                                                        <option value="Đang chờ">Đang chờ</option>
                                                        <option value="Đã khám">Đã khám</option>';
                                                    }
                                                    else{
                                                        echo '<option value="Xác nhận">Xác nhận</option>
                                                        <option value="Hủy">Hủy</option>
                                                        <option value="Đang chờ">Đang chờ</option>
                                                        <option value="Đã khám">Đã khám</option>';
                                                    }
                                                }
                                 
                                                
                                                
                                            }
                                        ?>
                                        
                                    </select>
                                </div>
                                <button  class="btn-primary btn text-center" value="<?php echo $item['id_Lichhen']?>" style="width:135px;height:40px;font-size:12px;" name="xacnhan">Xác nhận</button>
                            </form>
						</td>		
                        <td><?php echo $item['Trangthai'] ?></td>
					</tr>
                <?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>





<!--  ---------------Modal Them-->
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Danh sách thuốc</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
        <form action="#" id="manage-appointment" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Họ tên:</label>
                        <input type="text" class="form-control" name="hoten" value="<?php $hoten?>" placeholder="Enter Họ tên" required>
                    </div>
                    <div class="form-group">
                        <label>Tên đăng nhập:</label>
                        <select class="form-control" name="tendangnhap">
                            <?php
                            $sql1 = 'select * from taikhoan where Phanquyen="Doctor" AND id not in (
                                SELECT t.id from taikhoan t JOIN bacsi b on t.id=b.id)';
                            $caterogyList1 = $s->executeLesult($sql1);
                            foreach ($caterogyList1 as $item1) {
                                echo '<option value="' . $item1['id'] . '" >' . $item1['Tendangnhap'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Khoa: </label>
                        <select class="form-control" name="tenkhoa" id="cars" placeholder="chon khoa">
                            <?php
                            $sql = 'SELECT ID_Khoa,Tenkhoa FROM khoa';
                            $caterogyList = $s->executeLesult($sql);
                            foreach ($caterogyList as $item) {
                                echo '<option value="' . $item['ID_Khoa'] . '" >' . $item['Tenkhoa'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh:</label>
                        <input type="date" class="form-control" name="ngaysinh" required>
                        
                    </div>
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <input type="radio" value="Nam" name="gioitinh"><label for="">Nam</label>
                        <input type="radio" value="Nữ" name="gioitinh"><label for="">Nữ</label> <br>
                        <span style="color:red"><?php echo isset($messs3)?$messs3:''; ?></span>
                    </div>
                    <div class="form-group">
						<label for="" class="control-label">Image</label>
						<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
					</div>
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="submit">Thêm</button>
				<button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
			</div>
		</form>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>