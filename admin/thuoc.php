<div class="container-fluid">
    <div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem danh sách người dùng</h1>
    </div>
    <div class="panel-body card">
        <div>
            <button class="btn btn-primary btn btn-sm" data-toggle="modal" data-target="#myModal" style="width:150px;margin:5px;float:left;" 
            type="button" id="new_appointment">
            Thêm Thuốc
            </button>
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
                    <th style="width:5%">STT</th>
                    <th style="width:15%">Tên Thuốc</th>
                    <th style="width:5%">Loại thuốc</th>
                    <th style="width:60%">Thông tin thuốc</th>
                    <th style="width:10%">Ngày nhập</th>
                    <th style="width:5%"></th>
                    <th style="width:5%"></th>
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
                        $additional=' and Tenthuoc like"%'.$s.'%"';
                    }
                ////lay danh sach
                $s = new data();
                $dem=1;
                $sql = 'SELECT * FROM thuoc where 1 '.$additional.'';
                $caterogyList = $s->executeLesult($sql);
                foreach ($caterogyList as $item) {
                    echo '<tr>
                                <td>' . ($dem) . '</td>
                                <td>' . $item['Tenthuoc'] . '</td>
                                <td>' . $item['Loaithuoc'] . '</td>
                                <td>' . $item['Thongtinthuoc'] . '</td>
                                <td>' . $item['Ngaynhap'] . '</td>
                                <td>
                                <button class="btn btn-sm btn-danger delete_thuoc" type="button" data-id="'.$item['ID_Thuoc'].'">Xóa</button>
                                </a>
                                </td>
                                <td>
                                <a href="index.php?page=thuoc&idsua='.$item['ID_Thuoc'].'" >
                                <button class="btn btn-primary btn btn-sm" type="submit" name="Edit" 
                              >Sửa</button></a>
                                </td>
                                ';
                             $dem++;
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
$('.delete_thuoc').click(function(){
		_conf("Bạn có chắc là muốn xóa thuốc này ko?","delete_thuoc",[$(this).attr('data-id')])
	})
	function delete_thuoc($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_thuocc',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Xóa thành công",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
<!-- Them doctor -->
<!-- Table Panel -->
</div>
<!--  ---------------Modal Them-->
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thêm Thuốc</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
        <form action="./themthuoc.php" id="manage-appointment" method="POST">
                    <div class="form-group">
                        <label>Tên Thuốc:</label>
                        <input type="text" class="form-control" name="tenthuoc" placeholder="Nhập tên thuốc" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Loại thuốc</label><br>
                        <input type="text" class="form-control" name="loaithuoc" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Thông tin thuốc</label>
                        <textarea rows="10" name="thongtinthuoc"  cols="48"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Ngày nhập</label>
                        <input type="date" class="form-control" name="ngaynhap" required>
                    </div>
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn-primary btn btn-sm col-md-4" name="submit4">Thêm</button>
				<button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
			</div>
		</form>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>




