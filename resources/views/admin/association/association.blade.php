<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Association</title>
     
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
                <h2>Association</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)">Add</a>
               <a class="btn btn-secondary" onClick="printModal()" href="javascript:void(0)">Print Data</a>
              <a class="btn btn-info" id="toggleDatatables" style=" color: white;"  onclick="toggleDatatables()">
                  Archive
            </a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <div class="card-body">
      @include('admin/association/associationprint')
 {{-- view --}}
      <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Record Details</h5>
                </div>
                <div class="modal-body">
                    <!-- Placeholders for displaying record details -->
                    <p><strong>Name of Association:</strong> <span id="view-association"></span></p>
                    <p><strong>Barangay:</strong> <span id="view-barangay"></span></p>
                    <p><strong>Chairman:</strong> <span id="view-chairman"></span></p>
                    <p><strong>Contact Number:</strong> <span id="view-contact"></span></p>
                    <p><strong>Number of farmers:</strong> <span id="view-no_of_farmers"></span></p>
                    <p><strong>Date registered:</strong> <span id="view-registered"></span></p>
                  
                </div>
            </div>
        </div>
    </div>
    <div id="MainTable">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="assoc-crud-datatable">
           <thead>
              <tr>
                <th>Name of Association</th>
                <th>Barangay</th>
                <th>Chairman</th>
                <th>Contact</th>
                <th>Number of farmers</th>
                <th>Date registered</th>
                <th>Date created</th>
                <th width="150px">Action</th>
              </tr>
           </thead>
        </table>
    </div>
        <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="assoc-archive-datatable">
          <thead>
             <tr>
               <th>Name of Association</th>
               <th>Barangay</th>
               <th>Chairman</th>
               <th>Contact</th>
               <th>Number of farmers</th>
               <th>Date registered</th>
               <th>Date created</th>
               <th width="150px">Action</th>
             </tr>
          </thead>
       </table>
        </div>
    </div>
</div>
</div>
</div>
  <!-- boostrap Assoc model -->
    <div class="modal fade" id="assoc-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 500px;left:190px">
          <div class="modal-header" style="height: 80px;">
            <h4 class="modal-title" id="AssocModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="AssocForm" name="AssocForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">

              <div class="form-group">
                <label for="association" class="col-sm-8 control-label">Name of Association</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="association" name="association" placeholder="Enter Name of Association" maxlength="20">
                    <div id="association-validation-message" class="text-danger"></div>
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
                <label for="name" class="col-sm-8 control-label">Chairman</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="chairman" name="chairman" placeholder="Enter Chairman's Name" maxlength="20" >
                </div>
              </div>

              <div class="form-group">
                <label for="age" class="col-sm-8 control-label">Contact number</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact No." maxlength="2" >
                </div>
              </div>
      
              <div class="form-group">
                <label for="area" class="col-sm-8 control-label">Number of farmers</label>
                <div class="col-sm-12">
                  <input type="text" step="0.01" class="form-control" id="no_of_farmers" name="no_of_farmers" placeholder="Enter no. of farmers" maxlength="20" >
                </div>
              </div>

              <div class="form-group">
                <label for="birth" class="col-sm-8 control-label">Date registered</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" id="registered" name="registered" placeholder="Enter Date registered" maxlength="20" >
                </div>
              </div>
              
              <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
                <button type="submit" class="btn btn-success" id="btn-save">Save
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
             
          </div>
        </div>
      </div>
    </div>
<!-- end bootstrap model -->
@include('admin/association/association-scripts')

</html>