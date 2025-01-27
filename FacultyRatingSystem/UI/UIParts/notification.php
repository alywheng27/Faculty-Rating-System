<?php
    class Notification{
        function displayRaterAdded(){
            echo 'RaterAdded';
            unset($_SESSION['RaterAdded']);
        }

        function displayRaterUpdated(){
            echo 'RaterUpdated';
            unset($_SESSION['RaterUpdated']);
        }

        function displayRaterDeleted(){
            echo 'RaterDeleted';
            unset($_SESSION['RaterDeleted']);
        }

        function displayRateeAdded(){
            echo 'RateeAdded';
            unset($_SESSION['RateeAdded']);
        }

        function displayRateeUpdated(){
            echo 'RateeUpdated';
            unset($_SESSION['RateeUpdated']);
        }

        function displayRateeDeleted(){
            echo 'RateeDeleted';
            unset($_SESSION['RateeDeleted']);
        }

        function displayAcademicYearAdded(){
            echo 'AcademicYearAdded';
            unset($_SESSION['AcademicYearAdded']);
        }

        function displayAcademicYearUpdated(){
            echo 'AcademicYearUpdated';
            unset($_SESSION['AcademicYearUpdated']);
        }

        function displayAcademicYearDeleted(){
            echo 'AcademicYearDeleted';
            unset($_SESSION['AcademicYearDeleted']);
        }

        function displaySemesterAdded(){
            echo 'SemesterAdded';
            unset($_SESSION['SemesterAdded']);
        }

        function displaySemesterUpdated(){
            echo 'SemesterUpdated';
            unset($_SESSION['SemesterUpdated']);
        }

        function displaySemesterDeleted(){
            echo 'SemesterDeleted';
            unset($_SESSION['SemesterDeleted']);
        }

        function displayAYSemesterSet(){
            echo 'AYSemesterSet';
            unset($_SESSION['AYSemesterSet']);
        }

        function displayInvalidCredentials(){
            echo 'InvalidCredentials';
            unset($_SESSION['InvalidCredentials']);
        }

        function displayIncompleteCredentials(){
            echo 'IncompleteCredentials';
            unset($_SESSION['IncompleteCredentials']);
        }

        function displayBallotSubmitted(){
            echo 'BallotSubmitted';
            unset($_SESSION['BallotSubmitted']);
        }

        function displayUserAdded(){
            echo 'UserAdded';
            unset($_SESSION['UserAdded']);
        }

        function displayUserUpdated(){
            echo 'UserUpdated';
            unset($_SESSION['UserUpdated']);
        }

        function displayUserDeleted(){
            echo 'UserDeleted';
            unset($_SESSION['UserDeleted']);
        }
    }

    $n = new Notification();

    if(isset($_SESSION['RaterAdded'])){
        $n->displayRaterAdded();
    }

    if(isset($_SESSION['RaterUpdated'])){
        $n->displayRaterUpdated();
    }

    if(isset($_SESSION['RaterDeleted'])){
        $n->displayRaterDeleted();
    }

    if(isset($_SESSION['RateeAdded'])){
        $n->displayRateeAdded();
    }

    if(isset($_SESSION['RateeUpdated'])){
        $n->displayRateeUpdated();
    }

    if(isset($_SESSION['RateeDeleted'])){
        $n->displayRateeDeleted();
    }

    if(isset($_SESSION['AcademicYearAdded'])){
        $n->displayAcademicYearAdded();
    }

    if(isset($_SESSION['AcademicYearUpdated'])){
        $n->displayAcademicYearUpdated();
    }

    if(isset($_SESSION['AcademicYearDeleted'])){
        $n->displayAcademicYearDeleted();
    }

    if(isset($_SESSION['SemesterAdded'])){
        $n->displaySemesterAdded();
    }

    if(isset($_SESSION['SemesterUpdated'])){
        $n->displaySemesterUpdated();
    }

    if(isset($_SESSION['SemesterDeleted'])){
        $n->displaySemesterDeleted();
    }

    if(isset($_SESSION['AYSemesterSet'])){
        $n->displayAYSemesterSet();
    }

    if(isset($_SESSION['InvalidCredentials'])){
        $n->displayInvalidCredentials();
    }

    if(isset($_SESSION['IncompleteCredentials'])){
        $n->displayIncompleteCredentials();
    }

    if(isset($_SESSION['BallotSubmitted'])){
        $n->displayBallotSubmitted();
    }

    if(isset($_SESSION['UserAdded'])){
        $n->displayUserAdded();
    }

    if(isset($_SESSION['UserUpdated'])){
        $n->displayUserUpdated();
    }

    if(isset($_SESSION['UserDeleted'])){
        $n->displayUserDeleted();
    }
?>