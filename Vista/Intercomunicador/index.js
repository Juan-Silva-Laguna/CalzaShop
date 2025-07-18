// $(document).ready(function(){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    customClass: {
      popup: 'colored-toast',
    },
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
  })
  
traerDescuentos();
  traerCategorias();
  function traerDescuentos(){   
      const datos = {
        operacion: 'ConsultarDescuentosAleatorios'
      };
      $.post('../../controlador/producto.controlador.php', datos, function (respuesta) {
        var cont = '';      
        $.each(JSON.parse(respuesta), function(index, val) {
            
            cont += `
            <article class="post-blog"><a class="post-blog-image" href="descuentos.php"><img src="../../controlador/${val.imagen}" alt="" width="570" height="415"/></a>
              <div class="post-blog-caption">
                <div class="post-blog-caption-header">
                  <ul class="post-blog-tags">
                    <li><a class="button-tags" href="descuentos.php">${val.nombre}  </a></li>
                  </ul>
                  <ul class="post-blog-meta">
                    <li><span>by</span>&nbsp;<a href="#">Michelle Montoya</a></li>
                  </ul>
                </div>
                <div class="post-blog-caption-body">
                  <h5><a class="post-blog-title" href="descuentos.php"> ${val.descuento}% DESCUENTO EN ${val.nombre.toUpperCase()}  </a></h5>
                </div>
              </div>
            </article>

            `;
        });

        $('#descuentos').html(cont);
    })
    .fail(function(){
        Toast.fire({
            icon: 'info',
            title: 'No hay descuentos',
          })
    })
    
  }

  
  function traerCategorias(){   
    const datos = {
      operacion: 'ConsultarAleatorios'
    };
    $.post('../../controlador/categoria.controlador.php', datos, function (respuesta) {
      var cont = '';      
      $.each(JSON.parse(respuesta), function(index, val) {
          
          cont += `

            <div class="col-md-6 col-xl-4">
                <article class="event-default-wrap">
                  <div class="event-default">
                    <figure class="event-default-image"><img src="../../controlador/${val.imagen}" alt="" width="570" height="370"/>
                    </figure>
                    <div class="event-default-caption"><a href="./productos.php?categoria=${val.id}" class="button button-secondary button-nina"> Ver </a>></div>
                  </div>
                  <div class="event-default-inner">
                    <span class="heading-5"> ${val.nombre.toUpperCase()}</span>
                  </div>
                </article>
            </div>
          `;
      });

      $('#categorias').html(cont);
  })
  .fail(function(){
      Toast.fire({
          icon: 'info',
          title: 'No hay descuentos',
        })
  })
  
}

$(document).on('click', '#btnContactar', function (e) {
  e.preventDefault();
  if ($('#nombre').val() == '' || $('#celular').val() == '' ) {
    Toast.fire({
      icon: 'error',
      title: 'Campos oblicatorios para poderte contactar',
    });
    
    return;
  }
  const datos = {
      nombre: $('#nombre').val(),
      celular: $('#celular').val(),
      operacion: 'AgregarContactar'
  };
  $.post('../../controlador/usuario.controlador.php', datos, function (respuesta) {
      if (respuesta == '1' || respuesta == 1) {
        Toast.fire({
          icon: 'success',
          title: 'Gracias por brindarnos sus datos, muy pronto nos comunicaremos.',
        });
        
      }
      
      $('#nombre').val('');
      $('#celular').val('');
  })
});

// });
