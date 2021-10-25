<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Doctor's Appointment System</title>


  <?php
  include '../db/dbhelp.php';
  include '../db/connect.php';
  if (!isset($_SESSION['login_id']))
    header('location:login.php');

  include('./header.php');

  // include('./auth.php'); 
  ?>
</head>
<style>
  *{
    box-sizing: border-box;
  }
  main#view-panel{
    margin-left: 400px;
  }
  .card{
    width: 90%;
  }
  body {
    background: #80808045;
  }

  .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }

  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
</style>

<body>
  <?php include './topbar.php' ?>
  <?php include './navbar.php'?>
  <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
  <main id="view-panel">
    <?php
    if (isset($_GET['page'])) {
      switch ($_GET['page']) {
        case 'home':
          include './home.php';
          break;
        case 'doctors':
          if(isset($_GET['idsua'])||isset($_GET['idthem']))
          {
            $s = new data();
            if(isset($_POST['Cancel'])){
              include './doctor/index.php';
              }else{
                if(isset($_GET['idsua'])){
                  include './doctor/sua.php';
                if(isset($_GET['idthem'])){
                  include './doctor/them.php';
                }
              }
            }
            if(isset($_POST['Cancel1'])){
              include './doctor/index.php';
            }else{
              if(isset($_GET['idthem'])){
                include './doctor/them.php';
              }
            }
            if(isset($_GET['idxoa'])){
              include './doctor/index.php';
              include './doctor/xoa.php';
            }
          }
          else{
            include './doctor/index.php';
          }
          break;
        case 'appointments':
          include './lich.php';
          break;
      }
    } else {
      echo 'lỗi';
    };
    ?>

  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
        </div>
        <div class="modal-body">
          <div id="delete_content"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  window.start_load = function() {
    $('body').prepend('<di id="preloader2"></di>')
  }
  window.end_load = function() {
    $('#preloader2').fadeOut('fast', function() {
      $(this).remove();
    })
  }

  window.uni_modal = function($title = '', $url = '', $size = "") {
    start_load()
    $.ajax({
      url: $url,
      error: err => {
        console.log()
        alert("An error occured")
      },
      success: function(resp) {
        if (resp) {
          $('#uni_modal .modal-title').html($title)
          $('#uni_modal .modal-body').html(resp)
          if ($size != '') {
            $('#uni_modal .modal-dialog').addClass($size)
          } else {
            $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md")
          }
          $('#uni_modal').modal('show')
          end_load()
        }
      }
    })
  }


  window._conf = function($msg = '', $func = '', $params = []) {
    $('#confirm_modal #confirm').attr('onclick', $func + "(" + $params.join(',') + ")")
    $('#confirm_modal .modal-body').html($msg)
    $('#confirm_modal').modal('show')
  }
  window.alert_toast = function($msg = 'TEST', $bg = 'success') {
    $('#alert_toast').removeClass('bg-success')
    $('#alert_toast').removeClass('bg-danger')
    $('#alert_toast').removeClass('bg-info')
    $('#alert_toast').removeClass('bg-warning')
    if ($bg == 'success')
      $('#alert_toast').addClass('bg-success')
    if ($bg == 'danger')
      $('#alert_toast').addClass('bg-danger')
    if ($bg == 'info')
      $('#alert_toast').addClass('bg-info')
    if ($bg == 'warning')
      $('#alert_toast').addClass('bg-warning')
    $('#alert_toast .toast-body').html($msg)
    $('#alert_toast').toast({
      delay: 3000
    }).toast('show');
  }
  $(document).ready(function() {
    $('#preloader').fadeOut('fast', function() {
      $(this).remove();
    })
  })
</script>

</html>