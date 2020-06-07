$(document).ready(function () {
    //esto es para que los nombres permanezcan sin borrarse del imput
    var data = {};
    $('#gente option').each(function (i, el) {
        data[$(el).data("value")] = $(el).val();
    });
    // `data` : object of `data-value` : `value`
    console.log(data, $('#gente option').val());


    $('#boton').click(function () {
        $('#Buscando').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#wrapper').panzoom("reset");
        //Agregar cartelito de buscando
        var value = $('#selected').val();
        var valor = "" + $("#gente [value='" + value + "']").data('value');
        var ancla = "#" + valor;
        var anclajs = "" + valor;
        //$('html, body').animate({
        //	scrollTop: $(ancla).offset().top -100
        //}, 1000);

        setTimeout(function () {
            console.log($(ancla).offset().top);
            var y = $(ancla).offset().top - 100;
            var x = $(ancla).offset().left;
            $("#wrapper").panzoom("setMatrix", [1, 0, 0, 1, -x, -y])
        }, 2500);
        var $el = document.getElementById(anclajs);
        if (!$el) {
            setTimeout(function () {
                $('#Buscando').modal('hide');
                $('#NoExiste').modal({});
            }, 2500);

        } else {
            $el.classList.add("cambio");
            setTimeout(function () {
                $('#Buscando').modal('hide');
            }, 2500);
            setTimeout(function () {
                $el.classList.remove("cambio");
            }, 6000);
        }


    });

    $('#botonmenos').click(function () {
        var $panzoom = $(".panzoom-elements").panzoom();
        var horizontalCenter = Math.floor(window.innerWidth / 2);
        var verticalCener = Math.floor(window.innerHeight / 2);
        $panzoom.panzoom('zoom', true, {
            increment: 0.3,
            animate: false,
            focal: {
                clientX: horizontalCenter,
                clientY: verticalCener
            }
        });
    });

    $('#botonmas').click(function () {
        var $panzoom = $(".panzoom-elements").panzoom();
        var horizontalCenter = Math.floor(window.innerWidth / 2);
        var verticalCener = Math.floor(window.innerHeight / 2);
        $panzoom.panzoom('zoom', false, {
            increment: 0.3,
            animate: false,
            focal: {
                clientX: horizontalCenter,
                clientY: verticalCener
            }
        });
    });

});



(function () {
    var $panzoom = $(".panzoom-elements").panzoom();
    $panzoom.panzoom("option", {
        minScale: 0.005,
        increment: 0.03
    });
    $panzoom.parent().on('mousewheel.focal', function (e) {
        e.preventDefault();
        var delta = e.delta || e.originalEvent.wheelDelta;
        var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
        $panzoom.panzoom('zoom', zoomOut, {
            increment: 0.1,
            animate: false,
            focal: e
        });
        console.log(e);
    });
})();


$('.enlace').on('mousedown touchstart', function (e) {
    e.stopImmediatePropagation();
});

//eliminar acentos del datalist
$('#selected').keypress(function (event) {
    var str = $('#selected').val();

    if (String.fromCharCode(event.which) == 'á') {
        event.preventDefault()
        $('#selected').val(str + 'a');
    }
    if (String.fromCharCode(event.which) == 'é') {
        event.preventDefault()
        $('#selected').val(str + 'e');
    }
    if (String.fromCharCode(event.which) == 'í') {
        event.preventDefault()
        $('#selected').val(str + 'i');
    }
    if (String.fromCharCode(event.which) == 'ó') {
        event.preventDefault()
        $('#selected').val(str + 'o');
    }
    if (String.fromCharCode(event.which) == 'ú') {
        event.preventDefault()
        $('#selected').val(str + 'u');
    }

    if (String.fromCharCode(event.which) == 'Á') {
        event.preventDefault()
        $('#selected').val(str + 'A');
    }
    if (String.fromCharCode(event.which) == 'É') {
        event.preventDefault()
        $('#selected').val(str + 'E');
    }
    if (String.fromCharCode(event.which) == 'Í') {
        event.preventDefault()
        $('#selected').val(str + 'I');
    }
    if (String.fromCharCode(event.which) == 'Ó') {
        event.preventDefault()
        $('#selected').val(str + 'O');
    }
    if (String.fromCharCode(event.which) == 'Ú') {
        event.preventDefault()
        $('#selected').val(str + 'U');
    }
});

$("#selected").bind("paste", function (event) {
    // access the clipboard using the api
    var str = $('#selected').val();
    var pastedData = event.originalEvent.clipboardData.getData('text');
    event.preventDefault();
    pastedData = pastedData.replace("á", "a");
    pastedData = pastedData.replace("é", "e");
    pastedData = pastedData.replace("í", "i");
    pastedData = pastedData.replace("ó", "o");
    pastedData = pastedData.replace("ú", "u");
    pastedData = pastedData.replace("Á", "A");
    pastedData = pastedData.replace("É", "E");
    pastedData = pastedData.replace("Í", "I");
    pastedData = pastedData.replace("Ó", "O");
    pastedData = pastedData.replace("Ú", "U");
    $('#selected').val(str + pastedData);
});