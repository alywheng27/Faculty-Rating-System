<div class="modal fade" id="logout">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ready to logout?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to logout?</div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <a href="index.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="user">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" id="userQuickForm" class="form-horizontal" enctype="multipart/form-data" action="?userFunction=true" method="post">
          <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="surname">Last Name</label>
            <input type="text" name="surname" id="surname" class="form-control" placeholder="Surname" autocomplete="off">
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
