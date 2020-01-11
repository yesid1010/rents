$(function () {
    //tabla arriendos
    $("#tablaArriendos").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false,
        "scrollY"       : "290px",
    });

    //tabla clientes
    $("#tablaClientes").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false,
        "scrollY"       : "300px",
    });

    //tabla clientes
    $("#tablaPayments").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false,
        "scrollY"       : "300px",
    });
    
    $('#ex-search').picker({search : true});
    $('#ex-search2').picker({search : true});
    // FIN TABLAS ORDENES //

});



