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

        public function notification($dbc1, $dbc2) {
            include 'FacultyRatingSystem/UI/UIParts/notification.php';
        }

        public function logoutFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/logoutFunction.php';
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
    }

    // Dynamics
    else if(isset($_GET['categoryOrder'])){
        $main->categoryOrder($dbc1, $dbc2);
    }

    // Parts
    else if(isset($_GET['notification'])){
        $main->notification($dbc1, $dbc2);
    }
    
    else{
        $main->login($dbc1, $dbc2, $queryRepoMain);
    }


?>