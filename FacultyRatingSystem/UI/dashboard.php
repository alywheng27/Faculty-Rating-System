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
              Dashboard
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3 id="RaterCount"></h3>

                  <p>Rater</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user"></i>
                </div>
                <a href="?rater=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3 id="RateeCount"></h3>

                  <p>Ratee</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-tie"></i>
                </div>
                <a href="?ratee=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 id="SubjectCount"></h3>

                  <p>Subject</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book"></i>
                </div>
                <a href="?subject=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3 id="ClassCount"></h3>

                  <p>Class</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <a href="?class=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3 id="CategoryCount"></h3>

                  <p>Category</p>
                </div>
                <div class="icon">
                  <i class="fas fa-layer-group"></i>
                </div>
                <a href="?category=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3 id="QuestionCount"></h3>

                  <p>Question</p>
                </div>
                <div class="icon">
                  <i class="fas fa-question"></i>
                </div>
                <a href="?question=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-gradient-indigo">
                <div class="inner">
                  <h3 id="EnrollmentCount"></h3>

                  <p>Registered</p>
                </div>
                <div class="icon">
                  <i class="fas fa-registered"></i>
                </div>
                <a href="?enrollment=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-gradient-pink">
                <div class="inner">
                  <h3 id="UserCount"></h3>

                  <p>Admin</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-cog"></i>
                </div>
                <a href="?user=true" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
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
  <!-- ChartJS -->
  <script src="FacultyRatingSystem/Skin/plugins/chart.js/Chart.min.js"></script>
  <script src="FacultyRatingSystem/Skin/plugins/chartjs-plugin-labels.js"></script>
  <!-- jquery-validation -->
  <script src="FacultyRatingSystem/Skin/plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="FacultyRatingSystem/Skin/plugins/jquery-validation/additional-methods.min.js"></script>
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


  <!-- AdminLTE App -->
  <script src="FacultyRatingSystem/Skin/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      $.ajax({
        url: '?tableTotalRowCount=true',
        success: function(data){
          if(data != ''){
            var data = data.split(",");

            document.getElementById("RaterCount").innerHTML = data[0];
            document.getElementById("RateeCount").innerHTML = data[1];
            document.getElementById("SubjectCount").innerHTML = data[2];
            document.getElementById("ClassCount").innerHTML = data[3];
            document.getElementById("CategoryCount").innerHTML = data[4];
            document.getElementById("QuestionCount").innerHTML = data[5];
            document.getElementById("EnrollmentCount").innerHTML = data[6];
            document.getElementById("UserCount").innerHTML = data[7];

          //   var areaChartData = {
          //   labels  : ['Positions', 'Parties', 'Candidates', 'Voters'],
          //   datasets: [
          //     {
          //       label               : 'Total Count',
          //       backgroundColor     : '#dc3545',
          //       borderColor         : 'rgba(205,180,219,0.8)',
          //       pointRadius          : false,
          //       pointColor          : '#c1c7d1',
          //       pointStrokeColor    : 'rgba(205,180,219,1)',
          //       pointHighlightFill  : '#fff',
          //       pointHighlightStroke: 'rgba(205,180,219,1)',
          //       data                : data
          //     },
          //   ]
          // }

          // var barChartCanvas = $('#barChart').get(0).getContext('2d')
          // var barChartData = $.extend(true, {}, areaChartData)

          // var barChartOptions = {
          //   responsive              : true,
          //   maintainAspectRatio     : false,
          //   datasetFill             : false,
          //   plugins: {
          //     labels: [],
          //   },
          // }

          // new Chart(barChartCanvas, {
          //   type: 'bar',
          //   data: barChartData,
          //   options: barChartOptions
          // })
          }
        }
      })
    })
    
  </script>

</body>

</html>