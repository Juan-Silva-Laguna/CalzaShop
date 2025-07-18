$(document).ready(function(){

    traerDatos();
    traerCategorias();

    // Mapeo de los nombres a los IDs de los checkboxes
    let coloresMap = {
        'Negro': 'black-checkbox',
        'Blanco': 'white-checkbox',
        'Azul': 'blue-checkbox',
        'Rojo': 'red-checkbox',
        'Amarillo': 'yellow-checkbox',
        'Beige': 'beige-checkbox',
        'Café': 'coffe-checkbox',
        'Celeste': 'lightblue-checkbox',
        'Chocolate': 'chocolate-checkbox',
        'Coral': 'coral-checkbox',
        'Crudo': 'raw-checkbox',
        'Dorado': 'gold-checkbox',
        'Fucsia': 'fuchsia-checkbox',
        'Gris': 'gray-checkbox',
        'Lila': 'lilac-checkbox',
        'Marrón': 'brown-checkbox',  // Este está repetido en el HTML
        'Morado': 'purple-checkbox',
        'Multicolor': 'multicol',
        'Naranja': 'orange-checkbox',
        'Natural': 'natural-checkbox',
        'Plateado': 'silver-checkbox',
        'Rosa': 'pink-checkbox',
        'Verde': 'green-checkbox',
        'Violeta': 'violet-checkbox'
    };

    function traerTallas(){
        var tallasSeleccionadas = [];
        $('.tallas .checkbox-container .checkbox-input').each(function() {
            if ($(this).is(':checked')) {
                var talla = $(this).siblings('.checkbox-text').text(); // Obtener el texto de la talla
                tallasSeleccionadas.push(talla);
            }
        });
        return tallasSeleccionadas;
    }

    function traerColores(){
        var coloresSeleccionados = [];
        $('.colores .checkbox-container .checkbox-input').each(function() {
            if ($(this).is(':checked')) {
                var color = $(this).siblings('.checkbox-text').text(); // Obtener el texto del color
                coloresSeleccionados.push(color);
            }
        });
        return coloresSeleccionados;
    }
    
    $('#frmProducto').submit(function (e) {
        e.preventDefault();


        var nombre = $('#nombre').val();
        var categoria = $('#categoria').val();
        var precio = $('#precio').val();
        var cantidad = $('#cantidad').val();
        var descripcion = $('#descripcion').val();
        var descuento = $('#descuento').val();
        var imagen = $('#imagen').get(0).files.length; // Número de archivos seleccionados
        var tallas = traerTallas();
        var colores = traerColores();

        if (tallas.length <= 0  ) {
            Toast.fire({
                icon: 'error',
                title: `Al menos debes selecionar  una talla`,
            });
            return;
        }


        if (colores.length <= 0 ) {
            Toast.fire({
                icon: 'error',
                title: `Al menos debes selecionar un color`,
            });
            return;
        }


        // Verificar si todos los campos están vacíos
        if (nombre.trim() === '' || categoria.trim() === '' || precio.trim() === '' || cantidad.trim() === '' || descuento.trim() === '' ) {
            Toast.fire({
                icon: 'error',
                title: `Todos los campos son obligatorios`,
            })
            return;
        }

        let formData = new FormData(this);
        if ($('#id').val() == "") {
            if (imagen === 0) {
                Toast.fire({
                    icon: 'error',
                    title: `Debes agregar una imagen`,
                })
                return;
            }
            formData.append('operacion', 'Creo');
            formData.append('tallas', tallas);
            formData.append('colores', colores);
        }else{
            formData.append('id', $('#id').val());
            formData.append('operacion', 'Edito');
            formData.append('tallas', tallas);
            formData.append('colores', colores);
        }
        
        $.ajax({
            url: '../../controlador/producto.controlador.php',
            type: 'POST',
            data: formData,
            contentType: false, // Evita que jQuery establezca el contentType
            processData: false, // Evita que jQuery procese los datos
            success: function (respuesta) {
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

     function traerCategorias() {
        let operacion = 'Consultar';  
        $.post('../../controlador/categoria.controlador.php', {operacion}, function (respuesta) {
            var option = null;     
                       
            $.each(JSON.parse(respuesta), function(index, val) {

                option += `
                    <option value="${val.id}">${val.nombre}</option>
                `;
            });
            
            $('#categoria').html(option);
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
        let operacion = 'Consultar'; 
        $('#nombre').val('');
        $('#descripcion').val('');
        $('#id').val('');
        $('#img').attr('src', '');
        $('#categoria').val('');
        $('#cantidad').val('');
        $('#precio').val('');
        $('#descuento').val('');
        $('#imagen').val('');
        
        $('#tablaProductos').dataTable().fnDestroy();
        $.post('../../controlador/producto.controlador.php', {operacion}, function (respuesta) {
            var table = null; 
                       
            $.each(JSON.parse(respuesta), function(index, val) {
                
                table += `
                <tr class="even pointer" id="${val.id}" style="${val.cantidad<=20?'background-color: #ff76734a;':''}">
                    <td>${val.nombre}</td>
                    <td>${val.nombre_categoria}</td>
                    <td>${val.precio_unitario}</td>
                    <td>${val.cantidad}</td>
                    <td>${val.descuento}</td>
                    <td>${val.tallas}</td>
                    <td>${val.colores}</td>
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
            
            $('#tablaCuerpoProductos').html(table);
            $('#tablaProductos').DataTable({
                "order": [[3, 'asc']] // Ordena la cuarta columna de manera ascendente
            });
        })
        .fail(function(){
            alertify.error('No hay datos en la tabla');
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
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

        
        $.post('../../controlador/producto.controlador.php', datos, function (respuesta) {

            let datos = JSON.parse(respuesta);
            console.log(datos);

                $('#nombre').val(datos.nombre);
                $('#descripcion').val(datos.descripcion);
                $('#id').val(datos.id);
                $('#img').attr('src', '../../controlador/'+datos.imagen);
                $('#categoria').val(datos.id_categoria);
                $('#cantidad').val(datos.cantidad);
                $('#precio').val(datos.precio_unitario);
                $('#descuento').val(datos.descuento);
        
                var tallas = datos.tallas.split(",").map(Number);

                var colores = datos.colores.split(",");

                desmarcarChecks();

                // Recorremos el arreglo de colores seleccionados
                colores.forEach(function(color) {
                    let checkboxId = coloresMap[color]; // Obtener el ID correspondiente al color
                    let checkbox = document.getElementById(checkboxId); // Buscar el checkbox por su ID
                    if (checkbox) {
                        checkbox.checked = true; // Marcar el checkbox si existe
                    }
                });


                tallas.forEach(function(talla) {
                    let checkboxId = 'talla-' + talla;  // Los IDs están en formato "talla-<número>"
                    let checkbox = document.getElementById(checkboxId);  // Buscar el checkbox por su ID
                    if (checkbox) {
                      checkbox.checked = true;  // Marcar el checkbox si existe
                    }
                  });

                $('#btnFormu').html('ACTUALIZAR');
            
            
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
                
                        $.post('../../controlador/producto.controlador.php',datos, function (respuesta) {
                
                            if (respuesta == '1') {
                                Toast.fire({
                                    icon: 'success',
                                    title: `'Se elimino la producto con exito!!'`,
                                  })
                            }else{
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Error no se logro eliminar la producto',
                                  })
                            }
                            
                            
                        })
                        traerDatos();
            } 
          });

        

    });

    function desmarcarChecks() {
        // Seleccionamos todos los checkboxes dentro de la div con clase 'checkbox-container row'
        let checkboxes = document.querySelectorAll('.checkbox-container.row input[type="checkbox"]');

        // Recorremos cada checkbox y lo desmarcamos
        checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
        });
    }


});