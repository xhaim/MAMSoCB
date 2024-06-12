<script type="text/javascript">
      
    $(document).ready( function () {
    
     $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
       $('#ricehybrid-crud-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('ricehybrid-crud-datatable') }}",
              columns: [
                      
                       { data: 'rsbsa', name: 'rsbsa' },
                       { data: 'name_first', name: 'name_first' },
                       { data: 'name_middle', name: 'name_middle' },
                       { data: 'name_last', name: 'name_last' },
                       { data: 'barangay', name: 'barangay' },
                       { data: 'farm_location', name: 'farm_location' },
                       { data: 'birthdate', name: 'birthdate' },
                       { data: 'sex', name: 'sex' },
                       {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
          });
    
     });
      
     function add(){
    
          $('#FarmersForm').trigger("reset");
          $('#FarmersModal').html("Add Farmer");
          $('#farmers-modal').modal('show');
          $('#id').val('');
    
     }   
     function editFunc(id){
        
       $.ajax({
           type:"POST",
           url: "{{ url('edit-ricehybrid') }}",
           data: { id: id },
           dataType: 'json',
           success: function(res){
             $('#FarmersModal').html("Edit Farmer");
             $('#farmers-modal').modal('show');
             $('#id').val(res.id);
             $('#rsbsa').val(res.rsbsa);
             $('#name_first').val(res.name_first);
             $('#name_middle').val(res.name_middle);
             $('#name_last').val(res.name_last);
             $('#suffix').val(res.suffix);
             $('#barangay').val(res.barangay);
             $('#farm_location').val(res.farm_location);
             $('#birthdate').val(res.birthdate);
             $('#farm_area').val(res.farm_area);
             $('#sex').val(res.sex);

             const membershipString = res.membership;    
            const membershipArray = JSON.parse(membershipString);
            Object.freeze(membershipArray); // Freeze the array to make it a constant

            membershipArray.forEach(item => {
                const checkboxId = item; // Generate checkbox ID
                const checkbox = document.getElementById(checkboxId);
                
                if (checkbox) {
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
            });

            console.log(membershipArray);

             $('#quantity').val(res.quantity);
             $('#date_received').val(res.date_received);
          }
       });
     }  
    
     function viewFunc(id) {
       $.ajax({
           type: "GET",
           url: "{{ url('get-farmer-details') }}/" + id,
           success: function (data) {
               // Populate the modal with record details
               $("#view-rsbsa").text(data.rsbsa);
               $("#view-name").text(data.name_first + ' ' + data.name_middle + ' ' + data.name_last);
               $("#view-barangay").text(data.barangay);
               $("#view-farm_location").text(data.farm_location);
               $("#view-birthdate").text(data.birthdate);
               $("#view-farm_area").text(data.farm_area);
               $("#view-sex").text(data.sex);
               $("#view-membership").text(data.membership);
               $("#view-quantity").text(data.quantity);
               $("#view-date_received").text(data.date_received);
   
               // Show the modal
               $("#viewModal").modal("show");
           },
           error: function (data) {
               console.log("Error:", data);
           },
       });
   }
  
  
  /////////////////////start of archive data///////////
  $('#ricehybrid-archive-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('ricehybrid-archive-datatable') }}",
        columns: [
            { data: 'rsbsa', name: 'rsbsa' },
                       { data: 'name_first', name: 'name_first' },
                       { data: 'name_middle', name: 'name_middle' },
                       { data: 'name_last', name: 'name_last' },
                       { data: 'barangay', name: 'barangay' },
                       { data: 'farm_location', name: 'farm_location' },
                       { data: 'birthdate', name: 'birthdate' },
                       { data: 'sex', name: 'sex' },
                       {data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
    });

  function archiveFunc(id) {
      if (confirm("Archive Record?") == true) {
          // Make an AJAX request to the archive route
          $.ajax({
              type: "POST",
              url: "{{ url('ricehybrid/archive') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#ricehybrid-archive-datatable').DataTable();
                  var oTable = $('#ricehybrid-crud-datatable').DataTable();
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
              url: "{{ url('ricehybrid/restore') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#ricehybrid-archive-datatable').DataTable();
                  var oTable = $('#ricehybrid-crud-datatable').DataTable();
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
              url: "{{ url('delete-ricehybrid') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
 
                var oTable = $('#ricehybrid-archive-datatable').dataTable();
                oTable.fnDraw(false);
             }
          });
       }
  }

//  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //
    
// START OF PRINT // START OF PRINT // START OF PRINT 
        function printModal(){
                    // $('#RiceBar').html("Edit Rice");
                    $('#riceprint-modal').modal('show');
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
                    $('#riceprint-modal').modal('hide');
            }
            // AJAX request to fetch data from the server
            function printDataTable() {
                    $.ajax({
                        url: '/print-rice', // Replace with your Laravel route URL to fetch data
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
                        url: '/print-ricebar', // Replace with your Laravel route URL to fetch data
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

                const headers = ['No.', 'RSBSA No.',
                { name: "Farmer's Name", columns: ['Firstname', 'Middle', 'Last','Suffix'] },'Barangay', 'Farm Location', 'Birthdate',
                'Farm Area', 'Sex', 'Membership', 'Quantity', 'DateReceived'];

                // Create a new window for printing
                let printWindow = window.open('', '_blank');

                // Construct the HTML content to be printed with CSS styles for table borders
                let htmlContent = `
                    <html>
                    <head>
                        <title>Data Table Print</title>
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
                        <h4>Republic of the Philippines</h4>
                        <h4 style="margin-top:-20px;">Regional Field Office No. VII</h4>
                        <h3 style="margin-top:-20px;"> Office of the Regional Executive Director</h3>
                        <h3 style="margin-top:-17px;"> DA-RFO 7 Complex, Highway Maguikay, Mandaue City 6014, Cebu</h3>
                        <h4 style="margin-top:-17px;">Tel. No. (032)268-5187;Email:redoffice7@gmail.com</h4>
                        <br>
                        <h5 style="margin-top:-20px;">SIGNED MASTERLIST OF BENEFICIATIES-HYBRID RICE FEEDS</h5>
                        <h5 style="margin-top:-20px;">RICE PROGRAM (PRODUCTION SUPPORT SERVICES)</h5>
                        <div style="text-align:left;">
                        <h5 style="margin-top:-20px;">PROVINCE: BOHOL</h5>
                        <h5 style="margin-top:-20px;">MUNICIPALITY: CARMEN</h5>
                        </div>
                        

                        <table>
                `;

                // Adding table headers
            headers.forEach(header => {
                if (typeof header === 'object') {
                    htmlContent += `<th colspan="${4}" style="text-align:center;">${header.name}</th>`;
                } else if (!excludedColumns.includes(header)) {
                    htmlContent += `<th rowspan="${2}" style="text-align:center;">${header}</th>`;
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
                                    const cellValue = row[key] !== null ? row[key] : ''; // Check for null and replace with an empty string
                                    htmlContent += '<td>' + cellValue + '</td>';
                                }
                            }
                            htmlContent += '</tr>';
                        });

                htmlContent += `
                        </table>

                        <table class="tg" style="border:none;">
                            <thead style="border:none;">
                            <tr style="border:none;">
                                <th style="border:none;" class="tg-0lax">Prepared by:</th>
                                <th style="border:none;" class="tg-0lax">Noted by:</th>
                                <th style="border:none;" class="tg-0lax">Certified/Corrected by:</th>
                                <th style="border:none;" class="tg-0lax"></th>
                            </tr>
                            </thead>
                            <tbodystyle="border:none;">
                            <tr style="border:none;">
                                <td style="border:none;" class="tg-0lax">Municipal/City Program Coordinator:</td>
                                <td style="border:none;" class="tg-0lax">
                                    <h5>ARLENE D. CABUSAO</h5>
                                    <br>
                                    <p style="margin-top:-40px;">Municipal/City Agriculturist</p>
                                </td>
                                <td style="border:none;" class="tg-0lax">
                                    <h5>ROMAN M. DABALOS</h5>
                                    <br>
                                    <p style="margin-top:-40px;">DA 7 Program Representative</p>
                                </td>
                                <td style="border:none;" class="tg-0lax"></td>
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


            
     $('#FarmersForm').submit(function(e) {
    
        e.preventDefault();
      
        var formData = new FormData(this);
      
        $.ajax({
           type:'POST',
           url: "{{ url('store-ricehybrid')}}",
           data: formData,
           cache:false,
           contentType: false,
           processData: false,
           success: (data) => {
             $("#farmers-modal").modal('hide');
             var oTable = $('#ricehybrid-crud-datatable').dataTable();
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
       $(document).ready(function() {
           // Add a change event listener to the farm_area input
           $('#farm_area').on('change', function() {
               // Get the entered value
               var value = $(this).val();
               
               // Check if the value is a valid decimal
               if (/^\d+(\.\d{1,2})?$/.test(value)) {
                   // Valid decimal format
                   $(this).removeClass('is-invalid'); // Remove validation styling
               } else {
                   // Invalid format
                   $(this).addClass('is-invalid'); // Add validation styling
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
        $('#rsbsa').on('input', function () {
            var rsbsaValue = $(this).val();

            // Make an Ajax request to check if the RSBSA ID exists
            $.ajax({
                url: '{{ route("check.rsbsa") }}', // Update with your actual route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rsbsa: rsbsaValue
                },
                success: function (response) {
                    // Update the validation message based on the response
                    if (response.exists) {
                        $('#rsbsa-validation-message').text('RSBSA ID already exists');
                    } else {
                        $('#rsbsa-validation-message').text('');
                    }
                },
                error: function (error) {
                    console.error('Error checking RSBSA ID:', error);
                }
            });
        });
    });
</script>

