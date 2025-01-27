<?php
    class SubjectModal extends QueryRepo{
        function displaySubject($dbc1){
            $subjects = $this->getSubject($dbc1);
            echo '
            <div class="modal fade" id="subject">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Subject</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?subjectFunction=true" method="post">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Description" autocomplete="off">
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

            foreach ($subjects as $subject) {
                echo '
                    <div class="modal fade" id="edit'.$subject['SubjectID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Subject</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?subjectFunction=true&updateID='.$subject['SubjectID'].'" method="post">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" name="subject" value="'.$subject['Subject'].'" id="subject" class="form-control" placeholder="Subject" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" name="description" value="'.$subject['SubjectDescription'].'" id="description" class="form-control" placeholder="Description" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$subject['SubjectID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Subject</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this subject?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?subjectFunction=true&deleteID='.$subject['SubjectID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new SubjectModal();

    $rm->displaySubject($dbc1);
    


?>