$(document).ready(function () {

    let productos = [];
    let pedido = [];

    $.post('../../controlador/producto.controlador.php', { operacion: 'Consultar' }, function (respuesta) {
        productos = JSON.parse(respuesta);
    })
        .fail(function () {
            alertify.error('No hay datos en la tabla');
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
            })
        })
    // Función para filtrar productos y mostrar sugerencias
    function filtrarProductos() {
        const producto = document.getElementById('producto');
        const listaProductos = document.getElementById('lista-productos');
        const textoBusqueda = producto.value.toLowerCase();

        // Limpiar la lista de productos
        listaProductos.innerHTML = '';

        // Filtrar productos
        const productosFiltrados = productos.filter(producto =>
            producto.nombre.toLowerCase().includes(textoBusqueda)
        );

        // Mostrar productos filtrados
        if (productosFiltrados.length > 0 && textoBusqueda !== '') {
            listaProductos.style.display = 'block'; // Mostrar la lista
            productosFiltrados.forEach(producto => {
                const li = document.createElement('li');
                li.className = 'list-group-item list-group-item-action';
                li.textContent = producto.nombre;
                li.onclick = () => seleccionarProducto(producto); // Seleccionar producto al hacer clic
                listaProductos.appendChild(li);
            });
        } else {
            listaProductos.style.display = 'none'; // Ocultar si no hay coincidencias
        }
    }

    // Función para manejar la selección del producto
    function seleccionarProducto(producto) {
        $('#img').attr('src', '../../controlador/' + producto.imagen);
        $('#precio').val(producto.precio_unitario);
        $('#producto').val(producto.nombre);
        $('#id_producto').val(producto.id);
        document.getElementById('lista-productos').style.display = 'none'; // Ocultar la lista
    }

    function limpiar() {
        $('#img').removeAttr('src');
        $('#precio').val('');
        $('#cantidad').val('');
        $('#subtotal').val('');
        $('#producto').val('');
        $('#id_producto').val(null);
        document.getElementById('lista-productos').style.display = 'none'; // Ocultar la lista
    }

    $(document).on('change', '#cantidad', function (e) {

        let sub = Number($('#precio').val()) * Number($('#cantidad').val())
        $('#subtotal').val(sub);
    })

    // Agregar eventos
    document.getElementById('producto').addEventListener('input', filtrarProductos);



    $(document).on('click', '#agregar', function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Seguro de agregar este producto?",
            showCancelButton: true,
            confirmButtonText: "Si, Seguro",
            cancelButtonText: "No, Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                const datos = {
                    id: $('#id_producto').val(),
                    producto: $('#producto').val(),
                    precio: $('#precio').val(),
                    cantidad: $('#cantidad').val(),
                    subtotal: $('#subtotal').val(),
                    imagen: $('#img').attr('src'),
                };

                $('#valorTotal').val(Number($('#valorTotal').val()) + Number($('#subtotal').val()))
                pedido.push(datos);

                mostrarPedido();
            }
            limpiar();
        });
    });

    function mostrarPedido() {
        let table = '';
        console.log(pedido);
        
        $.each(pedido, function(index, val) {
                
            table += `
            <tr class="even pointer" id="${val.id}">
            
                <td>
                    <a href="${val.imagen}" class="verImagen">
                    <IMG SRC="${val.imagen}" width="60" height="60">
                    </a>      
                </td>
                <td>${val.producto}</td>
                <td>${val.precio}</td>
                <td>${val.cantidad}</td>
                <td>${val.subtotal}</td>
                <td>
                    <a class="eliminar btn btn-round btn-danger"><i class="fa fa-trash"></i></a>      
                </td>
            </tr>
            `;
        });
        $('#tablaCuerpoVentas').html(table);

    }

    $(document).on('click', '#realizarVenta', function (e) {
        e.preventDefault();
      
        if (pedido.length < 1) {
          return;
        }
        
        Swal.fire({
            title: '¿Estas seguro de realizar la venta?',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                
                const data = {
                  total:  $('#valorTotal').val(),
                  pedido: pedido,
                  operacion: "Vender"
                }
      
                $.post('../../controlador/pedido.controlador.php', data, function (respuesta) {
                  let res = JSON.parse(respuesta)
                  Toast.fire({
                    icon: res[0],
                    title: res[1],
                  })  
                  $('#tablaCuerpoVentas').html('');
                  $('#valorTotal').val('');
                  limpiar();
      
                });
            }
        });
      })
});