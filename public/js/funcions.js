$("#formRestaurant").hide();
$("#ocultafegirRest").hide();
jQuery(document).ready(function ($) {
  //oculta formulari restaurant
  $("#formRestaurant").hide();
  $("#ocultafegirRest").hide();
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
    //bactivar desactivar restaurant
    $("#activar button").click(function () {
        var id = $(this).val();
        var dataString = 'id_restaurant='+id;
        var r = confirm('Estas segur que vols activar-lo?');
        if (r == true) {
            $.ajax({
                type: "GET",
                url: "/onmenjar/act/"+id,
                //url: "/appvallLord/public/onmenjar/act/"+id,
                data: dataString,
                success: function (data) {
                  alert("activat");
                  location.reload(true);
                    //$("#" + id).remove();
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
                },
            });
        }
        //location.reload(true);
      });
      //bactivar desactivar restaurant
      $("#desactivar button").click(function () {
          var id = $(this).val();
          var dataString = 'id_restaurant='+id;
          var r = confirm('Estas segur que vols desactivar-lo?');
          if (r == true) {
              $.ajax({
                  type: "GET",
                  url: "/onmenjar/desac/"+id,
                  //url: "/appvallLord/public/onmenjar/desac/"+id,
                  data: dataString,
                  success: function (data) {
                    alert("desactivat");
                    location.reload(true);
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
                  },
              });
          }
          //location.reload(true);
        });
        //bactivar desactivar restaurant
        $("#eliminar button").click(function () {
            var id = $(this).val();
            var dataString = 'id_restaurant='+id;
            var r = confirm('Estas segur que vols eliminar-lo?');
            if (r == true) {
                $.ajax({
                    type: "GET",
                    url: "/onmenjar/eliminar/"+id,
                    //url: "/appvallLord/public/onmenjar/eliminar/"+id,
                    data: dataString,
                    success: function (data) {
                      alert("eliminat");
                      location.reload(true);
                        //$("#" + id).remove();
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
                    },
                });
            }
            //location.reload(true);
          });


});
