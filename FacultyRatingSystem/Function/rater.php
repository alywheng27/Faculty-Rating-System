<?php
    class Rater{
        function addRater($dbc1, $idNumber, $firstName, $middleName, $surname, $raterType, $password){
            try {
                $query = "INSERT INTO rater (RaterIDNumber, FirstName, MiddleName, Surname, RaterTypeID, Password)
                        VALUES (:idNumber, :firstName, :middleName, :surname, :raterType, :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':raterType', $raterType);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['RaterAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateRater($dbc1, $idNumber, $firstName, $middleName, $surname, $raterType, $password, $updateID){
            try {
                $query = "UPDATE rater SET RaterIDNumber = :idNumber, FirstName = :firstName, MiddleName = :middleName, Surname = :surname, RaterTypeID = :raterType, Password = :password WHERE RaterID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':raterType', $raterType);
                $pdo->bindParam(':password', $password);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['RaterUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteRater($dbc1, $deleteID){
            try {
                $query = "DELETE FROM rater WHERE RaterID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['RaterDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $r = new Rater();

    if(!isset($_GET['deleteID'])){
        $idNumber = $_POST['idNumber'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $surname = $_POST['surname'];
        $raterType = $_POST['raterType'];
        $password = $_POST['password'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $r->updateRater($dbc1, $idNumber, $firstName, $middleName, $surname, $raterType, $password, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $r->deleteRater($dbc1, $deleteID);
    }else{
        $r->addRater($dbc1, $idNumber, $firstName, $middleName, $surname, $raterType, $password);
    }
    
    header('Location: ?rater=true');
?>