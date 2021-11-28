<?php
	if(!isset($_SESSION['username']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="../login.php";
            </script>';
	}
?>
<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem Lịch Khám</h1>
    </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
			<form method="post" style="width:150px;margin:5px;float:right;">
                            <input type="text" class="form-control" placeholder="Tìm kiem..." id="s" name="s"
                            style="width:200px; float:right;">
                            </div>
                </form>
				<table class="table table-bordered">
					<!-- Phan trang -->
					<?php 
                        include 'db/connect.php';
                        $p=new data();
                        $dem1=$p->demlich();
                        $prodperpage=4;
                        $dem=0;
                        ?>
                    <!-- Phan trang -->
					<thead>
						<tr>
                        <th style="width:5%">STT</th>
						<th style="width:10%">họ và tên Bác sĩ</th>
						<th style="width:15%">Ngày khám</th>
						<th style="width:15%">Giờ khám</th>
						<th style="width:30%">Chuẩn đoán</th>
						<th style="width:15%">Loại thuốc</th>
						<th style="width:10%">Trạng thái</th>
					</tr>
					</thead>
					<?php 
                    $s='';
                    if(isset($_POST['s'])){
                        $s=$_POST['s'];
                    }
                    $additional='';
                    if(!empty($s)){
                        $additional='and Hoten like"%'.$s.'%" 
                        or Ngayhen like"%'.$s.'%"';
                    }
                    $dem=0; 
                    $page1=1;
                    if(isset($_REQUEST["page2"])){
                        $page1=$_REQUEST["page2"];
                    }
                    $page2=($page1-1)*$prodperpage;
                    $s = new data();
                    $sql='select * from bacsi b join lichhen l on b.ID_Bacsi=l.ID_Bacsi  join benhnhan n 
                    on n.ID_Benhnhan=l.ID_Benhnhan JOIN taikhoan t on t.id=n.id
                    where 1 '.$additional.' and  Tendangnhap="'.$_SESSION['username'].'" and Trangthai="Hoàn thành" 
					limit '.$page2.','.$prodperpage.' ';
                    $Lich = $s->executeLesult($sql);
                    $dem=1;
                    foreach ($Lich as $item) {
					?>
					<tr>
                        <td ><?php echo $dem++ ?></td>
						<td>
							<?php echo $item['Hoten'] ?>
						</td>
						<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
                        <td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
						<!-- Chuẩn đoán -->
						<td>
							<?php 
								$sql1='Select * from benhan b join lichhen l
								on b.id_Lichhen=l.id_Lichhen where b.ID_Lichhen=
								'.$item['id_Lichhen'];
								$chuandoan=$s->executeSingLesult($sql1);
								if($chuandoan!=null){
									echo '<p>'.$chuandoan['Chuandoan'].'</p>';
								}
								
							?>
							
						</td>
								
						<!-- THuoc -->
						<td>
						<form action="thongtinbenhnhan.php?xemthuoc"  method="POST"> 
                                <button type="submit" value="<?php echo $item['id_Lichhen'] ?>" name="idlichhen" class="btn btn-dark text-center">
                                    Xem thuốc
                                </button>
                            </form>
						</td>
	
						<!-- 0----- -->
                        <td><?php echo $item['Trangthai'] ?></td>
					</tr>
                <?php } ?>
				<tr>
                    <td colspan="7" >    
                            <div class="giua">
                            <ul class="pagination pagination-lg">
                                <?php 
                            if($dem1>0){
                                # code...
                                for ($i=0 ;$i<$dem1/4.0;$i++) {
                                ?>
                                <li class="pagination-item">
                                    <a class="pagination-item__link" 
                                    href="thongtinbenhnhan.php?page2=<?php echo  $i+1 ?>">
                                    <?php echo  $i+1 ?></a></li>
                                <?php
                                 }}
                        
                            
                             ?>
                         </ul>
                        </div>
                    </td>
                    </tr>
				</table>
			</div>
		</div>
	</div>
</div>


<!--  ---------------Modal Them-->
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Danh sách thuốc</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
	
        <!-- Modal body -->
        <div class="modal-body">
			<table class="table table-bordered">
			<thead>
				<tr>
                	<th style="width:10%">STT</th>
                    <th style="width:30%">Tên Thuốc</th>
                    <th style="width:30%">Loại thuốc</th>
                    <th style="width:20%">Hạn dùng</th>
				</tr>
				</thead>
				<tbody>
					<?php 
						echo $_GET['idlichhen'];
					?>
					<!--  -->


				</tbody>
			</table>
			<hr>
			<div class="col-md-12 text-center">
				<button class="btn btn-secondary btn-sm col-md-4" data-dismiss="modal" type="button" data-dismiss="modal" id="">Thoát</button>
			</div>
        </div>
        
        <!-- Modal footer -->
        
      </div>
    </div>
  </div>