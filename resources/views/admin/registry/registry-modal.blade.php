<div class="modal fade" id="registry-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <<div class="modal-content" style="width: 500px;left:190px">
        <div class="modal-header" >
          <h4 class="modal-title" id="RegistryModal"></h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="RegistryForm" name="RegistryForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            
            {{-- first part --}}
            <div id="first_part">
              
              <div class="form-group">
                <label for="rsbsa_id" class="col-sm-8 control-label">RSBSA ID</label>
                <div class="col-sm-12">
                    <input type="number" class="form-control" id="rsbsa_id" name="rsbsa_id" placeholder="Enter RSBSA ID" maxlength="100">
                    <div id="rsbsa-id-validation-message" class="text-danger"></div>
                </div>
            </div>
            

              <div class="form-group">
                <label for="generated_id" class="col-sm-8 control-label">Generated ID</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="generated_id" name="generated_id" placeholder="Enter Generated ID" maxlength="100" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="date" class="col-sm-8 control-label">Date & Time of Enrolment</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" id="date_enrolled" name="date_enrolled" placeholder="Enter Date Enrolled" maxlength="100" >
                </div>
              </div>

              {{-- HOUSE HOLD MEMBERS --  HOUSE HOLD MEMBERS --  HOUSE HOLD MEMBERS --  HOUSE HOLD MEMBERS --  HOUSE HOLD MEMBERS -- --}}
              @include('admin.registry.hhm')

              
            {{-- end of first modal part -- end of first modal part -- end of first modal part -- end of first modal part --}}
            </div>
            {{-- second part of form --}}
          
          <div id="second_modal_part" hidden="hidden">
              <div class="form-group">
                <label for="income_source" class="col-sm-8 control-label">Source of Income</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="income_source" name="income_source" placeholder="Enter Source of Income " maxlength="100" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="est_annual_income" class="col-sm-8 control-label">Estimated Annual Income (Php)</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="est_annual_income" name="est_annual_income" placeholder="Enter Estimated Annual Income (Php)" maxlength="100" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="address" class="col-sm-8 control-label">Home/Residence Address</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Home/Residence Address" maxlength="100" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="purok" class="col-sm-8 control-label">Sitio/Purok </label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="sitio_purok" name="sitio_purok" placeholder="Enter Home/Residence Address" maxlength="100" >
                </div>
              </div>

              <div class="form-group">
                <label for="barangay" class="col-sm-8 control-label">Barangay</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter Barangay" maxlength="100" >
                </div>
              </div>

              <div class="form-group">
                <label for="city" class="col-sm-8 control-label">City</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" maxlength="100"  value="Carmen">
                </div>
              </div>

              <div class="form-group">
                <label for="geo_coordinates" class="col-sm-8 control-label">Geo Coordinates</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="geo_coordinates" name="geo_coordinates" placeholder="Enter Geo Coordinates" maxlength="100" >
                </div>
              </div>

              <div class="form-group">
                <label for="years_of_residency" class="col-sm-8 control-label">Years of Residency</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="years_of_residency" name="years_of_residency" placeholder="Enter Years of Residency" maxlength="100" >
                </div>
              </div>
          </div>
            {{-- end of second part modal --}}

            {{-- third part of form --}}
          
          <div id="third_part" hidden="hidden">
            {{-- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A -- M&A --}}
            @include('admin.registry.memaf')

          </div>
          {{-- end of third modal part --}}

          {{-- third Awards part of form --}}
          
          <div id="third_awards_part" hidden="hidden">
            {{--  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --  A&C --}}
            @include('admin.registry.awards')

              <div class="form-group">
                <label for="remarks" class="col-sm-8 control-label">Remarks</label>
                <div class="col-sm-12">
                  <textarea class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" rows="3"  ></textarea>
                </div>
              </div>
          </div>
          {{-- end of third modal part --}}

          {{-- fourth part of form --}}
          
          <div id="fourth_part" hidden="hidden">

            @include('admin.registry.particulars')

          </div>
          {{-- end of fourth modal part --}}
          
          {{-- last  part of form --}}
          
          <div id="optional_part1" hidden="hidden">

            @include('admin.registry.particulars2')

          </div>

          <div id="optional_part2" hidden="hidden">

            @include('admin.registry.particulars3')
            

          </div>
          {{-- end of last modal part  --}}
            
          <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
            
            <button type="button" class="btn btn-primary" id="btn-back1" style="display: none">Back
            </button>
            <button type="button" class="btn btn-primary" id="btn-back2" style="display: none">Back
            </button>
            <button type="button" class="btn btn-primary" id="btn-awards-back2" style="display: none">Back
            </button>
            <button type="button" class="btn btn-primary" id="btn-back3" style="display: none">Back
            </button>
            <button type="button" class="btn btn-primary" id="btn-back4" style="display: none">Back
            </button>
            <button type="button" class="btn btn-primary" id="btn-back5" style="display: none">Back
            </button>
            

            
            
            <button type="button" class="btn btn-primary" id="btn-next">Next
            </button>
            <button type="button" class="btn btn-primary" id="btn-next1" style="display: none">Next
            </button>
            <button type="button" class="btn btn-primary" id="btn-next2" style="display: none">Next
            </button>
            <button type="button" class="btn btn-primary" id="btn-awards-next2" style="display: none">Next
            </button>
            <button type="button" class="btn btn-primary" id="btn-next3" style="display: none">Add Particular
            </button>
            <button type="button" class="btn btn-primary" id="btn-next4" style="display: none">Add Particular
            </button>


            <button type="submit" class="btn btn-success" id="btn-save" style="display: none">Save
            </button>
            
          

          </div>
            </form>

            <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
                
              </div>
        </div>
        <div class="modal-footer">
           
        </div>
      </div>
    </div>
  </div>