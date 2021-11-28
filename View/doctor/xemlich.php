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
						<th style="width:12.5%">họ và tên bệnh nhân</th>
						<th style="width:12.5%">Ngày hẹn</th>
						<th style="width:12.5%">Giờ hẹn</th>
                        <th style="width:25%">Chuẩn đoán</th>
                        <th style="width:12.5%">Kê thuốc</th>
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
                        if($item['Trangthai']!='Hoàn thành'){                  
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
                            <?php if($item['Trangthai']=='Đang khám') {
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
                            <?php if($item['Trangthai']=='Đang khám') {?>
                                <h4>Tên thuốc: </h4>
                            <?php
                                $sql1="select * from xemthuoc x join thuoc t on x.ID_Thuoc=t.ID_Thuoc where
                                x.id_Lichhen=".$item['id_Lichhen'];
                                $s1='';
                                $ds=$s->executeLesult($sql1);
                                foreach ($ds as $value) {
                                    $s1=$value['Tenthuoc'].' , '.$s1;
                                }
                                echo $result = rtrim($s1, " , ");
                            ?>
                                <form action="thongtinbacsi.php?page=1"  method="POST"> 
                                <br><button type="submit" value="<?php echo $item['id_Lichhen'] ?>" name="idlich1" class="btn btn-dark text-center">
                                    Kê thuốc
                                </button>
                                </form>
                            <?php 
                            // Cần sửa
                            //  if(isset($_POST['idlich1'])){
                            //     $_SESSION['idlich']=$_POST['idlich1'];
                            //  }
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
                                                if($item['Trangthai']=='Đang khám'){

                                                 echo '<option value="Đang khám">Khám</option>
                                                 <option value="Hoàn thành">Hoàn thành</option>';
                                                }else{
                                                    if($item['Trangthai']=='Xác nhận')
                                                    {
                                                       echo '
                                                        <option value="Đang khám">Khám</option>';
                                                    }
                                                    else{
                                                        echo '<option value="Xác nhận">Xác nhận</option>
                                                        <option value="Hủy">Hủy</option>
                                                        <option value="Đang khám">Khám</option>';
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
                <?php }}
                     ?>
				</table>
			</div>
		</div>
	</div>
</div>


