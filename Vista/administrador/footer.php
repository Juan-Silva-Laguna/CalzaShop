
        </div>
       <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../Assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../Assets/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../Assets/admin/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../Assets/admin/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../../Assets/admin/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../../Assets/admin/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../Assets/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../../Assets/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../../Assets/admin/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../../Assets/admin/vendors/Flot/jquery.flot.js"></script>
    <script src="../../Assets/admin/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../../Assets/admin/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../../Assets/admin/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../../Assets/admin/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../../Assets/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../../Assets/admin/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../../Assets/admin/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../../Assets/admin/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../../Assets/admin/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../../Assets/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../../Assets/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../Assets/admin/vendors/moment/min/moment.min.js"></script>
    <script src="../../Assets/admin/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../Assets/admin/js/custom.min.js"></script>


    <script src="../../Assets/sweetalert2.all.min.js"></script>
    <script src="../../Assets/admin/js/dataTables.min.js"></script>
    <script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast',
        },
        showConfirmButton: false,
        timer: 3500,
        timerProgressBar: true,
      })

      $(document).ready(function () {

        if (window.innerWidth <= 768) { // Ajusta el tamaño según tus necesidades
          $('#logo_principal').html(`<img src="../../Assets/general/images/icono.png" alt="..." style="width: 60px;">`)
        } else {
          $('#logo_principal').html(`<img src="../../Assets/admin/images/calzashop.png" alt="..." style="width: 140px;">`);
          $('#menu_toggle').on('click', function () {
              if($('#logo_principal').html() == `<img src="../../Assets/general/images/icono.png" alt="..." style="width: 60px;">` ){
                $('#logo_principal').html(`<img src="../../Assets/admin/images/calzashop.png" alt="..." style="width: 140px;">`)
              }else{
                $('#logo_principal').html(`<img src="../../Assets/general/images/icono.png" alt="..." style="width: 60px;">`)
              }
          });
        }  
      });
      $(document).on('click', '#cerra_sesion', function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Seguro que quieres cerrar sesion?",
  
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
                
                        $.post('../../controlador/usuarios.salir.php',datos, function (respuesta) {
                            Toast.fire({
                                icon: 'success',
                                title: respuesta,
                              }).then((t) =>{
                                window.location.href = "../IniciarSesion.php";
                              })
                            
                        })
            } 
          });

      });

                        $.post('../../controlador/pedido.controlador.php',{operacion: 'obtenerTotaldelDia'}, function (respuesta) {
                            $('#tot_global').html(JSON.parse(respuesta).total_suma);
                        })

                        $.post('../../controlador/pedido.controlador.php',{operacion: 'cantidadPedidoOnline'}, function (respuesta) {
                          if (JSON.parse(respuesta) > 0) {
                            $('#not_pedido_online').html('<i class="fa fa-bell"></i>');

                          }
                        })

                        $.post('../../controlador/usuario.controlador.php',{operacion: 'cantidadPorContactar'}, function (respuesta) {
                          if (JSON.parse(respuesta) > 0) {
                            $('#not_contactar').html('<i class="fa fa-bell"></i>');

                          }
                        })

                        $.post('../../controlador/producto.controlador.php',{operacion: 'cantidadProductoAgotado'}, function (respuesta) {
                          if (JSON.parse(respuesta) > 0) {
                            $('#not_productos').html('<i class="fa fa-bell"></i>');

                          }
                        })
    </script>
  </body>
</html>
