<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vegetable Farmer</title>
     
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
                <h2>HVCDP Farmer-Vegetable including melon</h2>
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
      @include('vegprint')
      <div id="MainTable">
        <table class="table table-bordered display responsive nowrap" id="veg-crud-datatable">
           <thead>
              <tr>
                
                 <th>Name of Farmer</th>
                 <th>Barangay</th>
                 <th>Municipality</th>
                 <th>Sex</th>
                 <th>PO Affiliation</th>
                 <th>Contact Number</th>
                 <th>Commodity</th>
                 <th>Area(in has)</th>
                <th>Number of Hills</th>
                <th>Production/Month(KGS.)</th>
                <th>Market Outlet</th>
                <th>Area for Expansion(in has.)</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>

      <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap" id="veg-archive-datatable">
           <thead>
              <tr>
                
                 <th>Name of Farmer</th>
                 <th>Barangay</th>
                 <th>Municipality</th>
                 <th>Sex</th>
                 <th>PO Affiliation</th>
                 <th>Contact Number</th>
                 <th>Commodity</th>
                 <th>Area(in has)</th>
                <th>Number of Hills</th>
                <th>Production/Month(KGS.)</th>
                <th>Market Outlet</th>
                <th>Area for Expansion(in has.)</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>
 
    </div>
    
</div>
 
 
    <div class="modal fade" id="veg-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <<div class="modal-content" style="width: 500px;left:190px">
          <div class="modal-header">
            <h4 class="modal-title" id="VegModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="VegForm" name="VegForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">

              <div class="form-group">
                <label for="name" class="col-sm-8 control-label">Name of Farmer</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of Farmer" maxlength="100">
                    <div id="name-validation-message" class="text-danger"></div>
                </div>
            </div>
            
            
            <div class="form-group">
              <label for="barangay" class="col-sm-8 control-label">Barangay</label>
              <div class="col-sm-12">
                  <select class="form-control" id="barangay" name="barangay">
                    <option ></option>
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
                <label class="col-sm-8 control-label">Municipality</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Enter Municipality" value="Carmen" >
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
                <label class="col-sm-8 control-label">PO Affiliation</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="affiliation" name="affiliation" placeholder="Enter PO Affiliation" >
                </div>
              </div>

              <div class="form-group">
                <label for="contact" class="col-sm-8 control-label">Contact Number</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number" maxlength="11" >
                </div>
              </div>

              <div class="form-group">
                <label for="commodity" class="col-sm-8 control-label">Commodity</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="commodity" name="commodity" placeholder="Enter Commodity"  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Area</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="area" name="area" placeholder="Enter Area " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Number of Hills</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="number_of_hills" name="number_of_hills" placeholder="Enter Number of Hills " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Production/Month (kgs)</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="production" name="production" placeholder="Enter Production/Month (kgs) " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Market Outlet</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="market" name="market" placeholder="Enter Market Outlet " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Area for Expansion(in has.)</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="expansionarea" name="expansionarea" placeholder="Enter Area for Expansion(in has.) " >
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
    $('#veg-crud-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('veg-crud-datatable') }}",
           
           columns: [
                   
                    { data: 'name', name: 'name' },
                    { data: 'barangay', name: 'barangay' },
                    { data: 'municipality', name: 'municipality' },
                    { data: 'sex', name: 'sex' },
                    { data: 'affiliation', name: 'affiliation' },
                    { data: 'contact', name: 'contact' },
                    { data: 'commodity', name: 'commodity' },
                    { data: 'area', name: 'area' },
                    { data: 'number_of_hills', name: 'number_of_hills' },
                    { data: 'production', name: 'production' },
                    { data: 'market', name: 'market' },
                    { data: 'expansionarea', name: 'expansionarea' },
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
 
       $('#VegForm').trigger("reset");
       $('#VegModal').html("Add ");
       $('#veg-modal').modal('show');
       $('#id').val('');
 
  }   

  //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

  $('#veg-archive-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('veg-archive-datatable') }}",
           columns: [
                   
                    { data: 'name', name: 'name' },
                    { data: 'barangay', name: 'barangay' },
                    { data: 'municipality', name: 'municipality' },
                    { data: 'sex', name: 'sex' },
                    { data: 'affiliation', name: 'affiliation' },
                    { data: 'contact', name: 'contact' },
                    { data: 'commodity', name: 'commodity' },
                    { data: 'area', name: 'area' },
                    { data: 'number_of_hills', name: 'number_of_hills' },
                    { data: 'production', name: 'production' },
                    { data: 'market', name: 'market' },
                    { data: 'expansionarea', name: 'expansionarea' },
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
              url: "{{ url('veg/archive') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#veg-archive-datatable').DataTable();
                  var oTable = $('#veg-crud-datatable').DataTable();
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
              url: "{{ url('veg/restore') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#veg-archive-datatable').DataTable();
                  var oTable = $('#veg-crud-datatable').DataTable();
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
              url: "{{ url('delete-veg') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
 
                var oTable = $('#veg-archive-datatable').dataTable();
                oTable.fnDraw(false);
             }
          });
       }
  }

//  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //

  function editFunc(id){
     
    $.ajax({
        type:"POST",
        url: "{{ url('edit-veg') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#VegModal').html("Edit ");
          $('#veg-modal').modal('show');
          $('#id').val(res.id);
          $('#name').val(res.name);
          $('#barangay').val(res.barangay);
          $('#municipality').val(res.municipality);
          $('#sex').val(res.sex);
          $('#affiliation').val(res.affiliation);
          $('#contact').val(res.contact);
          $('#commodity').val(res.commodity);
          $('#area').val(res.area);
          $('#number_of_hills').val(res.number_of_hills);
          $('#production').val(res.production);
          $('#market').val(res.market);
          $('#expansionarea').val(res.expansionarea);
       }
    });
  }  
 
        // START OF PRINT // START OF PRINT // START OF PRINT 
        function printModal(){
                    // $('#vegBar').html("Edit veg");
                    $('#vegprint-modal').modal('show');
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
                    $('#vegprint-modal').modal('hide');
            }
            // AJAX request to fetch data from the server
            function printDataTable() {
                    $.ajax({
                        url: '/print-veg', // Replace with your Laravel route URL to fetch data
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
                        url: '/print-vegbar', // Replace with your Laravel route URL to fetch data
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
              const excludedColumns = ['id','created_at', 'updated_at'];

              const headers = ['Name of Farmer',
            { name: "LOCATION", columns: [ 'Barangay', 'Municipality'] }, 'Sex','PO Affiliation', 'Contact Number','Commodity','Area(in has.)',
              'Number of Hills','Production/months(kgs.)','Market Outlet','Area for expansion(in has.)'];

              // Create a new window for printing
              let printWindow = window.open('', '_blank');
              

              // Construct the HTML content to be printed with CSS styles for table borders
              let htmlContent = `
                  <html>
                  <head>
                      <title>Vegetable Print</title>
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
                    <h6 style="text-align:left;">All types of Vegetables including melon varities</h6>
                    

                      <table>
              `;

              // Adding table headers
        headers.forEach(header => {
            if (typeof header === 'object') {
                htmlContent += `<th colspan="${2}" style="text-align:center;">${header.name}</th>`;
            } else if (!excludedColumns.includes(header)) {
                htmlContent += `<th rowspan="${2}" style="text-align:center;">${header}</th>`;
            }
        });
        htmlContent += '</tr><tr>';


                  // Generate sub-headers for "Farmer's Name" columns
        headers.forEach(header => {
            if (typeof header === 'object') {
                header.columns.forEach(column => {
                    htmlContent += `<th style="font-size:15px;">${column}</th>`;
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
                            <th style="border:none;" class="tg-0lax">Prepared by: {{ Auth::user()->name }}</th>
                            <th style="border:none;" class="tg-0lax">Noted by:</th>
                            
                        </tr>
                        </thead>
                      </table>

                  </body>
                  </html>
              `;

              // Write the HTML content to the new window and print it
              printWindow.document.write(htmlContent);
              printWindow.document.close();
              printWindow.print();
          }
 
 
  $('#VegForm').submit(function(e) {
 
     e.preventDefault();
   
     var formData = new FormData(this);
   
     $.ajax({
        type:'POST',
        url: "{{ url('store-veg')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#veg-modal").modal('hide');
          var oTable = $('#veg-crud-datatable').dataTable();
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
<script>
  $(document).ready(function () {
      $('#name').on('input', function () {
          var nameValue = $(this).val();

          // Make an Ajax request to check if the Name of Farmer exists
          $.ajax({
              url: '{{ route("check.farmer_name") }}', // Update with your actual route
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  name: nameValue
              },
              success: function (response) {
                  // Update the validation message based on the response
                  if (response.exists) {
                      $('#name-validation-message').text('Farmer name already exists');
                  } else {
                      $('#name-validation-message').text('');
                  }
              },
              error: function (error) {
                  console.error('Error checking Farmer name:', error);
              }
          });
      });
  });
</script>





</html>