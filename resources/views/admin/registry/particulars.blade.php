<div class="form-group">
    <label for="purok" class="col-sm-8 control-label">Sitio/Purok</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="purok" name="purok" placeholder="Enter Sitio/Purok" maxlength="255" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="brngy" class="col-sm-8 control-label">Barangay</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="brngy" name="brngy" placeholder="Enter Barangay" maxlength="255" >
    </div>
  </div>
  <div class="form-group">
    <label for="geographic_coordinates" class="col-sm-8 control-label">Geographic Coordinates</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="geographic_coordinates" name="geographic_coordinates" placeholder="Enter Geographic Coordinates" maxlength="255" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="title_no" class="col-sm-8 control-label">Title No.</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="title_no" name="title_no" placeholder="Enter Title No." maxlength="255" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="tax_declarration_no" class="col-sm-8 control-label">Tax Declaration No</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="tax_declarration_no" name="tax_declarration_no" placeholder="Enter Tax Declaration No" maxlength="100" >
    </div>
  </div>
  
    {{-- TOGGLE CHECKBOX HERE --}}
    <div class="form-group">
      <label class="col-sm-8 control-label">Tenure type:</label>
      <div class="col-sm-12">
  
          <div class="form-group form-check">
              <input type="checkbox" id="ownedCheckbox" class="form-check-input" name="tenure" value="Owned" onclick="handleCheckboxChange(this.value)">
              <label for="ownedCheckbox" class="form-check-label">Owned</label>
          </div>
  
          <div class="form-group form-check">
              <input type="checkbox" id="rentCheckbox" class="form-check-input" name="tenure" value="Rent" onclick="handleCheckboxChange(this.value)">
              <label for="rentCheckbox" class="form-check-label">Rent</label>
              <input type="number" id="rentYears" class="form-control" placeholder="Number of years renting" style="display: none;" oninput="setRentCheckboxValue(this.value)">
          </div>
  
          <div class="form-group form-check">
              <input type="checkbox" id="tenantCheckbox" class="form-check-input" name="tenure" value="Tenant" onclick="handleCheckboxChange(this.value)">
              <label for="tenantCheckbox" class="form-check-label">Tenant</label>
          </div>
  
          <div class="form-group form-check">
              <input type="checkbox" id="othersCheckbox" class="form-check-input" name="tenure" value="Others" onclick="handleCheckboxChange(this.value)">
              <label for="othersCheckbox" class="form-check-label">Others</label>
              <input type="text" id="otherInput" class="form-control" placeholder="Specify 'Others'" style="display: none;" oninput="setOthersCheckboxValue(this.value)">
          </div>
  
      </div>
    </div>


  <div class="form-group">
    <label for="existing_crop" class="col-sm-8 control-label" >Existing Crop</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="existing_crop" name="existing_crop" placeholder="Enter Existing Crop" maxlength="100" >
    </div>
  </div>

  <div class="form-group">
    <label for="previous_crop" class="col-sm-8 control-label" >Previous Crop/s</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="previous_crop" name="previous_crop" placeholder="Enter Previous Crop/s" maxlength="100" >
    </div>
</div>

{{-- // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // --}}

<div class="form-group">
    <label for="hectares" class="col-sm-8 control-label">Area(Hectares)</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="hectares" name="hectares" placeholder="Enter Area(Hectares)" maxlength="100" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-8 control-label">Land type:</label>
    <div class="col-sm-12">
      <div class="form-group form-check">
        <input type="checkbox" id="flatCheckbox" class="form-check-input" name="land" value="Flat" onclick="handleLandTypeChange(this.value)">
        <label for="flatCheckbox" class="form-check-label">Flat</label>
      </div>

      <div class="form-group form-check">
          <input type="checkbox" id="gentlySlopingCheckbox" class="form-check-input" name="land" value="Gently Sloping" onclick="handleLandTypeChange(this.value)">
          <label for="gentlySlopingCheckbox" class="form-check-label">Gently Sloping</label>
      </div>

      <div class="form-group form-check">
          <input type="checkbox" id="rollingUndulatingCheckbox" class="form-check-input" name="land" value="Rolling or Undulating" onclick="handleLandTypeChange(this.value)">
          <label for="rollingUndulatingCheckbox" class="form-check-label">Rolling/Undulating</label>
      </div>

      <div class="form-group form-check">
          <input type="checkbox" id="hillySteepSlopesCheckbox" class="form-check-input" name="land" value="Hilly or Steep Slopes" onclick="handleLandTypeChange(this.value)">
          <label for="hillySteepSlopesCheckbox" class="form-check-label">Hilly/Steep Slopes</label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <label for="soil" class="col-sm-8 control-label"> Soil Type</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="soil_type" name="soil_type" placeholder="Enter Soil Type" maxlength="255" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-8 control-label">Sources of Water:</label>
    <div class="col-sm-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="irrigated" name="source" value="Irrigated" onclick="handleWaterSourceChange(this.value)"> Irrigated
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="swip" name="source" value="SWIP or SIS" onclick="handleWaterSourceChange(this.value)"> SWIP/SIS
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="pump" name="source" value="Water Pump" onclick="handleWaterSourceChange(this.value)"> Water Pump
        </label>
      </div>
     
      <div class="checkbox">
        <label>
          <input type="checkbox" id="rainfed" name="source" value="Rainfed" onclick="handleWaterSourceChange(this.value)"> Rainfed
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="notes" class="col-sm-8 control-label">Remarks/Notes</label>
    <div class="col-sm-12">
      <textarea class="form-control" id="notes" name="notes" placeholder="Enter Remarks/Notes" rows="3"></textarea>
    </div>
  </div>