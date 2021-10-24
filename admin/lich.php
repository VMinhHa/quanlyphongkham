<?php 
	// $doctor= $conn->query("SELECT * FROM doctors_list ");
	// while($row = $doctor->fetch_assoc()){
	// 	$doc_arr[$row['id']] = $row;
	// }
	// $patient= $conn->query("SELECT * FROM users where type = 3 ");
	// while($row = $patient->fetch_assoc()){
	// 	$p_arr[$row['id']] = $row;
	// }
?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<button class="btn-primary btn btn-sm" type="button" id="new_appointment"><i class="fa fa-plus"></i> Thêm lịch</button>
				<br>
                <br>
				<table class="table table-bordered">
					<thead>
						<tr>
						<th style="width:40%">Lịch</th>
						<th style="width:30%">Bác sĩ</th>
						<th style="width:20%">Tình trạng
                        </th>
						<th style="width:5%"></th>
                        <th style="width:5%"></th>
					</tr>
					</thead>
					<?php 
                    $s = new data();
                    $sql = 'SELECT l.ID_Lich,b.Hoten,tinhtrang,Ngay FROM bacsi b join lichlamviec l on b.ID_Bacsi=l.ID_Bacsi';
                    $Lich = $s->executeLesult($sql);
                    foreach ($Lich as $item) {
					?>
					<tr>
						<td><?php echo date("l M d, Y h:i A",strtotime($item['Ngay'])) ?></td>
						<td><?php echo $item['Hoten']?></td>
						<td><?php echo $item['tinhtrang'] ?></td>
						<td class="text-center">
							<button  class="btn btn-primary btn-sm update_app" type="button" data-id="<?php echo $item['ID_Lich'] ?>">Sửa</button>
							
						</td>
                        <td class="text-center">
							<button  class="btn btn-danger btn-sm delete_app" type="button" data-id="<?php echo $item['ID_Lich'] ?>">Xóa</button>
						</td>
					</tr>
                <?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$('.update_app').click(function(){
		uni_modal("Edit Appintment","set_appointment.php?id="+$(this).attr('data-id'),"mid-large")
	})
	$('#new_appointment').click(function(){
		uni_modal("Add Appintment","set_appointment.php","mid-large")
	})
	$('.delete_app').click(function(){
		_conf("Bạn có chắc là muốn xóa lịch này ko?","delete_app",[$(this).attr('data-id')])
	})
	function delete_app($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_appointment',
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