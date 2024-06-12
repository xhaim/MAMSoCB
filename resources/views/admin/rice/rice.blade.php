<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rice</title>
     
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('dash-assets/css/bootstrap.min.css')}}" >

    <script src="{{asset('dash-assets/js/jquery.js')}}"></script>

    <script src="{{asset('dash-assets/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('dash-assets/css/jquery.css')}}">

    <script src="{{asset('dash-assets/js/datatables.min.js')}}"></script>
    
    <link rel="icon" type="image/png" sizes="1024x1024" href="{{asset('dash-assets/img/DA_Logo.png')}}">
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
                <h2>Distribution of Rice</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)">Add</a>
                <a class="btn btn-secondary" onClick="printModal()" href="javascript:void(0)">Print Data</a>
                <a class="btn btn-info" id="toggleDatatables" style="margin-left:950px;" onclick="toggleDatatables()">  Archive</a>
            </div>
            
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
 
          <!-- Modal for viewing details -->
          <div class="card-body">
            @include('admin/rice/riceprint')
          <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content" style="width: 500px;left:190px">
                      <div class="modal-header">
                          <h5 class="modal-title" id="viewModalLabel">Farmer Details</h5>
                      </div>
                      <div class="modal-body">
                        <!-- Placeholders for displaying record details -->
                        <p><strong>RSBSA:</strong> <span id="view-rsbsa"></span></p>
                        <p><strong>Name:</strong> <span id="view-name"></span></p>
                        <p><strong>Barangay:</strong> <span id="view-barangay"></span></p>
                        <p><strong>Farm Location:</strong> <span id="view-farm_location"></span></p>
                        <p><strong>Birthdate:</strong> <span id="view-birthdate"></span></p>
                        <p><strong>Farm Area:</strong> <span id="view-farm_area"></span></p>
                        <p><strong>Sex:</strong> <span id="view-sex"></span></p>
                        <p><strong>Y/N:</strong> <span id="view-membership"></span></p>
                        <p><strong>Quantity:</strong> <span id="view-quantity"></span></p>
                        <p><strong>Date Received:</strong><span id="view-date_received"></span></p>
                    </div>
                    
                      
                  </div>
              </div>
          </div>
          
          <div id="MainTable">
            <table class="table table-bordered display responsive nowrap display responsive nowrap" id="ricehybrid-crud-datatable">
               <thead>
                  <tr>
                    <th>RSBSA No.</th>
                    <th>First</th>
                    <th>Middle</th>
                    <th>Last</th>
                    <th>Barangay</th>
                    <th>Farm Location</th>
                    <th>Birthdate</th>
                    <th>Sex</th>
                    <th width="150px">Action</th>
                  </tr>
               </thead>
            </table>
        </div>
        <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="ricehybrid-archive-datatable" style="width:100%;" >
           <thead>
              <tr>
                
                    <th>RSBSA No.</th>
                    <th>First</th>
                    <th>Middle</th>
                    <th>Last</th>
                    <th>Barangay</th>
                    <th>Farm Location</th>
                    <th>Birthdate</th>
                    <th>Sex</th>
                    <th width="150px">Action</th>
              </tr>
           </thead>
        </table>
        </div>

      </div>
    </div>
  </div>
  <!-- Bootstrap farmers model -->
  <div class="modal fade" id="farmers-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <<div class="modal-content" style="width: 500px;left:190px">
        <div class="modal-header" style="height: 80px;">
          <h4 class="modal-title" id="FarmersModal"></h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="FarmersForm" name="FarmersForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">

            <div class="form-group">
              <label for="rsbsa" class="col-sm-8 control-label">RSBSA No.</label>
              <div class="col-sm-12">
                  <input type="number" class="form-control" id="rsbsa" name="rsbsa" placeholder="Enter RSBSA No." maxlength="50">
                  <div id="rsbsa-validation-message" class="text-danger"></div>
              </div>
          </div>
          
 
            <div class="form-group">
              <label for="name_first" class="col-sm-8 control-label">Farmers Name (First)</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="name_first" name="name_first" placeholder="Enter First Name" maxlength="20" >
              </div>
            </div>

            <div class="form-group">
              <label for="name_middle" class="col-sm-8 control-label">Farmers Name (Middle)</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="name_middle" name="name_middle" placeholder="Enter Middle Name" maxlength="20" >
              </div>
            </div>

            <div class="form-group">
              <label for="name_last" class="col-sm-8 control-label">Farmers Name (Last)</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="name_last" name="name_last" placeholder="Enter Last Name" maxlength="20" >
              </div>
            </div>
            
            <div class="form-group">
              <label for="name_last" class="col-sm-8 control-label">Suffix</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Enter Suffix" maxlength="20" >
              </div>
            </div>

            <div class="form-group">
              <label for="barangay" class="col-sm-8 control-label">Barangay</label>
              <div class="col-sm-12">
                  <select class="form-control" id="barangay" name="barangay">
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
              <label for="farm_location" class="col-sm-8 control-label">Farm Location</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="farm_location" name="farm_location" placeholder="Enter Farm Location" maxlength="100" >
              </div>
            </div>

            <div class="form-group">
              <label for="birthdate" class="col-sm-8 control-label">Birthdate</label>
              <div class="col-sm-12">
                <input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="Enter Birthdate" maxlength="20" >
              </div>
            </div>
              
            <div class="form-group">
              <label for="farm_area" class="col-sm-8 control-label">Farm Area (hectares)</label>
              <div class="col-sm-12">
                  <input type="text" class="form-control" id="farm_area" name="farm_area" placeholder="Enter farm area (hectares)" >
              </div>
          </div>
          

            <div class="form-group">
              <label class="col-sm-8 control-label">Sex</label>
              <div class="col-sm-12">
                <select class="form-select" aria-label="select sex" id="sex" name="sex">
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-8 control-label">Membership:</label>
              <div class="col-sm-12">
		          <div class="checkbox">
                  <label>
                    <input type="checkbox" id="4PS" name="membership[]" value="4PS"> 4PS
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="IP" name="membership[]" value="IP"> IP
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="ARB" name="membership[]" value="ARB"> ARB
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="PWD" name="membership[]" value="PWD"> PWD
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="SC" name="membership[]" value="SC"> SC
                  </label>
                </div>
              </div>
            </div>
          

            <div class="form-group">
              <label for="quantity" class="col-sm-8 control-label">Quantity</label>
              <div class="col-sm-12">
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" maxlength="20" >
              </div>
            </div>

            <div class="form-group">
              <label for="date_received" class="col-sm-8 control-label">Date Received</label>
              <div class="col-sm-12">
                <input type="date" class="form-control" id="date_received" name="date_received" placeholder="Enter Date Received" maxlength="20" >
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
  <!-- End Bootstrap model -->
 
</body>
@include('admin/rice/rice-view')

</html>
