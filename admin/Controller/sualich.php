<!-- if( date("Y m d",strtotime($Ngay))<date('Y m d')){
			$messxuly1='Ngày nhập phải lớn hơn ngày hiện tại';
		}else{
			if($time1>=$time){
				$messxuly="Số giờ kết thúc phải lớn hơn giờ bắt đầu";
			}else{
				$sql="UPDATE lichlamviec SET ID_Phongkham='$tenphong',ID_Bacsi='$tenbacsi',
				Ngay='$Ngay',Giobatdau='$time1',Gioketthuc='$time',Tinhtrang='$status'
				WHERE lichlamviec.ID_Lich =".$id1;
				$s->execute($sql);
				$mess= 'Cập nhật thành công';
				header('location:index.php?page=appointments');
			
				
			}
		} -->
		<!--  ---------------Modal Sá»­a-->
<?php 

$s=new data();
if (isset($_GET['idsua'])) {
    $mess='';
	$messxuly='';
	$messxuly1='';
	$id1 = $_GET['idsua'];
	$sql = 'SELECT l.ID_Lich,l.Giobatdau, p.ID_Phongkham,b.ID_Bacsi,p.Tenphongkham,b.Hoten,l.Ngay,l.Gioketthuc,l.tinhtrang
	 from bacsi b join lichlamviec 
	l on l.ID_Bacsi=b.ID_Bacsi join phongkham p on l.ID_Phongkham=p.ID_Phongkham
	 where ID_Lich=' . $id1;
	$category = $s->executeSingLesult($sql);
	$idPhong=$category['ID_Phongkham'];
	$idBacsi=$category['ID_Bacsi'];
	$TenPhong = $category['Tenphongkham'];
	$Tenbasi=$category['Hoten'];
	$Ngay=$category['Ngay'];
	$Time = $category['Gioketthuc'];
	$Time12=$category['Giobatdau'];
	$status = $category['tinhtrang'];
    if(isset($_POST['sua'])){
        if (isset($_POST['tenbacsi1'])) {
            $tenbacsi = $_POST['tenbacsi1'];
			$tenbacsi = str_replace('"', '\\"', $tenbacsi);	
        }
        if (isset($_POST['tenphong1'])) {
            $tenphong = $_POST['tenphong1'];
			$tenphong = str_replace('"', '\\"', $tenphong);
        }
        if (isset($_POST['Ngay1'])) {
            $Ngay = $_POST['Ngay1'];
			$Ngay  = str_replace('"', '\\"', $Ngay );
        }
        if (isset($_POST['time2'])) {
            $time = $_POST['time2'];
			$time = str_replace('"', '\\"', $time);
        }
        if (isset($_POST['status1'])) {
            $status = $_POST['status1'];
			$status = str_replace('"', '\\"', $status);
        }
		if (isset($_POST['time1'])) {
			$time1 = $_POST['time1'];
			$time1 = str_replace('"', '\\"', $time1);
		}
		if( date("Y m d",strtotime($Ngay))<date('Y m d')){
			$messxuly1='Ngày nhập phải lớn hơn ngày hiện tại';
		}else{
			if($time1>=$time){
				$messxuly="Số giờ kết thúc phải lớn hơn giờ bắt đầu";
			}else{
				$sql2 = 'SELECT * from lichlamviec l join phongkham pk on l.ID_Phongkham=pk.ID_Phongkham';
				$phongkham = $s->executeLesult($sql2);
				foreach ($phongkham as $item) {
					if($Ngay==$item['Ngay']){
						if($Time12!=$time1){
							if($tenphong==$item['ID_Phongkham'] && date("h:i A",strtotime($Time12))<date("h:i A",strtotime($item['Gioketthuc']))){
								$resu=0;
								echo '<script>
								alert("Hiện tại lịch này đã tồn tại");
								window.location.href="index.php?page=appointments";
							</script>';
							exit();
							}else{
								$resu=1;	
							}
						}else{
							$resu=1;	
						}
							
					}else{
						$resu=2;
					}
				}
			}
			if($resu==1 || $resu==2){
				$sql="UPDATE lichlamviec SET ID_Phongkham='$tenphong',ID_Bacsi='$tenbacsi',
				Ngay='$Ngay',Giobatdau='$time1',Gioketthuc='$time',Tinhtrang='$status'
				WHERE lichlamviec.ID_Lich =".$id1;
				$s->execute($sql);
				echo '<script>
                alert("Sửa thành công");
                window.location.href="index.php?page=appointments";
                </script>';
			}
		} 

		
    }



}
?>

  <!-- The Modal -->
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sửa lịch</h4>
          <h5 style="color:green"><?php echo $mess ?></h5>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
		<form action="#" id="manage-appointment" method="POST">
			<div class="form-group">
				<label for="" class="control-label">Bác sĩ</label>
				<select class="browser-default custom-select select2" name="tenbacsi1">
					<option value="<?php echo $idBacsi ?>"><?php echo $Tenbasi ?></option>
                    <?php 
					$sql1 = 'SELECT * FROM bacsi where ID_Bacsi !='.$idBacsi;
					$Hotenbacsi = $s->executeLesult($sql1);
					foreach ($Hotenbacsi as $value1){
					?>
						<option value="<?php echo $value1['ID_Bacsi']?>"><?php echo $value1['Hoten'] ?></option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="control-label">phòng khám</label>
				<select class="browser-default custom-select select2" name="tenphong1">
				<option value="<?php echo $idPhong ?>"><?php echo $TenPhong ?></option>
                <?php 
					$sql = 'SELECT * FROM phongkham where ID_Phongkham!='.$idPhong;
					$TenPhong = $s->executeLesult($sql);
					foreach ($TenPhong as $value){
					?>
						<option value="<?php echo $value['ID_Phongkham'] ?>"><?php echo $value['Tenphongkham'] ?></option>
					<?php 
					}
				?>
				</select>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Ngay</label>
				<input type="date"  name="Ngay1" class="form-control" value="<?php echo $Ngay ?>" required>
				<span style="color:red"><?php echo $messxuly1 ?></span>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Giờ bắt đầu</label>
				<input type="time"  name="time1" class="form-control" value="<?php echo $Time12 ?>" required>
			</div> 
			<div class="form-group">
				<label for="" class="control-label">Giờ kết thúc</label>
				<input type="time"  name="time2" class="form-control" value="<?php echo $Time ?>" required>
				<span style="color:red"><?php echo $messxuly ?></span>
			</div> 
			<div class="form-group">
				<label for="" class="control-label">Status</label>
				<select class="browser-default custom-select form-control" name="status1">
					<option value="Xác nhận">Xác nhận</option>
					<option value="Giời lịch">Giời lịch</option>		
					<option value="Bận">Bận</option>							
				</select>
			</div>
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="sua">Sửa</button>
				<button class="btn btn-warning float-right" name="thoat">Thoát</button>
			</div>
		</form>
        </div>
        <!-- Modal footer -->
      </div>
    </div>