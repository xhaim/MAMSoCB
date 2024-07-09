<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ROMSP</title>
     
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
                <h2>ROMS</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-warning" onClick="add()" href="javascript:void(0)"> Add</a>
                <a class="btn btn-secondary" onClick="printDataTable()" href="javascript:void(0)">printAll </a>
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
        <table class="table table-bordered display responsive nowrap" id="roms-crud-datatable">
           <thead>
              <tr>
                 <th>Name of Farmer</th>
                 <th>Address</th>
                 <th>Animal Id</th>
                 <th>Breed of dam</th>
                 <th>Yr. Born</th>
                 <th>BCS</th>
                 <th>Date of last calving</th>
                 <th>Date of ROMS(1)</th>
                <th>Ovarian</th>
                <th>Result</th>
                <th>date of AI</th>
                <th>UT</th>
                <th>W/IEC</th>
                <th>Bull ID/Name</th>
                <th>No.of straws used</th>
                <th>Remarks</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>
      <div id="Archive" hidden="hidden">
        <table class="table table-bordered display responsive nowrap" id="roms-archive-datatable">
           <thead>
              <tr>
                 <th>Name of Farmer</th>
                 <th>Address</th>
                 <th>Animal Id</th>
                 <th>Breed of dam</th>
                 <th>Yr. Born</th>
                 <th>BCS</th>
                 <th>Date of last calving</th>
                 <th>Date of ROMS(1)</th>
                <th>Ovarian</th>
                <th>Result</th>
                <th>date of AI</th>
                <th>UT</th>
                <th>W/IEC</th>
                <th>Bull ID/Name</th>
                <th>No.of straws used</th>
                <th>Remarks</th>
                 <th>Created at</th>
                 <th>Action</th>
              </tr>
           </thead>
        </table>
      </div>


    </div>
    
</div>
 
 
    <div class="modal fade" id="roms-modal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: 500px;left:190px">
          <div class="modal-header">
            <h4 class="modal-title" id="RomsModal"></h4>
          </div>
          <div class="modal-body">
            <form action="javascript:void(0)" id="RomsForm" name="RomsForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id">

              <div class="form-group">
                <label for="name" class="col-sm-8 control-label">Name</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name of Farmer" maxlength="100">
                    <div id="name-validation-message" class="text-danger"></div>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-8 control-label">Address</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" >
                </div>
              </div>

              <div class="form-group">
                <label for="barangay" class="col-sm-8 control-label">Animal ID</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="animal_id" name="animal_id" placeholder="Enter Animal ID" maxlength="100" >
                </div>
              </div>
 
              <div class="form-group">
                <label class="col-sm-8 control-label">Breed of dam</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter Breed of dam" >
                </div>
              </div>
              
              <div class="form-group">
                <label for="contact" class="col-sm-8 control-label">Yr. Born</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="born" name="born" placeholder="Enter Yr. Born"   >
                </div>
              </div>

              <div class="form-group">
                <label for="contact" class="col-sm-8 control-label">BCS</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="bcs" name="bcs" placeholder="Enter BCS"   >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Date of last Calving</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="lastcalving" name="lastcalving" placeholder="Enter Date of last Calving "  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">Date ROMS</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="romsdate" name="romsdate" placeholder="Enter Date of last Calving "  >
                </div>
              </div>

              <div class="form-group">
                <label for="ovarian" class="col-sm-2 control-label">Ovarian</label>
                <div class="col-sm-10">
                  <label class="radio-inline">
                    <input type="radio" name="ovarian" value="RO"  > RO
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="ovarian" value="LO"> LO
                  </label>
                </div>
              </div> 

              <div class="form-group">
                <label class="col-sm-8 control-label">Result</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="result" name="result" placeholder="Enter Result"  >
                </div>
              </div>

             

              <div class="form-group">
                <label class="col-sm-8 control-label">Date of AI</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" id="ai" name="ai" placeholder="EnterDate of AI" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">UT</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="ut" name="ut" placeholder="Enter UT " >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-8 control-label">W/IEC</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="w_iec" name="w_iec" placeholder="Enter W/IEC " >
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-8 control-label">Bull ID/Name</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="bullid" name="bullid" placeholder="Enter Bull ID/Name " >
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-8 control-label">No. of straws used</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="straws" name="straws" placeholder="Enter No. of straws used " >
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
    $('#roms-crud-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('roms-crud-datatable') }}",
           
           columns: [
                    { data: 'name', name: 'name' },
                    { data: 'address', name: 'address' },
                    { data: 'animal_id', name: 'animal_id' },
                    { data: 'breed', name: 'breed' },
                    { data: 'born', name: 'born' },
                    { data: 'bcs', name: 'bcs' },
                    { data: 'lastcalving', name: 'lastcalving' },
                    { data: 'romsdate', name: 'romsdate' },
                    { data: 'ovarian', name: 'ovarian' },
                    { data: 'result', name: 'result' },
                    { data: 'ai', name: 'ai' },
                    { data: 'ut', name: 'ut' },
                    { data: 'w_iec', name: 'w_iec' },
                    { data: 'bullid', name: 'bullid' },
                    { data: 'straws', name: 'straws' },
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
 
       $('#RomsForm').trigger("reset");
       $('#RomsModal').html("Add ");
       $('#roms-modal').modal('show');
       $('#id').val('');
 
  }   


  //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

  $('#roms-archive-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('roms-archive-datatable') }}",
           columns: [
                    { data: 'name', name: 'name' },
                    { data: 'address', name: 'address' },
                    { data: 'animal_id', name: 'animal_id' },
                    { data: 'breed', name: 'breed' },
                    { data: 'born', name: 'born' },
                    { data: 'bcs', name: 'bcs' },
                    { data: 'lastcalving', name: 'lastcalving' },
                    { data: 'romsdate', name: 'romsdate' },
                    { data: 'ovarian', name: 'ovarian' },
                    { data: 'result', name: 'result' },
                    { data: 'ai', name: 'ai' },
                    { data: 'ut', name: 'ut' },
                    { data: 'w_iec', name: 'w_iec' },
                    { data: 'bullid', name: 'bullid' },
                    { data: 'straws', name: 'straws' },
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
              url: "{{ url('roms/archive') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#roms-archive-datatable').DataTable();
                  var oTable = $('#roms-crud-datatable').DataTable();
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
              url: "{{ url('roms/restore') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#roms-archive-datatable').DataTable();
                  var oTable = $('#roms-crud-datatable').DataTable();
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
              url: "{{ url('delete-roms') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
 
                var oTableArc = $('#roms-archive-datatable').dataTable();
                oTableArc.fnDraw(false);
             }
          });
       }
  }

//  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //


  function editFunc(id){
     
    $.ajax({
        type:"POST",
        url: "{{ url('edit-roms') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#RomsModal').html("Edit ");
          $('#roms-modal').modal('show');
          $('#id').val(res.id);
          $('#name').val(res.name);
            $('#address').val(res.address);
            $('#animal_id').val(res.animal_id);
            $('#breed').val(res.breed);
            $('#born').val(res.born);
            $('#bcs').val(res.bcs);
            $('#lastcalving').val(res.lastcalving);
            $('#romsdate').val(res.romsdate);
            $('#ovarian').val(res.ovarian);
            $('#result').val(res.result);
            $('#ai').val(res.ai);
            $('#ut').val(res.ut);
            $('#w_iec').val(res.w_iec);
            $('#bullid').val(res.bullid);
            $('#straws').val(res.straws);
          $('#remark').val(res.remark);
       }
    });
  }  
  function printDataTable() {
                  $.ajax({
                      url: '/print-roms', // Replace with your Laravel route URL to fetch data
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

              // Function to print the data fetched from the server
              function printData(data) {
                  // Columns to exclude (you can adjust these according to your requirements)
                  const excludedColumns = ['created_at', 'updated_at'];
                 
                  const headers = ['No.','Name of Farmer', 'Address','Signature','Animal ID','Breed of Dam','BCS','Date of last calving',
                              'Date of ROMS(1)',"Ovarian",   'Result', 'Date of AI','UT', 'W/IEC', 'Bull ID/Name','No. of straws used','Remarks'];
                  // Create a new window for printing
                  let printWindow = window.open('', '_blank');
                  

                  // Construct the HTML content to be printed with CSS styles for table borders
                  let htmlContent = `
                      <html>
                      <head>
                          <title>Vaccination Report Print</title>
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
                              .container {
                                  display: flex;
                                justify-content: center;
                                  align-items: center;
                              }
                              p{
                                  margin-left: 15px;
                                  margin-top:-10px;
                              }
                              .pnum{
                                  margin-top:-20px;
                              }
                              .pone{
                                margin-top:10px;
                                text-align:left;
                                
                              }
                              
                              }
                          </style>
                      </head>
                      <body>
                        <h5 style="text-align:center;">Reproductive Organ Monitoring and Stimulation (ROMS)Protocol</h>
                        
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
                          <div style="display: flex; margin-top: 30px;">
    <div>
        <p>Prepared by:</p>
        <div>________{{ Auth::user()->name }}________</div>
        <div>Name & signature of AI Technician</div>
    </div>
    <div>
        <p>Breed</p>
        <p><b>SP</b>-Native Carabao</p>
        <p><b>CB</b>-Cross Breed</p>
        <p><b>RV</b>-Riverine buffalo</p>
    </div>
    <div style="margin-top:10px">
        <p><b>RO</b>-right ovary</p>
        <p><b>LO</b>-left ovary</p>
    </div>
    <div style="margin-top:10px">
        <p><b>NH</b>-Natural Heat</p>
        <p><b>ES</b>-Estrus synchronized</p>
        <p><b>P</b>-Pregnant</p>
    </div>
    <div style="margin-top:10px">
        <p><b>Y</b>-Young</p>
        <p><b>NM</b>-Newly Mated</p>
        <p><b>T</b>-thin(BSCS 2.5 & Below)</p>
        <p><b>CLL</b>-corpus luteum large</p>
    </div>
    <div>
        <p><b>Result</b></p>
    </div>
    <div style="margin-top:10px">
        <p><b>PP</b>-Post Partum</p>
        <p><b>NS</b>-no palpable structure</p>
        <p><b>RF</b>-ruftured follicle</p>
        <p><b>CLS</b>-corpus luteum small</p>
    </div>
    <div style="margin-top:10px">
        <p><b>E</b>-elongated</p>
        <p><b>VS</b>-very small</p>
        <p><b>GF</b>-graafian follicle</p>
    </div>
    <div>
        <p><b>UT-Uterine</b></p>
        <p><b>1</b>-soft</p>
        <p><b>2</b>-hard</p>
        <p><b>3</b>-very hard</p>
    </div>
</div>

<p class="pone">P1-Reproductive Organ Simulation is done by gently massaging the reproductive organ for 17 seconds</p>
<h5 style="text-indent:30px; margin-top:-20px">Action Protocol</h5>
<p class="pnum">P2-if CLL, monitor for heat within a week or heat induce and AI in 72 hours</p>
<p class="pnum">P3-if CLS, inject ADE or deworm or uterine flushing then follow up ROMS after 7 days, if CLL induce heat then AI following P2, if CLS heat induce and observe heat in 3-5 days</p>
<p class="pnum">P4- if NS, inject ADE or deworm uterine flushing then follow up ROMS after 2 weeks, if it develops to CLS or CCL induce heat then AI, if still NS needs further observation</p>
<p class="pnum">P5-If GF, monitor for estrus within 2-4 days</p>
<p class="pnum"><b>*Recommended first ROMS on the 28th day of calving & 7 days interval until 3rd ROMS</b></p>
<p> Procedure for flushing:</p>
<div style="display: flex; margin-left:60px">
    <div>
        <p>1. Use a syringe to withdraw the 4% povidone-iodine solution</p>
        <p>3. Open the vulva & deposit the solution on the uterus guided by hand through rectal palpation</p>
    </div>
    <div>
        <p>2. Attach a straw sheath on the syringe</p>
        <p>4. Deposit into the uterus a total of 120 ml povidone iodine solution</p>
    </div>
</div>
<table>
    <tr>
        <th>Form No.:PCCUS-AIQF26</th>
        <th>Revision No.:00</th>
        <th>Effectivity Date: June 8,2020</th>
    </tr>
</table>
<h6 style="margin-top:1px;">Retention Period:1 year</h6>
</body>
                      </body>
                      </html>
                  `;

                  // Write the HTML content to the new window and print it
                  printWindow.document.write(htmlContent);
                  printWindow.document.close();
                  printWindow.print();
              }
 
  $('#RomsForm').submit(function(e) {
 
     e.preventDefault();
   
     var formData = new FormData(this);
   
     $.ajax({
        type:'POST',
        url: "{{ url('store-roms')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#roms-modal").modal('hide');
          var oTable = $('#roms-crud-datatable').dataTable();
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

          // Make an Ajax request to check if the name exists
          $.ajax({
              url: '{{ route("check.name") }}', // Update with your actual route
              method: 'POST',
              data: {
                  _token: '{{ csrf_token() }}',
                  name: nameValue
              },
              success: function (response) {
                  // Update the validation message based on the response
                  if (response.exists) {
                      $('#name-validation-message').text('Name already exists in the database.');
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