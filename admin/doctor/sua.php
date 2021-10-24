<!-- The Modal -->
<?php
    if (isset($_GET['idsua'])) {
        $mess='';
        $id = $_GET['idsua'];
        $sql = 'select b.Hoten,t.Tendangnhap,b.Gioitinh,b.Ngaysinh,k.Tenkhoa,k.ID_Khoa,t.id
         from khoa k join bacsi b on k.ID_Khoa=b.ID_Khoa join taikhoan t ON b.id=t.id
         where ID_Bacsi=' . $id;
        $category = $s->executeSingLesult($sql);
            $hoten = $category['Hoten'];
            $taikhoan=$category['id'];
            $khoa=$category['ID_Khoa'];
            $ngaysinh = $category['Ngaysinh'];
            $gioitinh = $category['Gioitinh'];
            $tendangnhap=$category['Tendangnhap'];
            $tenkhoa=$category['Tenkhoa'];
            if(isset($_POST['submit1'])){
                if (isset($_POST['hoten'])) {
                    $hoten = $_POST['hoten'];
                    $hoten = str_replace('"', '\\"', $hoten);
                }
                if (isset($_POST['tendangnhap'])) {
                    if(trim($_POST['tendangnhap'])){
                        $tendangnhap = $_POST['tendangnhap'];
                        $tendangnhap = str_replace('"', '\\"', $tendangnhap);
                        $tendangnhap=substr( $tendangnhap,  0, 1);
                    }
                }
                if (isset($_POST['tenkhoa'])) {
                    if(trim($_POST['tenkhoa'])){
                        $tenkhoa = $_POST['tenkhoa'];
                        $tenkhoa = str_replace('"', '\\"', $tenkhoa);
                        $tenkhoa=substr( $tenkhoa,  0, 1);
                    }
                }
                if (isset($_POST['ngaysinh'])) {
                    $ngaysinh = $_POST['ngaysinh'];
                    $ngaysinh = str_replace('"', '\\"', $ngaysinh);
                }
                if (isset($_POST['gioitinh'])) {
                    $gioitinh = $_POST['gioitinh'];
                }
                $sql = "UPDATE bacsi set id='$tendangnhap',ID_Khoa='$tenkhoa',Hoten='$hoten',Ngaysinh='$ngaysinh',Gioitinh='$gioitinh'
                where ID_Bacsi=" . $id;
                $s->execute($sql);
                $mess= 'Cập nhật thành công';
                
            }
        
    }
?>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title">Sửa Bác sĩ</h4>
            </center>
            <h5 style="color:green"><?php echo $mess ?></h5>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="#" method="post">
                <div class="form-group">
                    <label>Họ tên:</label>
                    <input type="text" class="form-control" name="hoten" value="<?php echo $hoten?>" placeholder="Enter Họ tên">
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập:</label>
                    <input type="text" class="form-control" name="tendangnhap" value="<?php echo $taikhoan.'-'.$tendangnhap?>">
                </div>
                <div class="form-group">
                    <label>Tên Khoa: </label>
                    <input type="text" class="form-control" name="tenkhoa" value="<?php echo $khoa.'-'.$tenkhoa?>">
                </div>
                <div class="form-group">
                    <label>Ngày sinh:</label>
                    <input type="date" class="form-control" name="ngaysinh" value="<?php echo $ngaysinh?>">
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <input type="text"class="form-control"name="gioitinh" value="<?php echo $gioitinh?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit1">Update</button>
                <button class="btn btn-warning float-right" name="Cancel">Cancel</button>
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>