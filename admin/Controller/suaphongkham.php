<!-- The Modal -->

<?php
$s=new data();
    if (isset($_GET['idsua'])) {
        $mess='';
        $id = $_GET['idsua'];
        $sql = 'select * from phongkham
         where ID_PhongKham=' . $id;
        $category = $s->executeSingLesult($sql);
            $hoten = $category['Tenphongkham'];
            $diachi=$category['Diachi'];
            $ngaythanhlap = $category['NgayThanhLap'];
             if(isset($_POST['submit1'])){
                 if (isset($_POST['hoten'])) {
                     $hoten = $_POST['hoten'];
                     $hoten = str_replace('"', '\\"', $hoten);
                 }
                if (isset($_POST['tendangnhap'])) {
                    if(trim($_POST['tendangnhap'])){
                        $diachi = $_POST['tendangnhap'];
                        $diachi = str_replace('"', '\\"', $diachi);
                        //$diachi=substr( $diachi,  0, 1);
                    }
                }
                if (isset($_POST['ngaysinh'])) {
                    $ngaythanhlap = $_POST['ngaysinh'];
                    $ngaythanhlap = str_replace('"', '\\"', $ngaythanhlap);
                }
            $sql = "UPDATE phongkham set Tenphongkham='$hoten',Diachi='$diachi',NgayThanhLap='$ngaythanhlap'
                 where ID_Phongkham=" . $id;
                 $s->execute($sql);
                 //$mess= 'Cập nhật thành công';
                 echo '<script>
                 alert("Sửa thành công");
                 window.location.href="index.php?page=phongkham";
                 </script>';
             }
        
    }
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title">Sửa phòng khám</h4>
            </center>
            <h5 style="color:green"><?php echo $mess ?></h5>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="#" method="post">
                <div class="form-group">
                    <label>Tên phòng khám:</label>
                    <input type="text" class="form-control" name="hoten" value="<?php echo $hoten?>" placeholder="Enter Họ tên">
                </div>
                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <input type="text" class="form-control" name="tendangnhap" value="<?php echo $diachi?>">
                </div>
                <div class="form-group">
                    <label>Ngày Thành lập:</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $ngaythanhlap?>">
                </div>
               
                <button type="submit" class="btn btn-primary" name="submit1">Update</button>
                <button class="btn btn-warning float-right" name="Cancel7">Cancel</button>
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>