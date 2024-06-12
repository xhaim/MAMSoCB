
<script type="text/javascript">
      
 $(document).ready( function () {
 
  $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#riceseeds-crud-datatable').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ url('riceseeds-crud-datatable') }}",
           columns: [
                   
                    { data: 'variety', name: 'variety' },
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
 
       $('#RiceSeedsForm').trigger("reset");
       $('#RiceSeedsModal').html("Add Rice Seeds");
       $('#riceseeds-modal').modal('show');
       $('#id').val('');
 
  }   

  function editFunc(id){
     
    $.ajax({
        type:"POST",
        url: "{{ url('edit-riceseeds') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
          $('#RiceSeedsModal').html("Edit");
          $('#riceseeds-modal').modal('show');
          $('#id').val(res.id);
          $('#variety').val(res.variety);
          $('#seeds_received').val(res.seeds_received);
          $('#date_received').val(res.date_received);
          $('#source_of_funds').val(res.source_of_funds);
       }
    });
  }  

//  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //  START ARCHIVE AJAX   //

  $('#riceseeds-archive-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('riceseeds-archive-datatable') }}",
        columns: [ 
                { data: 'variety', name: 'variety' },
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
              url: "{{ url('rice-seeds/archive') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#riceseeds-archive-datatable').DataTable();
                  var oTable = $('#riceseeds-crud-datatable').DataTable();
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
              url: "{{ url('rice-seeds/restore') }}",
              data: { id: id },
              dataType: 'json',
              success: function (response) {
                  // Handle success, e.g., show a success message
                  console.log(response.success);
                  // Optionally, you may want to refresh the data table
                  var ArcTable = $('#riceseeds-archive-datatable').DataTable();
                  var oTable = $('#riceseeds-crud-datatable').DataTable();
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
              url: "{{ url('delete-riceseeds') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
 
                var oTable = $('#riceseeds-archive-datatable').dataTable();
                oTable.fnDraw(false);
             }
          });
       }
  }

//  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //  END ARCHIVE AJAX   //

 
  $('#RiceSeedsForm').submit(function(e) {
 
     e.preventDefault();
   
     var formData = new FormData(this);
   
     $.ajax({
        type:'POST',
        url: "{{ url('store-riceseeds')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $("#riceseeds-modal").modal('hide');
          var oTable = $('#riceseeds-crud-datatable').dataTable();
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
        toggleButton.innerHTML = '   Archive';
      } else {
        div1.setAttribute('hidden', 'hidden');
        div2.removeAttribute('hidden');
        toggleButton.innerHTML = '<i class="fas fa-eye-slash"></i> Archive';
      }
    }
  </script>