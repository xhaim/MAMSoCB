<div class="form-group">
    <label for="purok2" class="col-sm-8 control-label">Sitio/Purok</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="purok2" name="purok2" placeholder="Enter Sitio/Purok" maxlength="255" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="brngy2" class="col-sm-8 control-label">Barangay</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="brngy2" name="brngy2" placeholder="Enter Barangay" maxlength="255" >
    </div>
  </div>
  <div class="form-group">
    <label for="geographic_coordinates2" class="col-sm-8 control-label">Geographic Coordinates</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="geographic_coordinates2" name="geographic_coordinates2" placeholder="Enter Geographic Coordinates" maxlength="255" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="title_no2" class="col-sm-8 control-label">Title No.</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="title_no2" name="title_no2" placeholder="Enter Title No." maxlength="255" >
    </div>
  </div>
  
  <div class="form-group">
    <label for="tax_declaration_no2" class="col-sm-8 control-label">Tax Declaration No</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="tax_declarration_no2" name="tax_declarration_no2" placeholder="Enter Tax Declaration No" maxlength="100" >
    </div>
  </div>
  
    {{-- TOGGLE CHECKBOX HERE --}}
    <div class="form-group">
      <label class="col-sm-8 control-label">Tenure type:</label>
      <div class="col-sm-12">
  
          <div class="form-group form-check">
              <input type="checkbox" id="ownedCheckbox2" class="form-check-input" name="tenure2" value="Owned" onclick="handleCheckboxChange2(this.value)">
              <label for="ownedCheckbox2" class="form-check-label">Owned</label>
          </div>
  
          <div class="form-group form-check">
              <input type="checkbox" id="rentCheckbox2" class="form-check-input" name="tenure2" value="Rent" onclick="handleCheckboxChange2(this.value)">
              <label for="rentCheckbox2" class="form-check-label">Rent</label>
              <input type="number" id="rentYears2" class="form-control" placeholder="Number of years renting" style="display: none;" oninput="setRent2CheckboxValue(this.value)">
          </div>
  
          <div class="form-group form-check">
              <input type="checkbox" id="tenantCheckbox2" class="form-check-input" name="tenure2" value="Tenant" onclick="handleCheckboxChange2(this.value)">
              <label for="tenantCheckbox2" class="form-check-label">Tenant</label>
          </div>
  
          <div class="form-group form-check">
              <input type="checkbox" id="othersCheckbox2" class="form-check-input" name="tenure2" value="Others" onclick="handleCheckboxChange2(this.value)">
              <label for="othersCheckbox2" class="form-check-label">Others</label>
              <input type="text" id="otherInput2" class="form-control" placeholder="Specify 'Others'" style="display: none;" oninput="setOthers2CheckboxValue(this.value)">
          </div>
  
      </div>
  </div>
  
  


  <div class="form-group">
    <label for="existing_crop" class="col-sm-8 control-label" >Existing Crop</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="existing_crop2" name="existing_crop2" placeholder="Enter Existing Crop" maxlength="100" >
    </div>
  </div>

  <div class="form-group">
    <label for="previous_crop" class="col-sm-8 control-label" >Previous Crop/s</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="previous_crop2" name="previous_crop2" placeholder="Enter Previous Crop/s" maxlength="100" >
    </div>
</div>

{{-- // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // --}}

<div class="form-group">
    <label for="hectares" class="col-sm-8 control-label">Area(Hectares)</label>
    <div class="col-sm-12">
      <input type="number" class="form-control" id="hectares2" name="hectares2" placeholder="Enter Area(Hectares)" maxlength="100" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-8 control-label">Land type:</label>
    <div class="col-sm-12">
        <div class="form-group form-check">
            <input type="checkbox" id="flatCheckbox2" class="form-check-input" name="land2" value="Flat" onclick="handleLandTypeChange2(this.value)">
            <label for="flatCheckbox2" class="form-check-label">Flat</label>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="gentlySlopingCheckbox2" class="form-check-input" name="land2" value="Gently Sloping" onclick="handleLandTypeChange2(this.value)">
            <label for="gentlySlopingCheckbox2" class="form-check-label">Gently Sloping</label>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="rollingUndulatingCheckbox2" class="form-check-input" name="land2" value="Rolling or Undulating" onclick="handleLandTypeChange2(this.value)">
            <label for="rollingUndulatingCheckbox2" class="form-check-label">Rolling/Undulating</label>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="hillySteepSlopesCheckbox2" class="form-check-input" name="land2" value="Hilly or Steep Slopes" onclick="handleLandTypeChange2(this.value)">
            <label for="hillySteepSlopesCheckbox2" class="form-check-label">Hilly/Steep Slopes</label>
        </div>
    </div>
</div>
  
  <div class="form-group">
    <label for="soil" class="col-sm-8 control-label"> Soil Type</label>
    <div class="col-sm-12">
      <input type="text" class="form-control" id="soil_type2" name="soil_type2" placeholder="Enter Soil Type" maxlength="255" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-8 control-label">Sources of Water:</label>
    <div class="col-sm-12">
      <div class="checkbox">
        <label>
          <input type="checkbox" id="irrigated2" name="source2" value="Irrigated" onclick="handleWaterSourceChange2(this.value)"> Irrigated
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="swip2" name="source2" value="SWIP or SIS" onclick="handleWaterSourceChange2(this.value)"> SWIP/SIS
        </label>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" id="pump2" name="source2" value="Water Pump" onclick="handleWaterSourceChange2(this.value)"> Water Pump
        </label>
      </div>
     
      <div class="checkbox">
        <label>
          <input type="checkbox" id="rainfed2" name="source2" value="Rainfed" onclick="handleWaterSourceChange2(this.value)"> Rainfed
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="notes2" class="col-sm-8 control-label">Remarks/Notes</label>
    <div class="col-sm-12">
      <textarea class="form-control" id="notes2" name="notes2" placeholder="Enter Remarks/Notes" rows="3"></textarea>
    </div>
  </div>