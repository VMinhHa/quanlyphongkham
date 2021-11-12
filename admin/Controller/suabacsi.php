<!-- The Modal -->

<?php
$s=new data();
    if (isset($_GET['idsua'])) {
        $mess='';
        $id = $_GET['idsua'];
        $sql = 'select b.Hoten,t.Tendangnhap,b.Gioitinh,b.Ngaysinh,k.Tenkhoa,k.ID_Khoa,t.id
         from khoa k join bacsi b on k.ID_Khoa=b.ID_Khoa join taikhoan t ON b.id=t.id
         where ID_Bacsi=' . $id;
        $category = $s->executeSingLesult($sql);
            $hoten = $category['Hoten'];
            $khoa=$category['ID_Khoa'];
            $idtk=$category['id'];
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
                //$mess= 'Cập nhật thành công';
                echo '<script>
                alert("Sửa thành công");
                window.location.href="index.php?page=doctors";
                </script>';
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
                    <select class="form-control" name="tendangnhap">
                            <option value="<?php echo $idtk ?>"><?php echo $tendangnhap ?></option>
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
                    <option value="<?php echo $khoa ?>"><?php echo $tenkhoa ?></option>
                            <?php
                            $sql = 'SELECT ID_Khoa,Tenkhoa FROM khoa where ID_Khoa not in (
                                SELECT ID_Khoa from bacsi)';
                            $caterogyList = $s->executeLesult($sql);
                            foreach ($caterogyList as $item) {
                                echo '<option value="' . $item['ID_Khoa'] . '" >' . $item['Tenkhoa'] . '</option>';
                            }
                            ?>
                    </select>
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