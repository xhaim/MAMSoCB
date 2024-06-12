<div id="Awards">
      {{-- 1st --}}
    <div id="AwCi">
      <h5>Award Details</h5>
      
      <div class="form-group">
        <label for="award" class="col-sm-8 control-label">Name of Award/Citation</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="award" name="award" placeholder="Enter Name of Award/Citation" maxlength="255" >
        </div>
      </div>
      
      <div class="form-group">
        <label for="awarding_body" class="col-sm-8 control-label">Awarding Body</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="awarding_body" name="awarding_body" placeholder="Enter Awarding Body" maxlength="255" >
        </div>
      </div>
      
      <div class="form-group">
        <label for="date_received" class="col-sm-8 control-label">Date Received</label>
        <div class="col-sm-12">
          <input type="date" class="form-control" id="date_received" name="date_received" placeholder="Enter Date Received" maxlength="100" >
        </div>
      </div>
    </div>
    <hr>
</div>

<button class="btn btn-primary mt-3" type="button" id="addAwardBtn" onclick="addAwCi()">Add Award/Citation</button>
