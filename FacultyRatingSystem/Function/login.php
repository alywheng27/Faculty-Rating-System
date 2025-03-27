<?php
    class Login extends QueryRepo{
        function loginAdmin($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count, UserID, FirstName FROM User 
                WHERE Username = :username AND Password = :password";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            $_SESSION['name'] = $row['FirstName'];
            $_SESSION['id'] = $row['UserID'];

            return $row;
        }

        function loginRater($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count, RaterID, FirstName, RaterTypeID FROM Rater 
                WHERE RaterIDNumber = :username AND Password = :password ";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            $_SESSION['name'] = $row['FirstName'];
            $_SESSION['id'] = $row['RaterID'];

            return $row;
        }

        function loginRatee($dbc1, $username, $password){
            $query = "SELECT COUNT(*) AS Count, RateeID, FirstName FROM Ratee 
                WHERE RateeIDNumber = :username AND Password = :password ";
            $pdo = $dbc1->prepare($query);
            $pdo->bindParam(':username', $username);
            $pdo->bindParam(':password', $password);
            $pdo->execute();

            $row = $pdo->fetch();

            $_SESSION['name'] = $row['FirstName'];
            $_SESSION['id'] = $row['RateeID'];

            return $row;
        }
    }

    $login = new Login();

    if(isset($_SESSION['name']) AND isset($_SESSION['id'])){
        unset($_SESSION['name']);
        unset($_SESSION['id']);
    }

    if(isset($_POST['username']) AND isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $row = $login->loginAdmin($dbc1, $username, $password);

        if($row['Count'] > 0){
            header('Location: ?dashboard=true');
            $_SESSION['UserType'] = 'Admin';
            exit();
        }

        $row = $login->loginRater($dbc1, $username, $password);

        if($row['Count'] > 0){
            // if($row['RaterTypeID'] == 1){
            //     header('Location: ?evaluation=true');
            // }else if($row['RaterTypeID'] == 2){
            //     header('Location: ?supervisor=true');
            // }

            $date = date('Y-m-d').'T'.date('H:i');
            $ratingPeriod = $login->getRatingPeriod($dbc1);
            
            if($ratingPeriod[0]['FromRatingPeriod'] <= $date AND $ratingPeriod[0]['ToRatingPeriod'] >= $date){
                header('Location: ?evaluation=true');
                $_SESSION['UserType'] = 'Rater';
                exit();
            }else {
                $_SESSION['RatingPeriodProblem'] = true;
                header('Location: index.php');
                exit();
            }
        }

        $row = $login->loginRatee($dbc1, $username, $password);

        if($row['Count'] > 0){
            header('Location: ?reportFaculty=true');
            $_SESSION['UserType'] = 'Ratee';
            exit();
        }

        $_SESSION['InvalidCredentials'] = true;
        header('Location: index.php');
    }else {
        $_SESSION['IncompleteCredentials'] = true;
        header('Location: index.php');
    }

    
?>