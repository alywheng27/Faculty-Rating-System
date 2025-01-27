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

        function displaySubjectAdded(){
            echo 'SubjectAdded';
            unset($_SESSION['SubjectAdded']);
        }

        function displaySubjectUpdated(){
            echo 'SubjectUpdated';
            unset($_SESSION['SubjectUpdated']);
        }

        function displaySubjectDeleted(){
            echo 'SubjectDeleted';
            unset($_SESSION['SubjectDeleted']);
        }

        function displayVoterAdded(){
            echo 'VoterAdded';
            unset($_SESSION['VoterAdded']);
        }

        function displayVoterUpdated(){
            echo 'VoterUpdated';
            unset($_SESSION['VoterUpdated']);
        }

        function displayVoterDeleted(){
            echo 'VoterDeleted';
            unset($_SESSION['VoterDeleted']);
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

    if(isset($_SESSION['SubjectAdded'])){
        $n->displaySubjectAdded();
    }

    if(isset($_SESSION['SubjectUpdated'])){
        $n->displaySubjectUpdated();
    }

    if(isset($_SESSION['SubjectDeleted'])){
        $n->displaySubjectDeleted();
    }

    if(isset($_SESSION['VoterAdded'])){
        $n->displayVoterAdded();
    }

    if(isset($_SESSION['VoterUpdated'])){
        $n->displayVoterUpdated();
    }

    if(isset($_SESSION['VoterDeleted'])){
        $n->displayVoterDeleted();
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