<div id="MemAfDetails">
  {{-- 1st --}}
  <div class="MemAf">
    <h5>Organization Details</h5>

      <div class="form-group">
        <label for="membership" class="col-sm-8 control-label">Name of Organizations/Clubs/Cooperative/Associations</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="membership" name="membership" placeholder="Enter Name of Organizations/Clubs/Cooperative/Associations" maxlength="255" >
        </div>
      </div>
      
      <div class="form-group">
        <label for="position" class="col-sm-8 control-label">Position</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position" maxlength="255" >
        </div>
      </div>
      
      <div class="form-group">
        <label for="member_since" class="col-sm-8 control-label">Member Since</label>
        <div class="col-sm-12">
          <input type="number"  placeholder="Enter year" min="1900" max="2100" class="form-control" id="member_since" name="member_since" >
        </div>
      </div>
      
      <div class="form-group">
        <label for="status" class="col-sm-8 control-label">Status</label>
        <div class="col-sm-12">
          <select class="form-control" id="status" name="status">
            <option value="ACTIVE">ACTIVE</option>
            <option value="INACTIVE">INACTIVE</option>
          </select>
        </div>
      </div>
      <hr>
    </div>
  
</div>
<button class="btn btn-primary mt-3" type="button" id="AddMemAf" onclick="addMemAf()">Add Membership/Affiliations</button>