<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fertilizer</title>
     
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
                <h2>Fertilizer</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)">Add </a>
               <a class="btn btn-info" id="toggleDatatables" style=" color: white;"   onclick="toggleDatatables()">
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
 
    <div id="MainTable">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="fert-crud-datatable">
           <thead>
              <tr>
                {{-- <th>Id</th> --}}
                <th>No. of Sack/s Received</th>
                <th>Date Received</th>
                <th>Source of Funds</th>
                <th>Date created</th>
                <th width="150px">Action</th>
              </tr>
           </thead>
        </table>
    </div>
    <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="fert-archive-datatable" style="width: 100%">
          <thead>
             <tr>
               {{-- <th>Id</th> --}}
               <th>No. of Sack/s Received</th>
               <th>Date Received</th>
               <th>Source of Funds</th>
               <th>Date created</th>
               <th width="150px">Action</th>
             </tr>
          </thead>
       </table>
 
    </div>
</div>
</div>
</div>
  <!-- boostrap fertilizer model -->
    <div class="modal fade" id="fert-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <<div class="modal-content" style="width: 500px;left:190px">
          <div class="modal-header" >
            <h4 class="modal-title" id="FertModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="FertForm" name="FertForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                <label for="name" class="col-sm-6 control-label">No. of Fertlizer Received</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="seeds_received" name="seeds_received" placeholder="Enter No. of Fertlizer Received" maxlength="20" >
                </div>
              </div>
 
              <div class="form-group">
                <label class="col-sm-6 control-label">Date Received</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" id="date_received" name="date_received" maxlength="11" placeholder="Enter Date Received" >
                </div>
              </div>

              <div class="form-group">
                <label for="name" class="col-sm-6 control-label">Source of Funds</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="source_of_funds" name="source_of_funds" placeholder="Enter Source of Funds" maxlength="50" >
                </div>
              </div>

 
              <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
                <button type="submit" class="btn btn-success" id="btn-save">Submit
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

</body>
    @include('admin/fertilizer/fert-ajax')
</html>