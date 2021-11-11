
<div class="container-fluid">
	<div class="panel-heading mt-3 ml-3 mr-3">
        <h1 class="text-center">Danh sách kê thuốc</h1>
    </div>
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                         <th style="width:10%">STT</th>
                        <th style="width:20%">Tên Thuốc</th>
                        <th style="width:20%">Loại thuốc</th>
                        <th style="width:30%">Thông tin thuốc</th>
                        <th style="width:20%">Hạn dùng</th>
					</tr>
					</thead>
					<tbody>
                <?php 
                   
                    // Xuat -----------------------------------------
                    include 'db/connect.php';
                    $p=new data();
                    $sql="select * from xemthuoc x join thuoc t on x.ID_Thuoc=t.ID_Thuoc where
                     x.id_Lichhen=".$_POST['idlichhen'];
                     $dsthuoc=$p-> executeLesult($sql);
                     $dem=1;
                     foreach ($dsthuoc as $value) {
                        echo '<tr>
                                <td>' . ($dem++) . '</td>
                                <td>' . $value['Tenthuoc'] . '</td>
                                <td>' . $value['Loaithuoc'] . '</td>
                                <td>' .$value['Thongtinthuoc'] . '</td>
                                <td>' . $value['Handung'] . '</td>
                                ';
                     }
                ?>
                </tbody>
                <tr class="thoay">
                    <td  colspan="5">
                        <a href="thongtinbenhnhan.php?pagetrang=lichsu">Thoát</a>
                    </td>
                </tr>
				</table>
                <style>
                    .thoay{
                        text-align:center;
                        
                     }
                     .thoay td a{
                        border:1px solid orange;
                        border-radius:5px;
                        padding:5px;
                        background-color:orange;
                        color:red;
                     }

                </style>
			</div>
		</div>
	</div>
</div>
<style>
		.pagination {
			display: flex;
			align-items: center;
			justify-content: center;
			list-style: none;
		}
		.pagination-item {
			margin-left: 15px;
			margin-right: 15px;
		}

		.pagination-item__link{
			height: 30px;
			display: block;
			text-decoration: none;
			text-align: center;
			min-width: 40px;
			line-height: 30px;
			color: #939393;
			font-size: 1.2rem;
			border-radius: 2px;
		}
</style>
