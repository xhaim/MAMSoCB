<script type="text/javascript">
      
    $(document).ready( function () {
    
     $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
       $('#fert-crud-datatable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('fert-crud-datatable') }}",
              columns: [
                       // { data: 'id', name: 'id' },
                       { data: 'seeds_received', name: 'seeds_received' },
                       { data: 'date_received', name: 'date_received' },
                       { data: 'source_of_funds', name: 'source_of_funds' },
                       { data: 'created_at', name: 'created_at' },
                       {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
          });
    
     });
      
     function add(){
    
          $('#FertForm').trigger("reset");
          $('#FertModal').html("Add Fertilizer");
          $('#fert-modal').modal('show');
          $('#id').val('');
    
     }   
     function editFunc(id){
        
       $.ajax({
           type:"POST",
           url: "{{ url('edit-fert') }}",
           data: { id: id },
           dataType: 'json',
           success: function(res){
             $('#FertModal').html("Edit Fertilizer");
             $('#fert-modal').modal('show');
             $('#id').val(res.id);
             $('#seeds_received').val(res.seeds_received);
             $('#date_received').val(res.date_received);
             $('#sources_of_funds').val(res.sources_of_funds);
          }
       });
     }  
    
//  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

  $('#fert-archive-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('fert-archive-datatable') }}",
        columns: [ 
                      { data: 'seeds_received', name: 'seeds_received' },
                       { data: 'date_received', name: 'date_received' },
                       { data: 'source_of_funds', name: 'source_of_funds' },
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
              url: "{{ url('fert/archive') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#fert-archive-datatable').DataTable();
                  var oTable = $('#fert-crud-datatable').DataTable();
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
              url: "{{ url('fert/restore') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#fert-archive-datatable').DataTable();
                  var oTable = $('#fert-crud-datatable').DataTable();
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
              url: "{{ url('delete-fert') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
 
                var oTable = $('#fert-archive-datatable').dataTable();
                oTable.fnDraw(false);
             }
          });
       }
  }

//  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //

    
     $('#FertForm').submit(function(e) {
    
        e.preventDefault();
      
        var formData = new FormData(this);
      
        $.ajax({
           type:'POST',
           url: "{{ url('store-fert')}}",
           data: formData,
           cache:false,
           contentType: false,
           processData: false,
           success: (data) => {
             $("#fert-modal").modal('hide');
             var oTable = $('#fert-crud-datatable').dataTable();
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