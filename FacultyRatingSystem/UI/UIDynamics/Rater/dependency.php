<?php
    class RaterDependency extends QueryRepo{
        function installRaterDependency($dbc1){
            $raters = $this->getRater($dbc1, NULL, NULL);

            foreach ($raters as $rater) {
                echo '
                    $(".select2RaterType'.$rater['RaterID'].'").select2();
                ';
            }
        }
    }

    $rd = new RaterDependency();

    $rd->installRaterDependency($dbc1);
?>