
<?php
$s=new data();
    if (isset($_GET['idsua'])) {
        $mess='';
        $id = $_GET['idsua'];
        $sql = "select Tenkhoa,Ngaythanhlap from khoa where ID_Khoa=".$id;
        $khoa = $s->executeSingLesult($sql);
            $Tenkhoa = $khoa['Tenkhoa'];
            $Ngaythanhlap=$khoa['Ngaythanhlap'];
            if(isset($_POST['submit2'])){
                if (isset($_POST['tenkhoa'])) {
                    $tenkhoa = $_POST['tenkhoa'];
                    $tenkhoa = str_replace('"', '\\"', $tenkhoa);
                }
                    $fname = strtotime(date("Y-m-d H:i"))."_".$_FILES['image']['name'];
                    $move = move_uploaded_file($_FILES['image']['tmp_name'], './../images/khoa/'.$fname);
                
                if (isset($_POST['ngaythanhlap'])) {
                        $ngaythanhlap = $_POST['ngaythanhlap'];
                        $ngaythanhlap = str_replace('"', '\\"', $ngaythanhlap);
                }
                $sql = "UPDATE khoa set Tenkhoa='$tenkhoa',Hinhanh='$fname',Ngaythanhlap='$ngaythanhlap'
                where ID_Khoa=" . $id;
                $s->execute($sql);
                 $mess= 'Cập nhật thành công';
                
                
     
                //header('location:index.php?page=categories');
            }
            
        
    }
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <center>
                <h4 class="modal-title">Sửa thông tin khoa</h4>
            </center>
            <h5 style="color:green"><?php echo $mess ?></h5>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tên khoa:</label>
                    <input type="text" class="form-control" name="tenkhoa" value="<?php echo $Tenkhoa?>">
                </div>
                <div class="form-group">
                    <label>Ngày thành lập:</label>
                    <input type="date" class="form-control" name="ngaythanhlap" value="<?php echo $Ngaythanhlap ?>">
                </div>
                <div class="form-group">
                        <label>Ảnh khoa: </label>
                        <input type="file" class="form-control-file" name="image">
                    </div>

                <button type="submit" class="btn btn-primary" name="submit2">Sửa</button>
                <button class="btn btn-warning float-right" name="Cancel3">Thoát</button>
            </form>
        </div>
        <!-- Modal footer -->
    </div>
</div>