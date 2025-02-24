<?php
    class Admin{
        function addAdmin($dbc1, $firstName, $middleName, $surname, $username, $password){
            try {
                $query = "INSERT INTO user (FirstName, MiddleName, Surname, Username, Password)
                        VALUES (:firstName, :middleName, :surname, :username, :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':username', $username);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['AdminAdded'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function updateAdmin($dbc1, $firstName, $middleName, $surname, $username, $password, $updateID){
            try {
                $query = "UPDATE user SET FirstName = :firstName, MiddleName = :middleName, Surname = :surname, Username = :username, Password = :password WHERE UserID = :updateID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':username', $username);
                $pdo->bindParam(':password', $password);
                $pdo->bindParam(':updateID', $updateID);
                $pdo->execute();

                $_SESSION['AdminUpdated'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function deleteAdmin($dbc1, $deleteID){
            try {
                $query = "DELETE FROM user WHERE UserID = :deleteID ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':deleteID', $deleteID);
                $pdo->execute();

                $_SESSION['AdminDeleted'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }            
        }
    }

    $a = new Admin();

    if(!isset($_GET['deleteID'])){
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    if(isset($_GET['updateID'])){
        $updateID = $_GET['updateID'];
        $a->updateAdmin($dbc1, $firstName, $middleName, $surname, $username, $password, $updateID);
    }else if(isset($_GET['deleteID'])){
        $deleteID = $_GET['deleteID'];
        $a->deleteAdmin($dbc1, $deleteID);
    }else{
        $a->addAdmin($dbc1, $firstName, $middleName, $surname, $username, $password);
    }
    
    header('Location: ?admin=true');
?>