<?php include('header.php'); ?>


<div class="right_col" role="main">
    <div class="col-md-12 col-sm-12  ">

      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tabla">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Numero Orden</th>
                            <th class="column-title">Fecha </th>
                            <th class="column-title">Total</th>
                            <th class="column-title">Detalles </th>
                            <th class="column-title">Confirmar </th>
                            <th class="column-title">Rechazar </th>
                          </tr>
                        </thead>

                        <tbody id="cuerpo_tabla">
                         
                        </tbody>
                      </table>
      </div>

</div>


<?php include('./footer.php'); ?>
<script src="../Intercomunicador/pedido_online.js"></script>