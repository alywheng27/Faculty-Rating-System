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

        function displayCategoryAdded(){
            echo 'CategoryAdded';
            unset($_SESSION['CategoryAdded']);
        }

        function displayCategoryUpdated(){
            echo 'CategoryUpdated';
            unset($_SESSION['CategoryUpdated']);
        }

        function displayCategoryDeleted(){
            echo 'CategoryDeleted';
            unset($_SESSION['CategoryDeleted']);
        }

        function displayCategorySet(){
            echo 'CategorySet';
        }

        function displayClassAdded(){
            echo 'ClassAdded';
            unset($_SESSION['ClassAdded']);
        }

        function displayClassUpdated(){
            echo 'ClassUpdated';
            unset($_SESSION['ClassUpdated']);
        }

        function displayClassDeleted(){
            echo 'ClassDeleted';
            unset($_SESSION['ClassDeleted']);
        }

        function displayQuestionAdded(){
            echo 'QuestionAdded';
            unset($_SESSION['QuestionAdded']);
        }

        function displayQuestionUpdated(){
            echo 'QuestionUpdated';
            unset($_SESSION['QuestionUpdated']);
        }

        function displayQuestionDeleted(){
            echo 'QuestionDeleted';
            unset($_SESSION['QuestionDeleted']);
        }

        function displayQuestionSet(){
            echo 'QuestionSet';
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

    if(isset($_SESSION['ClassAdded'])){
        $n->displayClassAdded();
    }

    if(isset($_SESSION['ClassUpdated'])){
        $n->displayClassUpdated();
    }

    if(isset($_SESSION['ClassDeleted'])){
        $n->displayClassDeleted();
    }

    if(isset($_SESSION['AYSemesterSet'])){
        $n->displayAYSemesterSet();
    }

    if(isset($_SESSION['CategoryAdded'])){
        $n->displayCategoryAdded();
    }

    if(isset($_SESSION['CategoryUpdated'])){
        $n->displayCategoryUpdated();
    }

    if(isset($_SESSION['CategoryDeleted'])){
        $n->displayCategoryDeleted();
    }

    if(isset($_GET['CategorySet'])){
        $n->displayCategorySet();
    }

    if(isset($_SESSION['QuestionAdded'])){
        $n->displayQuestionAdded();
    }

    if(isset($_SESSION['QuestionUpdated'])){
        $n->displayQuestionUpdated();
    }

    if(isset($_SESSION['QuestionDeleted'])){
        $n->displayQuestionDeleted();
    }

    if(isset($_GET['QuestionSet'])){
        $n->displayQuestionSet();
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