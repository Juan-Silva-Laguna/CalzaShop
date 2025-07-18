$(document).ready(function(){
    traerDatos();

    function traerDatos(){
            
        let operacion = 'Consultar';   
        $.post('../../controlador/pedido.controlador.php', {operacion}, function (respuesta) {
            var table = '';     
                        
            $.each(JSON.parse(respuesta), function(index, val) {

                table += `
                 <tr class="even pointer">
                            <td class=" ">${val.codigo} </td>
                            <td class=" ">${val.fecha}</td>
                            <td class=" ">$${val.total}</td>
                            <td class=" ">
                              <a href="http://localhost/CalzaShop/Vista/general/verificar_pedido.php?orden=${val.codigo}" target="_blanck" class="btn btn-round btn-info"><i class="fa fa-eye"></i></a>      
                            </td>
                            <td class=" " data-codigo="${val.codigo}" data-id="${val.id}" data-estado="Atendido">
                              <a class="btn btn-round btn-success accionar"><i class="fa fa-check"></i></a>      
                            </td>
                            <td class=" " data-codigo="${val.codigo}" data-id="${val.id}" data-estado="Rechazado">
                              <a class="btn btn-round btn-danger accionar"><i class="fa fa-times"></i></a>      
                            </td>
                          </tr>
                `;
            });
            
            $('#cuerpo_tabla').html(table);
        })
        .fail(function(){
            alertify.error();
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        })
    }

  $(document).on('click', '.accionar', function (e) {
      e.preventDefault();
      var parentTd = this.closest('td');
      var codigo = parentTd.getAttribute('data-codigo');
      var id = parentTd.getAttribute('data-id');
      var estado = parentTd.getAttribute('data-estado');
      Swal.fire({
          title: "Seguro de "+estado+" la orden "+codigo+"?",

          showCancelButton: true,
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar"
        }).then((result) => {
          if (result.isConfirmed) {
              let elemento = $(this)[0].parentElement.parentElement;
              let ide = $(elemento).attr('id');
              const datos = {
                  id: id,
                  estado: estado,
                  operacion: 'Accionar'
              };
      
              $.post('../../controlador/pedido.controlador.php',datos, function (respuesta) {
      
                  if (respuesta == '1' || respuesta == 1) {
                      Toast.fire({
                          icon: 'success',
                          title: `Se rechazo la orden con exito!!'`,
                        })
                  }else{
                      Toast.fire({
                          icon: 'error',
                          title: 'Error no se logro rechazar la orden',
                        })
                  } 
              })
            traerDatos();
        } 
    });
  });
     

});