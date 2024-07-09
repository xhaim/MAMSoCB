<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cacao Farmer</title>
     
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
                <h2>HVCDP -Cacao Farmer</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)"> Add</a>
                <a class="btn btn-secondary" onClick="printModal()" href="javascript:void(0)">Print Data</a>
                <a class="btn btn-info" id="toggleDatatables" style=" color: white;" onclick="toggleDatatables()">  Archive</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <div class="card-body">
      @include('cacaoprint')
      <div id="MainTable">
        <table class="table table-bordered display responsive nowrap" id="cacao-crud-datatable">
           <thead>
              <tr>
                 <th>Name </th>
                 <th>Sex</th>
                 <th>Purok</th>
                 <th>Barangay</th>
                 <th>Bearing(# of cacao trees)</th>
                 <th>Non-Bearing(# of cacao trees)</th>
                 <th>Total # of Cacao Trees</th>
                 <th>Area(in has)</th>
                 <th>Age of Trees(Years)</th>
                <th>Number of Cacao Trees Harvested</th>
                <th>No of Kilos Harvested</th>
                <th>Harvesting season</th>
                <th>Varieties</th>
                <th>Group/Organization</th>
                <th>Remark</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>

      <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap" id="cacao-archive-datatable">
           <thead>
              <tr>
                 <th>Name </th>
                 <th>Sex</th>
                 <th>Purok</th>
                 <th>Barangay</th>
                 <th>Bearing(# of cacao trees)</th>
                 <th>Non-Bearing(# of cacao trees)</th>
                 <th>Total # of Cacao Trees</th>
                 <th>Area(in has)</th>
                 <th>Age of Trees(Years)</th>
                <th>Number of Cacao Trees Harvested</th>
                <th>No of Kilos Harvested</th>
                <th>Harvesting season</th>
                <th>Varieties</th>
                <th>Group/Organization</th>
                <th>Remark</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>

    </div>
    
</div>
 
 
    <div class="modal fade" id="cacao-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 500px;left:190px">
          <div class="modal-header">
            <h4 class="modal-title" id="CacaoModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="CacaoForm" name="CacaoForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">

             <div class="form-group">
                <label for="name" class="col-sm-8 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="100">
                    <div id="name-validation-message" class="text-danger"></div>
                </div>
            </div>

 
              <div class="form-group">
                <label for="sex" class="col-sm-2 control-label">Sex</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="sex" value="Male"  > Male
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="sex" value="Female"> Female
                  </label>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-sm-8 control-label">Purok</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="purok" name="purok" placeholder="Enter Purok" >
                </div>
              </div>

              <div class="form-group">
                <label for="barangay" class="col-sm-8 control-label">Barangay</label>
                <div class="col-sm-12">
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
                <label class="col-sm-8 control-label">Bearing(# of Cacao Trees)</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="bearing" name="bearing" placeholder="Enter Bearing(# of Cacao Trees)" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="contact" class="col-sm-8 control-label">Non-Bearing(# of Cacao Trees)</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="non_bearing" name="non_bearing" placeholder="Enter Contact Number" maxlength="11" >
                </div>
              </div>

              <div class="form-group">
                <label for="contact" class="col-sm-8 control-label">Total # of Cacao Trees</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="total" name="total" placeholder="Total # of Cacao Trees" maxlength="11" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Area</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="area" name="area" placeholder="Enter Area " maxlength="11">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Age of Trees(Years)</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="age" name="age" placeholder="Enter Age of Trees(Years) " >
                </div>
              </div>

              <div class="form-group">
                <label for="commodity" class="col-sm-8 control-label">No. of Cacao Trees Harvested</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="cacao_trees_harvested" name="cacao_trees_harvested" placeholder="Enter No. of Cacao Trees Harvested"  >
                </div>
              </div>

             

              <div class="form-group">
                <label class="col-sm-8 control-label">No. of Kilos Harvested</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="kilo" name="kilo" placeholder="Enter No. of Kilos Harvested " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Harvesting Season</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="season" name="season" placeholder="Enter Harvesting Season " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Varieties</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="varieties" name="varieties" placeholder="Enter Varieties " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Group/Organization</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="group" name="group" placeholder="Enter Group/Organization " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Remark</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="remark" name="remark" placeholder="Enter Remark " >
                </div>
              </div>
              <div class="col-sm-offset-2 col-sm-10">
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
 
</body>
<script type="text/javascript">
      
 $(document).ready( function () {
 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
    $('#cacao-crud-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('cacao-crud-datatable') }}",
           
           columns: [
                   
                    { data: 'name', name: 'name' },
                    { data: 'sex', name: 'sex' },
                    { data: 'purok', name: 'purok' },
                    { data: 'barangay', name: 'barangay' },
                    { data: 'bearing', name: 'bearing' },
                    { data: 'non_bearing', name: 'non_bearing' },
                    { data: 'total', name: 'total' },
                    { data: 'area', name: 'area' },
                    { data: 'age', name: 'commodity' },
                    { data: 'cacao_trees_harvested', name: 'cacao_trees_harvested' },
                    { data: 'kilo', name: 'number_of_hills' },
                    { data: 'season', name: 'production' },
                    { data: 'varieties', name: 'varieties' },
                    { data: 'group', name: 'group' },
                    { data: 'remark', name: 'remark' },
                    { data: 'created_at', name: 'created_at' },
                    {data: 'action', name: 'action', orderable: false},
                 ],
                 order: [[0, 'desc']]
       });
       $('#printButton').on('click', function () {
        $('#myDataTable').DataTable().buttons['print'].trigger();
    });

  });
   
  function add(){
 
       $('#CacaoForm').trigger("reset");
       $('#CacaoModal').html("Add ");
       $('#cacao-modal').modal('show');
       $('#id').val('');
 
  }   

 //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

 $('#cacao-archive-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('cacao-archive-datatable') }}",
           columns: [
                    { data: 'name', name: 'name' },
                    { data: 'sex', name: 'sex' },
                    { data: 'purok', name: 'purok' },
                    { data: 'barangay', name: 'barangay' },
                    { data: 'bearing', name: 'bearing' },
                    { data: 'non_bearing', name: 'non_bearing' },
                    { data: 'total', name: 'total' },
                    { data: 'area', name: 'area' },
                    { data: 'age', name: 'commodity' },
                    { data: 'cacao_trees_harvested', name: 'cacao_trees_harvested' },
                    { data: 'kilo', name: 'number_of_hills' },
                    { data: 'season', name: 'production' },
                    { data: 'varieties', name: 'varieties' },
                    { data: 'group', name: 'group' },
                    { data: 'remark', name: 'remark' },
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
              url: "{{ url('cacao/archive') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#cacao-archive-datatable').DataTable();
                  var oTable = $('#cacao-crud-datatable').DataTable();
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
              url: "{{ url('cacao/restore') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#cacao-archive-datatable').DataTable();
                  var oTable = $('#cacao-crud-datatable').DataTable();
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


  function deleteFunc(id){
        if (confirm("Delete Record?") == true) {
        var id = id;
          
          // ajax
          $.ajax({
              type:"POST",
              url: "{{ url('delete-cacao') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
 
                var oTable = $('#cacao-archive-datatable').dataTable();
                oTable.fnDraw(false);
             }
          });
       }
  }

//  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //


  function editFunc(id){
     
    $.ajax({
        type:"POST",
        url: "{{ url('edit-cacao') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#CacaoModal').html("Edit ");
          $('#cacao-modal').modal('show');
          $('#id').val(res.id);
          $('#name').val(res.name);
          $('#sex').val(res.sex);
          $('#purok').val(res.purok);
          $('#barangay').val(res.barangay);
          $('#bearing').val(res.bearing);
          $('#non_bearing').val(res.non_bearing);
          $('#total').val(res.total);
          $('#area').val(res.area);
          $('#age').val(res.age);
          $('#cacao_trees_harvested').val(res.cacao_trees_harvested);
          $('#kilo').val(res.kilo);
          $('#season').val(res.season);
          $('#varieties').val(res.varieties);
          $('#group').val(res.group);
          $('#remark').val(res.remark);
       }
    });
  }  
 
  // START OF PRINT // START OF PRINT // START OF PRINT 
  function printModal(){
                    // $('#cacaoBar').html("Edit cacao");
                    $('#cacaoprint-modal').modal('show');
            }

            function printDatas() {
                    // Get selected barangay value
                    var selectedBarangay = $('#barangay').val();

                    if(selectedBarangay !== "All" && selectedBarangay !== null){
                        // Make AJAX request based on the selected barangay
                        printDataTableBar(selectedBarangay);
                    }else if(selectedBarangay == "All"){
                        // Make AJAX request based on the selected barangay
                        printDataTable();
                    }

                    // Close the modal (optional)
                    $('#cacaoprint-modal').modal('hide');
            }
            // AJAX request to fetch data from the server
            function printDataTable() {
                    $.ajax({
                        url: '/print-cacao', // Replace with your Laravel route URL to fetch data
                        method: 'GET',
                        success: function (data) {
                            // Once the data is fetched successfully, you can proceed to print it
                            printData(data);
                        },
                        error: function (error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }

                // AJAX request to fetch data from the server
            function printDataTableBar(selectedBarangay) {
                    $.ajax({
                        url: '/print-cacaobar', // Replace with your Laravel route URL to fetch data
                        method: 'GET',
                        data: { barangay: selectedBarangay },
                        success: function (data) {
                            // Once the data is fetched successfully, you can proceed to print it
                            printData(data);
                        },
                        error: function (error) {
                            console.error('Error fetching data:', error);
                        }
                    });
                }


      // Function to print the data fetched from the server
      function printData(data) {
          // Columns to exclude (you can adjust these according to your requirements)
          const excludedColumns = ['created_at', 'updated_at'];
          
          const headers = ['No.', 'Name', 'Sex',
        { name: "ADDRESS", columns: ['Purok', 'Municipality'] },{ name: "Number of Cacao Trees", columns: ['Bearing', 'Non-Bearing'] },'Total # of Cacao Trees', 'Area(in has.)' , 'Age of Trees(Years)',
        'No. of Cacao Trees Harvested','No. of Kilos Harvested', 'Harvesting season', 'Varieties','Group/Organization','Remark'];

          // Create a new window for printing
          let printWindow = window.open('', '_blank');
          

          // Construct the HTML content to be printed with CSS styles for table borders
          let htmlContent = `
              <html>
              <head>
                  <title>Cacao farmer Print</title>
                  <style>
                      table {
                          border-collapse: collapse;
                          width: 100%;
                      }
                      table, th, td {
                          border: 1px solid black;
                      }
                      th, td {
                          padding: 8px;
                          text-align: left;
                      }
                  </style>
              </head>
              <body>
                <table class="tg">
                    <thead>
                      <tr>
                        <th style="text-align:center;" class="tg-0lax">CLUSTER ____(___________DISTRICT) CACAO FARMER PROFILE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="text-align:center;" class="tg-0lax"> AS OF 2023</td>
                      </tr>
                      <tr>
                        <td style="text-align:left;" class="tg-0lax">Municipality:Carmen</td>
                      </tr>
                    </tbody>
                </table>
               

                  <table>
          `;

            // Adding table headers
    headers.forEach(header => {
        if (typeof header === 'object') {
            htmlContent += `<th colspan="${2}" style="text-align:center;">${header.name}</th>`;
        } else if (!excludedColumns.includes(header)) {
            htmlContent += `<th rowspan="${2}" style="text-align:center; font-size:15px;">${header}</th>`;
        }
    });
    htmlContent += '</tr><tr>';

              // Generate sub-headers for "Farmer's Name" columns
    headers.forEach(header => {
        if (typeof header === 'object') {
            header.columns.forEach(column => {
                htmlContent += `<th>${column}</th>`;
            });
        }
    });

          // Assuming each data row is an object
          data.forEach(row => {
              htmlContent += '<tr>';
              for (const key in row) {
                  if (row.hasOwnProperty(key) && !excludedColumns.includes(key)) {
                      htmlContent += '<td>' + row[key] + '</td>';
                  }
              }
              htmlContent += '</tr>';
          });

          htmlContent += `
                  </table>
                  <table class="tg" style="border:none;">
                    <thead style="border:none;">
                      <tr style="border:none;">
                        <th style="border:none;" class="tg-0lax">Remark:NR- Need of Rehabilitation</th>
                        <th style="border:none;" class="tg-0lax">NTR: Need to rejuvinate</th>
                        <th style="border:none;" class="tg-0lax">AB:Abandon</th>
                        <th style="border:none;" class="tg-0lax"> PD-  Pest and diseases infection</th>
                    </tr>
                    </thead>
                    <tbodystyle="border:none;">
                    <tr style="border:none;">
                        <td style="border:none;" class="tg-0lax">
                            <br>
                            <p style="margin-top:10px;">Prepared By: {{ Auth::user()->name }}</p>
                        </td>
                        <th style="border:none;" class="tg-0lax"></th>
                        <th style="border:none;" class="tg-0lax"></th>
                        <td style="border:none;" class="tg-0lax">
                            <br>
                            <p style="margin-top:10px;">Noted By:</p>
                        </td>
                    </tr>
                    </tbody>
                  </table>
              </body>
              </html>
          `;

          // Write the HTML content to the new window and print it
          printWindow.document.write(htmlContent);
          printWindow.document.close();
          printWindow.print();
      }
      //end of print function

 
  $('#CacaoForm').submit(function(e) {
 
     e.preventDefault();
   
     var formData = new FormData(this);
   
     $.ajax({
        type:'POST',
        url: "{{ url('store-cacao')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#cacao-modal").modal('hide');
          var oTable = $('#cacao-crud-datatable').dataTable();
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
    document.addEventListener("DOMContentLoaded", function() {
        const bearingInput = document.getElementById('bearing');
        const nonBearingInput = document.getElementById('non_bearing');
        const totalInput = document.getElementById('total');

        // Function to update the total
        function updateTotal() {
            const bearingValue = parseInt(bearingInput.value) || 0;
            const nonBearingValue = parseInt(nonBearingInput.value) || 0;
            const total = bearingValue + nonBearingValue;
            totalInput.value = total;
        }

        // Add input event listeners to both 'bearing' and 'non-bearing' inputs
        bearingInput.addEventListener('input', updateTotal);
        nonBearingInput.addEventListener('input', updateTotal);
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
<script>
  $(document).ready(function () {
      $('#name').on('input', function () {
          var nameValue = $(this).val();

          // Make an Ajax request to check if the Name exists
          $.ajax({
              url: '{{ route("check.name.cacao") }}', // Update with your actual route
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  name: nameValue
              },
              success: function (response) {
                  // Update the validation message based on the response
                  if (response.exists) {
                      $('#name-validation-message').text('Name already exists ');
                  } else {
                      $('#name-validation-message').text('');
                  }
              },
              error: function (error) {
                  console.error('Error checking Name:', error);
              }
          });
      });
  });
</script>

</html>