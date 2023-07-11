/**********************************************************************************************************
******************************Funciones para crear un slider de imágenes***********************************
**********************************************************************************************************/

function moverizq() {
    //variable para guardar la última imagen y no se pierda
    var imagen6 = document.getElementById("img6").src;

    //las imágenes toman la fuente de la imagen a su derecha
    document.getElementById("img6").src = document.getElementById("img").src;
    document.getElementById("img").src = document.getElementById("img1").src;
    document.getElementById("img1").src = document.getElementById("img2").src;
    document.getElementById("img2").src = document.getElementById("img3").src;
    document.getElementById("img3").src = document.getElementById("img4").src;
    document.getElementById("img4").src = document.getElementById("img5").src;
    document.getElementById("img5").src = imagen6;
}

function moverder() {
    //variable para guardar la primera imagen y no se pierda
    var imagen = document.getElementById("img").src;

    //las imágenes toman la fuente de la imagen a su izquierda
    document.getElementById("img").src = document.getElementById("img6").src;
    document.getElementById("img6").src = document.getElementById("img5").src;
    document.getElementById("img5").src = document.getElementById("img4").src;
    document.getElementById("img4").src = document.getElementById("img3").src;
    document.getElementById("img3").src = document.getElementById("img2").src
    document.getElementById("img2").src = document.getElementById("img1").src;
    document.getElementById("img1").src = imagen;
}

/**********************************************************************************************************
*****************Funciones para validar que User y Correo no estén duplicados en BBDD**********************
**********************************************************************************************************/

$(function() {
    //indicamos que obtenga los datos del campo con id(#) email, y que cuando se ponga el foco fuera del campo realice la function para enviar los datos
    $("#email").focusout(function () {

        //datos para indicar que se necesita enviar
        var datos = 'email=' + $("#email").val();
        //url para indicar donde se deben enviar los datos
        var url = "../validarEmail.php";
        //dataType para indicar el tipo de datos
        var dataType = "html";

        //función de ajax
        $.ajax({
            //enviamos los datos con POST
            type: "POST",
            //los enviamos al lugar indicado en la variable url declarada anteriormente
            url: url,
            //para indicar qué se necesita enviar, usamos lo indicado en la variable datos declarada anteriormente
            data: datos,

            //si tiene éxito enviando algo, ejecuta la function
            success: function (data) {
                //si el resultado de data es 0, en el campo con id errorEmail inserta (mediante html) la cadena de texto en color rojo y deshabilita el botón Submit
                if (data == 0) {
                    $('#errorEmail').html("El correo ya existe");
                    $('#errorEmail').css("color", "red");
                    $('#botonSubmit').prop('disabled', true);
                } else {
                    //en caso contrario, inserta esto
                    $('#errorEmail').html("El correo está disponible");
                    $('#errorEmail').css("color", "green");
                    $('#botonSubmit').prop('disabled', false);
                }
            },
            dataType: dataType
        });
    })
});


$(function() {

    $("#usuario").focusout(function () {

        var datos = 'usuario=' + $("#usuario").val();
        var url = "../validarUser.php";
        var dataType = "html";

        $.ajax({

            type: "POST",
            url: url,
            data: datos,

            success: function (data) {

                if (data == 2) {
                    $('#errorUsuario').html("El usuario ya existe");
                    $('#errorUsuario').css("color", "red");
                    $('#botonSubmit').prop('disabled', true);
                } else {
                    $('#errorUsuario').html("El usuario está disponible");
                    $('#errorUsuario').css("color", "green");
                    $('#botonSubmit').prop('disabled', false);
                }
            },
            dataType: dataType
        });
    })
});