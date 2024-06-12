<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmers' Assistance</title>
     
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

    <style>
      .clickable-container {
        border: 2px solid gold;
        background-color: #0b643a;
        color: white;
        padding: 5px;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
        display: flex;
      }
  
      .sample-name {
        cursor: pointer;
      }
  
      .triangle-icon {
        flex:1;
        transform: rotate(0deg);
        transition: transform 0.3s ease-in-out;
      }
  
      .hidden-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
        width: 100%; /* Set the width to 100% to match the container width */
        box-sizing: border-box; /* Include padding and border in the width */
        border: 2px solid #6f6e6e;
        padding: 5px;
      }
  
      .hidden-content.show {
        max-height: 1000px; /* Adjust to a value larger than the expected content height */
        transition: max-height 0.5s ease-in-out;
      }
    </style>
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
                <h2>Assistance</h2>
            </div>
              <div class="pull-right mb-2">
                  <a class="btn btn-warning" onClick="add()" href="javascript:void(0)"> Add</a>
                <a class="btn btn-info" id="toggleDatatables" style=" color: white;"   onclick="toggleDatatables()">
                    Archive
                </a>
                  <div class="pull-right mb-2" style="margin-top: 10px;">
                    @include('csv.importAssistance')
                </div>
              </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

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
                      @include('admin/assistance/assistance-printable')
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      {{-- end of show modal --}}

      <div id="MainTable">
        <table class="table table-bordered" id="assistance-crud-datatable" style="width: 100%">
           <thead>
              <tr>
                 <th>RSBSA Id</th>
                 <th>Name</th>
                 <th>Gender</th>
                 <th>Date of Birth</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>
      <div id="Archive" hidden="hidden">
        <table class="table table-bordered" id="assistance-archive-datatable" style="width: 100%">
          <thead>
             <tr>
                <th>RSBSA Id</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Created at</th>
                <th>Action</th>
             </tr>
          </thead>
       </table>
      </div>
    </div>
   
</div>

  <!-- boostrap assistance model -->
<div class="modal fade" id="assistance-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="width: 1000px;">
        <div class="modal-header">
          <h6 class="modal-title" id="AssistanceModal"></h6>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="AssistanceForm" name="AssistanceForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
      <div id="Part1">
                <!-- Assistance Name and Email side by side -->
                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="rsbsa">RSBSA ID.</label>
                      <input type="number" class="form-control" id="rsbsa" name="rsbsa" placeholder="Enter RSBSA ID">
                  </div>
                  
                  <!-- Application group with Date and Time -->
                  <div class="form-group col-md-8">
                      <label for="application">Application</label>

                      <div class="form-row">
                          <div class="form-group col-md-6">
                              <input type="date" class="form-control" id="date" name="date" placeholder="Enter Application Date">
                          </div>

                          <div class="form-group col-md-6">
                              <input type="text" class="form-control timepicker" id="timepicker" name="timepicker" placeholder="Select Time" >
                          </div>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name"> Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter  Name"    >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter Gender">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Date of Birth</label>
                      <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter birthdate" >
                  </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name"> Spouse</label>
                        <input type="text" class="form-control" id="spouse" name="spouse" placeholder="Enter Spouse Name" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Gender</label>
                        <input type="text" class="form-control" id="spouse_gender" name="spouse_gender" placeholder="Enter Spouse Gender">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Date of Birth</label>
                      <input type="date" class="form-control" id="spouse_birthdate" name="spouse_birthdate" placeholder="Enter birthdate" >
                    </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-4">
                      <label for="name">No. of Dependents/Children</label>
                      <input type="number" class="form-control" id="dependents" name="dependents" placeholder="Enter No. of Dependents/Children" >
                  </div>
                  <div class="form-group col-md-4">
                      <label>Estimated Income PHP</label>
                      <input type="number" class="form-control" id="income" name="income" placeholder="Enter Estimated Income">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="email">Home Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Home Address" >
                  </div>
                </div>
      </div>    
            <!-- Farm adress/location -->
      <div id="Part2" hidden="hidden">
                    <div class="form-row">
                          <div class="form-group col-md-4">
                            <label for="purok" class="col-sm-8 control-label">Sitio/Purok</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="purok" name="purok" placeholder="Enter Sitio/Purok" maxlength="255" >
                            </div>
                          </div>
                          
                          <div class="form-group col-md-4">
                            <label for="brngy" class="col-sm-8 control-label">Barangay</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="brngy" name="brngy" placeholder="Enter Barangay" maxlength="255" >
                            </div>
                          </div>
                          <div class="form-group col-md-4">
                            <label for="geographic_coordinates" class="col-sm-8 control-label">Geographic Coordinates</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="geographic_coordinates" name="geographic_coordinates" placeholder="Enter Geographic Coordinates" maxlength="255" >
                            </div>
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="title_no" class="col-sm-8 control-label">Title No.</label>
                          <div class="col-sm-12">
                            <input type="number" class="form-control" id="title_no" name="title_no" placeholder="Enter Title No." maxlength="255" >
                          </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                          <label for="tax_declarration_no" class="col-sm-8 control-label">Tax Declaration No</label>
                          <div class="col-sm-12">
                            <input type="number" class="form-control" id="tax_declarration_no" name="tax_declarration_no" placeholder="Enter Tax Declaration No" maxlength="100" >
                          </div>
                        </div>
                    </div>
                    <!-- farm address -->
                    <div class="form-group">
                      <div class="form-row">
                          <!-- Tenure type checkboxes -->
                          <div class="form-group col-md-4">
                              <label class="col-sm-8 control-label">Tenure type:</label>
                              <div class="col-sm-12">
                                  <div class="form-row">
                                      <div class="form-group col-md-3">
                                          <div class="form-check">
                                              <input type="checkbox" id="ownedCheckbox" class="form-check-input" name="tenure" value="Owned" onclick="handleCheckboxChange(this.value)">
                                              <label for="ownedCheckbox" class="form-check-label">Owned</label>
                                          </div>
                                      </div>
                  
                                      <div class="form-group col-md-3">
                                          <div class="form-check">
                                              <input type="checkbox" id="rentCheckbox" class="form-check-input" name="tenure" value="Rent" onclick="handleCheckboxChange(this.value)">
                                              <label for="rentCheckbox" class="form-check-label">Rent</label>
                                              <input type="number" id="rentYears" class="form-control" placeholder="Number of years renting" style="display: none; width:100px; position:sticky; top:100px; z-index:9px;" oninput="setRentCheckboxValue(this.value)">
                                          </div>
                                      </div>
                  
                                      <div class="form-group col-md-3">
                                          <div class="form-check">
                                              <input type="checkbox" id="tenantCheckbox" class="form-check-input" name="tenure" value="Tenant" onclick="handleCheckboxChange(this.value)">
                                              <label for="tenantCheckbox" class="form-check-label">Tenant</label>
                                          </div>
                                      </div>
                  
                                      <div class="form-group col-md-3">
                                          <div class="form-check">
                                              <input type="checkbox" id="othersCheckbox" class="form-check-input" name="tenure" value="Others" onclick="handleCheckboxChange(this.value)">
                                              <label for="othersCheckbox" class="form-check-label">Others</label>
                                              <input type="text" id="otherInput" class="form-control" placeholder="Specify 'Others'" style="display: none;  width:100px; position:sticky; top:100px; z-index:20px;" oninput="setOthersCheckboxValue(this.value)">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                  
                          <div class="form-group col-md-8">
                            <label for="existing_crop" class="col-sm-8 control-label" >Existing Crop</label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="existing_crop" name="existing_crop" placeholder="Enter Existing Crop" maxlength="100" >
                            </div>
                          </div>

                      </div>
                  </div>
                  <!-- topography -->
                
                <div class="form-row">
                    
                  <div class="form-group col-md-8">
                    <label class="col-sm-8 control-label">Topography:</label>
                    <div class="col-sm-12">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                  <div class="form-check">
                                      <input type="checkbox" id="flatCheckbox" class="form-check-input" name="land" value="Flat" onclick="handleLandTypeChange(this.value)">
                                      <label for="flatCheckbox" class="form-check-label">Flat</label>
                                  </div>
                              </div>
                  
                              <div class="form-group col-md-3">
                                  <div class="form-check">
                                      <input type="checkbox" id="gentlySlopingCheckbox" class="form-check-input" name="land" value="Gently Sloping" onclick="handleLandTypeChange(this.value)">
                                      <label for="gentlySlopingCheckbox" class="form-check-label">Gently Sloping</label>
                                  </div>
                              </div>
                  
                              <div class="form-group col-md-3">
                                  <div class="form-check">
                                      <input type="checkbox" id="rollingUndulatingCheckbox" class="form-check-input" name="land" value="Rolling or Undulating" onclick="handleLandTypeChange(this.value)">
                                      <label for="rollingUndulatingCheckbox" class="form-check-label">Rolling/Undulating</label>
                                  </div>
                              </div>
                  
                              <div class="form-group col-md-3">
                                  <div class="form-check">
                                      <input type="checkbox" id="hillySteepSlopesCheckbox" class="form-check-input" name="land" value="Hilly or Steep Slopes" onclick="handleLandTypeChange(this.value)">
                                      <label for="hillySteepSlopesCheckbox" class="form-check-label">Hilly/Steep Slopes</label>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="form-group col-md-4 ">
                    <label for="soil" class="col-sm-8 control-label"> Soil Type</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="soil_type" name="soil_type" placeholder="Enter Soil Type" maxlength="255" >
                    </div>
                  </div>
                </div>
                
                <div class="form-row">
                <div class="form-group">
                  <label class="col-sm-8 control-label">Sources of Water:</label>
                  <div class="col-sm-12">
                      <div class="form-row">
                          <div class="form-group col-md-3">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" id="irrigated" name="source" value="Irrigated" onclick="handleWaterSourceChange(this.value)"> Irrigated
                                  </label>
                              </div>
                          </div>
              
                          <div class="form-group col-md-3">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" id="swip" name="source" value="SWIP or SIS" onclick="handleWaterSourceChange(this.value)"> SWIP/SIS
                                  </label>
                              </div>
                          </div>
              
                          <div class="form-group col-md-3">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" id="pump" name="source" value="Water Pump" onclick="handleWaterSourceChange(this.value)"> Water Pump
                                  </label>
                              </div>
                          </div>
              
                          <div class="form-group col-md-3">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox" id="rainfed" name="source" value="Rainfed" onclick="handleWaterSourceChange(this.value)"> Rainfed
                                  </label>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="form-group col-md-6">
                <label for="previous_crop" class="col-sm-8 control-label" >Previous Crop/s</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="previous_crop" name="previous_crop" placeholder="Enter Previous Crop/s" maxlength="100" >
                </div>
            </div>
            </div>
    </div>     
<!-- AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR -->
    
     <div class="ar-container">
      <div id="Part3" hidden="hidden" style="margin-bottom: 10px;">
                <!-- 1st Content -->
                <div class="clickable-container" onclick="toggleContent('content1', 'triangleIcon1')">
                  <div class="sample-name"><h6>Intended Crop</h6></div>
                  <div class="triangle-icon" id="triangleIcon1">&#9654;</div>
                </div>

                <div class="hidden-content" id="content1">
                  <!-- Requestion Details -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="rsbsa">Specify</label>
                        <input type="text" class="form-control" id="intended_crop" name="intended_crop" placeholder="Intended Crop">
                    </div>
                    
                    <!-- Application group with Date and Time -->
                    <div class="form-group col-md-8">
                        <div class="form-row">
                          
                            <div class="form-group col-md-6">
                              <label for="application">Evaluation/Recommendation</label>
                                <input type="text" class="form-control" id="evaluation_intended_crop" name="evaluation_intended_crop" placeholder="Enter Evaluation/Recommendation">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                <input type="date" class="form-control" id="target_date_intended_crop" name="target_date_intended_crop" placeholder="Enter Target Date" >
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-4">
                          <label for="name"> Completion Date</label>
                          <input type="date" class="form-control" id="completion_date_intended_crop" name="completion_date_intended_crop" placeholder="Enter Completion Date"  >
                      </div>
                      <div class="form-group col-md-4">
                          <label for="email">Delivered/Served by</label>
                          <input type="text" class="form-control" id="servedby_intended_crop" name="servedby_intended_crop" placeholder="Enter Served by">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="email">Conform</label>
                        <input type="text" class="form-control" id="conform_intended_crop" name="conform_intended_crop" placeholder="Enter Conform" >
                    </div>
                  </div>

                </div>

                <!-- End of 1st Content -->

                <!-- 2nd Content -->
                <div class="clickable-container" onclick="toggleContent('content2', 'triangleIcon2')">
                  <div class="sample-name"><h6>Program Applied For</h6></div>
                  <div class="triangle-icon" id="triangleIcon2">&#9654;</div>
                </div>

                <div class="hidden-content" id="content2">
                  <!-- Requestion Details -->
                  <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="rsbsa">Specify</label>
                        <input type="text" class="form-control" id="program_applied" name="program_applied" placeholder="Specify">
                    </div>
                    
                    <!-- Application group with Date and Time -->
                    <div class="form-group col-md-8">
                      <div class="form-row">
                        
                          <div class="form-group col-md-6">
                            <label for="application">Evaluation/Recommendation</label>
                              <input type="text" class="form-control" id="evaluation_program_applied" name="evaluation_program_applied" placeholder="Enter Evaluation/Recommendation">
                          </div>
                          <div class="form-group col-md-6">
                          <label for="application">Target Date</label>
                              <input type="date" class="form-control" id="target_date_program_applied" name="target_date_program_applied" placeholder="Enter Target Date" >
                          </div>
                      </div>
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name"> Completion Date</label>
                        <input type="date" class="form-control" id="completion_date_program_applied" name="completion_date_program_applied" placeholder="Enter Completion Date"  >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Delivered/Served by</label>
                        <input type="text" class="form-control" id="servedby_program_applied" name="servedby_program_applied" placeholder="Enter Served by">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email">Conform</label>
                      <input type="text" class="form-control" id="conform_program_applied" name="conform_program_applied" placeholder="Enter Conform" >
                  </div>
                </div>

                </div>

                <!-- End of 2nd Content -->

                <!-- 3rd Content -->
                <div class="clickable-container" onclick="toggleContent('content3', 'triangleIcon3')">
                  <div class="sample-name"><h6>Area Applied For(Has.)</h6></div>
                  <div class="triangle-icon" id="triangleIcon3">&#9654;</div>
                </div>

                <div class="hidden-content" id="content3">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="area_applied" name="area_applied" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_area_applied" name="evaluation_area_applied" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_area_applied" name="target_date_area_applied" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_area_applied" name="completion_date_area_applied" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_area_applied" name="servedby_area_applied" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_area_applied" name="conform_area_applied" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 3rd Content -->
                <!-- 4th Content -->
                <div class="clickable-container" onclick="toggleContent('content4', 'triangleIcon4')">
                  <div class="sample-name"><h6>Pre-planting/Land Preparation</h6></div>
                  <div class="triangle-icon" id="triangleIcon4">&#9654;</div>
                </div>

                <div class="hidden-content" id="content4">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="land_preparation" name="land_preparation" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_land_preparation" name="evaluation_land_preparation" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_land_preparation" name="target_date_land_preparation" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_land_preparation" name="completion_date_land_preparation" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_land_preparation" name="servedby_land_preparation" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_land_preparation" name="conform_land_preparation" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 4th Content -->
                <!-- 5th Content -->
                <div class="clickable-container" onclick="toggleContent('content5', 'triangleIcon5')">
                  <div class="sample-name"><h6>Farm Planning/Lay-outing</h6></div>
                  <div class="triangle-icon" id="triangleIcon5">&#9654;</div>
                </div>

                <div class="hidden-content" id="content5">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="lay_outing" name="lay_outing" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_lay_outing" name="evaluation_lay_outing" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_lay_outing" name="target_date_lay_outing" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_lay_outing" name="completion_date_lay_outing" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_lay_outing" name="servedby_lay_outing" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_lay_outing" name="conform_lay_outing" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 5th Content -->
                <!-- 6th Content -->
                <div class="clickable-container" onclick="toggleContent('content6', 'triangleIcon6')">
                  <div class="sample-name"><h6>Farm Development</h6></div>
                  <div class="triangle-icon" id="triangleIcon6">&#9654;</div>
                </div>

                <div class="hidden-content" id="content6">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="farm_development" name="farm_development" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_farm_development" name="evaluation_farm_development" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_farm_development" name="target_date_farm_development" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_farm_development" name="completion_date_farm_development" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_farm_development" name="servedby_farm_development" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_farm_development" name="conform_farm_development" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 6th Content -->
                  <!-- 7th Content -->
                  <div class="clickable-container" onclick="toggleContent('content7', 'triangleIcon7')">
                    <div class="sample-name"><h6>Plowing</h6></div>
                    <div class="triangle-icon" id="triangleIcon7">&#9654;</div>
                  </div>

                  <div class="hidden-content" id="content7">
                        <!-- Requestion Details -->
                        <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="rsbsa">Specify</label>
                              <input type="text" class="form-control" id="plowing" name="plowing" placeholder="specify">
                          </div>
                          
                          <!-- Application group with Date and Time -->
                          <div class="form-group col-md-8">
                            <div class="form-row">
                              
                                <div class="form-group col-md-6">
                                  <label for="application">Evaluation/Recommendation</label>
                                    <input type="text" class="form-control" id="evaluation_plowing" name="evaluation_plowing" placeholder="Enter Evaluation/Recommendation">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="application">Target Date</label>
                                    <input type="date" class="form-control" id="target_date_plowing" name="target_date_plowing" placeholder="Enter Target Date" >
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-md-4">
                              <label for="name"> Completion Date</label>
                              <input type="date" class="form-control" id="completion_date_plowing" name="completion_date_plowing" placeholder="Enter Completion Date"  >
                          </div>
                          <div class="form-group col-md-4">
                              <label for="email">Delivered/Served by</label>
                              <input type="text" class="form-control" id="servedby_plowing" name="servedby_plowing" placeholder="Enter Served by">
                          </div>
                          <div class="form-group col-md-4">
                            <label for="email">Conform</label>
                            <input type="text" class="form-control" id="conform_plowing" name="conform_plowing" placeholder="Enter Conform" >
                        </div>
                      </div>
                    </div>
                  <!-- End of 7th Content -->
                  <!-- 8th Content -->
                <div class="clickable-container" onclick="toggleContent('content8', 'triangleIcon8')">
                  <div class="sample-name"><h6>Harrowing</h6></div>
                  <div class="triangle-icon" id="triangleIcon8">&#9654;</div>
                </div>

                <div class="hidden-content" id="content8">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="harrowing" name="harrowing" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_harrowing" name="evaluation_harrowing" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_harrowing" name="target_date_harrowing" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_harrowing" name="completion_date_harrowing" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_harrowing" name="servedby_harrowing" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_harrowing" name="conform_harrowing" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 8th Content -->
      </div>
      <div id="Part4" hidden="hidden" style="margin-bottom: 10px;">
                <!-- 9th Content -->
                <div class="clickable-container" onclick="toggleContent('content9', 'triangleIcon9')">
                  <div class="sample-name"><h6>Rotavator</h6></div>
                  <div class="triangle-icon" id="triangleIcon9">&#9654;</div>
                </div>

                <div class="hidden-content" id="content9">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="rotavator" name="rotavator" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_rotavator" name="evaluation_rotavator" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_rotavator" name="target_date_rotavator" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_rotavator" name="completion_date_rotavator" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_rotavator" name="servedby_rotavator" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_rotavator" name="conform_rotavator" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 9th Content -->
                <!-- 11th Content -->
                <div class="clickable-container" onclick="toggleContent('content11', 'triangleIcon11')">
                  <div class="sample-name"><h6>Seeds/Input Material</h6></div>
                  <div class="triangle-icon" id="triangleIcon11">&#9654;</div>
                </div>

                <div class="hidden-content" id="content11">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="seeds" name="seeds" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_seeds" name="evaluation_seeds" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_seeds" name="target_date_seeds" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_seeds" name="completion_date_seeds" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_seeds" name="servedby_seeds" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_seeds" name="conform_seeds" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 11th Content -->
                <!-- 12th Content -->
                <div class="clickable-container" onclick="toggleContent('content12', 'triangleIcon12')">
                  <div class="sample-name"><h6>Inoculant</h6></div>
                  <div class="triangle-icon" id="triangleIcon12">&#9654;</div>
                </div>

                <div class="hidden-content" id="content12">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="inoculant" name="inoculant" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_inoculant" name="evaluation_inoculant" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_inoculant" name="target_date_inoculant" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_inoculant" name="completion_date_inoculant" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_inoculant" name="servedby_inoculant" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_inoculant" name="conform_inoculant" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 12th Content -->
                <!-- 13th Content -->
                <div class="clickable-container" onclick="toggleContent('content13', 'triangleIcon13')">
                  <div class="sample-name"><h6>Crop Insurance Enrollment</h6></div>
                  <div class="triangle-icon" id="triangleIcon13">&#9654;</div>
                </div>

                <div class="hidden-content" id="content13">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="enrollment" name="enrollment" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_enrollment" name="evaluation_enrollment" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_enrollment" name="target_date_enrollment" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_enrollment" name="completion_date_enrollment" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_enrollment" name="servedby_enrollment" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_enrollment" name="conform_enrollment" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 13th Content -->
                <!-- 14th Content -->
                <div class="clickable-container" onclick="toggleContent('content14', 'triangleIcon14')">
                  <div class="sample-name"><h6>Crop Insurance Claim</h6></div>
                  <div class="triangle-icon" id="triangleIcon14">&#9654;</div>
                </div>

                <div class="hidden-content" id="content14">
                      <!-- Requestion Details -->
                      <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rsbsa">Specify</label>
                            <input type="text" class="form-control" id="insurance_claim" name="insurance_claim" placeholder="specify">
                        </div>
                        
                        <!-- Application group with Date and Time -->
                        <div class="form-group col-md-8">
                          <div class="form-row">
                            
                              <div class="form-group col-md-6">
                                <label for="application">Evaluation/Recommendation</label>
                                  <input type="text" class="form-control" id="evaluation_insurance_claim" name="evaluation_insurance_claim" placeholder="Enter Evaluation/Recommendation">
                              </div>
                              <div class="form-group col-md-6">
                              <label for="application">Target Date</label>
                                  <input type="date" class="form-control" id="target_date_insurance_claim" name="target_date_insurance_claim" placeholder="Enter Target Date" >
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name"> Completion Date</label>
                            <input type="date" class="form-control" id="completion_date_insurance_claim" name="completion_date_insurance_claim" placeholder="Enter Completion Date"  >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Delivered/Served by</label>
                            <input type="text" class="form-control" id="servedby_insurance_claim" name="servedby_insurance_claim" placeholder="Enter Served by">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email">Conform</label>
                          <input type="text" class="form-control" id="conform_insurance_claim" name="conform_insurance_claim" placeholder="Enter Conform" >
                      </div>
                    </div>
                  </div>
                <!-- End of 14th Content -->
                <!-- 15th Content -->
        <div class="clickable-container" onclick="toggleContent('content15', 'triangleIcon15')">
          <div class="sample-name"><h6>Production</h6></div>
          <div class="triangle-icon" id="triangleIcon15">&#9654;</div>
        </div>

    <div class="hidden-content" id="content15">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
            <input type="text" class="form-control" id="production" name="production" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_production" name="evaluation_production" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_production" name="target_date_production" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_production" name="completion_date_production" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_production" name="servedby_production" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_production" name="conform_production" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 15th Content -->

      <!-- 16th Content -->
      <div class="clickable-container" onclick="toggleContent('content16', 'triangleIcon16')">
      <div class="sample-name"><h6>Fertilizer</h6></div>
      <div class="triangle-icon" id="triangleIcon16">&#9654;</div>
    </div>

    <div class="hidden-content" id="content16">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
            <input type="text" class="form-control" id="fertilizer" name="fertilizer" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_fertilizer" name="evaluation_fertilizer" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_fertilizer" name="target_date_fertilizer" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_fertilizer" name="completion_date_fertilizer" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_fertilizer" name="servedby_fertilizer" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_fertilizer" name="conform_fertilizer" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 16th Content -->

      <!-- 17th Content -->
  <div class="clickable-container" onclick="toggleContent('content17', 'triangleIcon17')">
      <div class="sample-name"><h6>Feeding Inputs</h6></div>
      <div class="triangle-icon" id="triangleIcon17">&#9654;</div>
    </div>

    <div class="hidden-content" id="content17">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
            <input type="text" class="form-control" id="feeding_inputs" name="feeding_inputs" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_feeding_inputs" name="evaluation_feeding_inputs" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_feeding_inputs" name="target_date_feeding_inputs" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_feeding_inputs" name="completion_date_feeding_inputs" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_feeding_inputs" name="servedby_feeding_inputs" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_feeding_inputs" name="conform_feeding_inputs" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 17th Content -->


      <!-- 18th Content -->
      <div class="clickable-container" onclick="toggleContent('content18', 'triangleIcon18')">
      <div class="sample-name"><h6>Pest/Disease Control</h6></div>
      <div class="triangle-icon" id="triangleIcon18">&#9654;</div>
    </div>

    <div class="hidden-content" id="content18">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
            <input type="text" class="form-control" id="pest_control" name="pest_control" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_pest_control" name="evaluation_pest_control" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_pest_control" name="target_date_pest_control" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_pest_control" name="completion_date_pest_control" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_pest_control" name="servedby_pest_control" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_pest_control" name="conform_pest_control" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 18th Content -->

      <!-- 19th Content -->
      <div class="clickable-container" onclick="toggleContent('content19', 'triangleIcon19')">
      <div class="sample-name"><h6>Production</h6></div>
      <div class="triangle-icon" id="triangleIcon19">&#9654;</div>
    </div>

    <div class="hidden-content" id="content19">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
            <input type="text" class="form-control" id="irrigation" name="irrigation" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_irrigation" name="evaluation_irrigation" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_irrigation" name="target_date_irrigation" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_irrigation" name="completion_date_irrigation" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_irrigation" name="servedby_irrigation" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_irrigation" name="conform_irrigation" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 19th Content -->
  <!-- 20th Content -->
<div class="clickable-container" onclick="toggleContent('content20', 'triangleIcon20')">
      <div class="sample-name"><h6>Post Harvest</h6></div>
      <div class="triangle-icon" id="triangleIcon20">&#9654;</div>
    </div>

    <div class="hidden-content" id="content20">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="post_harvest" name="post_harvest" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_post_harvest" name="evaluation_post_harvest" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_post_harvest" name="target_date_post_harvest" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_post_harvest" name="completion_date_post_harvest" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_post_harvest" name="servedby_post_harvest" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_post_harvest" name="conform_post_harvest" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 20th Content -->
  <!-- 21st Content -->
<div class="clickable-container" onclick="toggleContent('content21', 'triangleIcon21')">
      <div class="sample-name"><h6>Harvester</h6></div>
      <div class="triangle-icon" id="triangleIcon21">&#9654;</div>
    </div>

    <div class="hidden-content" id="content21">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="harvester" name="harvester" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_harvester" name="evaluation_harvester" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_harvester" name="target_date_harvester" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_harvester" name="completion_date_harvester" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_harvester" name="servedby_harvester" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_harvester" name="conform_harvester" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 21st Content -->
  <!-- 22th Content -->
<div class="clickable-container" onclick="toggleContent('content22', 'triangleIcon22')">
      <div class="sample-name"><h6>Hauling</h6></div>
      <div class="triangle-icon" id="triangleIcon22">&#9654;</div>
    </div>

    <div class="hidden-content" id="content22">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="hauling" name="hauling" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_hauling" name="evaluation_hauling" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_hauling" name="target_date_hauling" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_hauling" name="completion_date_hauling" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_hauling" name="servedby_hauling" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_hauling" name="conform_hauling" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 22th Content -->
  <!-- 23th Content -->
<div class="clickable-container" onclick="toggleContent('content23', 'triangleIcon23')">
      <div class="sample-name"><h6>Drying</h6></div>
      <div class="triangle-icon" id="triangleIcon23">&#9654;</div>
    </div>

    <div class="hidden-content" id="content23">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="drying" name="drying" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_drying" name="evaluation_drying" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_drying" name="target_date_drying" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_drying" name="completion_date_drying" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_drying" name="servedby_drying" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_drying" name="conform_drying" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 23th Content -->
  <!-- 24th Content -->
<div class="clickable-container" onclick="toggleContent('content24', 'triangleIcon24')">
      <div class="sample-name"><h6>Milling/Processing</h6></div>
      <div class="triangle-icon" id="triangleIcon24">&#9654;</div>
    </div>

    <div class="hidden-content" id="content24">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="milling" name="milling" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_milling" name="evaluation_milling" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_milling" name="target_date_milling" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_milling" name="completion_date_milling" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_milling" name="servedby_milling" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_milling" name="conform_milling" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 24th Content -->
  <!-- 25th Content -->
<div class="clickable-container" onclick="toggleContent('content25', 'triangleIcon25')">
      <div class="sample-name"><h6>Grading/QM</h6></div>
      <div class="triangle-icon" id="triangleIcon25">&#9654;</div>
    </div>

    <div class="hidden-content" id="content25">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="grading" name="grading" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_grading" name="evaluation_grading" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_grading" name="target_date_grading" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_grading" name="completion_date_grading" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_grading" name="servedby_grading" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_grading" name="conform_grading" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 25th Content -->
  <!-- 26th Content -->
<div class="clickable-container" onclick="toggleContent('content26', 'triangleIcon26')">
      <div class="sample-name"><h6>Marketing</h6></div>
      <div class="triangle-icon" id="triangleIcon26">&#9654;</div>
    </div>

    <div class="hidden-content" id="content26">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="marketing" name="marketing" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_marketing" name="evaluation_marketing" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_marketing" name="target_date_marketing" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_marketing" name="completion_date_marketing" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_marketing" name="servedby_marketing" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_marketing" name="conform_marketing" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 26th Content -->
  <!-- 27th Content -->
<div class="clickable-container" onclick="toggleContent('content27', 'triangleIcon27')">
      <div class="sample-name"><h6>Others:</h6></div>
      <div class="triangle-icon" id="triangleIcon27">&#9654;</div>
    </div>

    <div class="hidden-content" id="content27">
      <!-- Requestion Details -->
      <div class="form-row">
        <div class="form-group col-md-4">
            <label for="rsbsa">Specify</label>
        <input type="text" class="form-control" id="others" name="others" placeholder="Specify">
        </div>
        
        <!-- Application group with Date and Time -->
        <div class="form-group col-md-8">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="application">Evaluation/Recommendation</label>
                    <input type="text" class="form-control" id="evaluation_others" name="evaluation_others" placeholder="Enter Evaluation/Recommendation">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="application">Target Date</label>
                    <input type="date" class="form-control" id="target_date_others" name="target_date_others" placeholder="Enter Target Date" >
                </div>
            </div>
        </div>
      </div>

      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="name"> Completion Date</label>
              <input type="date" class="form-control" id="completion_date_others" name="completion_date_others" placeholder="Enter Completion Date"  >
          </div>
          <div class="form-group col-md-4">
              <label for="email">Delivered/Served by</label>
              <input type="text" class="form-control" id="servedby_others" name="servedby_others" placeholder="Enter Served by">
          </div>
          <div class="form-group col-md-4">
            <label for="email">Conform</label>
            <input type="text" class="form-control" id="conform_others" name="conform_others" placeholder="Enter Conform" >
        </div>
      </div>

    </div>
  <!-- End of 27th Content -->
</div>

<!-- // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR // AR -->
 <div id="Part5" hidden="hidden">         
                  <div class="form-group">
                    <label for="notes" class="col-sm-8 control-label">Remarks/Notes</label>
                    <div class="col-sm-12">
                      <textarea class="form-control" id="notes" name="notes" placeholder="Enter Remarks/Notes" rows="3"></textarea>
                    </div>
                  </div>

                  <div class="container">
                  

                    <div class="image-preview-container">
                      <label for="imageUpload1">Farm Sketch</label>
                      <div id="imagePreviewContainer1" class="image-preview">
                          <img id="imagePreview1"  alt="Preview" class="img-fluid d-none">
                      </div>
                    
                      
                      <input id="imageUploadData1"name="imageUploadData1" type="text" hidden="hidden">
                      <input type="file" class="form-control-file" id="imageUpload1" name="imageUpload1" accept="image/*" onchange="previewImage(this, 'imagePreview1')">
                  </div>

                  <div class="image-preview-container">
                      <label for="imageUpload2">Farm Sketch</label>
                      <div id="imagePreviewContainer2" class="image-preview">
                          <img id="imagePreview2"  alt="Preview" class="img-fluid d-none">
                      </div>
                      
                      
                      <input id="imageUploadData2" name="imageUploadData2" type="text" hidden="hidden">
                      <input type="file" class="form-control-file" id="imageUpload2" name="imageUpload2" accept="image/*" onchange="previewImage(this, 'imagePreview2')">
                  </div>

                  </div>

                      <div class="form-group">
                      <label for="notes" class="col-sm-8 control-label">Special Notes/Instructions</label>
                      <div class="col-sm-12">
                          <textarea class="form-control" id="special_notes" name="special_notes" placeholder="Enter Special Notes/Instructions" rows="3"></textarea>
                      </div>
                      </div>
  </div>
            <div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" class="btn btn-primary" id="btn-back" onclick="prevPart()">Back</button>
                  <button type="button" class="btn btn-primary" id="btn-next" onclick="nextPart()">Next</button>
                  <button type="button" class="btn btn-success" id="btn-save" hidden="hidden">Save</button>
                  <button type="button" class="btn btn-success" id="btn-save-withIMG" hidden="">Save changes</button>
                </div>
              </div>
            </div>

          </form>
        </div>
     
        <div class="modal-footer">
          <!-- Additional modal footer content if needed -->
        </div>
      </div>
    </div>
  </div>
  <!-- end bootstrap model -->
  @include('admin/assistance/assistance-ajax')

  <script>
      let currentPart = 1;

      function showPart(partNumber) {
          // Hide all divs
          for (let i = 1; i <= 5; i++) {
              document.getElementById(`Part${i}`).hidden = true;

              if(currentPart == 1){
                document.getElementById('btn-back').hidden = true;
              }else{
                document.getElementById('btn-back').hidden = false;
              }
              
              if(currentPart < 5){
              document.getElementById('btn-next').hidden = false;
              document.getElementById('btn-save').hidden = true;
              document.getElementById('btn-save-withIMG').hidden = true;
              }else{
              document.getElementById('btn-save').hidden = false;
              document.getElementById('btn-next').hidden = true;
              document.getElementById('btn-save-withIMG').hidden = false;
              }

          }

          // Show the selected div
          document.getElementById(`Part${partNumber}`).hidden = false;
      }

      function prevPart() {
          if (currentPart > 1) {
              currentPart--;
              showPart(currentPart);
          }
      }

      function nextPart() {
          if (currentPart < 5) {
              currentPart++;
              showPart(currentPart);
          }
      }

      // Show the initial part
      showPart(currentPart);
  </script>

</body>


</html>