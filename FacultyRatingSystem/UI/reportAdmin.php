<!DOCTYPE html>
<html lang="en">
<head>
  <?php 
    include 'FacultyRatingSystem/UI/UIParts/head.php'
   ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <?php include 'FacultyRatingSystem/UI/UIParts/navbar.php' ?>

  <?php include 'FacultyRatingSystem/UI/UIParts/sidebar.php' ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Report</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Report</h3>
            </div>
            
            <div class="card-body table-responsive">
              <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?reportSelected=true" method="post">
                <div class="row">
                  <div class="col-md-2">
                    <select name="ratee" class="form-control select2Ratee select2-primary" id="ratee" data-dropdown-css-class="select2-primary" style="width: 100%;">';
                      <option value="" disabled="disabled" selected>Select a Faculty</option>
                      <?php
                        $ratees = $queryRepoMain->getRatee($dbc1, null);
                        foreach ($ratees as $ratee) {
                            echo '<option value="'.$ratee['RateeID'].'">'.$ratee['FirstName'].' '.$ratee['Surname'].'</option>';
                        }
                        ?>
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select name="class" class="form-control select2Class select2-primary" id="class" data-dropdown-css-class="select2-primary" style="width: 100%;">';
                    </select>
                  </div>
                  <div class="col-md-2">
                    <select name="rater" class="form-control select2Rater select2-primary" id="rater" data-dropdown-css-class="select2-primary" style="width: 100%;">';
                    </select>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block mb-3 mr-2" id="setReport">Generate Report</button>
                  </div>
              </form>
                  <div class="col-md-4">
                    <?php
                      if(isset($_SESSION['RaterID'])){
                        $enrollments = $queryRepoMain->getEnrollment($dbc1, $_SESSION['RaterID'], null, null, null);
                        echo '<h4 class="float-right">Student: <strong>'.$enrollments[0]['RaterFirstName'].' '.$enrollments[0]['RaterSurname'].'</strong></h4>';
                        
                      }else {
                        echo '<h4 class="float-right">Student: <strong>None</strong></h4>';
                      }
                    ?>
                  </div>
                </div>
              
                <?php 
                  if(isset($_SESSION['RaterID'])){
                    include 'FacultyRatingSystem/UI/UIDynamics/ReportAdmin/report.php'; 
                  }
                ?>
            </div>
          </div>
      </div>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>

  <?php include 'FacultyRatingSystem/UI/UIParts/footer.php' ?>
</div>

<?php include 'FacultyRatingSystem/UI/UIParts/modal.php' ?>
<!-- REQUIRED SCRIPTS -->

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

<!-- DataTables -->
<script src="FacultyRatingSystem/Skin/plugins/datatables/jquery.dataTables.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Howler -->
<script src="FacultyRatingSystem/Skin/plugins/howler/howler.core.js"></script>
<!-- DataTables  & Plugins -->
<script src="FacultyRatingSystem/Skin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jszip/jszip.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="FacultyRatingSystem/Skin/plugins/Sortable.min.js"></script>
<script src="FacultyRatingSystem/Skin/plugins/jquery-sortable.js"></script>



<!-- AdminLTE App -->
<script src="FacultyRatingSystem/Skin/dist/js/adminlte.min.js"></script>

<script>
  //Initialize Select2 Elements
  $('.select2Ratee').select2();
  $('.select2Class').select2();
  $('.select2Rater').select2();

  //Initialize Select2 Elements
  $('.select2bs4').select2({
      theme: 'bootstrap4'
  })
</script>

<script>
  $("#ratee").change(function(){
    var rateeID = $(this).val();
    $.ajax({
      type: "post",
      url: '?classReport=true',
      data: {rateeID: rateeID},
      success: function(data){
        document.getElementById("class").innerHTML = data;
        document.getElementById("rater").innerHTML = "";
      }
    });
  })

  $("#class").change(function(){
    var classID = $(this).val();
    $.ajax({
      type: "post",
      url: '?raterReport=true',
      data: {classID: classID},
      success: function(data){
        document.getElementById("rater").innerHTML = data;
      }
    });
  })
</script>

</body>
</html>
