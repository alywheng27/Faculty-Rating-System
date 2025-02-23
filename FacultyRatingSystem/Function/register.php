<?php
    class Register extends QueryRepo{
        function registerRater($dbc1, $idNumber, $userType, $firstName, $middleName, $surname, $password){
            try {
                $query = "INSERT INTO rater (RaterIDNumber, RaterTypeID, FirstName, MiddleName, Surname, Password) 
                    VALUES (:idNumber, :userType, :firstName, :middleName, :surname, :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':userType', $userType);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['Registered'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }

        function registerRatee($dbc1, $idNumber, $userType, $firstName, $middleName, $surname, $password){
            try {
                $query = "INSERT INTO ratee (RateeIDNumber, RateeTypeID, FirstName, MiddleName, Surname, Password) 
                    VALUES (:idNumber, :userType, :firstName, :middleName, :surname, :password) ";
                $pdo = $dbc1->prepare($query);
                $pdo->bindParam(':idNumber', $idNumber);
                $pdo->bindParam(':userType', $userType);
                $pdo->bindParam(':firstName', $firstName);
                $pdo->bindParam(':middleName', $middleName);
                $pdo->bindParam(':surname', $surname);
                $pdo->bindParam(':password', $password);
                $pdo->execute();

                $_SESSION['Registered'] = true;
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $register = new Register();

    if(isset($_POST['idNumber']) AND isset($_POST['firstName']) AND isset($_POST['middleName']) AND isset($_POST['surname']) AND isset($_POST['userType']) AND isset($_POST['password']) AND isset($_POST['confirmPassword'])){
        $idNumber = $_POST['idNumber'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $surname = $_POST['surname'];
        $userType = $_POST['userType'];    
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if($password != $confirmPassword){
            $_SESSION['PasswordMismatch'] = true;
            header('Location: index.php');
            exit();
        }

        if($userType == 'Student'){
            $register->registerRater($dbc1, $idNumber, 1, $firstName, $middleName, $surname, $password);
        }else if($userType == 'Supervisor'){
            $register->registerRater($dbc1, $idNumber, 2, $firstName, $middleName, $surname, $password);
        }else if($userType == 'Faculty'){
            $register->registerRatee($dbc1, $idNumber, 1, $firstName, $middleName, $surname, $password);
        }

        header('Location: index.php');
    }else{
        $_SESSION['IncompleteCredentials'] = true;
        header('Location: index.php');
    }
    
?>