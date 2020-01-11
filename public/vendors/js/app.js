$(function () {
    //tabla arriendos
    $("#tablaArriendos").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false
    });

    //tabla clientes
    $("#tablaClientes").DataTable({
        "info"          : false,
        "lengthChange"  : false,
        "ordering": false
    });
    
    $('#ex-search').picker({search : true});
    $('#ex-search2').picker({search : true});
    // FIN TABLAS ORDENES //

});



