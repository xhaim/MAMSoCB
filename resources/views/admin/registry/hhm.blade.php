<!-- 1st HH Member details section -->
<div id="HHMEMBERS">
<div id="hhMemberDetails">
    <h5>HH Member Details</h5>
    <div class="form-group">
      <label for="hh_member" class="col-sm-8 control-label">HH Member</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="hh_member" name="hh_member" placeholder="Enter HH Member" maxlength="100" >
      </div>
    </div>

    <div class="form-group">
      <label for="surname" class="col-sm-8 control-label">Surname</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Surname" maxlength="100" >
      </div>
    </div>

    <div class="form-group">
      <label for="firstname" class="col-sm-8 control-label">First Name</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name" maxlength="100" >
    </div>
    </div>

    <div class="form-group">
      <label for="middlename" class="col-sm-8 control-label">Middle Name</label>
      <div class="col-sm-12">
        <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Middle Name" maxlength="100" >
    </div>
    </div>

    <div class="form-group">
      <label for="gender" class="col-sm-8 control-label">Gender</label>
      <div class="col-sm-12">
        <select class="form-control" id="gender" name="gender">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
    </div>
    
    <div class="form-group">
      <label for="age" class="col-sm-8 control-label">Age</label>
      <div class="col-sm-12">
        <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age" >
      </div>
    </div>

    <div class="form-group">
      <label for="birthdate" class="col-sm-8 control-label">Date of Birth (mm/dd/yyyy)</label>
      <div class="col-sm-12">
        <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter Date of Birth (mm/dd/yyyy)" >
      </div>
    </div>


    
  </div>


</div>
<button class="btn btn-primary mt-3" type="button" id="AddHHMember" onclick="addMember()">Add Member</button>


