$(function () {
    //tabla arriendos
    $("#tablaArriendos").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false,
        "scrollY"       : "290px",
        "language":{
            "search":"Buscar",
            "emptyTable":     "No hay datos disponibles en la tabla",
            "lengthMenu":     "mostrar _MENU_ registros",
            "paginate": {
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        }
    });

    //tabla clientes
    $("#tablaClientes").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false,
        "scrollY"       : "300px",
        "language":{
            "search":"Buscar",
            "emptyTable":     "No hay datos disponibles en la tabla",
            "lengthMenu":     "mostrar _MENU_ registros",
            "paginate": {
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        }
    });

    //tabla clientes
    $("#tablaPayments").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false,
        "scrollY"       : "300px",
        "language":{
            "search":"Buscar",
            "emptyTable":     "No hay datos disponibles en la tabla",
            "lengthMenu":     "mostrar _MENU_ registros",
            "paginate": {
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        }
    });
    
    $('#ex-search').picker({search : true});
    $('#ex-search2').picker({search : true});
    // FIN TABLAS ORDENES //

     enviando = false;

});
 //Obligaremos a entrar el if en el primer submit
function checkSubmit() {
    if (!enviando) {
        console.log('formulario enviado');
        enviando = true;
        return true;
    } else {
        //Si llega hasta aca significa que pulsaron 2 veces el boton submit
        console.log("El formulario ya se esta enviando");
        return false;
    }
}


