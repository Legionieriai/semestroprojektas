<html>
<script>
    function previewFile(){
        var preview = document.querySelector('img'); //selects the query named img
        var file    = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader  = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
            document.getElementById("ip").value= reader.result;
        }

        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
        } else {
            preview.src = "no";
        }
    }

   // previewFile();  //calls the function named previewFile()
</script>



<body>


<input type="file" onchange="previewFile()"><br>
<img src="" height="200" alt="Image preview...">
<input type="textbox" id="ip" width="250" height="250">
<div id="op"></div>

</body>
</html>


