<form action="/upload-csv-registry" method="post" enctype="multipart/form-data">
    @csrf
    <input id="csvFileInput" type="file" name="csv_file" accept=".csv">
    <button id="uploadButton" class="btn-success" type="submit" style="display: none;">Import CSV</button>
</form>

<script>
    document.getElementById('csvFileInput').addEventListener('change', function() {
        var uploadButton = document.getElementById('uploadButton');
        // Check if the file input has a file selected
        if (this.files.length > 0) {
            uploadButton.style.display = 'inline-flex'; // Show the button
        } else {
            uploadButton.style.display = 'none'; // Hide the button
        }
    });
</script>