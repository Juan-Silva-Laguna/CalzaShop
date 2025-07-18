<?php include('header.php'); ?>

<style>
  .online{
    padding: 4px;
    border-radius: 5px;
    background-color: #78b7c1;
  }

  .local{
    padding: 4px;
    border-radius: 5px;
    background-color: #7cb817;
  }
</style>

<div class="right_col" role="main">
<div class="col-md-4 col-sm-6 col-6 mb-3">
      <label for="fecha">Fecha</label>
      <input type="date" id="fecha" class="form-control">
    </div>
    <div class="col-md-4 col-sm-6 col-6 mb-3">
      <label for="tipo_venta">Tipo de Venta</label>
      <select id="tipo_venta" class="form-control">
        <option value="todas">Todas las Ventas</option>
        <option value="online">Ventas Online</option>
        <option value="local">Ventas Local</option>
      </select>
    </div>
    <div class="col-md-4 col-sm-6 col-6 mb-3">
      <label for="vendedor">Vendedores</label>
      <select id="vendedor" class="form-control">
      </select>
    </div>
    <div class="col-md-6 col-sm-6 col-8 mb-3 text-left">
      <hr>
      <h4>$ <span id="total"></span></h4>

    </div>
    <div class="col-md-6 col-sm-6 col-4 mb-3 text-right">
      <hr>
      <button class="btn btn-success" id="btn_exportar">Exportar</button>
    </div>
    <div class="col-md-12 col-sm-12  ">

      <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" id="tabla">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Numero Orden</th>
                            <th class="column-title">Fecha </th>
                            <th class="column-title">Total</th>
                            <th class="column-title">Tipo de Venta</th>
                            <th class="column-title">Vendedor</th>
                            <th class="column-title">Detalles </th>
                          </tr>
                        </thead>

                        <tbody id="cuerpo_tabla">
                         
                        </tbody>
                      </table>
      </div>

</div>


<?php include('./footer.php'); ?>
<script>
  // Obtener la fecha actual
  const today = new Date();
    
    // Formatear la fecha en el formato adecuado (YYYY-MM-DD)
    const year = today.getFullYear();
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Los meses empiezan en 0
    const day = String(today.getDate()).padStart(2, '0');
    
    const formattedDate = `${year}-${month}-${day}`;
    
    // Establecer el valor por defecto
    document.getElementById('fecha').value = formattedDate;
</script>
<script src="../Intercomunicador/reportes.js"></script>