<div class="form-group">
  <label for="purok3" class="col-sm-8 control-label">Sitio/Purok</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="purok3" name="purok3" placeholder="Enter Sitio/Purok" maxlength="255" >
  </div>
</div>

<div class="form-group">
  <label for="brngy3" class="col-sm-8 control-label">Barangay</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="brngy3" name="brngy3" placeholder="Enter Barangay" maxlength="255" >
  </div>
</div>
<div class="form-group">
  <label for="geographic_coordinates3" class="col-sm-8 control-label">Geographic Coordinates</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="geographic_coordinates3" name="geographic_coordinates3" placeholder="Enter Geographic Coordinates" maxlength="255" >
  </div>
</div>

<div class="form-group">
  <label for="title_no3" class="col-sm-8 control-label">Title No.</label>
  <div class="col-sm-12">
    <input type="number" class="form-control" id="title_no3" name="title_no3" placeholder="Enter Title No." maxlength="255" >
  </div>
</div>

<div class="form-group">
  <label for="tax_declarration_no3" class="col-sm-8 control-label">Tax Declaration No</label>
  <div class="col-sm-12">
    <input type="number" class="form-control" id="tax_declarration_no3" name="tax_declarration_no3" placeholder="Enter Tax Declaration No" maxlength="100" >
  </div>
</div>

    {{-- TOGGLE CHECKBOX HERE --}}
    <div class="form-group">
    <label class="col-sm-8 control-label">Tenure type:</label>
      <div class="col-sm-12">

        <div class="form-group form-check">
            <input type="checkbox" id="ownedCheckbox3" class="form-check-input" name="tenure3" value="Owned" onclick="handleCheckboxChange3(this.value)">
            <label for="ownedCheckbox3" class="form-check-label">Owned</label>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="rentCheckbox3" class="form-check-input" name="tenure3" value="Rent" onclick="handleCheckboxChange3(this.value)">
            <label for="rentCheckbox3" class="form-check-label">Rent</label>
            <input type="number" id="rentYears3" class="form-control" placeholder="Number of years renting" style="display: none;" oninput="setRent2CheckboxValue(this.value)">
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="tenantCheckbox3" class="form-check-input" name="tenure3" value="Tenant" onclick="handleCheckboxChange3(this.value)">
            <label for="tenantCheckbox3" class="form-check-label">Tenant</label>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" id="othersCheckbox3" class="form-check-input" name="tenure3" value="Others" onclick="handleCheckboxChange3(this.value)">
            <label for="othersCheckbox3" class="form-check-label">Others</label>
            <input type="text" id="otherInput3" class="form-control" placeholder="Specify 'Others'" style="display: none;" oninput="setOthers3CheckboxValue(this.value)">
        </div>

      </div>
    </div>





<div class="form-group">
  <label for="existing_crop" class="col-sm-8 control-label" >Existing Crop</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="existing_crop3" name="existing_crop3" placeholder="Enter Existing Crop" maxlength="100" >
  </div>
</div>

<div class="form-group">
  <label for="previous_crop" class="col-sm-8 control-label" >Previous Crop/s</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="previous_crop3" name="previous_crop3" placeholder="Enter Previous Crop/s" maxlength="100" >
  </div>
</div>

{{-- // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // TOPOGRAPHY // --}}

<div class="form-group">
  <label for="hectares" class="col-sm-8 control-label">Area(Hectares)</label>
  <div class="col-sm-12">
    <input type="number" class="form-control" id="hectares3" name="hectares3" placeholder="Enter Area(Hectares)" maxlength="100" >
  </div>
</div>

<div class="form-group">
  <label class="col-sm-8 control-label">Land type:</label>
  <div class="col-sm-12">
      <div class="form-group form-check">
          <input type="checkbox" id="flatCheckbox3" class="form-check-input" name="land3" value="Flat" onclick="handleLandTypeChange3(this.value)">
          <label for="flatCheckbox3" class="form-check-label">Flat</label>
      </div>

      <div class="form-group form-check">
          <input type="checkbox" id="gentlySlopingCheckbox3" class="form-check-input" name="land3" value="Gently Sloping" onclick="handleLandTypeChange3(this.value)">
          <label for="gentlySlopingCheckbox3" class="form-check-label">Gently Sloping</label>
      </div>

      <div class="form-group form-check">
          <input type="checkbox" id="rollingUndulatingCheckbox3" class="form-check-input" name="land3" value="Rolling or Undulating" onclick="handleLandTypeChange3(this.value)">
          <label for="rollingUndulatingCheckbox3" class="form-check-label">Rolling/Undulating</label>
      </div>

      <div class="form-group form-check">
          <input type="checkbox" id="hillySteepSlopesCheckbox3" class="form-check-input" name="land3" value="Hilly or Steep Slopes" onclick="handleLandTypeChange3(this.value)">
          <label for="hillySteepSlopesCheckbox3" class="form-check-label">Hilly/Steep Slopes</label>
      </div>
  </div>
</div>

<div class="form-group">
  <label for="soil" class="col-sm-8 control-label"> Soil Type</label>
  <div class="col-sm-12">
    <input type="text" class="form-control" id="soil_type3" name="soil_type3" placeholder="Enter Soil Type" maxlength="255" >
  </div>
</div>
<div class="form-group">
  <label class="col-sm-8 control-label">Sources of Water:</label>
  <div class="col-sm-12">
    <div class="checkbox">
      <label>
        <input type="checkbox" id="irrigated3" name="source3" value="Irrigated" onclick="handleWaterSourceChange3(this.value)"> Irrigated
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" id="swip3" name="source3" value="SWIP or SIS" onclick="handleWaterSourceChange3(this.value)"> SWIP/SIS
      </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="checkbox" id="pump3" name="source3" value="Water Pump" onclick="handleWaterSourceChange3(this.value)"> Water Pump
      </label>
    </div>
   
    <div class="checkbox">
      <label>
        <input type="checkbox" id="rainfed3" name="source3" value="Rainfed" onclick="handleWaterSourceChange3(this.value)"> Rainfed
      </label>
    </div>
  </div>
</div>
<div class="form-group">
  <label for="notes3" class="col-sm-8 control-label">Remarks/Notes</label>
  <div class="col-sm-12">
    <textarea class="form-control" id="notes3" name="notes3" placeholder="Enter Remarks/Notes" rows="3"></textarea>
  </div>
</div>