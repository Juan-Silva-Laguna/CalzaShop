$(document).ready(function(){
    traerDatos();
    $('#frmCategoria').submit(function (e) {
        e.preventDefault();

        var nombre = $('#nombre').val();
        var descripcion = $('#descripcion').val();
        var imagen = $('#imagen').get(0).files.length; // Número de archivos seleccionados


        let formData = new FormData(this);
        if ($('#id').val() == "") {
            if (nombre.trim() === '' || descripcion.trim() === '' || imagen === 0) {
                Toast.fire({
                    icon: 'error',
                    title: `Todos los campos son obligatorios`,
                })
                return;
            }
            formData.append('operacion', 'Creo');
        }else{
            if (nombre.trim() === '' || descripcion.trim() === '') {
                Toast.fire({
                    icon: 'error',
                    title: `Todos los campos son obligatorios`,
                })
                return;
            }
            formData.append('id', $('#id').val());
            formData.append('operacion', 'Edito');
        }
        
        $.ajax({
            url: '../../controlador/categoria.controlador.php',
            type: 'POST',
            data: formData,
            contentType: false, // Evita que jQuery establezca el contentType
            processData: false, // Evita que jQuery procese los datos
            success: function (respuesta) {
                console.log(respuesta);
                
                if (respuesta === '1') {
                    Toast.fire({
                        icon: 'success',
                        title: `Se ${formData.get('operacion')} el registro.`,
                      })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: `Error: no se ${formData.get('operacion')}`,
                      })
                }
                traerDatos(); // Función para actualizar los datos en la interfaz
            },
            error: function (xhr, status, error) {
                console.error('Error en la solicitud AJAX:', status, error);
            }
        });
        
     });

    function traerDatos(){      
        //limpiar campos
        $('#descripcion').val('');
        $('#nombre').val('');
        $('#id').val('');
        $('#btnFormu').html('Crear Categoria');
        $('#img').attr('src', '');
        $('#imagen').val('');

            
        $('#tablaCategoria').dataTable().fnDestroy();
        let operacion = 'Consultar';   
        $.post('../../controlador/categoria.controlador.php', {operacion}, function (respuesta) {
            var table = null;     
            console.log(respuesta);
                        
            $.each(JSON.parse(respuesta), function(index, val) {

                table += `
                <tr class="even pointer" id="${val.id}">
                    <td>${val.nombre}</td>
                    <td>${val.descripcion}</td>
                    <td>
                        <a href="../../controlador/${val.imagen}" class="verImagen">
                        <IMG SRC="../../controlador/${val.imagen}" width="60" height="60">
                        </a>      
                    </td>
                    <td>
                        <a class="ver_editar btn btn-round btn-warning"><i class="fa fa-pencil"></i></a>      
                    </td>
                    <td>
                        <a class="eliminar btn btn-round btn-danger"><i class="fa fa-trash"></i></a>      
                    </td>
                </tr>
                `;
            });
            
            $('#tablaCuerpoCategoria').html(table);
            $('#tablaCategoria').dataTable();
        })
        .fail(function(){
            alertify.error();
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        })
    }

    $(document).on('click','.verImagen', function (e) {
        e.preventDefault();
        Swal.fire({
            imageUrl: $(this)[0],
            imageAlt: "A tall image"
        });
    });

    $(document).on('change','#imagen', function (e) {
        e.preventDefault();
        $('#img').attr('src', '');
    });

    $(document).on('click','.ver_editar', function (e) {
        window.scroll(0, 0);
        let elemento = $(this)[0].parentElement.parentElement;
                let ide = $(elemento).attr('id');
                const datos = {
                    id: ide,
                    operacion: 'consultarEditar'
                };

        
        $.post('../../controlador/categoria.controlador.php', datos, function (respuesta) {

            let datos = JSON.parse(respuesta);
            console.log(datos);
            
            datos.forEach(dato => {
              $('#nombre').val(dato.nombre);
              $('#descripcion').val(dato.descripcion);
              $('#id').val(dato.id);
              $('#img').attr('src', '../../controlador/'+dato.imagen);
              $('#btnFormu').html('Editar Categoria');
            });
            
            
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
                
                        $.post('../../controlador/categoria.controlador.php',datos, function (respuesta) {
                
                            if (respuesta == '1') {
                                Toast.fire({
                                    icon: 'success',
                                    title: `'Se elimino la Categoria con exito!!'`,
                                  })
                            }else{
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Error no se logro eliminar la Categoria',
                                  })
                            }
                            
                            
                        })
                        traerDatos();
            } 
          });

        

    });

    

});