<!--  ---------------Modal Sửa-->
<?php 

$s=new data();
if (isset($_GET['idsua'])) {
    $mess='';
	$id1 = $_GET['idsua'];
	$sql = 'SELECT * from thuoc where ID_Thuoc=' . $id1;
	$category = $s->executeSingLesult($sql);
	$Tenthuoc=$category['Tenthuoc'];
	$Loaithuoc=$category['Loaithuoc'];
	$Thongtinthuoc = $category['Thongtinthuoc'];
	$Handung=$category['Handung'];
    if(isset($_POST['submit5'])){
        if (isset($_POST['tenthuoc'])) {
            $Tenthuoc= $_POST['tenthuoc'];	
        }
        if (isset($_POST['loaithuoc'])) {
            $Loaithuoc = $_POST['loaithuoc'];
        }
        if (isset($_POST['thongtinthuoc'])) {
            $Thongtinthuoc = $_POST['thongtinthuoc'];
        }
        if (isset($_POST['handung'])) {
            $Handung = $_POST['handung'];
        }
        $sql="UPDATE thuoc SET Tenthuoc='$Tenthuoc',Loaithuoc='$Loaithuoc',
        Thongtinthuoc='$Thongtinthuoc',Handung='$Handung'
        WHERE ID_Thuoc =".$id1;
        $s->execute($sql);
        echo '<script>
            alert("Sửa thành công");
            window.location.href="index.php?page=thuoc";
        </script>'; 
    }
}
?>

  <!-- The Modal -->
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Sửa thuốc</h4>
          <h5 style="color:green"><?php echo $mess ?></h5>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
		<form action="#" id="manage-appointment" method="POST">
            <div class="form-group">
                        <label>Tên Thuốc:</label>
                        <input type="text" class="form-control" value="<?php echo $Tenthuoc ?>" name="tenthuoc" placeholder="Nhập tên thuốc">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Loại thuốc</label><br>
                        <input type="text" class="form-control" value="<?php echo $Loaithuoc ?>" name="loaithuoc">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Thông tin thuốc</label>
<textarea rows="10" name="thongtinthuoc"cols="48">
<?php echo trim($Thongtinthuoc) ?>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Hạn dùng</label>
                        <input type="text" class="form-control" value="<?php echo $Handung ?>" name="handung">
                    </div>
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="submit5">Sửa</button>
				<button class="btn btn-warning float-right" name="Cancel5">Thoát</button>
			</div>
		</form>
        </div>
        <!-- Modal footer -->
      </div>
    </div>