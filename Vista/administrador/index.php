<?php include('header.php'); ?>


<div class="right_col" role="main" style="min-height: 1828px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>CalzaShop</h3>
              </div>
            </div>
            <br><br>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="x_content">
                    <div class="row">
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                        <a href="ventas.php">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-shopping-cart"></i>
                            </div>
                            <div class="count">VENTAS</div>
                            <h3>...</h3>
                          </div>
                        </a>
                      </div>
                     
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                        <a href="pedido - online.php">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-truck"></i>
                            </div>
                            <div class="count">PEDIDOS </div>
                            <h3>...</h3>
                          </div>
                        </a>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                        <a href="reporte.php">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-file-text"></i>
                            </div>
                            <div class="count">REPORTES</div>
                            <h3>...</h3>
                          </div>
                        </a>
                      </div>
                      
                      
                      <?php
                        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador') {
                      ?>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                        <a href="categoria.php">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-tasks"></i>
                            </div>
                            <div class="count">CATEGORIAS</div>
                            <h3>...</h3>
                          </div>
                        </a>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                        <a href="producto.php">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-calculator"></i>
                            </div>
                            <div class="count">PRODUCTOS</div>
                            <h3>...</h3>
                          </div>
                        </a>
                      </div>
                      <div class="animated flipInY col-lg-4 col-md-3 col-sm-6  ">
                        <a href="usuarios.php">
                          <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i>
                            </div>
                            <div class="count">USUARIOS</div>
                            <h3>...</h3>
                          </div>
                        </a>
                      </div>
                      
                      <?php
                        }
                      ?>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<?php include('footer.php');?>