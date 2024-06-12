<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
     
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
                <h2>Users</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)">Add User</a>
            </div>
          </div>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
 
          <!-- Modal for viewing details -->
          @include('user.user-viewmodal')
          
            <table class="table table-bordered display responsive nowrap display responsive nowrap" id="user-management">
               <thead>
                  <tr>
                    <th>Role</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th width="150px">Action</th>
                  </tr>
               </thead>
            </table>
 
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap farmers model -->
   @include('user.user-modal')
  <!-- End Bootstrap model -->
 
</body>
@include('user.user-ajax')

</html>
