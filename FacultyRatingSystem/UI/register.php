<!DOCTYPE html>
<html>
<head>
  <?php 
    include 'FacultyRatingSystem/UI/UIParts/head.php' 
  ?>
</head>
<body class="hold-transition login-page background-img" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('FacultyRatingSystem/Skin/dist/img/login-background.jpg');">
<div class="login-box">
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Faculty Evaluation System</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register an account</p>

      <form role="form" id="quickForm" enctype="multipart/form-data" action="?registerFunction=true" method="post">
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" name="idNumber" class="form-control" placeholder="ID Number" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" name="firstName" class="form-control" placeholder="FirstName" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" name="middleName" class="form-control" placeholder="Middle Name" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="text" name="surname" class="form-control" placeholder="Surname" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
            <select name="userType" class="form-control select2UserType select2-success" id="userType" data-dropdown-css-class="select2-success" style="width: 100%;">
              <option value="" disabled="disabled" selected>User Type</option>
              <option value="Student">Student</option>
              <option value="Supervisor">Supervisor</option>
              <option value="Faculty">Faculty</option>
            </select>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" data-toggle="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-eye"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group mb-3">
            <input type="password" name="confirmPassword" class="form-control" data-toggle="password" placeholder="Confirm Password">
            <div class="input-group-append">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fa fa-eye"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <div class="col-md-6">
            <a href="index.php" class="btn btn-success btn-block">Sign In</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="FacultyRatingSystem/Skin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="FacultyRatingSystem/Skin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="FacultyRatingSystem/Skin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="FacultyRatingSystem/Skin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="FacultyRatingSystem/Skin/plugins/toastr/toastr.min.js"></script>

<!-- jquery-validation -->
<script src="FacultyRatingSystem/Skin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="FacultyRatingSystem/Skin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="FacultyRatingSystem/Skin/dist/js/demo.js"></script>



<!------------------  DASHBOARD  ---------------------- -->
<!-- REQUIRED SCRIPTS -->

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="FacultyRatingSystem/Skin/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/raphael/raphael.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="FacultyRatingSystem/Skin/dist/js/pages/dashboard2.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="FacultyRatingSystem/Skin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- ChartJS -->
<script src="FacultyRatingSystem/Skin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="FacultyRatingSystem/Skin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="FacultyRatingSystem/Skin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="FacultyRatingSystem/Skin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="FacultyRatingSystem/Skin/plugins/moment/moment.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="FacultyRatingSystem/Skin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="FacultyRatingSystem/Skin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="FacultyRatingSystem/Skin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="FacultyRatingSystem/Skin/dist/js/pages/dashboard.js"></script>

<script>
  $('.select2UserType').select2();
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $.ajax({
      url: '?notification=true',
      success: function(data){
        if(data == 'Registered'){
          const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
          });

          toastr.success('Registration successful.');
        }
      }
    });
  })
</script>

<!-- Show Password plugin JavaScript-->
<script src="FacultyRatingSystem/Skin/plugins/bootstrap-show-password.min.js"></script>

</body>
</html>
