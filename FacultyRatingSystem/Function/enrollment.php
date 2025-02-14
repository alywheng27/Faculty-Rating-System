<?php
    class Enrollment{
        function addEnrollment($dbc1, $rater, $class){
            try {
                $query = "INSERT INTO enrollment (RaterID, ClassID)
                        VALUES (:rater, :class) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':rater', $rater);
                $pdo->bindParam(':class', $class);
                $pdo->execute();

                $_SESSION['EnrollmentAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateEnrollment($dbc1, $rater, $class, $updateID){
            try {
                $query = "UPDATE enrollment SET RaterID = :rater, ClassID = :class WHERE EnrollmentID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':rater', $rater);
                $pdo->bindParam(':class', $class);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['EnrollmentUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteEnrollment($dbc1, $deleteID){
            try {
                $query = "DELETE FROM enrollment WHERE EnrollmentID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['EnrollmentDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $r = new Enrollment();

    if(!isset($_GET['deleteID'])){
        $rater = $_POST['rater'];
        $class = $_POST['class'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $r->updateEnrollment($dbc1, $rater, $class, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $r->deleteEnrollment($dbc1, $deleteID);
    }else{
        $r->addEnrollment($dbc1, $rater, $class);
    }
    
    header('Location: ?enrollment=true');
?>