<?php include('header.php'); ?>

<div class="right_col" role="main">
    <div class="col-md-4 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Ventas</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" id="frmVenta">
                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 col-xs-3"></label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <img src="" id="img" width="180" alt="">
                    </div>
                  </div>
                  <input type="hidden" id="id_producto">
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Buscar Producto</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <input type="text" id="producto" class="form-control" placeholder="Escriba para buscar productos" />
                        <ul id="lista-productos" class="list-group mt-2" style="display: none;"></ul>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Precio</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="number" class="form-control" id="precio" name="precio" min="1" disabled>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Cantidad</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="number" class="form-control" id="cantidad" name="cantidad" min="1">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Subtotal</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control" id="subtotal" name="subtotal" disabled readonly>
                    </div>
                  </div>
                  
                  <div class="ln_solid"></div>

                  <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                      <button type="submit" id="agregar" class="btn btn-success">AGREGAR +</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
      <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-striped jambo_table bulk_action">
          <thead>
            <tr class="headings">
              <th class="column-title">Imagen</th>
              <th class="column-title">Producto</th>
              <th class="column-title">Precio</th>
              <th class="column-title">Cantidad</th>
              <th class="column-title">Subtotal</th>
              <th class="column-title">Opciones</th>
            </tr>
          </thead>

          <tbody id="tablaCuerpoVentas">
          </tbody>
        </table>
        
      </div>
    </div>
    <div class="form-group row">
      <label class="control-label col-md-3 col-sm-3 col-xs-3">Valor total</label>
      <div class="col-md-9 col-sm-9 col-xs-9">
        <input type="text" class="form-control" id="valorTotal" name="valorTotal" readonly>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-9 offset-md-3">
        <button type="submit" class="btn btn-success" id="realizarVenta" >REALIZAR VENTA</button>
      </div>
    </div>
    <div id="producto-info" class="mt-3"></div>

</div>

<?php include('footer.php'); ?>
<script src="../Intercomunicador/venta.js"></script>
