<?php
    class ClassRate{
        function addClass($dbc1, $class, $subject, $ratee, $academicYear, $semester){
            try {
                $query = "INSERT INTO class (Class, SubjectID, RateeID, AcademicYearID, SemesterID)
                        VALUES (:class, :subject, :ratee, :academicYear, :semester) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':class', $class);
                $pdo->bindParam(':subject', $subject);
                $pdo->bindParam(':ratee', $ratee);
                $pdo->bindParam(':academicYear', $academicYear);
                $pdo->bindParam(':semester', $semester);
                $pdo->execute();

                $_SESSION['ClassAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateClass($dbc1, $class, $subject, $ratee, $academicYear, $semester, $updateID){
            try {
                $query = "UPDATE class SET Class = :class, SubjectID = :subject, RateeID = :ratee, AcademicYearID = :academicYear, SemesterID = :semester WHERE ClassID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':class', $class);
                $pdo->bindParam(':subject', $subject);
                $pdo->bindParam(':ratee', $ratee);
                $pdo->bindParam(':academicYear', $academicYear);
                $pdo->bindParam(':semester', $semester);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['ClassUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteClass($dbc1, $deleteID){
            try {
                $query = "DELETE FROM class WHERE ClassID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['ClassDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $r = new ClassRate();

    if(!isset($_GET['deleteID'])){
        $class = $_POST['class'];
        $subject = $_POST['subject'];
        $ratee = $_POST['faculty'];
        $academicYear = $_POST['academicYear'];
        $semester = $_POST['semester'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $r->updateClass($dbc1, $class, $subject, $ratee, $academicYear, $semester, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $r->deleteClass($dbc1, $deleteID);
    }else{
        $r->addClass($dbc1, $class, $subject, $ratee, $academicYear, $semester);
    }
    
    header('Location: ?class=true');
?>