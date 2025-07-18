$(document).ready(function(){
    read();
    
    $('#frmUsuario').submit(function (e) {
        e.preventDefault();         
        let datos = {};

        if ($('#id').val() == '') {
            datos = {
                nombre: $('#nombre').val(),
                celular: $('#celular').val(),
                rol: $('#rol').val(),                
                clave: $('#clave').val(),
                correo: $('#correo').val(),
                operacion: 'Creo'
            };
        }else{
            datos = {
                id: $('#id').val(),
                nombre: $('#nombre').val(),
                celular: $('#celular').val(),
                rol: $('#rol').val(),                
                clave: $('#clave').val(),
                correo: $('#correo').val(),
                operacion: 'Edito'
            };
        }
            
        
        $.post('../../controlador/usuario.controlador.php', datos, function (respuesta) {
            if (respuesta == '1' || respuesta == 1) {
                Toast.fire({
                    icon: 'success',
                    title: `Se ${datos.operacion} el usuario exito!!'`,
                  })
            }else{
                Toast.fire({
                    icon: 'error',
                    title: `Error no se ${datos.operacion} el usuario`,
                  })
            } 
            read();
            $('#id').val('');
            $('#nombre').val('');
            $('#celular').val('');
            $('#rol').val('');                
            $('#clave').val('');
            $('#correo').val('');
         })
       
     });

    function read(){   
        
        let operacion = 'Consultar'; 
        $.post('../../controlador/usuario.controlador.php', {operacion}, function (respuesta) {
            var table = null;                 
            $.each(JSON.parse(respuesta), function(index, val) {
                table += `
                <tr class="even pointer" id="${val.id}">
                    <td class=" ">${val.nombre}</td>
                    <td class=" ">${val.correo}</td>
                    <td class=" ">${val.celular}</td>
                    <td class=" ">${val.rol}</td>
                    <td class=" ">
                        <a class="btn btn-round btn-warning ver_editar"><i class="fa fa-pencil"></i></a>      
                    </td>
                    <td class=" ">
                        <a class="btn btn-round btn-danger eliminar"><i class="fa fa-trash"></i></a>      
                    </td>
                </tr>
                `;
            });
            
            $('#cuerpo_tabla').html(table);
        })
        .fail(function(){
            alertify.error('No hay datos en la tabla');
        })
        
    }

    $(document).on('click','.ver_editar', function (e) {
        window.scroll(0, 0);
        let elemento = $(this)[0].parentElement.parentElement;
                let ide = $(elemento).attr('id');
                const datos = {
                    id: ide,
                    operacion: 'consultarEditar'
                };

        
        $.post('../../controlador/usuario.controlador.php', datos, function (respuesta) {

            let datos = JSON.parse(respuesta);
            console.log(datos);
            
            datos.forEach(dato => {
              $('#nombre').val(dato.nombre);
              $('#correo').val(dato.correo);
              $('#celular').val(dato.celular);
              $('#clave').val(dato.clave);
              $('#rol').val(dato.rol);
              $('#id').val(dato.id);
            });
            read();
            
        })
         e.preventDefault(); 
      });

    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Seguro de eliminar el registro?",
  
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar"
          }).then((result) => {
            if (result.isConfirmed) {
                        let elemento = $(this)[0].parentElement.parentElement;
                        let ide = $(elemento).attr('id');
                        const datos = {
                            id: ide,
                            operacion: 'Eliminar'
                        };
                
                        $.post('../../controlador/usuario.controlador.php',datos, function (respuesta) {
                
                            if (respuesta == '1') {
                                Toast.fire({
                                    icon: 'success',
                                    title: `'Se elimino la usuario con exito!!'`,
                                  })
                            }else{
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Error no se logro eliminar la usuario',
                                  })
                            }
                            
                             read();
                            
                        })
                        
            } 
          });

        

    });

});