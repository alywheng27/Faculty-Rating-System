<?php
    class Logout extends QueryRepo{
        function signout($dbc1){
            session_unset();
            session_destroy();

            header('Location: index.php');
        }
    }

    $logout = new Logout();

    $logout->signout($dbc1);

    
?>