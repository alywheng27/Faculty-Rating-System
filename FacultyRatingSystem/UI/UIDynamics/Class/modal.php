<?php
    class ClassModal extends QueryRepo{
        function displayClass($dbc1){
            $classes = $this->getClass($dbc1);
            echo '
            <div class="modal fade" id="class">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Class</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?classFunction=true" method="post">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <input type="text" name="class" id="class" class="form-control" placeholder="Class" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select name="subject" class="form-control select2Subject select2-success" id="subject" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $subjects = $this->getSubject($dbc1);
                                foreach ($subjects as $subject) {
                                    echo '<option value="'.$subject['SubjectID'].'">'.$subject['Subject'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="faculty">Faculty</label>
                            <select name="faculty" class="form-control select2Faculty select2-success" id="faculty" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $ratees = $this->getRatee($dbc1);
                                foreach ($ratees as $ratee) {
                                    echo '<option value="'.$ratee['RateeID'].'">'.$ratee['FirstName'].' '.$ratee['Surname'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="academicYear">Academic Year</label>
                            <select name="academicYear" class="form-control select2AcademicYear select2-success" id="academicYear" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $academicYears = $this->getAcademicYear($dbc1, false);
                                foreach ($academicYears as $academicYear) {
                                    echo '<option value="'.$academicYear['AcademicYearID'].'">'.$academicYear['AcademicYear'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select name="semester" class="form-control select2Semester select2-success" id="semester" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $semesters = $this->getSemester($dbc1, false);
                                foreach ($semesters as $semester) {
                                    echo '<option value="'.$semester['SemesterID'].'">'.$semester['Semester'].'</option>';
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

            foreach ($classes as $class) {
                echo '
                    <div class="modal fade" id="edit'.$class['ClassID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Class</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?classFunction=true&updateID='.$class['ClassID'].'" method="post">
                                    <div class="form-group">
                                        <label for="class">Class</label>
                                        <input type="text" name="class" id="class" class="form-control" placeholder="Class" value="'.$class['Class'].'" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <select name="subject" class="form-control select2Subject'.$class['Class'].' select2-success" id="subject" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $subjects = $this->getSubject($dbc1);
                                            foreach ($subjects as $subject) {
                                                if($subject['SubjectID'] == $class['SubjectID']) {
                                                    echo '<option value="'.$subject['SubjectID'].'" selected>'.$subject['Subject'].'</option>';
                                                } else {
                                                    echo '<option value="'.$subject['SubjectID'].'">'.$subject['Subject'].'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="faculty">Faculty</label>
                                        <select name="faculty" class="form-control select2Faculty'.$class['Class'].' select2-success" id="faculty" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $ratees = $this->getRatee($dbc1);
                                            foreach ($ratees as $ratee) {
                                                if($ratee['RateeID'] == $class['RateeID']) {
                                                    echo '<option value="'.$ratee['RateeID'].'" selected>'.$ratee['FirstName'].' '.$ratee['Surname'].'</option>';
                                                }else {
                                                    echo '<option value="'.$ratee['RateeID'].'">'.$ratee['FirstName'].' '.$ratee['Surname'].'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="academicYear">Academic Year</label>
                                        <select name="academicYear" class="form-control select2AcademicYear'.$class['Class'].' select2-success" id="academicYear" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $academicYears = $this->getAcademicYear($dbc1, false);
                                            foreach ($academicYears as $academicYear) {
                                                if($academicYear['AcademicYearID'] == $class['AcademicYearID']) {
                                                    echo '<option value="'.$academicYear['AcademicYearID'].'" selected>'.$academicYear['AcademicYear'].'</option>';
                                                }else {
                                                    echo '<option value="'.$academicYear['AcademicYearID'].'">'.$academicYear['AcademicYear'].'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select name="semester" class="form-control select2Semester'.$class['Class'].' select2-success" id="semester" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $semesters = $this->getSemester($dbc1, false);
                                            foreach ($semesters as $semester) {
                                                if($semester['SemesterID'] == $class['SemesterID']) {
                                                    echo '<option value="'.$semester['SemesterID'].'" selected>'.$semester['Semester'].'</option>';
                                                }else {
                                                    echo '<option value="'.$semester['SemesterID'].'">'.$semester['Semester'].'</option>';
                                                }
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
      
                    <div class="modal fade" id="delete'.$class['ClassID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Class</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this class?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?classFunction=true&deleteID='.$class['ClassID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new ClassModal();

    $rm->displayClass($dbc1);
    


?>