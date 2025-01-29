<?php
    class ClassDependency extends QueryRepo{
        function installClassDependency($dbc1){
            $classes = $this->getClass($dbc1, NULL, NULL);

            foreach ($classes as $class) {
                echo "
                    $('.select2Class".$class['ClassID']."').select2();
                    $('.select2Subject".$class['ClassID']."').select2();
                    $('.select2Faculty".$class['ClassID']."').select2();
                    $('.select2AcademicYear".$class['ClassID']."').select2();
                    $('.select2Semester".$class['ClassID']."').select2();
                ";
            }
        }
    }

    $rd = new ClassDependency();

    $rd->installClassDependency($dbc1);
?>