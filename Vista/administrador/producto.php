<?php include('header.php'); ?>
<style>
  /* checks */

/* Contenedor del checkbox */
.checkbox-container {
    display: flex;
    align-items: center;
    font-family: Arial, sans-serif;
}

/* Estilo para el checkbox oculto */
.checkbox-input {
    display: none;
}

/* Estilo para la etiqueta del checkbox */
.checkbox-label {
    position: relative;
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: #fff; /* Color de fondo blanco */
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, border-color 0.3s;
    /* margin-left: 10px; */
    margin-bottom: -5px;
    margin-top: 5px;

}

.checkbox-label-negro {
  border: 2px solid black;
}

.checkbox-input-negro:checked + .checkbox-label-negro {
    background-color: black;
    border-color: black;
}

/* Indicador de checkmark */
.checkbox-label::after {
    content: "";
    position: absolute;
    left: 6px; /* Ajusta la posición horizontal */
    width: 6px;
    height: 12px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
    opacity: 0;
}

/* Mostrar el checkmark cuando el checkbox está marcado */
.checkbox-input:checked + .checkbox-label::after {
    opacity: 1;
}

/* Texto al lado del checkbox */
.checkbox-text {
    margin-left: 10px;
    font-size: 10px;
}

/* White */
.checkbox-label-white {
    border: 2px solid #b3b3b3;
}
.checkbox-input-white:checked + .checkbox-label-white {
    background-color: #b3b3b3;
    border-color: #b3b3b3;
}

/* Blue */
.checkbox-label-blue {
    border: 2px solid #0000ff;
}
.checkbox-input-blue:checked + .checkbox-label-blue {
    background-color: #0000ff;
    border-color: #0000ff;
}

/* Red */
.checkbox-label-red {
    border: 2px solid #ff0000;
}
.checkbox-input-red:checked + .checkbox-label-red {
    background-color: #ff0000;
    border-color: #ff0000;
}

/* Yellow */
.checkbox-label-yellow {
    border: 2px solid #ffff00;
}
.checkbox-input-yellow:checked + .checkbox-label-yellow {
    background-color: #ffff00;
    border-color: #ffff00;
}

/* Beige */
.checkbox-label-beige {
    border: 2px solid #f5f5dc;
}
.checkbox-input-beige:checked + .checkbox-label-beige {
    background-color: #f5f5dc;
    border-color: #f5f5dc;
}

/* Brown */
.checkbox-label-brown {
    border: 2px solid #a52a2a;
}
.checkbox-input-brown:checked + .checkbox-label-brown {
    background-color: #a52a2a;
    border-color: #a52a2a;
}

/* Light Blue */
.checkbox-label-lightblue {
    border: 2px solid #add8e6;
}
.checkbox-input-lightblue:checked + .checkbox-label-lightblue {
    background-color: #add8e6;
    border-color: #add8e6;
}

/* Chocolate */
.checkbox-label-chocolate {
    border: 2px solid #d2691e;
}
.checkbox-input-chocolate:checked + .checkbox-label-chocolate {
    background-color: #d2691e;
    border-color: #d2691e;
}

/* Coral */
.checkbox-label-coral {
    border: 2px solid #ff7f50;
}
.checkbox-input-coral:checked + .checkbox-label-coral {
    background-color: #ff7f50;
    border-color: #ff7f50;
}

/* Raw */
.checkbox-label-raw {
    border: 2px solid #f5f5f5;
}
.checkbox-input-raw:checked + .checkbox-label-raw {
    background-color: #f5f5f5;
    border-color: #f5f5f5;
}

/* Gold */
.checkbox-label-gold {
    border: 2px solid #ffd700;
}
.checkbox-input-gold:checked + .checkbox-label-gold {
    background-color: #ffd700;
    border-color: #ffd700;
}

/* Fuchsia */
.checkbox-label-fuchsia {
    border: 2px solid #ff00ff;
}
.checkbox-input-fuchsia:checked + .checkbox-label-fuchsia {
    background-color: #ff00ff;
    border-color: #ff00ff;
}

/* Gray */
.checkbox-label-gray {
    border: 2px solid #808080;
}
.checkbox-input-gray:checked + .checkbox-label-gray {
    background-color: #808080;
    border-color: #808080;
}

/* Lilac */
.checkbox-label-lilac {
    border: 2px solid #c8a2c8;
}
.checkbox-input-lilac:checked + .checkbox-label-lilac {
    background-color: #c8a2c8;
    border-color: #c8a2c8;
}

/* Purple */
.checkbox-label-purple {
    border: 2px solid #800080;
}
.checkbox-input-purple:checked + .checkbox-label-purple {
    background-color: #800080;
    border-color: #800080;
}

/* Multicolor */
.checkbox-label-multicolor {
    border: 2px solid #ff69b4;
}
.checkbox-input-multicolor:checked + .checkbox-label-multicolor {
    background-color: #ff69b4;
    border-color: #ff69b4;
}

/* Orange */
.checkbox-label-orange {
    border: 2px solid #ffa500;
}
.checkbox-input-orange:checked + .checkbox-label-orange {
    background-color: #ffa500;
    border-color: #ffa500;
}

/* Natural */
.checkbox-label-natural {
    border: 2px solid #f0e68c;
}
.checkbox-input-natural:checked + .checkbox-label-natural {
    background-color: #f0e68c;
    border-color: #f0e68c;
}

/* Silver */
.checkbox-label-silver {
    border: 2px solid #c0c0c0;
}
.checkbox-input-silver:checked + .checkbox-label-silver {
    background-color: #c0c0c0;
    border-color: #c0c0c0;
}

/* Pink */
.checkbox-label-pink {
    border: 2px solid #ffc0cb;
}
.checkbox-input-pink:checked + .checkbox-label-pink {
    background-color: #ffc0cb;
    border-color: #ffc0cb;
}

/* Green */
.checkbox-label-green {
    border: 2px solid #008000;
}
.checkbox-input-green:checked + .checkbox-label-green {
    background-color: #008000;
    border-color: #008000;
}

/* Violet */
.checkbox-label-violet {
    border: 2px solid #ee82ee;
}
.checkbox-input-violet:checked + .checkbox-label-violet {
    background-color: #ee82ee;
    border-color: #ee82ee;
}
.resaltar{
  background-color: #ff767347;
}
</style>

<div class="right_col" role="main">
    <div class="col-md-4 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Productos</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" id="frmProducto">
                  <input type="hidden" id="id">
                  <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <img src="" id="img" width="180" alt="">
                    </div>
                  </div>
                  <div class="form-group row">
                    
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Imagen</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="file" id="imagen" name="imagen" class="form-control" data-inputmask="'mask': '99-999999'">
                      <span class="fa fa-camera form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control"id="nombre" name="nombre" data-inputmask="'mask': '99/99/9999'">
                      <span class="fa form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Categoria</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <select id="categoria" name="id_categoria" class="form-control" >

                      </select>
                      <span class="fa  form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Valor</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="number" class="form-control" id="precio" name="precio" data-inputmask="'mask': '99/99/9999'">
                      <span class="fa  form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Stock</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="number" class="form-control" id="cantidad" name="cantidad" data-inputmask="'mask': '99/99/9999'">
                      <span class="fa  form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Descuento</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="number" class="form-control" id="descuento" name="descuento" data-inputmask="'mask': '99/99/9999'">
                      <span class="fa  form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Descripcion:</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                      <span class="fa  form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Tallas</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                    
                    </div>
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
                          <input type="checkbox" id="talla-36" class="checkbox-input checkbox-input-white" checked>
                          <label for="talla-36" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">36</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-37" class="checkbox-input checkbox-input-white" checked>
                          <label for="talla-37" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">37</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-38" class="checkbox-input checkbox-input-white"  checked>
                          <label for="talla-38" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">38</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-39" class="checkbox-input checkbox-input-white" checked>
                          <label for="talla-39" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">39</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-40" class="checkbox-input checkbox-input-white" checked>
                          <label for="talla-40" class="checkbox-label checkbox-label-white"></label>
                          <span class="checkbox-text">40</span>
                        </div>
                        <div class="col-md-3 col-sm-4 col-4">
                          <input type="checkbox" id="talla-41" class="checkbox-input checkbox-input-white"checked>
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

                  <div class="form-group row mt-4">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Colores</label>

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
                  </div>
                  
                  <div class="ln_solid"></div>

                  <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                      <button type="submit" class="btn btn-success" id="btnFormu">GUARDAR</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
      <div class="col-md-8">
      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tablaProductos">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nombre de producto </th>
                            <th class="column-title">Categoria </th>
                            <th class="column-title">Valor unitario </th>
                            <th class="column-title">Stock </th>
                            <th class="column-title">Descuentos</th>
                            <th class="column-title">Tallas</th>
                            <th class="column-title">Colores</th>
                            <th class="column-title">Imagen</th>
                            <th class="column-title">Editar</th>
                            <th class="column-title">Eliminar</th>

                            <tbody id="tablaCuerpoProductos">

                        </tbody>
                      </table>
                    </div>
      </div>

</div>



<?php include('./footer.php'); ?>

<script src="../Intercomunicador/producto.js"></script>
    