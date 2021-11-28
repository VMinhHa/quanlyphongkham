<?php
    if(!isset($_SESSION['username']))
	{
		echo '<script>
            alert("Bạn phải đăng nhập");
            window.location.href="login.php";
            </script>';
	}
?>
<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Xem Lịch</h1>
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
                        $prodperpage=3;
                        $dem=0;
                        ?>
                    <!-- Phan trang -->
					<thead>
						<tr>
                        <th style="width:5%">STT</th>
						<th style="width:12.5%">họ và tên bệnh nhân</th>
						<th style="width:12.5%">Ngày hẹn</th>
						<th style="width:12.5%">Giờ hẹn</th>
                        <th style="width:25%">Chuẩn đoán</th>
                        <th style="width:12.5%">Kê thuốc</th>
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
                        $additional='and Hotenbn like"%'.$s.'%" 
                        or Ngayhen like"%'.$s.'%"';
                    }
                    $dem=0; 
                    $page1=1;
                    if(isset($_REQUEST["page1"])){
                        $page1=$_REQUEST["page1"];
                        
                    }
                    $page2=($page1-1)*$prodperpage;
                    $s = new data();
                        $sql='select * from taikhoan t JOIN bacsi b on t.id=b.id JOIN lichhen 
                        l on b.ID_Bacsi=l.ID_Bacsi join benhnhan n on n.ID_Benhnhan=l.ID_Benhnhan
                        where  1 '.$additional.' and Tendangnhap="'.$_SESSION['username'].'" and Trangthai="Hoàn thành"
                        order by Ngayhen
                        desc limit '.$page2.','.$prodperpage.' ';
                        $Lich = $s->executeLesult($sql);
                        $dem=1;
                        $sq1='Select * from benhan b join lichhen l
                        on b.id_Lichhen=l.id_Lichhen';
                    
                    foreach ($Lich as $item) {
                        if($item['Trangthai']=='Hoàn thành'){
					?>
					<tr>
                        <td ><?php echo $dem++ ?></td>
						<td>
							<?php echo $item['Hotenbn'] ?>
						</td>
						<td><?php echo date("l M d Y",strtotime($item['Ngayhen'])) ?></td>
                        <td><?php echo date("h:i A",strtotime($item['Giobatdau'])).' - '.date("h:i A",strtotime($item['Gioketthuc'])) ?></td>
                        <!-- Chuẩn đoán -->
                        <td>   
                            <?php if($item['Trangthai']=='Hoàn thành') {
                                $sql2='Select * from benhan where id_Lichhen=
                                '.$item['id_Lichhen'];
                                $chuandoan=$s->executeSingLesult($sql2);?>
                            <form action="Controll/xulybenhan.php"  method="POST"> 
                                <div class="form-group">
                                    <!-- ko di hchuyen -->
<textarea rows="5" cols="58" name="noidung" class="form-control" disabled>
<?php 
    if($chuandoan!=null){
echo trim($chuandoan['Chuandoan']);
    }

?>
</textarea> 
    <!-- 2222222222222 -->
                                </div>
                            </form>
                            <?php 
                                }
                            ?>
                        </td>
                        <!-- THuoc -->
                        <td>
                            <?php if($item['Trangthai']=='Hoàn thành') {?>
                                <h4>Tên thuốc: </h4>
                            <?php
                                $sql1="select * from xemthuoc x join thuoc t on x.ID_Thuoc=t.ID_Thuoc where
                                x.id_Lichhen=".$item['id_Lichhen'];
                                $s1='';
                                $ds=$s->executeLesult($sql1);
                                foreach ($ds as $value) {
                                    $s1=$value['Tenthuoc'].' , '.$s1;
                                }
                                echo $result = rtrim($s1, " , ");
                            ?>
                            <?php 
                            // Cần sửa
                            //  if(isset($_POST['idlich1'])){
                            //     $_SESSION['idlich']=$_POST['idlich1'];
                            //  }
                                 }
                                
                            ?>
                        </td>
                                        
                            <!-- 0----- -->
                        <td><?php echo $item['Trangthai'] ?></td>
                        
					</tr>
                <?php }} ?>
                <tr>
                    <td colspan="7" >    
                            <div class="giua">
                            <ul class="pagination pagination-lg">
                                <?php 
                                if($dem1>0){
                                # code...
                                for ($i=0 ;$i<$dem1/3.0;$i++) {
                                ?>
                                <li class="pagination-item">
                                    <a class="pagination-item__link" 
                                    href="thongtinbacsi.php?page1=<?php echo  $i+1 ?>">
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