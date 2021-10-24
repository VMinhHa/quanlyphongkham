<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách bác sĩ</h1>
    </div>
    <div class="panel-body card">
        <div>
            <a href="index.php?page=doctors&idthem=1">
            <button class="btn btn-primary btn btn-sm" style="width:150px;margin:5px;float:left;" 
            type="button" id="new_appointment">
            Thêm Bác sĩ
            </button>
            </a>
            <form method="post" style="width:150px;margin:5px;float:right;">
                        <div class="form-group">
                        <input type="text" class="form-control" placeholder="Searching..." id="s" name="s"
                        style="width:200px; float:right;">
                        </div>
            </form>
        </div>
    <div>
    <table class="card-body table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ và tên</th>
                    <th>Chuyên khoa</th>
                    <th>Tên tài khoản</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Cấp phát quyền</th>
                    
                    <th style="width:50px"></th>
                    <th style="width:50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                //timkiem
                $s='';
                    if(isset($_POST['s'])){
                        $s=$_POST['s'];
                    }
                    $additional='';
                    if(!empty($s)){
                        $additional=' and b.Hoten like"%'.$s.'%"';
                    }
                ////lay danh sach
                $s = new data();
                $dem=1;
                $sql = 'SELECT b.Hoten,b.ID_Khoa,ID_Bacsi,t.Tendangnhap,b.Gioitinh
                            ,Tenkhoa,b.Ngaysinh FROM bacsi b join khoa k on b.ID_Khoa=k.ID_Khoa join taikhoan t on t.id=b.id where 1 '.$additional.'';
                $caterogyList = $s->executeLesult($sql);
                foreach ($caterogyList as $item) {
                    echo '<tr>
                                <td>' . ($dem) . '</td>
                                <td>' . $item['Hoten'] . '</td>
                                <td>' . $item['Tenkhoa'] . '</td>
                                <td>' . $item['Tendangnhap'] . '</td>
                                <td>' . $item['Ngaysinh'] . '</td>
                                <td>' . $item['Gioitinh'] . '</td>
                                <td><button class="btn btn-primary">Capquyen</button></td>
                                <td>
                                <button class="btn btn-sm btn-danger delete_doctor" type="button" data-id="'.$item['ID_Bacsi'].'">Delete</button>
                                </a>
                                </td>
                                <td>
                                <a href="index.php?page=doctors&idsua='.$item['ID_Bacsi'].'" >
                                <button class="btn btn-primary btn btn-sm" type="submit" name="Edit" 
                              >Edit</button></a>
                                </td>
                                ';
                             $dem++;
                }
                ///Phần xóa

                // if(isset($_GET['idxoa'])){
                //     $idxoa=$_GET['idxoa'];
                //     echo 123;
                //     // $sql='delete from bacsi where ID_Bacsi = '.$idxoa;
                //     // $s->execute($sql);
                //    // echo '<script>window.location.reload();</script>';
                //     //Edit();
                // }
                // else {
                //     echo 2;
                // }
            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Them doctor -->
<!-- Table Panel -->
</div>
<script>

$('.delete_doctor').click(function(){
		_conf("Bạn có chắc chắn muốn xóa bác sĩ này?","delete_doctor",[$(this).attr('data-id')])
	})
    function delete_doctor($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_doctor',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Xóa Bác sĩ thành công",'success')
					setTimeout(function(){
						location.reload()
					},1000)

				}
			}
		})
	}
</script>


