<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <!-- Site Title-->
  <title>CalzaShop</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="../../Assets\general\IMG\210x210.png" type="image/x-icon">
  <!-- Stylesheets -->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
  <link rel="stylesheet" href="../../Assets/general/css/bootstrap.css">
  <link rel="stylesheet" href="../../Assets/general/css/style.css">
  <link rel="stylesheet" href="../../Assets/general/css/fonts.css">
  <style>
    .filter-container {
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      max-width: 400px;
      margin: auto;
    }

    h2 {
      margin-top: 0;
      font-size: 24px;
    }

    .range-container {
      display: flex;
      flex-direction: column;
    }

    input[type="range"] {
      -webkit-appearance: none;
      width: 100%;
      background: #ddd;
      height: 8px;
      border-radius: 5px;
      outline: none;
      margin: 10px 0;
    }

    input[type="range"]::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      background: #ff7673;
      cursor: pointer;
      border-radius: 50%;
    }

    input[type="range"]::-moz-range-thumb {
      width: 20px;
      height: 20px;
      background: #ff7673;
      cursor: pointer;
      border-radius: 50%;
    }

    .range-labels {
      display: flex;
      justify-content: space-between;
      font-size: 14px;
      color: #333;
    }

    #currentPrice {
      font-weight: bold;
    }

    .product-image {
      float: left;
      width: 20%;
    }

    .product-details {
      float: left;
      width: 37%;
    }

    .product-price {
      float: left;
      width: 12%;
    }

    .product-quantity {
      float: left;
      width: 10%;
    }

    .product-removal {
      float: left;
      width: 9%;
    }

    .product-line-price {
      float: left;
      width: 12%;
      text-align: right;
    }

    /* This is used as the traditional .clearfix class */
    .group:before,
    .shopping-cart:before,
    .column-labels:before,
    .product:before,
    .totals-item:before,
    .group:after,
    .shopping-cart:after,
    .column-labels:after,
    .product:after,
    .totals-item:after {
      content: '';
      display: table;
    }

    .group:after,
    .shopping-cart:after,
    .column-labels:after,
    .product:after,
    .totals-item:after {
      clear: both;
    }

    .group,
    .shopping-cart,
    .column-labels,
    .product,
    .totals-item {
      zoom: 1;
    }

    /* Apply clearfix in a few places */
    /* Apply dollar signs */
    .product .product-price:before,
    .product .product-line-price:before,
    .totals-value:before {
      content: '$';
    }

    h1 {
      font-weight: 100;
    }

    label {
      color: #aaa;
    }

    .shopping-cart {
      margin-top: -45px;
    }

    /* Column headers */
    .column-labels label {
      padding-bottom: 15px;
      margin-bottom: 15px;
      border-bottom: 1px solid #eee;
    }

    .column-labels .product-image,
    .column-labels .product-details,
    .column-labels .product-removal {
      text-indent: -9999px;
    }

    /* Product entries */
    .product {
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    .product .product-image {
      text-align: center;
    }

    .product .product-image img {
      width: 100px;
    }

    .product .product-details .product-title {
      margin-right: 20px;
      font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
    }

    .product .product-details .product-description {
      margin: 5px 20px 5px 0;
      line-height: 1.4em;
    }

    .product .product-quantity input {
      width: 40px;
    }

    .product .remove-product {
      border: 0;
      padding: 4px 8px;
      background-color: #c66;
      color: #fff;
      font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
      font-size: 12px;
      border-radius: 3px;
    }

    .product .remove-product:hover {
      background-color: #a44;
    }

    /* Totals section */
    .totals .totals-item {
      float: right;
      clear: both;
      width: 100%;
      margin-bottom: 10px;
    }

    .totals .totals-item label {
      float: left;
      clear: both;
      width: 79%;
      text-align: right;
    }

    .totals .totals-item .totals-value {
      float: right;
      width: 21%;
      text-align: right;
    }

    .totals .totals-item-total {
      font-family: 'HelveticaNeue-Medium', 'Helvetica Neue Medium';
    }

    .checkout {
      float: right;
      border: 0;
      margin-top: 20px;
      padding: 6px 25px;
      background-color: #6b6;
      color: #fff;
      font-size: 25px;
      border-radius: 3px;
    }

    .checkout:hover {
      background-color: #494;
    }

    /* Make adjustments for tablet */
    @media screen and (max-width: 650px) {
      .shopping-cart {
        margin: 0;
        padding-top: 20px;
        border-top: 1px solid #eee;
      }

      .column-labels {
        display: none;
      }

      .product-image {
        float: right;
        width: auto;
      }

      .product-image img {
        margin: 0 0 10px 10px;
      }

      .product-details {
        float: none;
        margin-bottom: 10px;
        width: auto;
      }

      .product-price {
        clear: both;
        width: 70px;
      }

      .product-quantity {
        width: 100px;
      }

      .product-quantity input {
        margin-left: 20px;
      }

      .product-quantity:before {
        content: 'x';
      }

      .product-removal {
        width: auto;
      }

      .product-line-price {
        float: right;
        width: 70px;
      }
    }

    /* Make more adjustments for phone */
    @media screen and (max-width: 350px) {
      .product-removal {
        float: right;
      }

      .product-line-price {
        float: right;
        clear: left;
        width: auto;
        margin-top: 10px;
      }

      .product .product-line-price:before {
        content: 'Item Total: $';
      }

      .totals .totals-item label {
        width: 60%;
      }

      .totals .totals-item .totals-value {
        width: 40%;
      }
    }
  </style>
</head>

<body>
  <!-- Page preloader-->
  <div class="page-loader">
    <div class="page-loader-body">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"> </div>
          </div>
          <div class="gap-patch">
            <div class="circle"> </div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"> </div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"> </div>
          </div>
        </div>
        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page-->
  <div class="page">
    <!-- Page Header-->
    <header class="section page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap rd-navbar-corporate">
        <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth"
          data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed"
          data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="130px" data-lg-stick-up-offset="100px"
          data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true"
          data-xl-stick-up="true">

          <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
             
                    <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img class="logo-default" src="../../Assets/general/IMG/calzashop.png" alt="" width="208" /><img class="logo-inverse" src="../../Assets/general/images/logo-inverse-208x46.png" alt="" width="208" height="46"/></a></div>

            </div>
            <div class="rd-navbar-aside-center">
              <div class="rd-navbar-nav-wrap">
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li><a href="index.php">Inicio</a>
                  </li>
                  <li><a href="categorias.php">Categorias</a>
                  </li>
                  <li class="active"><a href="contacts.php">Productos</a>
                  </li>
                  <li><a href="descuentos.php">Descuentos</a>
                  </li>
                    <li><a href="encuentranos.php">Encuentranos</a>
                    </li>
                </ul>
              </div>
            </div>
            <div class="text-right"><a class="button button-sm button-secondary button-nina m-2"
                href="carrito.php"><img src="../../Assets/general/images/carrito.png"
                  alt="carrito" width="40"></a></div>
          </div>
        </nav>
      </div>
    </header>
    <section class="section section-variant-1 bg-default novi-background bg-cover">
      <div class="container container-wide">
        <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
          <div class="col-xl-8">
            <div class="parallax-text-wrap">
              <h3>PEDIDO</h3><span class="parallax-text">PEDIDO</span>
            </div>
            <hr class="divider divider-decorate">
          </div>
          <div class="col-xl-3 text-xl-right">

          </div>
        </div>
        <input type="hidden" id="codigo" value="<?php echo $_GET['orden']; ?>">
        <br><br>
        <div class="shopping-cart">

          <div class="column-labels">
            <label class="product-image">Imagen</label>
            <label class="product-details">Producto</label>
            <label class="product-price">Precio</label>
            <label class="product-quantity">Cantidad</label>
            <label class="product-removal">Quitar</label>
            <label class="product-line-price">Total</label>
          </div>

          <div id="carrito">

          </div>

          <div class="totals">
            <div class="totals-item totals-item-total">
              <label>TOTAL:</label>
              <div class="totals-value" id="cart-total"></div>
            </div>
          </div>
          <br>
        </div>
      </div>
    </section>

    <!-- Footer Minimal-->
    <footer class="section page-footer page-footer-minimal novi-background bg-cover text-center bg-gray-darker">
      <div class="container container-wide">
        <div class="row row-fix justify-content-sm-center align-items-md-center row-30">
          <div class="col-md-10 col-lg-7 col-xl-4 text-xl-left"><a href="index.php"><img class="inverse-logo"
                src="../../Assets/general/IMG/calzashop.png" alt="" width="208" height="46" /></a></div>
          <div class="col-md-10 col-lg-7 col-xl-4">
            <p class="right">&#169;&nbsp;<span class="copyright-year"></span> All Rights Reserved.
              Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">TemplateMonster</a></p>
          </div>
          <div class="col-md-10 col-lg-7 col-xl-4 text-xl-right">
            <ul class="group-xs group-middle">
              <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-facebook"
                  href="https://www.facebook.com/profile.php?id=100021996186633&mibextid=LQQJ4d"></a></li>
              <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-instagram"
                  href="https://www.instagram.com/calzashop_neiva?igsh=MWlod2VuOGtoYm9qbA=="></a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"> </div>
  <!-- Javascript-->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const rangeInput = document.getElementById('priceRange');
      const currentPrice = document.getElementById('currentPrice');

      rangeInput.addEventListener('input', () => {
        currentPrice.textContent = $${ rangeInput.value };
      });
    });

  </script>
  <script src="../../Assets/general/js/core.min.js"></script>
  <script src="../../Assets/general/js/script.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script>

    function mostrarProductos() {
      const productos = JSON.parse(localStorage.getItem('productos')) || [];
      let table = '';

        $.post('../../controlador/pedido.controlador.php', {operacion: "verPedido", codigo: document.getElementById('codigo').value}, function (respuesta) {
            let res = JSON.parse(respuesta);

            if (res.length<1) {
                alert('Orden no encontrada!')
                location.href = './productos.php';
                return;
            }
            
            res.forEach((prod, index) => {
                table += `
                <div class="product">
                    <div class="product-image">
                    <img src="../../controlador/${prod.imagen}">
                    </div>
                    <div class="product-details">
                    <div class="product-title">${prod.nombre}</div>
                    <div class="product-title">${prod.descripcion}</div>
                    </div>
                    <div class="product-price">${prod.valor}</div>
                    <div class="product-line-price">${prod.subtotal}</div>
                </div>

                    `;
            });
                
            document.getElementById('carrito').innerHTML = table;
            document.getElementById('cart-total').innerHTML = res[0]['total'];
        });


      // Suponiendo que tienes un elemento con el ID 'carrito'

    }

    // Llamar a mostrarProductos cuando se cargue la página
    window.onload = function () {
      mostrarProductos();
    };
  </script>

</body>

</html>