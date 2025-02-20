<?php
    class ClassReport extends QueryRepo{
        function displayClassReport($dbc1){
            $rateeID = $_POST['rateeID'];
            $classes = $this->getClass($dbc1, true, $rateeID);

            echo '<option value="" disabled="disabled" selected>Select a Class</option>';
            foreach ($classes as $class) {
                echo "
                    <option value='".$class['ClassID']."'>".$class['Class']."</option>
                ";
            }
            
        }
    }

    $cr = new ClassReport();

    $cr->displayClassReport($dbc1);
?>