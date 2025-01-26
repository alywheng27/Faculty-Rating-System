<?php
    class RateeModal extends QueryRepo{
        function displayRatee($dbc1){
            $ratees = $this->getRatee($dbc1);
            echo '
            <div class="modal fade" id="ratee">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ratee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?rateeFunction=true" method="post">
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

            foreach ($ratees as $ratee) {
                echo '
                    <div class="modal fade" id="edit'.$ratee['RateeID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Ratee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?rateeFunction=true&updateID='.$ratee['RateeID'].'" method="post">
                                    <div class="form-group">
                                        <label for="idNumber">ID Number</label>
                                        <input type="text" name="idNumber" value="'.$ratee['RateeIDNumber'].'" id="idNumber" class="form-control" placeholder="ID Number" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" value="'.$ratee['FirstName'].'" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" name="middleName" value="'.$ratee['MiddleName'].'" id="middleName" class="form-control" placeholder="Middle Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Last Name</label>
                                        <input type="text" name="surname" value="'.$ratee['Surname'].'" id="surname" class="form-control" placeholder="Surname" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="'.$ratee['Password'].'" id="password" class="form-control" placeholder="Password" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$ratee['RateeID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Ratee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this ratee?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?rateeFunction=true&deleteID='.$ratee['RateeID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new RateeModal();

    $rm->displayRatee($dbc1);
    


?>