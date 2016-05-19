<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));



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
<div class="fb-login-button" data-max-rows="1" data-size="medium" data-show-faces="false" data-auto-logout-link="false"></div>


<input type="file" onchange="previewFile()"><br>
<img src="" height="200" alt="Image preview...">
<input type="textbox" id="ip" width="250" height="250">

</body>
</html>


