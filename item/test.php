<!-- HTML5 Input Form Elements -->
<input id="fileupload" type="file" name="fileupload" /> 
  <button id="upload-button" onclick="uploadFile()"> Upload </button>

  <!-- Ajax JavaScript File Upload Logic -->
  <script>
  async function uploadFile() {
  let formData = new FormData(); 
  formData.append("file", fileupload.files[0]);
  console.log(fileupload.files[0]);
  await fetch('/upload.php', {
    method: "POST", 
    body: formData
  }); 
  alert('The file has been uploaded successfully.');
  }
  </script>