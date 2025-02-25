<?php
    class SupervisorSelected extends QueryRepo{
        function selectSupervisor($dbc1){
            try {
                $_SESSION['RateeID'] = $_POST['ratee'];
            } catch (\Throwable $th) {
                echo 'Error: '.$th->getMessage();
            }
        }
    }

    $co = new SupervisorSelected();

    $co->selectSupervisor($dbc1);

    header('Location: ?supervisor=true');
?>
        