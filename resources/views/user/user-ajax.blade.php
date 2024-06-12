<script type="text/javascript">
      
    $(document).ready( function () {
    
     $.ajaxSetup({
       headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
       $('#user-management').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ url('user-management') }}",
              columns: [
                      
                       { data: 'role', name: 'role' },
                       { data: 'name', name: 'name' },
                       { data: 'email', name: 'email' },
                       {data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
          });
    
     });
      
     function add(){
    
          $('#UsersForm').trigger("reset");
          $('#UsersModal').html("Add User");
          $('#users-modal').modal('show');
          $('#id').val('');
    
     }   
     function editFunc(id){
        
       $.ajax({
           type:"POST",
           url: "{{ url('edit-user') }}",
           data: { id: id },
           dataType: 'json',
           success: function(res){
             $('#UsersModal').html("Edit User");
             $('#users-modal').modal('show');
             $('#id').val(res.id);
             $('#name').val(res.name);
             $('#email').val(res.email);
             $('#role').val(res.role);
             $('#passwd').attr('hidden','hidden');
          }
       });
     }  
    
     function viewFunc(id) {
       $.ajax({
           type: "GET",
           url: "{{ url('get-user-details') }}/" + id,
           success: function (data) {
               // Populate the modal with record details
               $("#view-role").text(data.role);
               $("#view-name").text(data.name);
               $("#view-email").text(data.email);   
               // Show the modal
               $("#viewModal").modal("show");
           },
           error: function (data) {
               console.log("Error:", data);
           },
       });
   }
   
     function deleteFunc(id){
           if (confirm("Delete Record?") == true) {
           var id = id;
             
             // ajax
             $.ajax({
                 type:"POST",
                 url: "{{ url('delete-user') }}",
                 data: { id: id },
                 dataType: 'json',
                 success: function(res){
    
                   var oTable = $('#user-management').dataTable();
                   oTable.fnDraw(false);
                }
             });
          }
     }


    
     $('#UsersForm').submit(function(e) {
    
        e.preventDefault();
      
        var formData = new FormData(this);
      
        $.ajax({
           type:'POST',
           url: "{{ url('store-user')}}",
           data: formData,
           cache:false,
           contentType: false,
           processData: false,
           success: (data) => {
             $("#users-modal").modal('hide');
             var oTable = $('#user-management').dataTable();
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
       function toggleInputVisibility() {
    var inputElement = document.getElementById("passwd");
    inputElement.hidden = !inputElement.hidden;
}

   </script>
