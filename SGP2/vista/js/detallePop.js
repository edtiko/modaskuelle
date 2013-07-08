
function ordenar() {

    var m = document.getElementById("modelo").value;
    var c = document.getElementById("color").value;
    var f = document.getElementById("f1").value;
    var p = document.getElementById("precio").value;
    var d = document.getElementById("descrip").value;
    if (m == "" || c == "" || f == "" || p == "" || d == "") {
        alert("rellene todos los campos de la orden");

        return;
    }
    if (numero(p) == true) {
        var x = $("#x").val()
        if (x == "valor") {
            ordenar2()
        }
        else {
            var orden = document.getElementById("orden").value;

            $("#numorden").val(orden);

            var str = $("#det").serialize();
            $.ajax({
                url: "../modelo/pedidosController.php",
                type: 'post',
                data: str,
                success: function(data) {
                    if (data != "")
                        alert(data);
                }
            });
            cerrar(),
                    verDetalle();
            var pre = $("#precio").val();
            var precio = pre * 1;
            var to = $("#vlr").val();
            var total = precio + to;
            $("#vlr").val(total);
        }
    }
    else
        $("#precio").focus();

}
function ordenar2() {

    var orden = document.getElementById("orden").value;

    $("#numorden").val(orden);

    var str = $("#det").serialize();
    $.ajax({
        url: "../modelo/pedidosController.php",
        type: 'post',
        data: str,
        success: function(data) {
            if (data != "")
                alert(data);
        }
    });
    cerrar()

    viewDetalle()


}
function orden_arreglo() {

    var orden = document.getElementById("orden").value;
    var x = $("#x").val();
    var str = $("#det").serialize();
    $("#numorden").val(orden);
    $.ajax({
        url: "../modelo/pedidosController.php",
        type: 'post',
        data: str,
        success: function(data) {
            if (data != "")
                alert(data);
        }
    });
    cerrar();
    if (x == "valor")
        viewDetalle();
    else
        verDetalle()

    var pre = $("#precio").val(),
            precio = pre * 1,
            to = $("#vlr").val(),
            total = precio + to;
    $("#vlr").val(total);
}

function viewDetalle() {
    var orden = document.getElementById("orden").value;

    $.ajax({
        url: "viewDetalle.php",
        data: "orden=" + orden,
        type: "post",
        success: function(msg) {
            $("#detal").html(msg);
        }
    });
}

function cerrar() {

    $("#conte").dialog("destroy");
    $("#conte").html("");
    $("#prenda").val("Elige..");

}
function numero(numero) {

    if (!/^([0-9])*$/.test(numero)) {
        alert("El campo precio no es un valor númerico");
        return false;
    }
    else
        return true;

}
