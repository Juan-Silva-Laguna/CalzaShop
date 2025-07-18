$(document).ready(function(){

    traerDatos();
    
    function traerDatos(){   
        const datos = {
          operacion: 'ConsultarDescuentos'
        };
        $.post('../../controlador/producto.controlador.php', datos, function (respuesta) {
          var table = '';      
          $.each(JSON.parse(respuesta), function(index, val) {
              let value = '';
              if (val.descuento>0) {
                  let descuento = val.precio_unitario*(val.descuento/100);
                  let valor = val.precio_unitario-descuento;

                  value = `
                      <span class="heading-5"> 
                          <span class="texto-con-linea" style="color: #ccc;">
                          $ ${val.precio_unitario}
                          </span> 
                          $ ${valor}
                      </span>
                  `;
              }else{
                  value = `<span class="heading-5">$ ${val.precio_unitario}</span>`;
              }
              

              table += `
              <div class="col-md-4 col-xl-3">
                <article class="event-default-wrap">
                  <div class="event-default">
                    <figure class="event-default-image"><img src="../../controlador/${val.imagen}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina button-agregar-carrito" href="#" data-img="${val.imagen}" data-nom="${val.nombre}" data-pr="${val.precio_unitario}" data-des="${val.descuento}" data-descrip="${val.descripcion}" data-id="${val.id}">Agregar +</a></div>
                  </div>
                  <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">${val.nombre} </a></h5>
                    ${value}
                  </div>
                </article>
              </div>
              `;
          });
          
          $('#productos').html(table);
      })
      .fail(function(){
          alertify.error('No hay datos en la tabla');
          Toast.fire({
              icon: 'info',
              title: 'No hay datos en la tabla',
            })
      })
      
  }

function agregarProducto(img, nom, pr, des, descrip,id) {
    Swal.fire({
        title: '¿Cuántos productos te gustaría agregar?',
        input: 'number',
        inputAttributes: {
            min: 1,
            max: 100,
            step: 1
        },
        showCancelButton: true,
        confirmButtonText: 'Agregar',
        cancelButtonText: 'Cancelar',
        inputValidator: (value) => {
            if (!value) {
                return '¡Necesitas ingresar un número!';
            }
            if (value < 1) {
                return '¡El número debe ser al menos 1!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // Aquí puedes manejar el resultado
            const cant = result.value;
            Toast.fire({
              icon: 'success',
              title: `Has agregado ${cant} productos.`,
            })
            // Aquí puedes agregar lógica para procesar la cantidad de productos

            // Crear un objeto del producto
            let descuento = pr*(des/100);
            let valor = pr-descuento;

            const producto = {
                imagen: img,
                nombre: nom,
                precio: valor,
                descuento: des,
                cantidad: cant,
                subtotal: (valor*cant),
                descripcion: descrip,
                id: id
            };

            // Obtener productos existentes del localStorage
            let productos = JSON.parse(localStorage.getItem('productos')) || [];

            // Añadir el nuevo producto al array
            productos.push(producto);

            // Guardar el array actualizado en localStorage
            localStorage.setItem('productos', JSON.stringify(productos));
        }
    });
 }

  $(document).on('click', '.button-agregar-carrito', function(event) {
    event.preventDefault();
    const img = $(this).data('img');
    const nom = $(this).data('nom');
    const pr = $(this).data('pr');
    const des = $(this).data('des');
    const descrip = $(this).data('descrip');
    const id = $(this).data('id');
    agregarProducto(img, nom, pr, des, descrip, id);
});


  $(document).on('click', '#btn_buscar', function(event) {
      event.preventDefault();
      
      const data = {
        colores: traerColores(),
        tallas: traerTallas(),
        rango_precio: $('#rangoPrecio').val(),
        text_buscar: $('#text_buscar').val(),
        operacion: "busqueda_avanzada_descuentos"
      }

      $.post('../../controlador/producto.controlador.php', data, function (respuesta) {
        var table = '';      
          $.each(JSON.parse(respuesta), function(index, val) {
              let value = '';
              if (val.descuento>0) {
                  let descuento = val.precio_unitario*(val.descuento/100);
                  let valor = val.precio_unitario-descuento;

                  value = `
                      <span class="heading-5"> 
                          <span class="texto-con-linea" style="color: #ccc;">
                          $ ${val.precio_unitario}
                          </span> 
                          $ ${valor}
                      </span>
                  `;
              }else{
                  value = `<span class="heading-5">$ ${val.precio_unitario}</span>`;
              }
              

              table += `
              <div class="col-md-4 col-xl-3">
                <article class="event-default-wrap">
                  <div class="event-default">
                    <figure class="event-default-image"><img src="../../controlador/${val.imagen}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a class="button button-xs button-secondary button-nina button-agregar-carrito" href="#" data-img="${val.imagen}" data-nom="${val.nombre}" data-pr="${val.precio_unitario}" data-des="${val.descuento}" data-descrip="${val.descripcion}">Agregar +</a></div>
                  </div>
                  <div class="event-default-inner">
                    <h5><a class="event-default-title" href="#">${val.nombre} </a></h5>
                    ${value}
                  </div>
                </article>
              </div>
              `;
          });
          
          $('#productos').html(table);
    })
    .fail(function(){
        alertify.error('No hay datos en la tabla');
        Toast.fire({
            icon: 'info',
            title: 'No hay datos en la tabla',
          })
    })

  });

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


});