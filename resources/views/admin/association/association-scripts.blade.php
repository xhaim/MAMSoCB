<script>
    function viewFunc(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('get-association-details') }}/" + id,
            success: function (data) {
                // Populate the modal with record details
                $("#view-association").text(data.association);
                $("#view-barangay").text(data.barangay);
                $("#view-chairman").text(data.chairman);
                $("#view-contact").text(data.contact);
                $("#view-no_of_farmers").text(data.no_of_farmers);
                $("#view-registered").text(data.registered);
                // Add more fields as needed
  
                // Show the modal
                $("#viewModal").modal("show");
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    }
  </script>
  </body>
  <script type="text/javascript">
        
   $(document).ready( function () {
   
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
      $('#assoc-crud-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ url('assoc-crud-datatable') }}",
             columns: [
                      
                      { data: 'association', name: 'association' },
                      { data: 'barangay', name: 'barangay' },
                      { data: 'chairman', name: 'chairman' },
                      { data: 'contact', name: 'contact' },
                      { data: 'no_of_farmers', name: 'no_of_farmers' },
                      { data: 'registered', name: 'registered' },
                      { data: 'created_at', name: 'created_at' },
                      {data: 'action', name: 'action', orderable: false},
                   ],
                   order: [[0, 'desc']]
         });
   
    });
     
    function add(){
   
         $('#AssocForm').trigger("reset");
         $('#AssocModal').html("Add Association");
         $('#assoc-modal').modal('show');
         $('#id').val('');
   
    }   
  
    //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //
  
    $('#assoc-archive-datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{ url('assoc-archive-datatable') }}",
             columns: [
                      { data: 'association', name: 'association' },
                      { data: 'barangay', name: 'barangay' },
                      { data: 'chairman', name: 'chairman' },
                      { data: 'contact', name: 'contact' },
                      { data: 'no_of_farmers', name: 'no_of_farmers' },
                      { data: 'registered', name: 'registered' },
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
                url: "{{ url('assoc/archive') }}",
                data: { id: id },
                dataType: 'json',
                success: function (response) {
                    // Handle success, e.g., show a success message
                    console.log(response.success);
                    // Optionally, you may want to refresh the data table
                    var ArcTable = $('#assoc-archive-datatable').DataTable();
                    var oTable = $('#assoc-crud-datatable').DataTable();
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
                url: "{{ url('assoc/restore') }}",
                data: { id: id },
                dataType: 'json',
                success: function (response) {
                    // Handle success, e.g., show a success message
                    console.log(response.success);
                    // Optionally, you may want to refresh the data table
                    var ArcTable = $('#assoc-archive-datatable').DataTable();
                    var oTable = $('#assoc-crud-datatable').DataTable();
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
                url: "{{ url('delete-assoc') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
   
                  var oTable = $('#assoc-archive-datatable').dataTable();
                  oTable.fnDraw(false);
               }
            });
         }
    }
  
  //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //
  
  
    function editFunc(id){
       
      $.ajax({
          type:"POST",
          url: "{{ url('edit-assoc') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#AssocModal').html("Edit Association");
            $('#assoc-modal').modal('show');
            $('#id').val(res.id);
            $('#association').val(res.association);
            $('#barangay').val(res.barangay);
            $('#chairman').val(res.chairman);
            $('#contact').val(res.contact);
            $('#no_of_farmers').val(res.no_of_farmers);
            $('#registered').val(res.registered);
          }
      });
    }  
   
    function printModal(){
            // $('#AssocBar').html("Edit Association");
            $('#assocprint-modal').modal('show');
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
            $('#assocprint-modal').modal('hide');
    }
     // AJAX request to fetch data from the server
     function printDataTable() {
            $.ajax({
                url: '/print-assoc', // Replace with your Laravel route URL to fetch data
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
                url: '/print-assocbar', // Replace with your Laravel route URL to fetch data
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
  
            const headers = [{columns:['No', 'Name of Association','Barangay', 'Chairman', 'Contact Number','Number of Farmers', 'Date Registered']}];
  
            // Create a new window for printing
            let printWindow = window.open('', '_blank');
            
  
            // Construct the HTML content to be printed with CSS styles for table borders
            let htmlContent = `
                <html>
                <head>
                    <title>Association Print</title>
                    <style>
                      body{
                          text-align:center;
                        }
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
  
              <h4>Association</h4>
  
  
                    <table>
            `;
  
           
  
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
                </body>
                </html>
            `;
  
            // Write the HTML content to the new window and print it
            printWindow.document.write(htmlContent);
            printWindow.document.close();
            printWindow.print();
        }
   
   
    $('#AssocForm').submit(function(e) {
   
       e.preventDefault();
     
       var formData = new FormData(this);
     
       $.ajax({
          type:'POST',
          url: "{{ url('store-assoc')}}",
          data: formData,
          cache:false,
          contentType: false,
          processData: false,
          success: (data) => {
            $("#assoc-modal").modal('hide');
            var oTable = $('#assoc-crud-datatable').dataTable();
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

@include('admin/association/association-trappingscript')