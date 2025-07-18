$(document).ready(function(){
    read();
    
    $('#frmUsuario').submit(function (e) {
        e.preventDefault();         
        let datos = {
                id: $('#id').val(),
                nombre: $('#nombre').val(),
                celular: $('#celular').val(),
                rol: $('#rol').val(),                
                clave: $('#clave').val(),
                correo: $('#correo').val(),
                operacion: 'Edito'
            };
        
            
        
        $.post('../../controlador/usuario.controlador.php', datos, function (respuesta) {
            if (respuesta == '1' || respuesta == 1) {
                Toast.fire({
                    icon: 'success',
                    title: `Sus datos han sido actualizados con exito!!'`,
                  })
            }else{
                Toast.fire({
                    icon: 'error',
                    title: `Error no se pueden actualizar tus datos`,
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
        const datos = {
            id: $('#id').val(),
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
            
        })
        
    }

});