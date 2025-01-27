<?php
    class AcademicYearModal extends QueryRepo{
        function displayAcademicYear($dbc1){
            $academicYears = $this->getAcademicYear($dbc1, false);
            echo '
            <div class="modal fade" id="academicYear">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">AcademicYear</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?AYSemesterFunction=true&type=academicYear" method="post">
                        <div class="form-group">
                            <label for="year">Academic Year</label>
                            <input type="text" name="year" id="year" class="form-control" placeholder="Academic Year" autocomplete="off">
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

            foreach ($academicYears as $academicYear) {
                echo '
                    <div class="modal fade" id="edit'.$academicYear['AcademicYearID'].'AcademicYear">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update AcademicYear</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?AYSemesterFunction=true&type=academicYear&updateID='.$academicYear['AcademicYearID'].'" method="post">
                                    <div class="form-group">
                                        <label for="year">Academic Year</label>
                                        <input type="text" name="year" value="'.$academicYear['AcademicYear'].'" id="year" class="form-control" placeholder="Academic Year" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$academicYear['AcademicYearID'].'AcademicYear">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete AcademicYear</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this Academic Year?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?AYSemesterFunction=true&type=academicYear&deleteID='.$academicYear['AcademicYearID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new AcademicYearModal();

    $rm->displayAcademicYear($dbc1);
    


?>