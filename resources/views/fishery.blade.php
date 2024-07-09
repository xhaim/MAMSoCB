<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fishery</title>
     
    <meta name="csrf-token" content="{{ csrf_token() }}">
     
    <link rel="stylesheet" href="{{asset('dash-assets/css/bootstrap.min.css')}}" >

    <script src="{{asset('dash-assets/js/jquery.js')}}"></script>

    <script src="{{asset('dash-assets/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('dash-assets/css/jquery.css')}}">

    <script src="{{asset('dash-assets/js/datatables.min.js')}}"></script>
    
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

</head>
<body>
  @include('admin.home-top')
  <div class="row" id="row">
   <div class="col offset-xxl-0 text-start" id="left-nav">
  @include('admin.home-left')
   </div>
<div class="col" id="main-container">
<div class="container mt-2">
 
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Fishery</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)"> Add </a>
               <a class="btn btn-info" id="toggleDatatables" style=" color: white;"   onclick="toggleDatatables()">
                  Archive
            </a>
            </div>
        </div>
    </div>
    


 
    <div class="card-body">

      {{-- show modal --}}
    <div class="card-body" >
      <div class="modal fade" id="viewModal"  tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content" style="width: 1000px; left: -90px">
                  <div class="modal-header">
                      <h5 class="modal-title" id="viewModalLabel">View Record Details</h5>
                      <button onClick="closeviewModal();" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" >
                      <!-- Placeholders for displaying record details -->
                      <div>
                        <button class="btn-primary" id="printButton" onClick="printDiv('printable_div_id');">Print Document</button>
                        <div id="printable_div_id">
                      @include('fishery-printable')
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{-- end of show modal --}}
 
      <div id="MainTable" >
            <table class="table table-bordered display responsive nowrap " id="fishery-crud-datatable">
            <thead>
                <tr>
                    
                    <th>Registration No.</th>
                    <th>Registration Date</th>
                    <th>Registration Type</th>
                    <th>Salutation</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Appellation</th>
                    <th>Barangay</th>
                    <th>Contact No</th>
                    <th>Resident of the Municipality Since</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Place of Birth</th>
                    <th>Gender </th>
                    <th>Civil Status</th>
                    <th>No. of Children</th>
                    <th>Nationality</th>
                    <th>Educational Background</th>
                    <th>Person to notify in case of emergency</th>
                    <th>Relationship</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>Religion</th>
                    <th>Main Source of Income</th>
                    <th>Other Source of Income</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            </table>
      </div>
      <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap " id="fishery-archive-datatable">
          <thead>
              <tr>
                  
                  <th>Registration No.</th>
                  <th>Registration Date</th>
                  <th>Registration Type</th>
                  <th>Salutation</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Appellation</th>
                  <th>Barangay</th>
                  <th>Contact No</th>
                  <th>Resident of the Municipality Since</th>
                  <th>Age</th>
                  <th>Date of Birth</th>
                  <th>Place of Birth</th>
                  <th>Gender </th>
                  <th>Civil Status</th>
                  <th>No. of Children</th>
                  <th>Nationality</th>
                  <th>Educational Background</th>
                  <th>Person to notify in case of emergency</th>
                  <th>Relationship</th>
                  <th>Contact No.</th>
                  <th>Address</th>
                  <th>Religion</th>
                  <th>Main Source of Income</th>
                  <th>Other Source of Income</th>
                  <th>Created at</th>
                  <th>Action</th>
              </tr>
          </thead>
          </table>
      </div>
    </div>
    
</div>
 
  <!-- Bootstrap fishery model -->
    <div class="modal fade" id="fishery-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 500px;left:190px">
          <div class="modal-header">
            <h4 class="modal-title" id="CompanyModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="CompanyForm" name="CompanyForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">
              
              <div class="form-group">
                <label for="registration_no" class="col-sm-8 control-label">Registration No.</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Enter Registration No." maxlength="50">
                    <div id="registration-no-validation-message" class="text-danger"></div>
                </div>
            </div>
            
 
              <div class="form-group">
                <label for="registration_date" class="col-sm-8 control-label">Registration Date</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="registration_date" name="registration_date" placeholder="Enter Registration Date" maxlength="50"  >
                </div>
              </div>
              <div class="form-group">
                <label for="registration_type" class="col-sm-8 control-label">Registry Type</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="registration_type" value="New registration" checked> New Registration
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="registration_type" value="Renewal"> Renewal
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="salutation" class="col-sm-8 control-label">Salutation</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="salutation" value="Mr" checked> Mr
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="salutation" value="Ms"> Ms
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="salutation" value="Mrs"> Mrs
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="last_name" class="col-sm-8 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name"   >
                </div>
              </div>
              <div class="form-group">
                <label for="first_name" class="col-sm-8 control-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name"   >
                </div>
              </div>
              <div class="form-group">
                <label for="middle_name" class="col-sm-8 control-label">Middle Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter Middle Name">
                </div>
              </div>
              <div class="form-group">
                <label for="appellation" class="col-sm-8 control-label">Appellation</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="appellation" name="appellation" placeholder="Enter Appellation">
                </div>
              </div>
              <div class="form-group">
                <label for="barangay" class="col-sm-8 control-label">Barangay</label>
                <div class="col-sm-10">
                    <select class="form-control" id="barangay" name="barangay">
                      <option >Enter Barangay</option>
                        <option value="Alegria">Alegria</option>
                        <option value="Bicao">Bicao</option>
                        <option value="Buenavista">Buenavista</option>
                        <option value="Buenos Aires">Buenos Aires</option>
                        <option value="Calatrava">Calatrava</option>
                        <option value="El Progreso">El Progreso</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Guadalupe">Guadalupe</option>
                        <option value="Katipunan">Katipunan</option>
                        <option value="La Libertad">La Libertad</option>
                        <option value="La Paz">La Paz</option>
                        <option value="La Salvacion">La Salvacion</option>
                        <option value="La Victoria">La Victoria</option>
                        <option value="Matin ao">Matin ao</option>
                        <option value="Montehermoso">Montehermoso</option>
                        <option value="Montesuerte">Montesuerte</option>
                        <option value="Montesunting">Montesunting</option>
                        <option value="Montevideo">Montevideo</option>
                        <option value="Nueva Fuerza">Nueva Fuerza</option>
                        <option value="Nueva Vida Este">Nueva Vida Este</option>
                        <option value="Nueva Vida Norte">Nueva Vida Norte</option>
                        <option value="Nueva Vida Sur">Nueva Vida Sur</option>
                        <option value="Poblacion Norte">Poblacion Norte</option>
                        <option value="Poblacion Sur">Poblacion Sur</option>
                        <option value="Tambo an">Tambo an</option>
                        <option value="Vallehermoso">Vallehermoso</option>
                        <option value="Villaflor">Villaflor</option>
                        <option value="Villafuerte">Villafuerte</option>
                        <option value="Villacayo">Villacayo</option>
                    </select>
                </div>
            </div>
              <div class="form-group">
                <label for="contact_no" class="col-sm-8 control-label">Contact No.</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="contact_no" name="contact_no" maxlength="11" placeholder="Enter Contact No.">
                </div>
              </div>
              <div class="form-group">
                <label for="contact_no" class="col-sm-8 control-label">Resident of the Municipality since</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="resident" name="resident" maxlength="11" placeholder="Enter Years of Residency">
                </div>
              </div>
              <div class="form-group">
                <label for="date_of_birth" class="col-sm-8 control-label">Date of  Birth</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Date of  Birth" oninput="calculateAge()">
                </div>
              </div>
              <div class="form-group" hidden>
                <label for="age" class="col-md-auto control-label" >Age</label>
                <div class="col-sm-12">
                  <input
                    type="number"
                    class="form-control"
                    id="age"
                    name="age"
                    placeholder="Enter Age"
                    maxlength="2"
                    readonly
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="place_of_birth" class="col-sm-8 control-label">Place of  Birth</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Enter Place of birth (municipality,province)">
                </div>
              </div>
              <div class="form-group">
                <label for="gender" class="col-sm-8 control-label">Gender</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="gender" value="Male" checked> Male
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="gender" value="Female"> Female
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label for="civil_status" class="col-sm-8 control-label">Civil Status</label>
                <div class="col-sm-10">
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="civil_status" value="Single" checked> Single
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="civil_status" value="Married"> Married
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="civil_status" value="Legally Separated"> Legally Separated
                        </label>
                    </div>
                    <div class="radio-inline">
                        <label>
                            <input type="radio" name="civil_status" value="Widowed"> Widowed
                        </label>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_of_children" class="col-sm-8 control-label">No. of Children</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="no_of_children" name="no_of_children" placeholder="Enter No. of Children">
                </div>
              </div>

              <div class="form-group">
                Nationality:
                <div class="col-sm-12">
                  <div class="form-group form-check">
                    <input type="radio" id="filipinoCheckbox" class="form-check-input" name="nationality" value="Filipino" onclick="handleCheckboxChange('Filipino')">
                    <label for="filipinoCheckbox" class="form-check-label">Filipino</label>
                  </div>

                  <div class="form-group form-check">
                    <input type="radio" id="othersCheckbox" class="form-check-input" name="nationality" value="Others" onclick="handleCheckboxChange('Others')">
                    <label for="othersCheckbox" class="form-check-label">Others</label>
                    <input type="text" id="otherInput" class="form-control" placeholder="Specify 'Others'" style="display: none;" oninput="setOthersCheckboxValue(this.value)">
                  </div>
                </div>
              </div>
              <div class="form-group">
                Educational Background:
                <div class="col-sm-12">
                  <div class="form-group form-check">
                    <input type="radio" id="elementaryRadio" class="form-check-input" name="education" value="Elementary" onclick="handleRadioChange('Elementary')">
                    <label for="elementaryRadio" class="form-check-label">Elementary</label>
                  </div>

                  <div class="form-group form-check">
                    <input type="radio" id="highSchoolRadio" class="form-check-input" name="education" value="High School" onclick="handleRadioChange('High School')">
                    <label for="highSchoolRadio" class="form-check-label">High School</label>
                  </div>

                  <div class="form-group form-check">
                    <input type="radio" id="vocationalRadio" class="form-check-input" name="education" value="Vocational" onclick="handleRadioChange('Vocational')">
                    <label for="vocationalRadio" class="form-check-label">Vocational</label>
                  </div>

                  <div class="form-group form-check">
                    <input type="radio" id="collegeRadio" class="form-check-input" name="education" value="College" onclick="handleRadioChange('College')">
                    <label for="collegeRadio" class="form-check-label">College</label>
                  </div>

                  <div class="form-group form-check">
                    <input type="radio" id="postGraduateRadio" class="form-check-input" name="education" value="Post-Graduate" onclick="handleRadioChange('Post-Graduate')">
                    <label for="postGraduateRadio" class="form-check-label">Post-Graduate</label>
                  </div>

                  <div class="form-group form-check">
                    <input type="radio" id="othersRadio" class="form-check-input" name="education" value="Others" onclick="handleRadioChange('Others')">
                    <label for="othersRadio" class="form-check-label">Others (please specify)</label>
                  </div>

                  <input type="text" id="othersInput" class="form-control" placeholder="Specify 'Others'" style="display: none;" oninput="setOthersRadioValue(this.value)">
                </div>
              </div>
              <div class="form-group">
                <label for="person_to_notify" class="col-sm-8 control-label">Person to notify in case of emergency</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="person_to_notify" name="person_to_notify" placeholder="Enter Person to notify in case of emergency">
                </div>
              </div>
              <div class="form-group">
                <label for="relationship" class="col-sm-8 control-label">Relationship</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="relationship" name="relationship" placeholder="Enter relationship">
                </div>
              </div>
              <div class="form-group">
                <label for="contact" class="col-sm-8 control-label">Contact No. </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact No.">
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-8 control-label">Address(barangay,municipality,province) </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                </div>
              </div>
              <div class="form-group">
                <label for="religion" class="col-sm-8 control-label">Religion</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter Religion">
                </div>
              </div>
              <div class="form-group">
  <label class="col-sm-8 control-label">Main Source of Income:</label>
  <div class="col-sm-12">
    <div class="form-group form-check">
      <input type="radio"  class="income-source-radio" name="incomeSource" value="Capture Fishing">
      <label class="form-check-label">Capture Fishing</label>
      <input type="text" class="form-control income-source-input" data-inputtype="CaptureFishing" placeholder="Specify gear used" style="display: none" >
    </div>

    <div class="form-group form-check">
      <input type="radio"  class="income-source-radio" name="incomeSource" value="Aquaculture">
      <label class="form-check-label">Aquaculture</label>
      <input type="text" class="form-control income-source-input" data-inputtype="Aquaculture" placeholder="Specify culture method used" style="display: none" >
    </div>

    <div class="form-group form-check">
      <input type="radio" class="income-source-radios" name="incomeSource" value="Fish Vending">
      <label class="form-check-label">Fish Vending</label>
    </div>

    <div class="form-group form-check">
      <input type="radio" class="income-source-radios" name="incomeSource" value="Gleaning">
      <label class="form-check-label">Gleaning</label>
    </div>

    <div class="form-group form-check">
      <input type="radio" class="income-source-radios" name="incomeSource" value="Fish Processing">
      <label class="form-check-label">Fish Processing</label>
    </div>

    <div class="form-group form-check">
      <input type="radio" class="income-source-radio" name="incomeSource" value="OthersIncome">
      <label class="form-check-label">Others</label>
      <input type="text" class="form-control income-source-input" data-inputtype="OthersIncome" placeholder="Specify your source of income" style="display: none">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-8 control-label">Other Source of Income:</label>
  <div class="col-sm-12">
    <div class="form-group form-check">
      <input type="checkbox" id="captureFishingCheckbox" class="form-check-input" name="OtherincomeSource" value="CaptureFishing" onclick="handleIncomeSourceChange()">
      <label for="captureFishingCheckbox" class="form-check-label">Capture Fishing</label>
      <input type="text" id="captureFishingGear" class="form-control" placeholder="Specify gear used" style="display: none">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" id="aquacultureCheckbox" class="form-check-input" name="OtherincomeSource" value="Aquaculture" onclick="handleIncomeSourceChange()">
      <label for="aquacultureCheckbox" class="form-check-label">Aquaculture</label>
      <input type="text" id="aquacultureMethod" class="form-control" placeholder="Specify culture method used" style="display: none">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" id="fishVendingCheckbox" class="form-check-input" name="OtherincomeSource" value="FishVending">
      <label for="fishVendingCheckbox" class="form-check-label">Fish Vending</label>
    </div>

    <div class="form-group form-check">
      <input type="checkbox" id="gleaningCheckbox" class="form-check-input" name="OtherincomeSource" value="Gleaning">
      <label for="gleaningCheckbox" class="form-check-label">Gleaning</label>
    </div>

    <div class="form-group form-check">
      <input type="checkbox" id="fishProcessingCheckbox" class="form-check-input" name="OtherincomeSource" value="FishProcessing">
      <label for="fishProcessingCheckbox" class="form-check-label">Fish Processing</label>
    </div>

    <div class="form-group form-check">
      <input type="checkbox" id="othersIncomeCheckbox" class="form-check-input" name="OtherincomeSource" value="OthersIncome" onclick="handleIncomeSourceChange()">
      <label for="othersIncomeCheckbox" class="form-check-label">Others</label>
      <input type="text" id="othersIncomeInput" class="form-control" placeholder="Specify your source of income" style="display: none">
    </div>
  </div>
</div>
<div id="MemAfDetails">
  {{-- 1st --}}
  <div class="MemAf">
      <div class="form-group">
        <label for="membership" class="col-sm-8 control-label">Name of Organizations/Clubs/Cooperative/Associations</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="membership" name="membership" placeholder="Enter Name of Organizations/Clubs/Cooperative/Associations" maxlength="255" >
        </div>
      </div>
      
      <div class="form-group">
        <label for="member_since" class="col-sm-8 control-label">Member Since</label>
        <div class="col-sm-12">
          <input type="text"  placeholder="Enter year" min="1900" max="2100" class="form-control" id="member_since" name="member_since" >
        </div>
      </div>

      <div class="form-group">
        <label for="position" class="col-sm-8 control-label">Position</label>
        <div class="col-sm-12">
          <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position" maxlength="255" >
        </div>
      </div>
      
      <hr>
    </div>
  
</div>
<button class="btn btn-primary mt-3" type="button" id="AddMemAf" onclick="addMemAf()">Add Membership/Affiliations</button>
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success" id="btn-save">Save</button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
             
          </div>
        </div>
      </div>
    </div>
<!-- End bootstrap model -->
 
</body>
<script type="text/javascript">
      
 $(document).ready( function () {
 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $('#fishery-crud-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('fishery-crud-datatable') }}",
           columns: [
            { data: 'registration_no', name: 'registration_no' },
            { data: 'registration_date', name: 'registration_date' },
            { data: 'registration_type', name: 'registration_type' },
            { data: 'salutation', name: 'salutation' },
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'appellation', name: 'appellation' },
            { data: 'barangay', name: 'barangay' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'resident', name: 'resident' },
            { data: 'age', name: 'age' },
            { data: 'date_of_birth', name: 'date_of_birth' },
            { data: 'place_of_birth', name: 'place_of_birth' },
            { data: 'gender', name: 'gender' }, 
            { data: 'civil_status', name: 'civil_status' }, 
            { data: 'no_of_children', name: 'no_of_children' }, 
            { data: 'nationality', name: 'nationality' }, 
            { data: 'education', name: 'education' }, 
            { data: 'person_to_notify', name: 'person_to_notify' }, 
            { data: 'relationship', name: 'relationship' }, 
            { data: 'contact', name: 'contact' }, 
            { data: 'address', name: 'address' },
            { data: 'religion', name: 'religion' },  
            { data: 'incomeSource', name: 'incomeSource' },
            { data: 'OtherincomeSource', name: 'OtherincomeSource' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [[0, 'desc']]
    });
 
  });
    

  function add(){
 
       $('#CompanyForm').trigger("reset");
       $('#CompanyModal').html("Add ");
       $('#fishery-modal').modal('show');
       $('#id').val('');
 
  }   
  function editFunc(id){
     
    $.ajax({
        type:"POST",
        url: "{{ url('edit-fishery') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#CompanyModal').html("Edit ");
          $('#fishery-modal').modal('show');
          $('#id').val(res.id);
          $('#registration_no').val(res.registration_no);
          $('#registration_date').val(res.registration_date);
          $('#registration_type').val(res.registration_type);
          $('#salutation').val(res.salutation);
          $('#last_name').val(res.last_name);
          $('#first_name').val(res.first_name);
          $('#middle_name').val(res.middle_name);
          $('#appellation').val(res.appellation);
          $('#barangay').val(res.barangay);
          $('#contact_no').val(res.contact_no);
          $('#resident').val(res.resident);
          $('#age').val(res.age);
          $('#date_of_birth').val(res.date_of_birth);
          $('#place_of_birth').val(res.place_of_birth);
          $('input[name="gender"][value="' + res.gender + '"]').prop('checked', true);
          $('#civil_status').val(res.civil_status);     
          $('#no_of_children').val(res.no_of_children); 
          $('#nationality').val(res.nationality);
           // Handle the nationality field
           var nationality = res.nationality;
            if (nationality) {
                if (Array.isArray(nationality)) {
                    nationality = nationality.join(', ');
                }
                $('#nationality').val(nationality);
            }
            $('#education').val(res.education); 
            $('#person_to_notify').val(res.person_to_notify);
            $('#relationship').val(res.relationship);
            $('#contact').val(res.contact);
            $('#address').val(res.address);
            $('#religion').val(res.religion); 
            $('#incomeSource').val(res.incomeSource);
            $('#OtherincomeSource').val(res.OtherincomeSource);
            // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG // ORG //
            // ORGANIZATION
            $('#membership').val(res.membership);
            $('#member_since').val(res.member_since);
            $('#position').val(res.position);
           
          

            const OrgformContainer = document.getElementById('MemAfDetails');
            MemAfCount = 2;
            let lastValidMemAfCount = 2;
            // HH MEMBER 2-20
            for (let m = 2; m <= 5; m++) {

              
                // Check if the    data exists in the response for the current member
                if (res[`membership${m}`] && typeof res[`membership${m}`] === 'string' && res[`membership${m}`].trim() !== '') {
                    const newMemAfDetails = document.createElement('div');
                    newMemAfDetails.id = `MemAf${m}`;
                    
                    newMemAfDetails.innerHTML = `           
                        <h5>Organization</h5>

                            <div class="form-group">
                            <label for="membership" class="col-sm-8 control-label">Name of Organizations/Clubs/Cooperative/Associations</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="membership${m}" name="membership${m}" placeholder="Enter Name of Organizations/Clubs/Cooperative/Associations" maxlength="255" >
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="member_since" class="col-sm-8 control-label">Member Since</label>
                            <div class="col-sm-12">
                                <input type="text"  placeholder="Enter year" min="1900" max="2100" class="form-control" id="member_since${m}" name="member_since${m}" >
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="position" class="col-sm-8 control-label">Position</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="position${m}" name="position${m}" placeholder="Enter Position" maxlength="255" >
                            </div>
                            </div>
                            
                          

                            <button class="btn-danger" type="button" onclick="removeMemAf(${m})">Remove Membership & Affiliation</button>
                    
                    
                    <!-- Add other form fields here -->
                      `;
                
                      OrgformContainer.appendChild(newMemAfDetails);
                $(`#membership${m}`).val(res[`membership${m}`]);
                $(`#member_since${m}`).val(res[`member_since${m}`]);
                $(`#position${m}`).val(res[`position${m}`]);
                
                
                lastValidMemAfCount = m + 1; // Update lastValidMemAfCount
                }
                MemAfCount = lastValidMemAfCount;
                console.log('Value of m:', m);
                console.log('Value of MemAfCount:', MemAfCount);
                console.log('Value of LVMA:', lastValidMemAfCount);
            }
        }
    });
}
 
  //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

  $('#fishery-archive-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('fishery-archive-datatable') }}",
              columns: [ 
            { data: 'registration_no', name: 'registration_no' },
            { data: 'registration_date', name: 'registration_date' },
            { data: 'registration_type', name: 'registration_type' },
            { data: 'salutation', name: 'salutation' },
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'appellation', name: 'appellation' },
            { data: 'barangay', name: 'barangay' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'resident', name: 'resident' },
            { data: 'age', name: 'age' },
            { data: 'date_of_birth', name: 'date_of_birth' },
            { data: 'place_of_birth', name: 'place_of_birth' },
            { data: 'gender', name: 'gender' }, 
            { data: 'civil_status', name: 'civil_status' }, 
            { data: 'no_of_children', name: 'no_of_children' }, 
            { data: 'nationality', name: 'nationality' }, 
            { data: 'education', name: 'education' }, 
            { data: 'person_to_notify', name: 'person_to_notify' }, 
            { data: 'relationship', name: 'relationship' }, 
            { data: 'contact', name: 'contact' }, 
            { data: 'address', name: 'address' },
            { data: 'religion', name: 'religion' },  
            { data: 'incomeSource', name: 'incomeSource' },
            { data: 'OtherincomeSource', name: 'OtherincomeSource' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false },
                      ],
                      order: [[0, 'desc']]
          });

        function archiveFunc(id) {
            if (confirm("Archive Record?") == true) {
                // Make an AJAX request to the archive route
                $.ajax({
                    type: "POST",
                    url: "{{ url('fishery/archive') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#fishery-archive-datatable').DataTable();
                        var oTable = $('#fishery-crud-datatable').DataTable();
                        ArcTable.ajax.reload(); // Reload the DataTable
                        oTable.ajax.reload(); // Reload the DataTable
                    },
                    error: function (error) {
                        // Handle error, e.g., show an error message
                        console.error('Error archiving record:', error);
                    }
                });
            }
        } 

        function restoreFunc(id) {
            if (confirm("Restore Record?") == true) {
                // Make an AJAX request to the archive route
                $.ajax({
                    type: "POST",
                    url: "{{ url('fishery/restore') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#fishery-archive-datatable').DataTable();
                        var oTable = $('#fishery-crud-datatable').DataTable();
                        ArcTable.ajax.reload(); // Reload the DataTable
                        oTable.ajax.reload(); // Reload the DataTable
                    },
                    error: function (error) {
                        // Handle error, e.g., show an error message
                        console.error('Error archiving record:', error);
                    }
                });
            }
        } 



        function deleteFunc(id) {
            if (confirm("Delete Record?") == true) {
                // Make an AJAX request to the archive route
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-fishery') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#fishery-archive-datatable').DataTable();
                        var oTable = $('#fishery-crud-datatable').DataTable();
                        ArcTable.ajax.reload(); // Reload the DataTable
                        oTable.ajax.reload(); // Reload the DataTable
                    },
                    error: function (error) {
                        // Handle error, e.g., show an error message
                        console.error('Error archiving record:', error);
                    }
                });
            }
        } 

      //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //

      function viewFunc(id) {
       $.ajax({
           type: "GET",
           url: "{{ url('get-fishery-details') }}/" + id,
           success: function (data) {
               // Populate the modal with record details
                $("#view_registration_no").text(data.registration_no);
                $("#view_registration_date").text(data.registration_date);
                $("#view_registration_type").text(data.registration_type);
                if (data.registration_type === "Renewal") {
                    $("#renewal").removeAttr("hidden");
                    $("#renewal_cont").css('background-color','black');
                } else if (data.registration_type === "New registration") {
                    $("#new_registration").removeAttr("hidden");
                    $("#newregis_cont").css('background-color','black');
                }

                $("#view_salutation").text(data.salutation);
                if (data.salutation === "Mr") {
                    $("#mister").removeAttr("hidden");
                    $("#mister_cont").css('background-color','black');
                } else if (data.salutation === "Ms") {
                    $("#miss").removeAttr("hidden");
                    $("#miss_cont").css('background-color','black');
                }
                else if (data.salutation === "Mrs") {
                    $("#missis").removeAttr("hidden");
                    $("#missis_cont").css('background-color','black');
                }
                $("#view_last_name").text(data.last_name);
                $("#view_first_name").text(data.first_name);
                $("#view_middle_name").text(data.middle_name);
                $("#view_appellation").text(data.appellation);
                $("#view_barangay").text(data.barangay);
                $("#view_contact_no").text(data.contact_no);
                $("#view_contact_no").css("font-size", "20px");

                $("#view_resident").text(data.resident);
                $("#view_age").text(data.age);
                $("#view_date_of_birth").text(data.date_of_birth);
                $("#view_place_of_birth").text(data.place_of_birth);
                $("#view_gender").text(data.gender); 
                $("#view_civil_status").text(data.civil_status); 
                $("#view_no_of_children").text(data.no_of_children); 
                $("#view_nationality").text(data.nationality); 
                $("#view_education").text(data.education); 
                $("#view_person_to_notify").text(data.person_to_notify); 
                $("#view_ptn_relationship").text(data.relationship); 
                $("#view_ptn_contact").text(data.contact); 
                $("#view_ptn_address").text(data.address);
                $("#view_religion").text(data.religion);  
                $("#view_incomeSource").text(data.incomeSource);
                $("#view_OtherincomeSource").text(data.OtherincomeSource);
                $("#view_membership").text(data.membership);
                $("#view_membership_since").text(data.member_since);
                $("#view_position").text(data.position);

                $("#view_applicant_name").text(data.first_name+" "+data.last_name);
   
               // Show the modal
               $("#viewModal").modal("show");
           },
           error: function (data) {
               console.log("Error:", data);
           },
       });
   }
  $('#CompanyForm').submit(function(e) {
 
     e.preventDefault();
   
     var formData = new FormData(this);
   
     $.ajax({
        type:'POST',
        url: "{{ url('store-fishery')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#fishery-modal").modal('hide');
          var oTable = $('#fishery-crud-datatable').dataTable();
          oTable.fnDraw(false);
          $("#btn-save").html('Submit');
          $("#btn-save").attr("disabled", false);
        },
        error: function(data){
           console.log(data);
         }
       });
   });
 
</script>
<script>
  function handleCheckboxChange(checkbox) {
    const checkboxes = ['Filipino', 'Others'];

    checkboxes.forEach(option => {
      if (option !== checkbox) {
        document.getElementById(`${option.toLowerCase()}Checkbox`).checked = false;
      }
    });

    if (checkbox === 'Others') {
      document.getElementById('otherInput').style.display = 'inline-block';
    } else {
      document.getElementById('otherInput').style.display = 'none';
    }
  }

  function setOthersCheckboxValue(value) {
    const othersCheckbox = document.getElementById('othersCheckbox');
    othersCheckbox.value = value;
  }
  // educational background script others input
  function handleRadioChange(radio) {
    if (radio === 'Others') {
      document.getElementById('othersInput').style.display = 'inline-block';
    } else {
      document.getElementById('othersInput').style.display = 'none';
    }
  }

  function setOthersRadioValue(value) {
    document.getElementById('othersRadio').value = value;
  }
  const incomeSourceRadios = document.querySelectorAll('.income-source-radio');
  const incomeSourceInputs = document.querySelectorAll('.income-source-input');

  incomeSourceRadios.forEach((radio, index) => {
    radio.addEventListener('change', function () {
      incomeSourceInputs.forEach((input) => {
        input.style.display = 'none';
      });

      if (radio.checked) {
        incomeSourceInputs[index].style.display = 'block';
      }
    });
  });
  function handleIncomeSourceChange() {
    const captureFishingCheckbox = document.getElementById('captureFishingCheckbox');
    const aquacultureCheckbox = document.getElementById('aquacultureCheckbox');
    const othersIncomeCheckbox= document.getElementById('othersIncomeCheckbox');

    document.getElementById('othersIncomeInput').style.display = othersIncomeCheckbox.checked ? 'inline-block' : 'none';
    document.getElementById('captureFishingGear').style.display = captureFishingCheckbox.checked ? 'inline-block' : 'none';
    document.getElementById('aquacultureMethod').style.display = aquacultureCheckbox.checked ? 'inline-block' : 'none';
  }
// org////////////////
  const addMemAfBtn = document.getElementById('AddMemAf');
let MemAfCount = 2; // Initial member count

console.log('Value of MemAfCount:', MemAfCount);

function addMemAf() {
    const MemAfFormContainer = document.getElementById('MemAfDetails');
    const newMemAfDetails = document.createElement('div');
    newMemAfDetails.id = `MemAf${MemAfCount}`;
    newMemAfDetails.innerHTML = `
            <h5>Organization</h5>

            <div class="form-group">
            <label for="membership" class="col-sm-8 control-label">Name of Organizations/Clubs/Cooperative/Associations</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="membership${MemAfCount}" name="membership${MemAfCount}" placeholder="Enter Name of Organizations/Clubs/Cooperative/Associations" maxlength="255" >
            </div>
            </div>
            
            <div class="form-group">
            <label for="member_since" class="col-sm-8 control-label">Member Since</label>
            <div class="col-sm-12">
                <input type="text"  placeholder="Enter year" min="1900" max="2100" class="form-control" id="member_since${MemAfCount}" name="member_since${MemAfCount}" >
            </div>
            </div>

            <div class="form-group">
            <label for="position" class="col-sm-8 control-label">Position</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="position${MemAfCount}" name="position${MemAfCount}" placeholder="Enter Position" maxlength="255" >
            </div>
            </div>
            
            

            <button class="btn-danger" type="button" onclick="removeMemAf(${MemAfCount})">Remove Membership & Affiliation</button>
    
        </div>
        <hr>
        <!-- Add other form fields here -->
    `;
    

    MemAfFormContainer.appendChild(newMemAfDetails);
    MemAfCount++;

    if (MemAfCount === 6) {
        addMemAfBtn.style.display = 'none';
      }
}

function removeMemAf(memberId) {
    const MemAfToRemove = document.getElementById(`MemAf${memberId}`);

    const membership = document.getElementById(`membership${memberId}`);
    const member_since = document.getElementById(`member_since${memberId}`);
    const position = document.getElementById(`position${memberId}`);
    
    
    

    membership.value = '';
    member_since.value = '';
    position.value = '';
  
    

    if (MemAfToRemove) {
        MemAfToRemove.remove();
    }
}
</script>

<script>
  function toggleDatatables() {
    var div1 = document.getElementById('MainTable');
    var div2 = document.getElementById('Archive');
    var toggleButton = document.getElementById('toggleDatatables');

    // Toggle the 'hidden' attribute
    if (div1.hasAttribute('hidden')) {
      div1.removeAttribute('hidden');
      div2.setAttribute('hidden', 'hidden');
      toggleButton.innerHTML = '  Archive';
    } else {
      div1.setAttribute('hidden', 'hidden');
      div2.removeAttribute('hidden');
      toggleButton.innerHTML = '<i class="fas fa-eye-slash">Archive</i>';
    }
  }
</script>
<script>
  $(document).ready(function () {
      $('#registration_no').on('input', function () {
          var registrationNoValue = $(this).val();

          // Make an Ajax request to check if the Registration No. exists
          $.ajax({
              url: '{{ route("check.registration_no") }}', // Update with your actual route
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  registration_no: registrationNoValue
              },
              success: function (response) {
                  // Update the validation message based on the response
                  if (response.exists) {
                      $('#registration-no-validation-message').text('Registration No. already exists ');
                  } else {
                      $('#registration-no-validation-message').text('');
                  }
              },
              error: function (error) {
                  console.error('Error checking Registration No.:', error);
              }
          });
      });
  });
</script>
<script>
  function calculateAge() {
    var birthDate = document.getElementById("date_of_birth").value;
    var today = new Date();
    var birthDateObj = new Date(birthDate);
    var age = today.getFullYear() - birthDateObj.getFullYear();

    // Adjust age if birthday hasn't occurred yet this year
    if (
      today.getMonth() < birthDateObj.getMonth() ||
      (today.getMonth() === birthDateObj.getMonth() &&
        today.getDate() < birthDateObj.getDate())
    ) {
      age--;
    }

    // Set the calculated age to the age input field
    document.getElementById("age").value = age;
  }
</script>

</html>
