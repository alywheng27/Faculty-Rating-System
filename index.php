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

        // Functions

        public function raterFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/rater.php';
        }

        public function loginFunction($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/login.php';
        }

        public function queryRepo($dbc1, $dbc2) {
            include 'FacultyRatingSystem/Function/QueryRepo/queryRepo.php';
            return $queryRepoMain;
        }

        // Dynamics

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
    }
    
    // Functions
    else if(isset($_GET['loginFunction'])){
        $main->loginFunction($dbc1, $dbc2);
    }else if(isset($_GET['raterFunction'])){
        $main->raterFunction($dbc1, $dbc2);
    }

    // Dynamics


    // Parts
    else if(isset($_GET['notification'])){
        $main->notification($dbc1, $dbc2);
    }
    
    else{
        $main->login($dbc1, $dbc2, $queryRepoMain);
    }


?>