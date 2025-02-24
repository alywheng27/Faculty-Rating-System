<?php
    class AdminModal extends QueryRepo{
        function displayAdmin($dbc1){
            $admins = $this->getAdmin($dbc1);
            echo '
            <div class="modal fade" id="admin">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?adminFunction=true" method="post">
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
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="off">
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

            foreach ($admins as $admin) {
                echo '
                    <div class="modal fade" id="edit'.$admin['UserID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Admin</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" id="positionQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?adminFunction=true&updateID='.$admin['UserID'].'" method="post">
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" name="firstName" value="'.$admin['FirstName'].'" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName">Middle Name</label>
                                        <input type="text" name="middleName" value="'.$admin['MiddleName'].'" id="middleName" class="form-control" placeholder="Middle Name" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="surname">Last Name</label>
                                        <input type="text" name="surname" value="'.$admin['Surname'].'" id="surname" class="form-control" placeholder="Surname" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" value="'.$admin['Username'].'" id="username" class="form-control" placeholder="Username" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="'.$admin['Password'].'" id="password" class="form-control" placeholder="Password" autocomplete="off">
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
      
                    <div class="modal fade" id="delete'.$admin['UserID'].'">
                        <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Delete Admin</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">Are you sure you want to delete this admin?</div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <a href="?adminFunction=true&deleteID='.$admin['UserID'].'" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>
                ';
            }
            
            
        }
    }

    $rm = new AdminModal();

    $rm->displayAdmin($dbc1);
    


?>