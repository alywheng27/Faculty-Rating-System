<?php
    class SemesterModal extends QueryRepo{
        function displaySemester($dbc1){
            $semesters = $this->getSemester($dbc1, false);
            echo '
            <div class="modal fade" id="semester">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Semester</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?AYSemesterFunction=true&type=semester" method="post">
                        <div class="form-group">
                            <label for="sem">Semester</label>
                            <input type="text" name="sem" id="sem" class="form-control" placeholder="Semester" autocomplete="off">
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

            foreach ($semesters as $semester) {
                echo '
                    <div class="modal fade" id="edit'.$semester['SemesterID'].'Semester">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Semester</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?AYSemesterFunction=true&type=semester&updateID='.$semester['SemesterID'].'" method="post">
                                    <div class="form-group">
                                        <label for="sem">Semester</label>
                                        <input type="text" name="sem" value="'.$semester['Semester'].'" id="sem" class="form-control" placeholder="Semester" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$semester['SemesterID'].'Semester">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Semester</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this Semester?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?AYSemesterFunction=true&type=semester&deleteID='.$semester['SemesterID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new SemesterModal();

    $rm->displaySemester($dbc1);
    


?>