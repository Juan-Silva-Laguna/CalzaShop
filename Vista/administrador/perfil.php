<?php include('header.php'); ?>


<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                <h2>MIS DATOS</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br>
                <form class="form-horizontal form-label-left" id="frmUsuario">
                  <input type="hidden" id="id" value="<?= $_SESSION['id']; ?>">
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Nombre</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="text" class="form-control" id="nombre"  name="nombre" data-inputmask="'mask': '99/99/9999'">
                      <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Correo</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input class="form-control" id="correo" name="correo" rows="3" ></input>
                      <span class="fa fa-file-text form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Celular</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input class="form-control" id="celular" name= "celular" rows="3" ></input>
                      <span class="fa fa-phone-square form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Clave</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="password" class="form-control" id="clave" name="clave">
                      <span class="fa fa-unlock-alt form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 col-xs-3">Rol</label>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <select class="form-control" id="rol" disabled name="rol">
                        <option value="empleado">Empleado</option>
                        <option value="administrador">Administrador</option>
                      <span class="fa fa-male form-control-feedback right" aria-hidden="true"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-9 col-sm-9 col-xs-9">
                      <input type="hidden">
                    </div>
                  </div>
                  <div class="ln_solid"></div>

                  <div class="form-group row">
                    <div class="col-md-9 offset-md-3">
                      <button type="submit" class="btn btn-success">ACTUALIZAR</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
</div>



<?php include('footer.php'); ?>
<script src="../Intercomunicador/perfil.js"></script>
