<?php
    class Ratee{
        function addRatee($dbc1, $idNumber, $firstName, $middleName, $surname, $password){
            try {
                $query = "INSERT INTO ratee (RateeIDNumber, FirstName, MiddleName, Surname, RateeTypeID, Password)
                        VALUES (:idNumber, :firstName, :middleName, :surname, '1', :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['RateeAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateRatee($dbc1, $idNumber, $firstName, $middleName, $surname, $password, $updateID){
            try {
                $query = "UPDATE ratee SET RateeIDNumber = :idNumber, FirstName = :firstName, MiddleName = :middleName, Surname = :surname, Password = :password WHERE RateeID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':password', $password);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['RateeUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteRatee($dbc1, $deleteID){
            try {
                $query = "DELETE FROM ratee WHERE RateeID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['RateeDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $r = new Ratee();

    if(!isset($_GET['deleteID'])){
        $idNumber = $_POST['idNumber'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $r->updateRatee($dbc1, $idNumber, $firstName, $middleName, $surname, $password, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $r->deleteRatee($dbc1, $deleteID);
    }else{
        $r->addRatee($dbc1, $idNumber, $firstName, $middleName, $surname, $password);
    }
    
    header('Location: ?ratee=true');
?>