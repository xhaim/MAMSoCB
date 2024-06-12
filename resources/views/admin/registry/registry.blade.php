<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Farmer's Enrolment</title>
     
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
                <h2>Registry</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)">Add</a>
               <a class="btn btn-info" id="toggleDatatables" style=" color: white;" onclick="toggleDatatables()">
                  Archive
            </a>
            </div>
            <div class="pull-right mb-2">
                @include('csv.importRegistries')
            </div>

        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 {{-- show modal --}}
 <div class="card-body">
    <div class="modal fade" id="viewModal"  tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width:1000px; height:auto; left:-90px;">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Record Details</h5>
                    <button onClick="closeviewModal();" type="button" class="close" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="width:1000px; height:auto;">
                    <!-- Placeholders for displaying record details -->
                    @include('admin.registry.registry-printable')
                </div>
            </div>
        </div>
    </div>
    {{-- end of show modal --}}
    <div id="MainTable">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="registry-crud-datatable">
           <thead>
              <tr>
                
                <th>RSBSA ID</th>
                <th>GENERATED ID</th>
                <th>Date Enrolled</th>
                <th>Income Source</th>
                <th>Address</th>
                <th>Purok</th>
                <th>Barangay</th>
                <th width="150px">Action</th>
              </tr>
           </thead>
           
        </table>
    </div>
    <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="registry-archive-datatable" style="width: 100%;">
            <thead>
               <tr>
                 
                 <th>RSBSA ID</th>
                 <th>GENERATED ID</th>
                 <th>Date Enrolled</th>
                 <th>Income Source</th>
                 <th>Address</th>
                 <th>Purok</th>
                 <th>Barangay</th>
                 <th width="150px">Action</th>
               </tr>
            </thead>
            
         </table>
    </div>
    </div>
</div>
</div>
</div>
  <!-- boostrap registry model -->
    @include('admin.registry.registry-modal')
  <!-- end bootstrap model -->

  </body>
  <script src="{{asset('dash-assets/js/registry/Modal.js')}}"></script>
  <script src="{{asset('dash-assets/js/registry/CheckBoxHandler.js')}}"></script>
  <script src="{{asset('dash-assets/js/registry/HouseholdMemberHandler.js')}}"></script>
  <script src="{{asset('dash-assets/js/registry/MemAf.js')}}"></script>
  <script src="{{asset('dash-assets/js/registry/Awards.js')}}"></script>
  @include('admin.registry.registry-ajax')
  
  </html>