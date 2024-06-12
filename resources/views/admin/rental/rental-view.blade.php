<script type="text/javascript">
        
    $(document).ready( function () {
    
     $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
       $('#rental-crud-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('rental-crud-datatable') }}",
              columns: [
                        { data: 'applicant', name: 'applicant' },
                        { data: 'address', name: 'address' },
                        { data: 'location', name: 'location' },
                        { data: 'project_description', name: 'project_description' },
                        { data: 'contact', name: 'contact' },
                        { data: 'actual_land_area_of_farm', name: 'actual_land_area_of_farm' },
                        { data: 'date_inspected', name: 'date_inspected'  },
                        { data: 'created_at', name: 'created_at' },
                        {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
          });
    
     });
      
     function add(){
    
          $('#RentalForm').trigger("reset");
          $('#RentalModal').html("Add Rental Tractor");
          $('#rental-modal').modal('show');
          $('#id').val('');
    
     } 

     function editFunc(id){
        
       $.ajax({
           type:"POST",
           url: "{{ url('edit-rental') }}",
           data: { id: id },
           dataType: 'json',
           success: function(res){
             $('#RentalModal').html("Edit Rental Tractor");
             $('#rental-modal').modal('show');
             $('#id').val(res.id);
            $('#applicant').val(res.applicant);
            $('#address').val(res.address);
            $('#location').val(res.location);
            $('#project_description').val(res.project_description);
            $('#contact').val(res.contact);
            $('#actual_land_area_of_farm').val(res.actual_land_area_of_farm);
            $('#date_inspected').val(res.date_inspected);
            $('#inspector').val(res.inspector);
            $('#fuel_requirement').val(res.fuel_requirement);
            $('#hours_of_operation').val(res.hours_of_operation);
            

            const equipmentString = res.equipment;    
            const equipmentArray = JSON.parse(equipmentString);
            Object.freeze(equipmentArray); // Freeze the array to make it a constant

            equipmentArray.forEach(item => {
                const checkboxId = item.toLowerCase().replace(/\s/g, '_'); // Generate checkbox ID
                const checkbox = document.getElementById(checkboxId);
                
                if (checkbox) {
                    checkbox.checked = true; // Check the checkbox if the item exists in the array
                }
            });

            console.log(equipmentArray);




            $('#area').val(res.area);
            $('#rental_rate').val(res.rental_rate);
            $('#total_rental_amount').val(res.total_rental_amount);
            $('#payment').val(res.payment);
            $('#or_number').val(res.or_number);
            $('#payment_date').val(res.payment_date);
            $('#payment_amount').val(res.payment_amount);
            $('#municipal_treasurer').val(res.municipal_treasurer);
            $('#source_of_fund').val(res.source_of_fund);
            $('#funds_available').val(res.funds_available);
            $('#municipal_accountant').val(res.municipal_accountant);
            $('#municipal_budget_officer').val(res.municipal_budget_officer);
            $('#municipal_mayor').val(res.municipal_mayor);
            $('#schedule_of_operation').val(res.schedule_of_operation);
            $('#plate_number_tractor').val(res.plate_number_tractor);
            $('#mao_tractor_incharge').val(res.mao_tractor_incharge);
            $('#actual_land_area_served').val(res.actual_land_area_served);
            $('#actual_hours_of_operation').val(res.actual_hours_of_operation);
            $('#remarks').val(res.remarks);
            $('#mo_field_inspector').val(res.mo_field_inspector);

            console.log(res);

           }
       });
     }  


     function viewFunc(id) {
    $.ajax({
        type: "GET",
        url: "{{ url('get-rental-details') }}/" + id,
        success: function (data) {
            // Populate the modal with record details
            $("#view-applicant").text(data.applicant);
            $("#view-address").text(data.address);
            $("#view-location").text(data.location);
            $("#view-project_description").text(data.project_description);
            $("#view-contact").text(data.contact);
            $('#view-actual_land_area_of_farm').text(data.actual_land_area_of_farm);
            $('#view-date_inspected').text(data.date_inspected);
            $("#view-inspector").text(data.inspector);
            $("#view-fuel_requirement").text(data.fuel_requirement);
            $("#view-hours_of_operation").text(data.hours_of_operation);
            $("#view-equipment").text(data.equipment);
            $("#view-area").text(data.area);
            $("#view-rental_rate").text(data.rental_rate);
            $("#view-total_rental_amount").text(data.total_rental_amount);
            $("#view-payment").text(data.payment);
            $("#view-or_number").text(data.or_number);
            $("#view-payment_date").text(data.payment_date);
            $("#view-payment_amount").text(data.payment_amount);
            $("#view-municipal_treasurer").text(data.municipal_treasurer);
            $("#view-source_of_fund").text(data.source_of_fund);
            $("#view-funds_available").text(data.funds_available);
            $("#view-municipal_accountant").text(data.municipal_accountant);
            $("#view-municipal_budget_officer").text(data.municipal_budget_officer);
            $("#view-municipal_mayor").text(data.municipal_mayor);
            $("#view-schedule_of_operation").text(data.schedule_of_operation);
            $("#view-plate_number_tractor").text(data.plate_number_tractor);
            $("#view-mao_tractor_incharge").text(data.mao_tractor_incharge);
            $("#view-actual_land_area_served").text(data.actual_land_area_served);
            $("#view-actual_hours_of_operation").text(data.actual_hours_of_operation);
            $("#view-remarks").text(data.remarks);
            $("#view-mo_field_inspector").text(data.mo_field_inspector);
            // Add more fields as needed

            // Show the modal
            $("#viewModal").modal("show");
        },
        error: function (data) {
            console.log("Error:", data);
        },
    });
}
    
     //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

     $('#rental-archive-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('rental-archive-datatable') }}",
              columns: [ 
                        { data: 'applicant', name: 'applicant' },
                        { data: 'address', name: 'address' },
                        { data: 'location', name: 'location' },
                        { data: 'project_description', name: 'project_description' },
                        { data: 'contact', name: 'contact' },
                        { data: 'actual_land_area_of_farm', name: 'actual_land_area_of_farm' },
                        { data: 'date_inspected', name: 'date_inspected'  },
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
                    url: "{{ url('rental/archive') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#rental-archive-datatable').DataTable();
                        var oTable = $('#rental-crud-datatable').DataTable();
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
                    url: "{{ url('rental/restore') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#rental-archive-datatable').DataTable();
                        var oTable = $('#rental-crud-datatable').DataTable();
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
                    url: "{{ url('delete-rental') }}",
                    data: { id: id },
                    dataType: 'json',
                    success: function (response) {
                        // Handle success, e.g., show a success message
                        console.log(response.success);
                        // Optionally, you may want to refresh the data table
                        var ArcTable = $('#rental-archive-datatable').DataTable();
                        var oTable = $('#rental-crud-datatable').DataTable();
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

 
    
   // Function to check for conflicts in the schedule_of_operation field
function checkScheduleConflict(schedule) {
    var conflict = false;

    // Check if the selected date is in the past
    var selectedDate = new Date(schedule);
    var currentDate = new Date();

    if (selectedDate < currentDate) {
        alert('Please choose a date equal to or later than today.');
        $('#schedule_of_operation').val("");
        return true; // Return true to indicate a conflict
    }

    // Make an Ajax request to the server to check for conflicts
    $.ajax({
        type: 'POST',
        url: "{{ url('check-schedule-conflict')}}",
        data: { schedule: schedule },
        async: false,
        success: function (response) {
            conflict = response.conflict;
        },
        error: function (error) {
            console.error('Error checking schedule conflict:', error);
        }
    });

    // Show an alert message if there's a conflict
    if (conflict) {
        alert('Schedule conflict detected! Please choose a different schedule.');
        $('#schedule_of_operation').val("");
    }

    return conflict; // Return true if there's a conflict, false otherwise
}

// Add an event listener for the input event on the "schedule_of_operation" field
$(document).ready(function () {
    $('#schedule_of_operation').on('input', function () {
        var scheduleValue = $(this).val(); // Get the value of the "schedule_of_operation" field
        checkScheduleConflict(scheduleValue); // Trigger the conflict check with the schedule value
    });
});

// Modify the form submission logic
$('#RentalForm').submit(function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    var scheduleOfOperation = formData.get('schedule_of_operation');

    // Check for conflicts and past dates before submitting the form
    if (checkScheduleConflict(scheduleOfOperation)) {
        // If there's a conflict or past date, do not submit the form
        return;
    }

    $.ajax({
        type: 'POST',
        url: "{{ url('store-rental')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $("#rental-modal").modal('hide');
            var oTable = $('#rental-crud-datatable').dataTable();
            oTable.fnDraw(false);
            $("#btn-save").html('Submit');
            $("#btn-save").attr("disabled", false);
        },
        error: function (data) {
            console.log(data);
        }
    });
});

    
   </script>

  {{-- View Modal JS SCRIPT --}}
  <script>
    var printClicked = false; // Initialize a flag variable

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        // Set the flag to true when printDiv is clicked
        printClicked = true;

        window.onafterprint = function() {
            document.body.innerHTML = originalContents;
        };

        window.print();
    }

    function closeviewModal() {
        var addRoomModal = document.getElementById("viewModal");
        addRoomModal.classList.remove('show');
        $("#viewModal").modal('hide');
        setTimeout(function() {
            var modalBackdrop = document.querySelector('.modal-backdrop.fade.show');
            if (modalBackdrop) {
                modalBackdrop.remove('show');
            }
            
            // Check if printDiv was clicked before running location.reload()
            if (printClicked) {
                location.reload();
            }
        }, 400);
    }
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