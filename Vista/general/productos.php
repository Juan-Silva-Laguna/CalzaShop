<!DOCTYPE html>
<html class="wide wow-animation" lang="en"> 
  <head>
    <!-- Site Title-->
    <title>CalzaShop</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../..//Assets/general/images/icono.png" type="image/png" />
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald:200,400%7CLato:300,400,300italic,700%7CMontserrat:900">
    <link rel="stylesheet" href="../../Assets/general/css/bootstrap.css">
    <link rel="stylesheet" href="../../Assets/general/css/style.css">
    <link rel="stylesheet" href="../../Assets/general/css/fonts.css">
		<!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="../../Assets/general/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="../../Assets/general/js/html5shiv.min.js"> </script>
		<![endif]--> 
    
    <link rel="stylesheet" href="../../Assets/sweetalert2.min.css">

    <style>
      .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
      }

      .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
      }

      .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
      }

      .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
      }

      .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
      }

      .colored-toast .swal2-title {
        color: white;
      }

      .colored-toast .swal2-close {
        color: white;
      }

      .colored-toast .swal2-html-container {
        color: white;
      }

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

        .texto-con-linea {
            position: relative;
            display: inline-block;
            text-align: center;
        }
        .texto-con-linea::before {
            content: '';
            position: absolute;
            top: 50%; /* Centrar verticalmente */
            left: 0;
            right: 0;
            height: 1px; /* Grosor de la línea */
            background-color: black; /* Color de la línea */
            z-index: 1; /* Asegura que la línea esté detrás del texto */
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
          <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="130px" data-lg-stick-up-offset="100px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
            
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="index.php"><img class="logo-default" src="../../Assets/general/IMG/calzashop.png" alt="" width="208" /></a></div>
                </div>
              <div class="rd-navbar-aside-center">
                <div class="rd-navbar-nav-wrap">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li><a href="index.php">Inicio</a>
                    </li>
                    <li><a href="categorias.php">Categorias</a>
                    </li>
                    <li  class="active"><a href="productos.php">Productos</a>
                    </li>
                    <li><a href="descuentos.php">Descuentos</a>
                    </li>
                    <li><a href="encuentranos.php">Encuentranos</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="text-right"><a class="button button-sm button-secondary button-nina m-2" href="carrito.php"><img src="../../Assets/general/images/carrito.png" alt="carrito" width="40"></a></div>
            </div>
          </nav>
        </div>
      </header>
      <section class="section section-variant-1 bg-default novi-background bg-cover"> 
        <div class="container container-wide">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
            <div class="col-xl-8">
              <div class="parallax-text-wrap">
                <h3>PRODUCTOS</h3><span class="parallax-text">PRODUCTOS</span>
              </div>
              <hr class="divider divider-decorate">
            </div>
            <div class="col-xl-3 text-xl-right">
              
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="../../Assets/general/bat/rd-mailform.php">
                <div class="row row-fix row-20">
                  <div class="col-md-12">
                    <div class="form-wrap form-wrap-validation">
                      <label class="form-label-outside" for="text_buscar">Buscar</label>
                      <input class="form-input" id="text_buscar" type="search" name="buscar" />
                    </div>
                  </div>

                  <div class="col-md-12">
                    <label class="form-label-outside" for="form-1-email">Talla</label>

                    <div class="form-wrap form-wrap-validation ml-2 tallas">
                      <div class="checkbox-container row">
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-5" class="checkbox-input checkbox-input-white">
                          <label for="talla-5" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">5</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-6" class="checkbox-input checkbox-input-white">
                          <label for="talla-6" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">6</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-7" class="checkbox-input checkbox-input-white">
                          <label for="talla-7" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">7</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-8" class="checkbox-input checkbox-input-white">
                          <label for="talla-8" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">8</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-9" class="checkbox-input checkbox-input-white">
                          <label for="talla-9" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">9</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-27" class="checkbox-input checkbox-input-white">
                          <label for="talla-27" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">27</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-28" class="checkbox-input checkbox-input-white">
                          <label for="talla-28" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">28</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-29" class="checkbox-input checkbox-input-white">
                          <label for="talla-29" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">29</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-30" class="checkbox-input checkbox-input-white">
                          <label for="talla-30" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">30</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-31" class="checkbox-input checkbox-input-white">
                          <label for="talla-31" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">31</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-32" class="checkbox-input checkbox-input-white">
                          <label for="talla-32" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">32</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-33" class="checkbox-input checkbox-input-white">
                          <label for="talla-33" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">33</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-34" class="checkbox-input checkbox-input-white">
                          <label for="talla-34" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">34</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-35" class="checkbox-input checkbox-input-white">
                          <label for="talla-35" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">35</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-36" class="checkbox-input checkbox-input-white" >
                          <label for="talla-36" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">36</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-37" class="checkbox-input checkbox-input-white" >
                          <label for="talla-37" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">37</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-38" class="checkbox-input checkbox-input-white"  >
                          <label for="talla-38" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">38</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-39" class="checkbox-input checkbox-input-white" >
                          <label for="talla-39" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">39</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-40" class="checkbox-input checkbox-input-white" >
                          <label for="talla-40" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">40</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-41" class="checkbox-input checkbox-input-white">
                          <label for="talla-41" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">41</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-42" class="checkbox-input checkbox-input-white">
                          <label for="talla-42" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">42</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-43" class="checkbox-input checkbox-input-white">
                          <label for="talla-43" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">43</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-xs" class="checkbox-input checkbox-input-white">
                          <label for="talla-xs" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">XS</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-s" class="checkbox-input checkbox-input-white">
                          <label for="talla-s" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">S</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-m" class="checkbox-input checkbox-input-white">
                          <label for="talla-m" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">M</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-l" class="checkbox-input checkbox-input-white">
                          <label for="talla-l" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">L</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-xl" class="checkbox-input checkbox-input-white">
                          <label for="talla-xl" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">XL</span>
                        </div>
                        <br>
                        <div class="col-md-6">
                          <input type="checkbox" id="talla-xxl" class="checkbox-input checkbox-input-white">
                          <label for="talla-xxl" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">XXL</span>
                        </div>
                        <div class="col-md-6">
                          <input type="checkbox" id="talla-xxxl" class="checkbox-input checkbox-input-white">
                          <label for="talla-xxxl" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">XXXL</span>
                        </div>
                    </div>

                    </div>
                  </div>
                  <div class="col-md-12">
                    <label class="form-label-outside" for="form-1-email">Precio</label>
                    <div class="filter-container">
                        <div class="range-container">
                            <input type="range" id="rangoPrecio" min="30000" max="200000" step="10" value="200000">
                            <div class="range-labels">
                                <span id="minPrice">$30.000</span>
                                <span id="maxPrice">$200.000</span>
                                <span id="currentPrice">$200.00</span>
                            </div>
                        </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <label class="form-label-outside" for="form-1-email">Colores</label>

                    <div class="form-wrap form-wrap-validation ml-2 colores">
                      <div class="checkbox-container row">
                        <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="black-checkbox" class="checkbox-input checkbox-input-negro">
                          <label for="black-checkbox" class="checkbox-label checkbox-label-negro"></label>
                          <span class="checkbox-text">Negro</span>
                        </div>
                        <div class="col-md-4 col-sm-4 col-4">
                            <input type="checkbox" id="white-checkbox" class="checkbox-input checkbox-input-white">
                            <label for="white-checkbox" class="checkbox-label checkbox-label-white"></label>
                            <span class="checkbox-text">Blanco</span>
                        </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="blue-checkbox" class="checkbox-input checkbox-input-blue">
                          <label for="blue-checkbox" class="checkbox-label checkbox-label-blue"></label>
                          <span class="checkbox-text">Azul</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="red-checkbox" class="checkbox-input checkbox-input-red">
                          <label for="red-checkbox" class="checkbox-label checkbox-label-red"></label>
                          <span class="checkbox-text">Rojo</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="yellow-checkbox" class="checkbox-input checkbox-input-yellow">
                          <label for="yellow-checkbox" class="checkbox-label checkbox-label-yellow"></label>
                          <span class="checkbox-text">Amarillo</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="beige-checkbox" class="checkbox-input checkbox-input-beige">
                          <label for="beige-checkbox" class="checkbox-label checkbox-label-beige"></label>
                          <span class="checkbox-text">Beige</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="coffe-checkbox" class="checkbox-input checkbox-input-coffe">
                          <label for="coffe-checkbox" class="checkbox-label checkbox-label-coffe"></label>
                          <span class="checkbox-text">Café</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="lightblue-checkbox" class="checkbox-input checkbox-input-lightblue">
                          <label for="lightblue-checkbox" class="checkbox-label checkbox-label-lightblue"></label>
                          <span class="checkbox-text">Celeste</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="chocolate-checkbox" class="checkbox-input checkbox-input-chocolate">
                          <label for="chocolate-checkbox" class="checkbox-label checkbox-label-chocolate"></label>
                          <span class="checkbox-text">Chocolate</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="coral-checkbox" class="checkbox-input checkbox-input-coral">
                          <label for="coral-checkbox" class="checkbox-label checkbox-label-coral"></label>
                          <span class="checkbox-text">Coral</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="raw-checkbox" class="checkbox-input checkbox-input-raw">
                          <label for="raw-checkbox" class="checkbox-label checkbox-label-raw"></label>
                          <span class="checkbox-text">Crudo</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="gold-checkbox" class="checkbox-input checkbox-input-gold">
                          <label for="gold-checkbox" class="checkbox-label checkbox-label-gold"></label>
                          <span class="checkbox-text">Dorado</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="fuchsia-checkbox" class="checkbox-input checkbox-input-fuchsia">
                          <label for="fuchsia-checkbox" class="checkbox-label checkbox-label-fuchsia"></label>
                          <span class="checkbox-text">Fucsia</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="gray-checkbox" class="checkbox-input checkbox-input-gray">
                          <label for="gray-checkbox" class="checkbox-label checkbox-label-gray"></label>
                          <span class="checkbox-text">Gris</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="lilac-checkbox" class="checkbox-input checkbox-input-lilac">
                          <label for="lilac-checkbox" class="checkbox-label checkbox-label-lilac"></label>
                          <span class="checkbox-text">Lila</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="brown-checkbox" class="checkbox-input checkbox-input-brown">
                          <label for="brown-checkbox" class="checkbox-label checkbox-label-brown"></label>
                          <span class="checkbox-text">Marrón</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="purple-checkbox" class="checkbox-input checkbox-input-purple">
                          <label for="purple-checkbox" class="checkbox-label checkbox-label-purple"></label>
                          <span class="checkbox-text">Morado</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="multicol" class="checkbox-input checkbox-input-multicolor">
                          <label for="multicol" class="checkbox-label checkbox-label-multicolor"></label>
                          <span class="checkbox-text">Multicolor</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="orange-checkbox" class="checkbox-input checkbox-input-orange">
                          <label for="orange-checkbox" class="checkbox-label checkbox-label-orange"></label>
                          <span class="checkbox-text">Naranja</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="natural-checkbox" class="checkbox-input checkbox-input-natural">
                          <label for="natural-checkbox" class="checkbox-label checkbox-label-natural"></label>
                          <span class="checkbox-text">Natural</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="silver-checkbox" class="checkbox-input checkbox-input-silver">
                          <label for="silver-checkbox" class="checkbox-label checkbox-label-silver"></label>
                          <span class="checkbox-text">Plateado</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="pink-checkbox" class="checkbox-input checkbox-input-pink">
                          <label for="pink-checkbox" class="checkbox-label checkbox-label-pink"></label>
                          <span class="checkbox-text">Rosa</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="green-checkbox" class="checkbox-input checkbox-input-green">
                          <label for="green-checkbox" class="checkbox-label checkbox-label-green"></label>
                          <span class="checkbox-text">Verde</span>
                      </div>
                      
                      <div class="col-md-4 col-sm-4 col-4">
                          <input type="checkbox" id="violet-checkbox" class="checkbox-input checkbox-input-violet">
                          <label for="violet-checkbox" class="checkbox-label checkbox-label-violet"></label>
                          <span class="checkbox-text">Violeta</span>
                      </div>
                      
                    </div>
                
                    </div>
                  </div>
                  <!-- <div class="col-md-12">
                    <label class="form-label-outside" for="form-1-email">Género</label>

                    <div class="form-wrap form-wrap-validation ml-2">
                      <div class="checkbox-container row">
                        <div class="col-4">
                          <input type="checkbox" id="femenino" class="checkbox-input checkbox-input-white">
                          <label for="femenino" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">Femenino</span>
                        </div>
                        <div class="col-4">
                          <input type="checkbox" id="masculino" class="checkbox-input checkbox-input-white">
                          <label for="masculino" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">Masculino</span>
                        </div>
                        <div class="col-4">
                          <input type="checkbox" id="unisex" class="checkbox-input checkbox-input-white">
                          <label for="unisex" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">Unisex</span>
                        </div>
                        <div class="col-4">
                          <input type="checkbox" id="junior" class="checkbox-input checkbox-input-white">
                          <label for="junior" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">Junior</span>
                        </div>
                        <div class="col-4">
                          <input type="checkbox" id="infantil" class="checkbox-input checkbox-input-white">
                          <label for="infantil" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">Infantil</span>
                        </div> 
                        <div class="col-4">
                          <input type="checkbox" id="bebes" class="checkbox-input checkbox-input-white">
                          <label for="bebes" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">Bebes</span>
                        </div>
                    </div>
                
                    </div>
                  </div> -->
                  <div class="col-sm-12 offset-custom-1">
                    <div class="form-button">
                      <button class="button button-secondary button-nina" id="btn_buscar" type="submit">Buscar</button>
                    </div>
                    <br>
                  </div>
                </div>
              </form>
            </div>
            <input type="hidden" id="id_categoria" value="<?php echo isset($_GET['categoria']) ? $_GET['categoria'] : 'null'; ?>">
            <div class="col-md-9">
              <div class="row row-50" id="productos">
                
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer Minimal-->
      <footer class="section page-footer page-footer-minimal novi-background bg-cover text-center bg-gray-darker">
        <div class="container container-wide">
          <div class="row row-fix justify-content-sm-center align-items-md-center row-30">
            <div class="col-md-10 col-lg-7 col-xl-4 text-xl-left"><a href="index.php"><img class="inverse-logo" src="../../Assets/general/IMG/calzashop.png" alt="" width="208" /></a></div>
            <div class="col-md-10 col-lg-7 col-xl-4">
              <p class="right">&#169;&nbsp;<span class="copyright-year"></span> All Rights Reserved. Design&nbsp;by&nbsp;<a href="https://www.templatemonster.com">TemplateMonster</a></p>
            </div>
            <div class="col-md-10 col-lg-7 col-xl-4 text-xl-right">
              <ul class="group-xs group-middle"> 
                <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-facebook" href="https://www.facebook.com/profile.php?id=100021996186633&mibextid=LQQJ4d"></a></li>
                <li><a class="icon novi-icon icon-md-middle icon-circle icon-secondary-5-filled mdi mdi-instagram" href="https://www.instagram.com/calzashop_neiva?igsh=MWlod2VuOGtoYm9qbA=="></a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"> </div>
    <!-- Javascript-->
     
    <script src="../../Assets/general/js/core.min.js"></script>
    <script src="../../Assets/general/js/script.js"></script>
    
    <script src="../../Assets/sweetalert2.all.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
          const rangeInput = document.getElementById('rangoPrecio');
          const currentPrice = document.getElementById('currentPrice');

          rangeInput.addEventListener('input', () => {
              currentPrice.textContent = `$${rangeInput.value}`;
          });
      });

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

    </script> 

    <!-- coded by barber-->
     <script src="../Intercomunicador/producto_general.js"></script>
  </body>
</html>