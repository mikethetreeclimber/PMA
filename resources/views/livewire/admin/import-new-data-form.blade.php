<div>
    <div class="form-group">
        @if($success)
        <x-adminlte-alert theme="success" dismissable >Data successfully imported</x-adminlte-alert>
        @endif
        @if($failure)
        <x-adminlte-alert theme="danger" dismissable >Something went wrong. Please refresh and try again.</x-adminlte-alert>
        @endif
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="file_upload" onchange="upload()">
            <label class="custom-file-label" for="file_upload">Choose file</label>
        </div>

        <div id="json-result"></div>
    </div>
    @push('import-script')
        <script>
            var result = {};
            // Method to upload a valid excel file
            function upload() {
                var files = document.getElementById('file_upload').files;
                if (files.length == 0) {
                    alert("Please choose any file...");
                    return;
                }
                var filename = files[0].name;
                var extension = filename.substring(filename.lastIndexOf(".")).toUpperCase();
                if (extension == '.XLS' || extension == '.XLSX') {
                    excelFileToJSON(files[0]);
                } else {
                    alert("Please select a valid excel file.");
                }
            }
            //Method to read excel file and convert it into JSON 
            function excelFileToJSON(file) {
                try {
                    var reader = new FileReader();
                    reader.readAsArrayBuffer(file);
                    reader.onload = function(e) {
                        var data = e.target.result;

                        var workbook = XLSX.read(data, {
                            type: 'binary'
                        });
                        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets['Sheet1']);
                        roa.forEach(function(row) {

                            row['Create Date'] = convertDate(row['Create Date'])
                            if (row['Complete Date']) {
                                row['Complete Date'] = convertDate(row['Complete Date'])
                            } else {
                                return
                            }
                            if (row['First Notification Date']) {
                                row['First Notification Date'] = convertDate(row['First Notification Date'])
                            } else {
                                return
                            }
                            if (row['Second Notification Date']) {
                                row['Second Notification Date'] = convertDate(row['Second Notification Date'])
                            } else {
                                return
                            }
                            if (row['Final Notification Date']) {
                                row['Final Notification Date'] = convertDate(row['Final Notification Date'])
                            } else {
                                return
                            }
                            if (row['Refusal Date']) {
                                row['Refusal Date'] = convertDate(row['Refusal Date'])
                            } else {
                                return
                            }
                        });
                        result = roa;
                        @this.set('worksiteImport', result);
                    }
                } catch (e) {
                    console.error(e);
                }

            }

            //convert dates 
            function convertDate(timestamp) {
                date = new Date(Math.round((timestamp - 25569) * 86400 * 1000));
                return date.toLocaleDateString() + ' ' + date.toLocaleTimeString();

            }
        </script>
    @endpush

</div>
