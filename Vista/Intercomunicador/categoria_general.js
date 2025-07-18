$(document).ready(function(){
    traerDatos();

    function traerDatos(){
            
        let operacion = 'Consultar';   
        $.post('../../controlador/categoria.controlador.php', {operacion}, function (respuesta) {
            var table = '';     
                        
            $.each(JSON.parse(respuesta), function(index, val) {

                table += `
                <div class="col-md-6 col-lg-3">
                    <a href="./productos.php?categoria=${val.id}">
                        <div class="team-classic team-classic-circle">
                            <figure><img class="rounded-circle" src="../../controlador/${val.imagen}" alt="" width="300" height="300"/>
                            </figure>
                            <div class="team-classic-caption">
                            <h5><a class="team-classic-title" href="#">${val.nombre}</a></h5>
                            <p class="team-classic-job-position">${val.descripcion}</p>
                            
                            </div>
                        </div>
                    </a>
                </div>
                `;
            });
            
            $('#categorias').html(table);
        })
        .fail(function(){
            alertify.error();
            Toast.fire({
                icon: 'info',
                title: 'No hay datos en la tabla',
              })
        })
    }
     

});