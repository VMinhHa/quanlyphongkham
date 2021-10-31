<div class = "container">
<center><h2>Thông tin tài khoản.</h2></center>
<center><hr width="200"></center>
	<div class="row mt-2">
		<div class="col-2"></div>
		<div class="col-1.5">
			<p class="font-weight-bolder">Tên tài khoản<p>
			<p class="font-weight-bolder">Mật khẩu</p>
			<p class="font-weight-bolder">Email</p>
		</div>
		<div class="col-1">
			<p class="font-weight-bolder">:<p>
			<p class="font-weight-bolder">:</p>
			<p class="font-weight-bolder">:</p>
		</div>
		<div class="col-3">
        <?php
            
            include './db/connect.php';
            $s = new data();
            $sql='SELECT * from taikhoan
            where Tendangnhap="'.$_SESSION['username'].'"';
            $dsbacsi = $s->executeSingLesult($sql);

        ?>
			<p><?php echo $dsbacsi['Tendangnhap']?></p>	
			<p>********</p>
			<p><?php echo $dsbacsi['Email'];?></p>
		</div>
		<div class="col-6.5">
			<p style="padding-bottom: 24px;"></p>
			<p><a href="doimk_bacsi.php" >Cập Nhật<img src="./images/edit.svg" width="20px" class="ml-1"></a></p>
			<p><a href="#"  data-toggle="modal" data-target="#modalUpdate">Cập Nhật<img src="./images/edit.svg" width="20px" class="ml-1"></a></p>
		</div>
	</div>
</div>


<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhập Email</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">

                
                  <form action="capnhatthongtin.php" method="POST">
                    <div class="form-group">
                      <label class="font-weight-bolder">Email: </label>
                      <input type="email" class="form-control" name="email" required="required" value="<?php echo $dsbacsi['Email']; ?>">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="Edit">Lưu</button>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
                </div>
              </div>
            </div>
          </div>



<!-- <div class="modal fade" id="modalUpdate1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cập nhập thông tin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <form action="capnhatthongtin.php" method="POST">
                  <div class="form-group">
                    <label>Mật khẩu cũ:</label><span class="text-danger"></span>
                    <input type="password" class="form-control" name="mkcu" required="required"><br>
                    <span style="color:red;" id="mess1" onblur="mess1()"></span>
                </div>
                <div class="form-group">
                    <label>Mật khẩu mới:</label><span class="text-danger"></span>
                    <input type="password" class="form-control" name="mkmoi" required="required">
                    <br>
                    <span style="color:red;" id="mess2"></span>
                </div>
                <div class="form-group">
                    <label>Nhập lại mật khẩu mới:</label><span class="text-danger"></span>
                    <input type="password" class="form-control" name="nlmk" required="required">
                    <br>
                    <span style="color:red;" id="mess3" onblur="mess3()"></span>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="editmk">Lưu</button>
                  <a href="#" class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div> -->