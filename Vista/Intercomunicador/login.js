$(document).ready(function(){   

    $(document).on('click', '#btn_iniciar', function (e) {
        e.preventDefault();
        const datos = {
            user: $('#UserEmail').val(),
            password: $('#UserPass').val(), 
        };
        $.post('../controlador/usuarios.ingresar.php', datos, function (respuesta) {
            let datos = JSON.parse(respuesta);

            console.log(datos);
            
            alert(datos[0]);

            if(datos[1] == "alert alert-success"){
                window.location.href = "./administrador/index.php";
            }

        })
      });
      

});