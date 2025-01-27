<?php
    class AYSemester{
        function add($dbc1, $data, $type){
            try {
                if($type == 'academicYear') {
                    $_SESSION['AcademicYearAdded'] = true;
                    $query = "INSERT INTO academicyear (AcademicYear)
                        VALUES (:data) ";
                }else {
                    $_SESSION['SemesterAdded'] = true;
                    $query = "INSERT INTO semester (Semester)
                        VALUES (:data) ";
                }
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':data', $data);
                $pdo->execute();
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function update($dbc1, $data, $type, $updateID){
            try {
                if($type == 'academicYear') {
                    $_SESSION['AcademicYearUpdated'] = true;
                    $query = "UPDATE AcademicYear SET AcademicYear = :data WHERE AcademicYearID = :updateID ";
                }else {
                    $_SESSION['SemesterUpdated'] = true;
                    $query = "UPDATE Semester SET Semester = :data WHERE SemesterID = :updateID ";
                }
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':data', $data);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function delete($dbc1, $deleteID, $type){
            try {
                if($type == 'academicYear') {
                    $_SESSION['AcademicYearDeleted'] = true;
                    $query = "DELETE FROM AcademicYear WHERE AcademicYearID = :deleteID ";
                }else {
                    $_SESSION['SemesterDeleted'] = true;
                    $query = "DELETE FROM Semester WHERE SemesterID = :deleteID ";
                }
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }

        function set($dbc1, $year, $sem){
            try {
                $query = "UPDATE academicyear SET IsActive = 0 ";
                $pdo = $dbc1->prepare($query);
                $pdo->execute();

                $query = "UPDATE academicyear SET IsActive = 1 WHERE AcademicYearID = :year ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':year', $year);
                $pdo->execute();

                $query = "UPDATE semester SET IsActive = 0 ";
                $pdo = $dbc1->prepare($query);
                $pdo->execute();

                $query = "UPDATE semester SET IsActive = 1 WHERE SemesterID = :sem ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':sem', $sem);
                $pdo->execute();

                $_SESSION['AYSemesterSet'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $r = new AYSemester();

    if(!isset($_GET['deleteID'])){
        if($_GET['type'] == 'academicYear'){
            $data = $_POST['year'];
        }else if($_GET['type'] == 'semester'){
            $data = $_POST['sem'];
        }
    }

    $type = $_GET['type'];
    if($_GET['type'] == 'set'){
        $year = $_POST['year'];
        $sem = $_POST['sem'];

        $r->set($dbc1, $year, $sem);
    }else if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $r->update($dbc1, $data, $type, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $r->delete($dbc1, $deleteID, $type);
    }else{
        $r->add($dbc1, $data, $type);
    }
    
    header('Location: ?AYSemester=true');
?>