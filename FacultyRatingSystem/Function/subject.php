<?php
    class Subject{
        function addSubject($dbc1, $subject, $description){
            try {
                $query = "INSERT INTO subject (Subject, SubjectDescription)
                        VALUES (:subject, :description) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':subject', $subject);
                $pdo->bindParam(':description', $description);
                $pdo->execute();

                $_SESSION['SubjectAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateSubject($dbc1, $subject, $description, $updateID){
            try {
                $query = "UPDATE subject SET Subject = :subject, SubjectDescription = :description WHERE SubjectID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':subject', $subject);
                $pdo->bindParam(':description', $description);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['SubjectUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteSubject($dbc1, $deleteID){
            try {
                $query = "DELETE FROM subject WHERE SubjectID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['SubjectDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $r = new Subject();

    if(!isset($_GET['deleteID'])){
        $subject = $_POST['subject'];
        $description = $_POST['description'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $r->updateSubject($dbc1, $subject, $description, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $r->deleteSubject($dbc1, $deleteID);
    }else{
        $r->addSubject($dbc1, $subject, $description);
    }
    
    header('Location: ?subject=true');
?>