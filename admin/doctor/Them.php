<?php
if (!empty($_POST)) {
    $tenkhoa = '';
    $gioitinh = '';
    $hoten = '';
    $tendangnhap = '';
    $id = '';
    $ngaysinh = '';
    if (isset($_POST['submit'])) {
        if (isset($_POST['hoten'])) {
            if($_POST['hoten']!='')
            {
                $hoten = $_POST['hoten'];
                $hoten = str_replace('"', '\\"', $hoten);
            }
            else{
                $messs1= 'Vui lòng nhập trường này';
            }
        }
        if (isset($_POST['tendangnhap'])) {
            $tendangnhap = $_POST['tendangnhap'];
            $tendangnhap = str_replace('"', '\\"', $tendangnhap);
        }
        if (isset($_POST['tenkhoa'])) {
            $tenkhoa = $_POST['tenkhoa'];
            $tenkhoa = str_replace('"', '\\"', $tenkhoa);
        }
        if (isset($_POST['ngaysinh'])) {
            if($_POST['ngaysinh']!=''){
                $ngaysinh = $_POST['ngaysinh'];
                $ngaysinh = str_replace('"', '\\"', $ngaysinh);
            }
            else{
                $messs2='Vui lòng chọn trường này';
            }
        }
        if (isset($_POST['gioitinh'])) {
            if($_POST['gioitinh']!=false)
            $gioitinh = $_POST['gioitinh'];
            else{
                $messs3='Vui lòng nhập trường này';
            }
        }
        if (isset($_GET['idthem'])) {
            //Luu vao database
            $sql = "INSERT INTO bacsi (id,ID_Khoa,Hoten,Ngaysinh,Gioitinh)
                    values('$tendangnhap','$tenkhoa','$hoten','$ngaysinh','$gioitinh')";
        } else {
            echo 'loi';
        }
        $s->execute($sql);
        $mess1= 'Thêm bác sĩ thành công';
    }
}
?>
<!-- The Modal -->
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title">Thêm Bác sĩ</h4>
            </center>
            <h5 style="color:green"><?php echo isset($mess1)?$mess1:''; ?></h5>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
     <form action="#" method="post">
                <div class="form-group">
                    <label>Họ tên:</label>
                    <input type="text" class="form-control" name="hoten" value="<?php $hoten?>" placeholder="Enter Họ tên">
                    <span style="color:red"><?php echo isset($messs1)?$messs1:''; ?></span>
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập:</label>
                    <select class="form-control" name="tendangnhap">
                        <?php
                        $sql1 = 'SELECT id,Tendangnhap FROM taikhoan where Phanquyen="Doctor"';
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
                    <input type="date" class="form-control" name="ngaysinh"><br>
                    <span style="color:red"><?php echo isset($messs2)?$messs2:''; ?></span>
                    
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <input type="radio" value="nam" name="gioitinh"><label for="">Nam</label>
                    <input type="radio" value="nu" name="gioitinh"><label for="">Nữ</label> <br>
                    <span style="color:red"><?php echo isset($messs3)?$messs3:''; ?></span>
                </div>
        <button type="submit" class="btn btn-primary" name="submit">Add</button>
        <button class="btn btn-warning float-right" name="Cancel1">Cancel</button>
        </form>
    </div>
    <!-- Modal footer -->
</div>
</div>