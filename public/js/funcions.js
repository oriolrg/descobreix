$("#formRestaurant").hide();
$("#ocultafegirRest").hide();
$("#id").hide();
jQuery(document).ready(function ($) {
  //oculta formulari restaurant
  $("#formRestaurant").hide();
  $("#ocultafegirRest").hide();
  $("#tableDies").hide();
  $("#tableHoraris").hide();
  $("#tableUsuaris").hide();
  $("#restaurants").click(function () {
    $("#restaurants").addClass("active");
    $("#dies").removeClass("active");
    $("#hores").removeClass("active");
    $("#unicUser").removeClass("active");
    $("#tableRestaurants").show();
    $("#tableDies").hide();
    $("#tableHoraris").hide();
    $("#tableUsuaris").hide();
      //location.reload(true);
  });
  $("#dies").click(function () {
    $("#restaurants").removeClass("active");
    $("#dies").addClass("active");
    $("#hores").removeClass("active");
    $("#unicUser").removeClass("active");
    $("#tableRestaurants").hide();
    $("#tableDies").show();
    $("#tableHoraris").hide();
    $("#tableUsuaris").hide();
        //location.reload(true);
  });
  $("#hores").click(function () {
    $("#restaurants").removeClass("active");
    $("#dies").removeClass("active");
    $("#hores").addClass("active");
    $("#unicUser").removeClass("active");
    $("#tableRestaurants").hide();
    $("#tableDies").hide();
    $("#tableHoraris").show();
    $("#tableUsuaris").hide();
          //location.reload(true);
  });
  $("#unicUser").click(function () {
    $("#restaurants").removeClass("active");
    $("#dies").removeClass("active");
    $("#hores").removeClass("active");
    $("#unicUser").addClass("active");
    $("#tableRestaurants").hide();
    $("#tableDies").hide();
    $("#tableHoraris").hide();
    $("#tableUsuaris").show();
          //location.reload(true);
  });
      // Funio de previsualització de la imatge
    $(function() {
        //mostra formulari restaurant
        $("#afegirRest").click(function () {
            $("#formRestaurant").show();
            $("#afegirRest").hide();
            $("#ocultafegirRest").show();
            //location.reload(true);
          });
          $("#ocultafegirRest").click(function () {
              $("#formRestaurant").hide();
              $("#ocultafegirRest").hide();
              $("#afegirRest").show();
              //location.reload(true);
            });
        $("#file1").change(function() {
            $("#message1").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing1').attr('src','noimage.png');
                $("#message1").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Només s'accepten formats jpeg, jpg and png</span>");

                return false;
            }if(file.size>50000){
              $('#previewing1').attr('src','noimage.png');
              $("#message1").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Màxim 50kb</span>");
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
                $("#message2").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Només s'accepten formats jpeg, jpg and png</span>");

                return false;
            }if(file.size>50000){
              $('#previewing2').attr('src','noimage.png');
              $("#message2").html("<p id='error' style='color:red'>Selecciona una imatge valida</p>"+"<h4 style='color:red'>Important</h4>"+"<span id='error_message' style='color:red'>Màxim 50kb</span>");
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
    }
    function imageIsLoaded2(e) {
        $("#file2").css("color","green");
        $('#image_preview2').css("display", "block");
        $('#previewing2').attr('src', e.target.result);
        $('#previewing2').attr('width', '250px');
        $('#previewing2').attr('height', '230px');
    }
    /**
     * Activa el restaurant com a visible
     */
    $("#activar button").click(function () {
        var id = $(this).val();
        var dataString = 'id_restaurant='+id;
        var r = confirm('Estas segur que vols activar-lo?');
        if (r == true) {
            var tipus = 'GET';
            var url = "/appvallLord/public/onmenjar/act/"+id;
            var data = dataString;
            ajax(data, tipus, url);
        }
        //location.reload(true);
      });
    /**
     * Desactiva el restaurant com a visible
     */
      $("#desactivar button").click(function () {
          var id = $(this).val();
          var dataString = 'id_restaurant='+id;
          var r = confirm('Estas segur que vols desactivar-lo?');
          if (r == true) {
              var tipus = 'GET';
              var url = "/appvallLord/public/onmenjar/desac/"+id;
              var data = dataString;
              ajax(data, tipus, url);
          }
        });
    /**
     * Elimina restaurant
     */
        $("#eliminar button").click(function () {
            var id = $(this).val();
            var dataString = 'id_restaurant='+id;
            var r = confirm('Estas segur que vols eliminar-lo?');
            if (r == true) {
                var tipus = 'GET';
                var url = "/appvallLord/public/onmenjar/eliminar/"+id;
                var data = dataString;
                ajax(data, tipus, url);
            }

          });
    /**
     * Ordena els valors de les seguents taules
     */
    $(function() {
            // Ordenar taula des de client.
            $("#tableRestaurants").tablesorter({
                theme : 'blue',

                headers: {3:{sorter:false}}
            });
            $("#tableHoraris").tablesorter({
                theme : 'blue',

                headers: {0:{sorter:false}}
            });
            $("#tableDies").tablesorter({
                theme : 'blue',

                headers: {0:{sorter:false}}
            });
            /*$("#tableConfirmarSancio").tablesorter({
                theme : 'blue',
                // primera i segona columna ordenades a mes
                sortList: [[],[1,0]],
                headers: {2:{sorter:false},3:{sorter:false},4:{sorter:false}}
            });*/
        });
    /**
     * Reinicía les estadístiques a 0
     */
    $("#resset button").click(function () {
        var id = $(this).val();
        var r = confirm('Estas segur que vols reiniciar les estadístiques i posar-les a 0?');
        if (r == true) {
            var _token = $("input[name='_token']").val();
            var tipus = 'POST';
            var url = "http://lavalldelord.com/appvallLord/public/onmenjar/reiniciarcontadors";
            var data = {_token:_token}
            ajax(data, tipus, url);
        }
    });
    /**
     * Executa ajax amb les dades passades
     */
    function ajax(data, tipus, url){
        $.ajax({
            url: url,
            type: tipus,
            data: data,
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    location.reload(true);
                }else{
                    console.log(data.error);
                }
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                    alert(msg);
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                    alert(msg);
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                    alert(msg);
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                    alert(msg);
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                    alert(msg);
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                    alert(msg);
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    alert(msg);
                }
            }
        });
    }

});
