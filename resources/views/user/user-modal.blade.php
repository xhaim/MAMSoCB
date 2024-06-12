<div class="modal fade" id="users-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <<div class="modal-content" style="width: 500px;left:190px">
        <div class="modal-header" style="height: 80px;">
          <h4 class="modal-title" id="UsersModal"></h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="UsersForm" name="UsersForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="name" class="col-sm-8 control-label">Name</label>
              <div class="col-sm-12">
                <input type="text" class= "form-control" id="name" name="name" placeholder="Enter Name" maxlength="20" >
              </div>
            </div>

            <div class="form-group">
              <label for="email" class="col-sm-8 control-label">Email</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" maxlength="100" >
              </div>
            </div>
          

            <div class="form-group">
              <label class="col-sm-8 control-label">Role</label>
              <div class="col-sm-12">
                <select class="form-select" aria-label="select role" id="role" name="role" >
                    <option value="admin">Admin</option>
                  <option value="superad">Super Admin</option>
                </select>
              </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
                <button type="button" class="btn btn-warning" id="btn-change-user-pass" onclick="toggleInputVisibility()">Change User Password?</button>
            </div>

            <div class="form-group" id="passwd" >
                <label for="text" class="col-sm-8 control-label">Password:</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="password" name="password" placeholder="Enter New Password" maxlength="100" >
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
              <button type="submit" class="btn btn-success" id="btn-save">Save</button>
            </div>
          </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>