<?php
    class RaterModal extends QueryRepo{
        function displayRater($dbc1){
            $raters = $this->getRater($dbc1);
            echo '
            <div class="modal fade" id="rater">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Rater</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?raterFunction=true" method="post">
                        <div class="form-group">
                            <label for="idNumber">ID Number</label>
                            <input type="text" name="idNumber" id="idNumber" class="form-control" placeholder="ID Number" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="middleName">Middle Name</label>
                            <input type="text" name="middleName" id="middleName" class="form-control" placeholder="Middle Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="surname">Last Name</label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="Last Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="raterType">Rater Type</label>
                            <select name="raterType" class="form-control select2RaterType select2-success" id="raterType" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                $raterTypes = $this->getRaterType($dbc1);
                                foreach ($raterTypes as $raterType) {
                                    echo '<option value="'.$raterType['RaterTypeID'].'">'.$raterType['RaterType'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
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

            foreach ($raters as $rater) {
                echo '
                    <div class="modal fade" id="edit'.$rater['RaterID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Rater</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?raterFunction=true&updateID='.$rater['RaterID'].'" method="post">
                                    <div class="form-group">
                                        <label for="idNumber">ID Number</label>
                                        <input type="text" name="idNumber" value="'.$rater['RaterIDNumber'].'" id="idNumber" class="form-control" placeholder="ID Number" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" value="'.$rater['FirstName'].'" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" name="middleName" value="'.$rater['MiddleName'].'" id="middleName" class="form-control" placeholder="Middle Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Last Name</label>
                                        <input type="text" name="surname" value="'.$rater['Surname'].'" id="surname" class="form-control" placeholder="Surname" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="raterType'.$rater['RaterID'].'">Rater Type</label>
                                        <select name="raterType" class="form-control select2RaterType'.$rater['RaterID'].' select2-success" id="raterType'.$rater['RaterID'].'" data-dropdown-css-class="select2-success" style="width: 100%;">';
                                            $raterTypes = $this->getRaterType($dbc1);
                                            foreach ($raterTypes as $raterType) {
                                                if($raterType['RaterType'] == $rater['RaterType']) {
                                                    echo '<option value="'.$raterType['RaterTypeID'].'" selected>'.$raterType['RaterType'].'</option>';
                                                }else {
                                                    echo '<option value="'.$raterType['RaterTypeID'].'">'.$raterType['RaterType'].'</option>';
                                                }
                                            }
                                        echo '</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="'.$rater['Password'].'" id="password" class="form-control" placeholder="Password" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$rater['RaterID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Position</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this position?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?raterFunction=true&deleteID='.$rater['RaterID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new RaterModal();

    $rm->displayRater($dbc1);
    


?>