<?php
    class EnrollmentModal extends QueryRepo{
        function displayEnrollment($dbc1){
            $enrollments = $this->getEnrollment($dbc1);
            echo '
            <div class="modal fade" id="enrollment">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Enrollment</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?enrollmentFunction=true" method="post">
                        <div class="form-group">
                            <label for="rater">Student</label>
                            <select name="rater" class="form-control select2Rater select2-success" id="rater" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $raters = $this->getRater($dbc1);
                                foreach ($raters as $rater) {
                                    echo '<option value="'.$rater['RaterID'].'">'.$rater['FirstName'].' '.$rater['Surname'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select name="class" class="form-control select2Class select2-success" id="class" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $classes = $this->getClass($dbc1, true);
                                foreach ($classes as $class) {
                                    echo '<option value="'.$class['ClassID'].'">'.$class['Class'].'</option>';
                                }
                            echo '</select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            ';

            foreach ($enrollments as $enrollment) {
                echo '
                    <div class="modal fade" id="edit'.$enrollment['EnrollmentID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Enrollment</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?enrollmentFunction=true&updateID='.$enrollment['EnrollmentID'].'" method="post">
                                <div class="form-group">
                                    <label for="rater'.$enrollment['EnrollmentID'].'">Student</label>
                                    <select name="rater" class="form-control select2Rater'.$enrollment['EnrollmentID'].' select2-success" id="rater'.$enrollment['EnrollmentID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                        $raters = $this->getRater($dbc1);
                                        foreach ($raters as $rater) {
                                            if($rater['RaterID'] == $enrollment['RaterID']) {
                                                echo '<option value="'.$rater['RaterID'].'" selected>'.$rater['FirstName'].' '.$rater['Surname'].'</option>';
                                            }else{
                                                echo '<option value="'.$rater['RaterID'].'">'.$rater['FirstName'].' '.$rater['Surname'].'</option>';
                                            }
                                        }
                                    echo '</select>
                                </div>
                                <div class="form-group">
                                    <label for="class'.$enrollment['EnrollmentID'].'">Class</label>
                                    <select name="class" class="form-control select2Class'.$enrollment['EnrollmentID'].' select2-success" id="class'.$enrollment['EnrollmentID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                        $classes = $this->getClass($dbc1, true);
                                        foreach ($classes as $class) {
                                            echo '<option value="'.$class['ClassID'].'">'.$class['Class'].'</option>';
                                        }
                                    echo '</select>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
      
                    <div class="modal fade" id="delete'.$enrollment['EnrollmentID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Enrollment</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this enrollment?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?enrollmentFunction=true&deleteID='.$enrollment['EnrollmentID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new EnrollmentModal();

    $rm->displayEnrollment($dbc1);
    


?>