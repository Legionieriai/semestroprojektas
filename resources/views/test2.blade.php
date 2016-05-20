<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<div id="fb-root"></div>
<script>



    function previewFile(){
        var preview = document.querySelector('img'); //selects the query named img

        var file    = document.querySelector('input[type=file]').files[0]; //sames as here
        var reader  = new FileReader();


        if (file) {
            reader.readAsDataURL(file); //reads the data as a URL
        } else {
            preview.src = "kalks";
        }

        reader.onloadend = function () {
            preview.src = reader.result;
            document.getElementById('ip').value=reader.result;
        }

    }

    previewFile();  //calls the function named previewFile()


</script>



<body>


<input type="textbox" id="ip" width="250" height="250">

</body>
</html>


