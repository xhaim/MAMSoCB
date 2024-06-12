
<script>
    // script for the view/<i class="fas fa-eye-slash">Archive</i> button
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
        toggleButton.innerHTML = '<i class="fas fa-eye-slash">Archive</i> ';
      }
    }
  </script>


  <script>
    // Trapping of Association Name
    $(document).ready(function () {
        $('#association').on('input', function () {
            var associationValue = $(this).val();
  
            // Make an Ajax request to check if the Name of Association exists
            $.ajax({
                url: '{{ route("check.association") }}', // Update with your actual route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    association: associationValue
                },
                success: function (response) {
                    // Update the validation message based on the response
                    if (response.exists) {
                        $('#association-validation-message').text('Association name already exists');
                    } else {
                        $('#association-validation-message').text('');
                    }
                },
                error: function (error) {
                    console.error('Error checking Association name:', error);
                }
            });
        });
    });
  </script>