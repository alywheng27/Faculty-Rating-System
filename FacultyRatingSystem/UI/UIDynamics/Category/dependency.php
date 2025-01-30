<?php
    class CategoryDependency extends QueryRepo{
        function installCategoryDependency($dbc1){
            $categories = $this->getCategory($dbc1, NULL);

            foreach ($categories as $category) {
                echo '
                    $(".select2Order'.$category['CategoryID'].'").select2();
                ';
            }
        }
    }

    $rd = new CategoryDependency();

    $rd->installCategoryDependency($dbc1);
?>