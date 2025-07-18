$(document).ready(function(){
  let total=0;
    traerUsuarios();
    traerDatos();

    function traerUsuarios() {
      let operacion = 'Consultar';  
      $.post('../../controlador/usuario.controlador.php', {operacion}, function (respuesta) {
          var option = '<option value="">Todos los Vendedores</option>';     
                     
          $.each(JSON.parse(respuesta), function(index, val) {

              option += `
                  <option value="${val.id}">${val.nombre}</option>
              `;
          });
          
          $('#vendedor').html(option);
      })
      .fail(function(){
          alertify.error();
          Toast.fire({
              icon: 'info',
              title: 'No hay datos en la tabla',
            })
      }) 
   }

    function traerDatos(){
        let operacion = 'ConsultarReporte';   
        let datos = {
          operacion: 'ConsultarReporte',
          fecha: $('#fecha').val(),
          tipo_venta: $('#tipo_venta').val(),
          vendedor: $('#vendedor').val()
        }
        $.post('../../controlador/pedido.controlador.php', datos, function (respuesta) {
            var table = '';     
                        
            $.each(JSON.parse(respuesta), function(index, val) {
                total += val.total;
                table += `
                 <tr class="even pointer">
                  <td class=" ">${val.codigo} </td>
                  <td class=" ">${val.fecha}</td>
                  <td class=" ">$${val.total}</td>
                  <td class=" "><span class="${val.tipo_venta}">${val.tipo_venta}</span></td>
                  <td class=" ">${val.vendedor}</td>
                  <td class=" ">
                    <a href="http://localhost/CalzaShop/Vista/general/verificar_pedido.php?orden=${val.codigo}" target="_blanck" class="btn btn-round btn-info"><i class="fa fa-eye"></i></a>      
                  </td>
                </tr>
                `;
            });
            
            $('#cuerpo_tabla').html(table);
            $('#total').html(total);
            total = 0;
        })
        .fail(function(){
            alertify.error();
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        })
    }

  $(document).on('change', '#fecha', function (e) {
    traerDatos();
  });

  $(document).on('change', '#tipo_venta', function (e) {
    traerDatos();
  });

  $(document).on('change', '#vendedor', function (e) {
    traerDatos();
  });

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

  $(document).on('click', '#btn_exportar', function (e) {
    var tabla = document.getElementById('tabla');
    var htmlTabla = tabla.outerHTML;
  
    // Crear un Blob con el contenido HTML de la tabla
    var blob = new Blob([htmlTabla], { type: 'application/vnd.ms-excel' });
  
    // Crear un enlace de descarga
    var link = document.createElement('a');
    link.href = URL.createObjectURL(blob);

    var fecha = document.getElementById('fecha').value;
    link.download = 'Reporte_CalzaShop_'+fecha+'.xls';

    // Hacer clic en el enlace para iniciar la descarga
    link.click();
  })
  
     

});