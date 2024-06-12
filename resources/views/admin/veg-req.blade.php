<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vegetable Request</title>
     
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
                <h2>Vegetable Request</h2>
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
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="vegreq-crud-datatable" style="width:100%;">
           <thead>
              <tr>
                
                <th>Name </th>
                <th>No. of Pack</th>
                <th>Barangay</th>
                <th>Contact Number</th>
                <th>Registered-in Date</th>
                <th width="150px">Action</th>
              </tr>
           </thead>
        </table>
      </div>
      <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap display responsive nowrap" id="vegreq-archive-datatable" style="width: 100%">
           <thead>
              <tr>
                
                <th>Name </th>
                <th>No. of Pack</th>
                <th>Barangay</th>
                <th>Contact Number</th>
                <th>Registered-in Date</th>
                <th width="150px">Action</th>
              </tr>
           </thead>
        </table>
      </div>
    </div>
</div>
</div>
</div>
  <!-- boostrap company model -->
    <div class="modal fade" id="vegreq-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content"style="width: 500px;left:190px">
          <div class="modal-header" style="height: 80px;">
            <h4 class="modal-title" id="VegReqModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="VegReqForm" name="VegReqForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">

              <div class="form-group">
                <label for="name" class="col-sm-8 control-label" >Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter  Name"  >
                </div>
              </div>  
 
              <div class="form-group">
                <label for="no." class="col-sm-8 control-label">No. of Seeds(pack)</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="seeds_received" name="seeds_received" placeholder="Enter No. of Seeds(pack)" maxlength="20" >
                </div>
              </div>
 
              <div class="form-group">
                <label for="barangay" class="col-sm-8 control-label">Barangay</label>
                <div class="col-sm-12">
                    <select class="form-control" id="barangay" name="barangay">
                      <option>Enter barangay</option>
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
                <label for="contact" class="col-sm-8 control-label">Contact Number</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number" maxlength="11" >
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
<script type="text/javascript">
      
 $(document).ready( function () {
 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $('#vegreq-crud-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('vegreq-crud-datatable') }}",
           columns: [
                    
                    { data: 'name', name: 'name' },
                    { data: 'seeds_received', name: 'seeds_received' },
                    { data: 'barangay', name: 'barangay' },
                    { data: 'contact', name: 'contact' }, 
                    { data: 'created_at', name: 'created_at' },
                    {data: 'action', name: 'action', orderable: false},
                 ],
                 order: [[0, 'desc']]
       });
 
  });
   
  function add(){
 
       $('#VegReqForm').trigger("reset");
       $('#VegReqModal').html("Add");
       $('#vegreq-modal').modal('show');
       $('#id').val('');
 
  }   
  function editFunc(id){
     
    $.ajax({
        type:"POST",
        url: "{{ url('edit-vegreq') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#VegReqModal').html("Edit");
          $('#vegreq-modal').modal('show');
          $('#id').val(res.id);
          $('#name').val(res.name);
          $('#seeds_received').val(res.seeds_received);
          $('#barangay').val(res.barangay);
          $('#contact').val(res.contact);
       }
    });
  }  
       //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

       $('#vegreq-archive-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('vegreq-archive-datatable') }}",
              columns: [ 
                    { data: 'name', name: 'name' },
                    { data: 'seeds_received', name: 'seeds_received' },
                    { data: 'barangay', name: 'barangay' },
                    { data: 'contact', name: 'contact' }, 
                    { data: 'created_at', name: 'created_at' },
                    {data: 'action', name: 'action', orderable: false},
                      ],
                      order: [[0, 'desc']]
          });

        function archiveFunc(id) {
            if (confirm("Archive Record?") == true) {
                // Make an AJAX request to the archive route
                $.ajax({
                    type: "POST",
                    url: "{{ url('vegreq/archive') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#vegreq-archive-datatable').DataTable();
                        var oTable = $('#vegreq-crud-datatable').DataTable();
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
                    url: "{{ url('vegreq/restore') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#vegreq-archive-datatable').DataTable();
                        var oTable = $('#vegreq-crud-datatable').DataTable();
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
                    url: "{{ url('delete-vegreq') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#vegreq-archive-datatable').DataTable();
                        var oTable = $('#vegreq-crud-datatable').DataTable();
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

 
  $('#VegReqForm').submit(function(e) {
 
     e.preventDefault();
   
     var formData = new FormData(this);
   
     $.ajax({
        type:'POST',
        url: "{{ url('store-vegreq')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#vegreq-modal").modal('hide');
          var oTable = $('#vegreq-crud-datatable').dataTable();
          oTable.fnDraw(false);
          $("#btn-save").html('Submit');
          $("#btn-save"). attr("disabled", false);
        },
        error: function(data){
           console.log(data);
         }
       });
   });
 
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
</html>