<?php
    class main{
        // Main Pages
        public function login($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/login.php';
        }

        public function dashboard($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/dashboard.php';
        }

        public function rater($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/rater.php';
        }

        public function ratee($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/ratee.php';
        }

        public function subject($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/subject.php';
        }

        public function AYSemester($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/AYSemester.php';
        }

        public function class($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/class.php';
        }

        public function category($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/category.php';
        }

        public function question($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/question.php';
        }

        public function enrollment($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/enrollment.php';
        }

        public function evaluation($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/evaluation.php';
        }

        public function reportAdmin($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/reportAdmin.php';
        }

        public function reportFaculty($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/reportFaculty.php';
        }

        public function register($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/register.php';
        }

        public function admin($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/admin.php';
        }

        public function supervisor($dbc1, $dbc2, $queryRepoMain) {
            include 'FacultyRatingSystem/UI/supervisor.php';
        }

        // Functions

        public function raterFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/rater.php';
        }

        public function rateeFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/ratee.php';
        }

        public function subjectFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/subject.php';
        }

        public function AYSemesterFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/AYSemester.php';
        }

        public function classFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/class.php';
        }

        public function categoryFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/category.php';
        }

        public function questionFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/question.php';
        }

        public function enrollmentFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/enrollment.php';
        }

        public function evaluationFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/evaluation.php';
        }

        public function reportAdminFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/reportAdmin.php';
        }

        public function registerFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/register.php';
        }

        public function adminFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/admin.php';
        }

        public function supervisorFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/supervisor.php';
        }


        public function logoutFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/logout.php';
        }

        public function loginFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/login.php';
        }

        public function queryRepo($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/QueryRepo/queryRepo.php';
            return $queryRepoMain;
        }

        // Dynamics

        public function categoryOrder($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/Category/categoryOrder.php';
        }

        public function questionOrder($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/Question/questionOrder.php';
        }

        public function evaluationSelected($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/Evaluation/evaluationSelected.php';
        }

        public function classReport($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/ReportAdmin/classReport.php';
        }

        public function raterReport($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/ReportAdmin/raterReport.php';
        }

        public function reportSelected($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/ReportAdmin/reportSelected.php';
        }

        public function raterReportFaculty($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/ReportFaculty/raterReport.php';
        }

        public function reportSelectedFaculty($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/ReportFaculty/reportSelected.php';
        }

        public function supervisorSelected($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIDynamics/Supervisor/supervisorSelected.php';
        }

        public function notification($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIParts/notification.php';
        }

        public function checkMaintenance($dbc1, $dbc2) {
            $query = "SELECT * FROM Mode ";
            $pdo = $dbc1->prepare($query);
            $pdo->execute();

            $row = $pdo->fetch(PDO::FETCH_ASSOC);

            $_SESSION['Mode'] = $row['Mode'];
        }

        public function maintenance() {
            header("Location: FacultyRatingSystem/Maintenance/maintenance.html");
        }

        public function error() {
            header("Location: FacultyRatingSystem/Error/error.html");
        }

        /*************  KEY AND CONNECTION  ************** */

        function key() {
            include 'CPort/Function/Key/key.php';
        }

        public function queryGenerator($dbc1, $dbc2) {
            include 'CPort/Function/QueryGenerator/queryGenerator.php';
        }

        function connection1(){
            $connection1 = 'true';
			include 'FacultyRatingSystem/Connection/connect.php';
			return $dbc1;
        }
        
        function connection2(){
            $connection2 = 'true';
			include 'FacultyRatingSystem/Connection/connect.php';
			return $dbc2;
		}

    }

    $main = new main;

    ob_start();
    session_start();
    
    header("Expires: Tue, 01 Jan 2050 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    date_default_timezone_set("Asia/Manila");
    $_SESSION['dateAndTimeER'] = date('Y/m/d h:i:s A');
    $_SESSION['dateER'] = date('Y/m/d');
    $_SESSION['timeER'] = date('h:i:s A');

    $_SESSION['dayER'] = date('d');

    //$main->key();

    if(isset($_GET['error'])){
        $main->error();
        exit();
    }

    $dbc1 = $main->connection1();
    $dbc2 = $main->connection2();

    $queryRepoMain = $main->queryRepo($dbc1, $dbc2);

    // Main Pages
    if(isset($_GET['dashboard'])){
        $main->dashboard($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['rater'])){
        $main->rater($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['ratee'])){
        $main->ratee($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['subject'])){
        $main->subject($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['AYSemester'])){
        $main->AYSemester($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['class'])){
        $main->class($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['category'])){
        $main->category($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['question'])){
        $main->question($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['enrollment'])){
        $main->enrollment($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['evaluation'])){
        $main->evaluation($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['reportAdmin'])){
        $main->reportAdmin($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['reportFaculty'])){
        $main->reportFaculty($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['register'])){
        $main->register($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['admin'])){
        $main->admin($dbc1, $dbc2, $queryRepoMain);
    }else if(isset($_GET['supervisor'])){
        $main->supervisor($dbc1, $dbc2, $queryRepoMain);
    }
    
    // Functions
    else if(isset($_GET['loginFunction'])){
        $main->loginFunction($dbc1, $dbc2);
    }else if(isset($_GET['raterFunction'])){
        $main->raterFunction($dbc1, $dbc2);
    }else if(isset($_GET['rateeFunction'])){
        $main->rateeFunction($dbc1, $dbc2);
    }else if(isset($_GET['subjectFunction'])){
        $main->subjectFunction($dbc1, $dbc2);
    }else if(isset($_GET['AYSemesterFunction'])){
        $main->AYSemesterFunction($dbc1, $dbc2);
    }else if(isset($_GET['classFunction'])){
        $main->classFunction($dbc1, $dbc2);
    }else if(isset($_GET['categoryFunction'])){
        $main->categoryFunction($dbc1, $dbc2);
    }else if(isset($_GET['questionFunction'])){
        $main->questionFunction($dbc1, $dbc2);
    }else if(isset($_GET['enrollmentFunction'])){
        $main->enrollmentFunction($dbc1, $dbc2);
    }else if(isset($_GET['evaluationFunction'])){
        $main->evaluationFunction($dbc1, $dbc2);
    }else if(isset($_GET['evaluationSelected'])){
        $main->evaluationSelected($dbc1, $dbc2);
    }else if(isset($_GET['reportAdminFunction'])){
        $main->reportAdminFunction($dbc1, $dbc2);
    }else if(isset($_GET['reportSelected'])){
        $main->reportSelected($dbc1, $dbc2);
    }else if(isset($_GET['reportSelectedFaculty'])){
        $main->reportSelectedFaculty($dbc1, $dbc2);
    }else if(isset($_GET['registerFunction'])){
        $main->registerFunction($dbc1, $dbc2);
    }else if(isset($_GET['adminFunction'])){
        $main->adminFunction($dbc1, $dbc2);
    }else if(isset($_GET['supervisorFunction'])){
        $main->supervisorFunction($dbc1, $dbc2);
    }else if(isset($_GET['supervisorSelected'])){
        $main->supervisorSelected($dbc1, $dbc2);
    }

    // Dynamics
    else if(isset($_GET['categoryOrder'])){
        $main->categoryOrder($dbc1, $dbc2);
    }else if(isset($_GET['questionOrder'])){
        $main->questionOrder($dbc1, $dbc2);
    }else if(isset($_GET['classReport'])){
        $main->classReport($dbc1, $dbc2);
    }else if(isset($_GET['raterReport'])){
        $main->raterReport($dbc1, $dbc2);
    }else if(isset($_GET['raterReportFaculty'])){
        $main->raterReportFaculty($dbc1, $dbc2);
    }

    // Parts
    else if(isset($_GET['notification'])){
        $main->notification($dbc1, $dbc2);
    }
    
    else if(isset($_GET['logoutFunction'])){
        $main->logoutFunction($dbc1, $dbc2);
    }else{
        $main->login($dbc1, $dbc2, $queryRepoMain);
    }
    


?>