jQuery(document).ready(function ($) {
    /**
     * Events nou restaurant
     */
    /*$("#Alta button").click(function (e) {
        e.preventDefault();
        $("#message").empty();
        $('#loading').show();
        var selected = new Array();
        $("input:checkbox[name=Items]:checked").each(function() {
            selected.push($(this).val());
        });
        var dataForm = {

            _method: "POST",
            nom : $("#nomestabliment").val(),
            telefon : $("#telefon").val(),
            preuMitja : $("select").val(),
            horariMati : $("#horariMati").val(),
            horariMigdia : $("#horariMigdia").val(),
            horariNit : $("#horariNit").val(),
            items : selected,
            imatge : $("#file").val()
        }
        //console.log(data);
        $.ajax({
            _token: "{{ csrf_token() }}",
            url: "post", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: data, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: true,       // The content type used when sending data to the server.
            contentType: 'multipart/form-data',
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $('#loading').hide();
                $("#message").html(data);
            },
            error: function( jqXHR, textStatus, errorThrown ) {

                if (jqXHR.status === 0) {

                    alert('Not connect: Verify Network.');

                } else if (jqXHR.status == 404) {

                    alert('Requested page not found [404]');

                } else if (jqXHR.status == 500) {

                    alert('Internal Server Error [500].');

                } else if (textStatus === 'parsererror') {

                    alert('Requested JSON parse failed.');

                } else if (textStatus === 'timeout') {

                    alert('Time out error.');

                } else if (textStatus === 'abort') {

                    alert('Ajax request aborted.');

                } else {

                    console.log('Uncaught Error: ' + jqXHR.responseText);

                }
            }


            });
    });*/

    // Funio de previsualització de la imatge
    $(function() {
        $("#file1").change(function() {
            $("#message1").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing1').attr('src','noimage.png');
                $("#message1").html("<p id='error'>Selecciona una imatge valida</p>"+"<h4>Important</h4>"+"<span id='error_message'>Només s'accepten formats jpeg, jpg and png</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded1;
                reader.readAsDataURL(this.files[0]);
            }
        });
        $("#file2").change(function() {
            $("#message2").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing2').attr('src','noimage.png');
                $("#message2").html("<p id='error'>Selecciona una imatge valida</p>"+"<h4>Important</h4>"+"<span id='error_message'>Només s'accepten formats jpeg, jpg and png</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded2;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
    function imageIsLoaded1(e) {
        $("#file1").css("color","green");
        $('#image_preview1').css("display", "block");
        $('#previewing1').attr('src', e.target.result);
        $('#previewing1').attr('width', '250px');
        $('#previewing1').attr('height', '230px');
    };
    function imageIsLoaded2(e) {
        $("#file2").css("color","green");
        $('#image_preview2').css("display", "block");
        $('#previewing2').attr('src', e.target.result);
        $('#previewing2').attr('width', '250px');
        $('#previewing2').attr('height', '230px');
    };



});
