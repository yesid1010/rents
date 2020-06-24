
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


$('#abrirmodalEditarProfile').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var identification_modal_editar = button.data('identification')
    var name_modal_editar = button.data('name')
    var email_modal_editar = button.data('email')
    var telephone_modal_editar = button.data('telephone')
    var id = button.data('id')

    var modal = $(this)

    modal.find('.modal-body #identification').val(identification_modal_editar);
    modal.find('.modal-body #name').val(name_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #telephone').val(telephone_modal_editar);
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

$('#abrirmodalEliminarServicio').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalEliminarPayment').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')

    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})


$('#abrirmodalCerrarArriendo').on('show.bs.modal',function(event){
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
    var total = button.data('total');

    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #total').val(total);

})

$('#abrirmodalAbonarPago').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var total = button.data('total');

    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #total').val(total);

    console.log(total);

})

$('#abrirmodalFingerprint').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodalContract').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var id = button.data('id')
 
    var modal = $(this)
    modal.find('.modal-body #id').val(id);

})

$('#abrirmodaldetalle').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var date_modal = button.data('date')
    var description_modal = button.data('description')

    var modal = $(this)

    modal.find('.modal-body #date').val(date_modal);
    modal.find('.modal-body #description').val(description_modal);

})

//mostrar cobtraseñas del input

function mostrarPassword(id){
    var cambio = document.getElementById(id);
    if(cambio.type == "password"){
        cambio.type = "text";
        $('#'+id).removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('#'+id).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
} 


$(".alert").fadeOut(4000 );