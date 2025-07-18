<?php include('header.php'); ?>


<div class="right_col" role="main">
    <div class="col-md-4 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Categorias</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" id="frmCategoria">
                    <input type="hidden" name="id" id="id">
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control" id="nombre" name="nombre" data-inputmask="'mask': '99/99/9999'">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Descripcion</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <textarea class="form-control" rows="3" id="descripcion" name="descripcion"></textarea>
                      <span class="fa fa-file-text form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
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
                  <div class="ln_solid"></div>

                  <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                      <button type="submit" class="btn btn-success">GUARDAR</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
      <div class="col-md-8">
      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tablaCategoria">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Nombre </th>
                            <th class="column-title">Descripcion </th>
                            <th class="column-title">Imagen </th>
                            <th class="column-title" >Opciones </th>
                            <th class="column-title"> </th>
                          </tr>
                        </thead>

                        <tbody id="tablaCuerpoCategoria">
                         
                        </tbody>
                      </table>
                    </div>
      </div>

</div>



<?php include('./footer.php'); ?>
<script src="../Intercomunicador/categoria.js"></script>