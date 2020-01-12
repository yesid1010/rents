
$('#abrirmodalEditarRoom').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var name_modal_editar = button.data('name')
    var price_modal_editar = button.data('price')
    var description_modal_editar = button.data('description')
    var id = button.data('id')

    var modal = $(this)

    modal.find('.modal-body #name').val(name_modal_editar);
    modal.find('.modal-body #price').val(price_modal_editar);
    modal.find('.modal-body #description').val(description_modal_editar);
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalEditarService').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var name_modal_editar = button.data('name')
    var price_modal_editar = button.data('price')
    var description_modal_editar = button.data('description')
    var id = button.data('id')

    var modal = $(this)

    modal.find('.modal-body #name').val(name_modal_editar);
    modal.find('.modal-body #price').val(price_modal_editar);
    modal.find('.modal-body #description').val(description_modal_editar);
    modal.find('.modal-body #id').val(id);

})


$('#abrirmodalEliminarRoom').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalEliminarService').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalArrendarRoom').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
    
    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalAgregarServicio').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})


$('#abrirmodalCancelarArriendo').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalFingerprint').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})


$(".alert").fadeOut(4000 );