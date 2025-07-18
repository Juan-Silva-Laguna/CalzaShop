<?php include('header.php'); ?>


<div class="right_col" role="main" id="principal_contact">
    

</div>



<?php include('footer.php'); ?>
<script>
  traerDatos();
function traerDatos() {
  
let operacion = 'ConsultarContactar';   
        $.post('../../controlador/usuario.controlador.php', {operacion}, function (respuesta) {
            let concat = ''; 
            $.each(JSON.parse(respuesta), function(index, val) {
              concat += `
                <div class="col-md-4 col-6 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2><i class="fa fa-user"></i> ${val.nombre.toUpperCase()}</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_title">
                        <a href="tel:+57${val.celular}"> <h2> <i class="fa fa-phone"></i> ${val.celular} </h2></a>
                      
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-success btn-round contactado" id="${val.id}" data-nombre="${val.nombre}">CONTACTADO</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    `;
            });
            
            $('#principal_contact').html(concat);
        })
        .fail(function(){
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        })

}

        $(document).on('click', '.contactado', function (e) {
        e.preventDefault();
        let elemento = $(this)[0];
                        let ide = $(elemento).attr('id');
                        let nom = $(elemento).data('nombre');
        Swal.fire({
            title: "Seguro de que ya contacto a "+nom+" ?",
  
            showCancelButton: true,
            confirmButtonText: "Si, seguro",
            cancelButtonText: "No, Cancelar"
          }).then((result) => {
            if (result.isConfirmed) {
                        
                        const datos = {
                            id: ide,
                            operacion: 'Contactado'
                        };
                
                        $.post('../../controlador/usuario.controlador.php',datos, function (respuesta) {
                
                            if (respuesta == '1') {
                                Toast.fire({
                                    icon: 'success',
                                    title: `Se elimino el contacto con exito!!`,
                                  })
                            }else{
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Error no se logro eliminar el contacto',
                                  })
                            }
                            
                            traerDatos();
                            
                        })
                        
            } 
          });
    });

</script>
